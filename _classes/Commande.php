<?php

// Importe les classes PHPMailer, UuiDS Rans l'espace de noms global
use Generator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class Commande
{
    private $CommandeModel;
    protected $donnees;
    public function __construct()
    {
        $this->CommandeModel = new CommandeModel();
    }

    public function afficherCommande($id)
    {
        return $this->CommandeModel->afficherCommande($id);
    }

    public function derniereCommande()
    {
        return $this->CommandeModel->derniereCommande();
    }

    public function afficherCommandeParStatut($statut)
    {
        return $this->CommandeModel->afficherCommandeParStatut($statut);
    }

    public function afficherCommandeParUtilisateur($idUtilisateur)
    {
        return $this->CommandeModel->afficherCommandeParUtilisateur($idUtilisateur);
    }
    public function afficherToutesCommandes()
    {

        return $this->CommandeModel->afficherToutesCommande();
    }
    public function ajouterCommande()
    {
        $this->donnees['montant'] = str_secure(trim($_SESSION["donneesCommande"]["montant"]));
        $this->donnees['mode'] = str_secure(trim($_SESSION["donneesCommande"]["mode"]));
        $this->donnees['dateLiv'] = str_secure(trim($_SESSION["donneesCommande"]["dateLiv"]));
        $this->donnees['heureLiv'] = str_secure(trim($_SESSION["donneesCommande"]["heureLiv"]));
        $this->donnees['idUtilisateur'] = str_secure(trim($_SESSION["id"]));
        $this->donnees['nomClient'] = str_secure(trim($_SESSION["donneesCommande"]["nomClient"]));
        $this->donnees['emailClient'] = str_secure(trim($_SESSION["donneesCommande"]["emailClient"]));
        $this->donnees['telephoneClient'] = str_secure(trim($_SESSION["donneesCommande"]["telephoneClient"]));
        $this->donnees['typeCommande'] = str_secure(trim($_SESSION["donneesCommande"]["typeCommande"]));
        $this->donnees['avenue'] = str_secure(trim($_SESSION["donneesCommande"]["avenue"]));
        $this->donnees['quartier'] = str_secure(trim($_SESSION["donneesCommande"]["quartier"]));
        $this->donnees['commune'] = str_secure(trim($_SESSION["donneesCommande"]["commune"]));
        $this->donnees['ville'] = str_secure(trim($_SESSION["donneesCommande"]["ville"]));



        //add Order
        if ($this->CommandeModel->ajouterCommande($this->donnees)) {

            //message
            $tableHead = '<table class="table datatable w-100">
            <thead class="table-light">
              <tr>
                <th scope="col">Qte</th>
                <th scope="col">Nom Plat</th>
                <th scope="col">PU</th>
                <th scope="col">ST</th>
              </tr>
            </thead>
            <tbody>';

            $tableBody = "";
            $total = 0;
            foreach ($_SESSION['panier'] as $key => $value) :
                $st = $value['prix'] * $value['qte'];
                $total += $st;
                $tableBody .= "
            
                <tr>
                  <td>" . $value['qte'] . "</td>
                  <td>" . $value['nom'] . "</td>
                  <td>" . $value['prix'] . " <small>CDF</small></td>
                  <td>" . $st . "<small>CDF</small></td>
                </tr>";
            endforeach;
            $tva = $total * 0.16;
            $totalTTC = $total + $tva;
            $tableFooter =
                "</tbody>

          </table>
          <div class=\"row mb-3 mx-3\">
            <div class=\"col-8\">Sous-total</div>
            <div class=\"col-4 px-4\"><i>$total<small>CDF</small></i></div>
          </div>
          <div class=\"row mb-3 mx-3\">
            <div class=\"col-8\">TVA (16%)</div>
            <div class=\"col-4 px-4\"><i>$tva <small>CDF</small></i></div>
          </div>
          <div class=\"row mb-3 mx-3\">
            <div class=\"col-8\"><strong>Total</strong></div>
            <div class=\"col-4 px-4\"><strong><i><small>$totalTTC CDF</small></i></strong></div>
          </div>";
            $message = "Bonjour Cher(e) " . $this->donnees['nomClient'] . ", nous avons bien recu votre commande nous allons vous donnez une suite le plutot possible, verifier bien ci-dessous ci vos informations sont corrects <br><br>Nom complet : " . $this->donnees['nomClient'] . " <br><br> Numero de telephone : " . $this->donnees['telephoneClient'] . " <br><br>Adresse : " . $this->donnees['avenue'] . "/" . $this->donnees['quartier'] . "/" . $this->donnees['communne'] . "/" . $this->donnees['ville'] . " <br><br><br>Detail de la commande<br><br>" . $tableHead . $tableBody . $tableFooter;
            //fin messages

            /* debug($this->donnees['emailClient']);
            die; */

            $this->envoieMail($this->donnees['emailClient'], $message);
            //unset($_SESSION['panier']);
            Flash("commandez", "votre commande a été enregistrer vous recevrez un email pour la confirmation", "alert alert-succes alert-dismissible fade show");
            //redirect("?page=commandez");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierCommande($id)
    {
        $this->donnees['date'] = str_secure(trim($_POST["date"]));
        $this->donnees['montant'] = str_secure(trim($_POST["montant"]));
        $this->donnees['statut'] = str_secure(trim($_POST["statut"]));
        $this->donnees['modepaiement'] = str_secure(trim($_POST["modepaiement"]));
        $this->donnees['dateLiv'] = str_secure(trim($_POST["dateLiv"]));
        $this->donnees['heureLiv'] = str_secure(trim($_POST["heureLiv"]));
        $this->donnees['estpaye'] = str_secure(trim($_POST["estpaye"]));
        $this->donnees['nomClient'] = str_secure(trim($_POST["nomClient"]));
        $this->donnees['emailClient'] = str_secure(trim($_POST["emailClient"]));
        $this->donnees['telephoneClient'] = str_secure(trim($_POST["telephoneClient"]));

        //add Adresse
        if ($this->CommandeModel->modifierCommande($id, $this->donnees)) {
            Flash("commandez", "votre commande a été enregistrer vous recevrez un email pour la confirmation", "alert alert-succes alert-dismissible fade show");
            redirect("?page=commandez");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerCommande($id)
    {
        if ($this->CommandeModel->supprimerCommande($id)) {
            Flash("commandez", "votre commande a été enregistrer vous recevrez un email pour la confirmation", "alert alert-succes alert-dismissible fade show");
            redirect("?page=commandez");
        } else {
            die("Quelque chose ne va pas");
        }
    }




    public function envoieMail($email, $message)
    {

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
            $mail->setFrom(EMAIL, 'DS Restau');
            $mail->addAddress(EMAIL, 'DS Restau');     //Add a recipient
            $mail->addReplyTo(EMAIL, 'DS Restau');
            $mail->addCC($email);
            $mail->addBCC($email);


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Votre code Commande - DS Restau';
            $mail->Body    = $message;

            if ($mail->send()) {
                //redirect("");
            }
        } catch (Exception $e) {
            if ($_GET['page'] == 'commandez') {
                Flash("commandez", "impossible d'envoyer le message. Mailer Error: {$mail->ErrorInfo}");
                redirect("?page=commandez");
            } else {
                Flash("admin", "impossible d'envoyer le message. Mailer Error: {$mail->ErrorInfo}");
                redirect("?page=admin&souspage=commandes");
            }
        }
    }

    public function approuverCommande($idCommande)
    {

        $this->donnees = $this->CommandeModel->afficherCommande($idCommande);

        //message

        $message = "Bonjour Cher(e) " . $this->donnees->nomClient . ", Votre commande du " . $this->donnees->date . " a été approuvé.<br><br>
        Votre commande vous sera livré comme convenu à l'adreese : " . $this->donnees->avenue . "/" . $this->donnees->quartier . "/" . $this->donnees->commune . "/" . $this->donnees->ville . ",  Le " . $this->donnees->dateLIv . "à" . $this->donnees->heureLiv . "<br><br>De ce fait bonne suite de vos activités.";
        //fin message

        $this->envoieMail($this->donnees->emailClient, $message);
        if ($this->CommandeModel->approuverCommande($idCommande)) {


            Flash("admin", "la commande N°" . $idCommande . " a été approuvé", "alert alert-succes alert-dismissible fade show");
            redirect("?page=admin&souspage=commandes");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function annulerCommande($idCommande)
    {

        $this->donnees = $this->CommandeModel->afficherCommande($idCommande);

        //message

        $message = "Bonjour Cher(e) " . $this->donnees->nomClient . ", Votre commande du " . $this->donnees->date . " a été Annuler pour des raisons interne du restaurant .<br><br>
        Nous nous excusons pour cette circonstance <br> N'hesitez surtout pas a passer d'autre commandes, Merci <br>De ce fait bonne suite de vos activités.";
        //fin message

        $this->envoieMail($this->donnees->emailClient, $message);

        if ($this->CommandeModel->annulerCommande($idCommande)) {


            Flash("admin", "la commande N°" . $idCommande . " a été annulé", "alert alert-succes alert-dismissible fade show");
            redirect("?page=admin&souspage=commandes");
        } else {
            die("Quelque chose ne va pas");
        }
    }
}
