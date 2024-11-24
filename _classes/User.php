<?php

// Importe les classes PHPMailer, Uuids dans l'espace de noms global
use Generator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class User
{
    private $userModel;
    protected $donnees;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function saisirEmail()
    {
        //sanitaze post donnee
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        if ($this->userModel->trouverUtilisateurParEmail($email)) {
            Flash("enterEmail", "email deja pris");
            redirect("?page=register");
        }

        if ($this->userModel->trouverEmailTemporaire($email)) {
            Flash("enterEmail", "email aen attente de validation");
            redirect("?page=register");
        }

        $codeConfirmation = mt_rand(100000, 999999);

        //enter valid email
        //if ($this->userModel->saisirEmail($email, $codeConfirmation)) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL;                     //SMTP username
            $mail->Password   = MDPGMAILAPP;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL, 'Ds Restau');
            $mail->addAddress(EMAIL, 'Ds Restau');     //Add a recipient
            $mail->addReplyTo(EMAIL, 'Ds Restau');
            $mail->addCC($email);
            $mail->addBCC($email);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Votre code de confrmation - Ds restau';
            $mail->Body    = 'Bonjour, Voici votre code de confirmation <b>' . $codeConfirmation . '</b>';
            if ($mail->send()) {
                $this->donnees['email'] = $email;
                $this->userModel->saisirEmail($email, $codeConfirmation);
                // Crée un cookie
                setcookie(
                    'EMAIL',
                    $email,
                    [
                        'expires' => time() + 365 * 24 * 3600,
                        'secure' => true,
                        'httponly' => true,
                    ],
                );
                redirect("?page=register&etape=confirmerCompte");
            }
        } catch (Exception $e) {
            Flash("enterEmail", "impossible d'envoyer le message. Mailer Error: {$mail->ErrorInfo}");
            redirect("?page=register");
        }
        /* } else {
            die("Something went wrong");
        } */
    }

    public function confirmerCompte()
    {
        /* if (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) { */
        //sanitaze post donnee
        $codeenter = str_secure($_POST["codeEnter"]);

        if ($this->userModel->confirmerCompte($codeenter, $_COOKIE['EMAIL'])) {
            $this->userModel->changerEtatDuCompte($_COOKIE['EMAIL']);
            redirect("?page=register&etape=userAccountData");
        } else {
            Flash("confirmerCompte", "code de confirmation incorrect");
            redirect("?page=register&etape=confirmerCompte");
        }
        /* } else {
            echo "some required donnee are missing";
        } */
    }

    /*  public function delCookie()
    {
        if ($this->userModel->delCookie($_COOKIE["EMAIL"])) {
            //suppression du cookie EMAIL
            setcookie('EMAIL', '');
        }
    } */
    public function saisirDonneesUtilisateur()
    {
        /* if (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) { */

        $this->donnees['nom']           = str_secure(trim($_POST["nom"]));
        $this->donnees['sexe']            = str_secure(trim($_POST["sexe"]));
        $this->donnees['telephone']          = str_secure(trim($_POST["telephone"]));
        $this->donnees['motdepasse']       = str_secure(trim($_POST["motdepasse"]));
        $this->donnees['repeterMotdepasse'] = str_secure(trim($_POST["repeterMotdepasse"]));



        //validate inputs
        /* if (empty($donnee['name' ]) || empty($donnee['firstname']) || 
        empty($donnee['username']) || empty($donnee['sex']) || 
        empty($donnee['phone']) || empty($donnee['email']) || 
        empty($donnee['password']) || empty($donnee['repeterMotdepasse'])) {
            Flash("register","please fill out all inputs");
            redirect("?page=register");
        } 
        if (!filter_var($donnee["email"], FILTER_VALIDATE_EMAIL)) {
            Flash("resgister","inavalid email");
            redirect("?page=register");
        }*/


        if ($this->donnees["motdepasse"] !== $this->donnees["repeterMotdepasse"]) {
            Flash("userAccountData", "les mot de passe ne sont pas identique");
            redirect("?page=register&etape=userAccountData");
        }


        /* if ($this->userModel->trouverUtilisateurParEmail($this->donnees["username"], $this->donnees["username"])) {
            Flash("userAccountdonnee", "Username  already token");
            redirect("?page=register&etape=userAccountdonnee");
        } */

        //hash password
        $this->donnees["motdepasse"] = password_hash($this->donnees["motdepasse"], PASSWORD_DEFAULT);
        //register User
        if ($this->userModel->saisirDonneesUtilisateur($this->donnees, $_COOKIE['EMAIL'])) {
            redirect("?page=register&etape=definirAvatar");
        } else {
            die("Quelque chose ne va pas");
        }
        /*  } else {
            Flash("userAccountdonnee", "some required donnee are missing");
            redirect("?page=register&etape=userAccountdonnee");
        } */
    }
    public function definirAvatar()
    {
        /* if (isset($_COOKIE['EMAIL']) && !empty($_COOKIE['EMAIL'])) { */
        $this->donnees['avatar'] = str_secure(trim($_POST["avatar"]));
        if (isset($_FILES['avatar']) && $_FILES['avatar']['tmp_name'] != '') {
            $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/images/upload/profiles/' . $fname);
            $this->donnees['avatar'] = $fname;
        }
        /* $row = $this->userModel->trouverUtilisateurParEmail($_COOKIE['EMAIL'], $_COOKIE['EMAIL']); */

        if ($this->userModel->definirAvatar($this->donnees['avatar'], $_COOKIE['EMAIL'])) {
            redirect("?page=login");
        } else {
            die("Quelque chose ne va pas");
        }
        /* } else {
            Flash("definirAvatar", "some required donnee are missing");
            redirect("?page=register&etape=definirAvatar");
        } */
    }
    /*  public function register()
    {
        //initialize donnee
        $donnee = [
            'name'           => str_secure(trim($_POST["name"])),
            'firstname'      => str_secure(trim($_POST["firstname"])),
            'username'       => str_secure(trim($_POST["username"])),
            'sex'            => str_secure(trim($_POST["sex"])),
            'phone'          => str_secure(trim($_POST["phone"])),
            'email'          => str_secure(trim($_POST["email"])),
            'password'       => str_secure(trim($_POST["password"])),
            'repeterMotdepasse' => str_secure(trim($_POST["repeterMotdepasse"]))
        ];

        //validate inputs
        if (empty($donnee['name' ]) || empty($donnee['firstname']) || 
        empty($donnee['username']) || empty($donnee['sex']) || 
        empty($donnee['phone']) || empty($donnee['email']) || 
        empty($donnee['password']) || empty($donnee['repeterMotdepasse'])) {
            Flash("register","please fill out all inputs");
            redirect("?page=register");
        } 
        if (!filter_var($donnee["email"], FILTER_VALIDATE_EMAIL)) {
            Flash("resgister","inavalid email");
            redirect("?page=register");
        }


        if (strlen($donnee["password"]) < 6) {
            Flash("register", "Invalid password");
            redirect("?page=register");
        } else if ($donnee["password"] !== $donnee["repeterMotdepasse"]) {
            Flash("register", "Password don't match");
            redirect("?page=register");
        }

        if ($this->userModel->trouverUtilisateurParEmail($donnee["username"], $donnee["email"])) {
            Flash("register", "Username or email already token");
            redirect("?page=register");
        }

        //hash password
        $donnee["password"] = password_hash($donnee["password"], PASSWORD_DEFAULT);

        //register User
        if ($this->userModel->register($donnee)) {
            redirect("?page=login");
        } else {
            die("Something went wrong");
        }
    } */

    public function login()
    {

        //initialize donnee
        $donnee = [
            'email'           => str_secure(trim($_POST["email"])),
            'motdepasse'      => str_secure(trim($_POST["motdepasse"]))
        ];

        /*if (empty($donnee["usernameOrEmail"]) || empty($donnee["password"])) {
            Flash("login","please fill out all inputs");
            header("location:?page=login");
            exit;
        }*/

        //check for username/email
        if (!empty($donnee["motdepasse"])) {
            if ($this->userModel->trouverUtilisateurParEmail($donnee["email"])) {
                //user found
                $utilisateurAuthentiifer = $this->userModel->login($donnee["email"], $donnee["motdepasse"]);
                if (!empty($utilisateurAuthentiifer)) {
                    /* debug($utilisateurAuthentiifer);
                    exit; */
                    //create session

                    $this->creerSessionUtilisateur($utilisateurAuthentiifer);
                } else {
                    Flash("login", "mot de passe incorrect");
                    redirect("?page=login");
                }
            } else {
                Flash("login", "Utilisateur non trouver");
                redirect("?page=login");
            }
        }
    }

    public function creerSessionUtilisateur($utilisateur)
    {
        $_SESSION["id"] = $utilisateur->id;
        $_SESSION["nom"] = $utilisateur->nom;
        $_SESSION["email"] = $utilisateur->email;
        $_SESSION["estAdmin"] = $utilisateur->estAdmin;
        $_SESSION["avatar"] = $utilisateur->avatar;
        if (isset($_GET['redirect']))
            redirect("?page=" . $_GET['redirect']);

        else
            redirect("?page");



        /* pour verifier le role et ouvrir les pages selons les roles 
        $_SESSION["role"] = $user->type;

        if ($_SESSION["role"] == 1) {

        }*/
    }

    public function logout()
    {
        unset($_SESSION["id"]);
        unset($_SESSION["nom"]);
        unset($_SESSION["email"]);
        unset($_SESSION["estAdmin"]);
        unset($_SESSION["avatar"]);
        unset($_SESSION["message"]);
        //session_destroy();
        redirect("?page=home");
    }

    public function donneesUtilisateur()
    {
        if (isset($_SESSION["id"])) {
            return $this->userModel->obtenirDonneesUtilisateurParId($_SESSION["id"]);
        }
    }

    public function tousLesUtilisateurs()
    {

        return $this->userModel->tousLesUtilisateurs();
    }

    public function modifierUtilisateur()
    {
        //initialize donnee
        $donnee = [
            'nom'           => str_secure(trim($_POST["nom"])),
            'telephone'          => str_secure(trim($_POST["telephone"])),
        ];

        if (isset($_FILES['avatar']) && $_FILES['avatar']['tmp_name'] != '') {
            $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/images/upload/profiles/' . $fname);
            $donnee['avatar'] = $fname;
        }

        if (!empty($donnee['avatar'])) {
            $this->userModel->modifierPhotoUtilisateur($_SESSION["id"], $donnee['avatar']);
        }

        //validate inputs
        /* if (empty($donnee['name' ]) || empty($donnee['firstname']) || 
        empty($donnee['username']) || empty($donnee['sex']) || 
        empty($donnee['phone']) || empty($donnee['email']) || 
        empty($donnee['password']) || empty($donnee['repeterMotdepasse'])) {
            Flash("register","please fill out all inputs");
            redirect("?page=register");
        } 
        if (!filter_var($donnee["email"], FILTER_VALIDATE_EMAIL)) {
            Flash("resgister","inavalid email");
            redirect("?page=register");
        }*/

        /* if ($this->userModel->trouverUtilisateurParEmail($donnee["username"], $donnee["email"])) {
            Flash("profile", "Username or email already token");
            redirect("?page=profile");
        } */

        if (isset($_SESSION["id"])) {
            //register User
            if ($this->userModel->modifierUtilisateur($_SESSION["id"], $donnee)) {
                redirect("?page=home");
            } else {
                die("Quelque chose ne va pas");
            }
        }
    }

    public function modifierMotdepasseUtilisateur()
    {
        //initialize donnee
        $donnee = [
            'motdepasse'           => str_secure(trim($_POST["motdepasse"])),
            'nouveauMotdepasse'        => str_secure(trim($_POST["nouveauMotdepasse"])),
            'confirmerNouveauMotdepasse'      => str_secure(trim($_POST["confirmerNouveauMotdepasse"]))
        ];

        if (isset($_SESSION["userid"])) {
            $currenthashedpassword = $this->userModel->trouverMotdepasseParId($_SESSION["userid"]);
            if (password_verify($donnee["password"], $currenthashedpassword->password)) {
                if ($donnee["nouveauMotdepasse"] !== $donnee["confirmerNouveauMotdepasse"]) {
                    Flash("profile", "les mot de passe ne correspondent pas");
                    redirect("?page=profile");
                }

                if ($donnee["nouveauMotdepasse"] == $donnee["motdepasse"]) {
                    Flash("profile", "mot de passe identique");
                    redirect("?page=profile");
                }

                //hash newpassword
                $donnee["nouveauMotdepasse"] = password_hash($donnee["nouveauMotdepasse"], PASSWORD_DEFAULT);

                //register User
                if ($this->userModel->modifierMotdepasseUtilisateur($_SESSION["id"], $donnee["nouveauMotdepasse"])) {
                    Flash("profile", "mot de passe change avec succes", "alert alert-succes alert-dismissible fade show");
                    redirect("?page=profile");
                } else {
                    die("Quelque chose ne va pas");
                }
            } else {
                Flash("profile", "mauvais mot de passe");
                redirect("?page=profile");
            }
        }
    }
}
