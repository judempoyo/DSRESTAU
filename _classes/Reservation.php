<?php
// Importe les classes PHPMailer, UuiDS Rans l'espace de noms global
use Generator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class Reservation
{
    private $ReservationModel;
    protected $donnees;
    public function __construct()
    {
        $this->ReservationModel = new ReservationModel();
    }
    public function afficherReservation($id)
    {
        return $this->ReservationModel->afficherReservation($id);
    }

    public function afficherReservationParStatut($statut)
    {
        return $this->ReservationModel->afficherReservationParStatut($statut);
    }

    public function afficherReservationParUtilisateur($idUtilisateur)
    {
        return $this->ReservationModel->afficherReservationParUtilisateur($idUtilisateur);
    }
    public function afficherToutesReservations()
    {

        return $this->ReservationModel->afficherToutesReservation();
    }
    public function ajouterReservation()
    {

        $this->donnees['date'] = str_secure(trim($_POST["date"]));
        $this->donnees['heure'] = str_secure(trim($_POST["heure"]));
        $this->donnees['nombrePersonne'] = str_secure(trim($_POST["nombrePersonne"]));
        $this->donnees['commentaire'] = str_secure(trim($_POST["commentaire"]));
        $this->donnees['idUtilisateur'] = str_secure(trim($_SESSION["id"]));
        $this->donnees['emailClient'] = str_secure(trim($_SESSION["email"]));



        //add 
        if ($this->ReservationModel->ajouterReservation($this->donnees)) {

            //message

            $message = "Bonjour Cher(e) " . $this->donnees['nomClient'] . ", Nous avons bien reçu votre reservation nous allons vous donnez une suite le plutot possible, verifier bien ci-dessous ci vos informations sont corrects <br><br>
            date de la reservation : " . $this->donnees['date'] . "<br>
            Heure de votre reservation :" . $this->donnees['heure'] . "<br>
            Nombre de personne :" . $this->donnees['nombrePersonne'] . "<br>
            Commentaire :" . $this->donnees['commentaire'] . "<br>
            De ce fait bonne suite de vos activités.";
            //fin message

            $this->envoieMail($this->donnees['emailClient'], $message);

            Flash("reservation", "votre reservation a été enregistrer vous recevrez un email pour la confirmation", "alert alert-succes alert-dismissible fade show");
            redirect("?page=reservation");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierReservation($id)
    {
        $this->donnees['date'] = str_secure(trim($_POST["date"]));
        $this->donnees['heure'] = str_secure(trim($_POST["heure"]));
        $this->donnees['nombrePersonne'] = str_secure(trim($_POST["nombrePersonne"]));
        $this->donnees['statutRes'] = str_secure(trim($_POST["statutRes"]));
        $this->donnees['commentaire'] = str_secure(trim($_POST["commentaire"]));

        //add Adresse
        if ($this->ReservationModel->modifierReservation($id, $this->donnees)) {
            redirect("?page=reservation");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerReservation($id)
    {
        if ($this->ReservationModel->supprimerReservation($id)) {
            redirect("?page=reservation");
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
            $mail->Subject = 'Votre code Reservation - DS Restau';
            $mail->Body    = $message;

            if ($mail->send()) {
                //redirect("");
            }
        } catch (Exception $e) {
            if ($_GET['page'] == 'reservation') {
                Flash("reservation", "impossible d'envoyer le message. Mailer Error: {$mail->ErrorInfo}");
                redirect("?page=reservation");
            } else {
                Flash("admin", "impossible d'envoyer le message. Mailer Error: {$mail->ErrorInfo}");
                redirect("?page=admin&souspage=reservations");
            }
        }
    }

    public function approuverReservation($idReservation)
    {

        $this->donnees = $this->ReservationModel->afficherReservation($idReservation);

        /* debug($this->donnees);
        die; */

        //message

        $message = "Bonjour Cher(e) " . $this->donnees->nomClient . ", Votre reservation du " . $this->donnees->creeLe . " a été approuvé.<br> Vous devez arriver bien avant pour pouvoir profiter de votre reservation<br><b>NB : </b>la place ne sera garde que 15 minutes apres la date de votre reservation depasse ce delai votre reservation sera annule<br><br>
            date de la reservation : " . $this->donnees->date . "<br>
            Heure de votre reservation :" . $this->donnees->heure . "<br>
            Nombre de personne :" . $this->donnees->nombrePersonne . "<br>
            Commentaire :" . $this->donnees->commentaire . "<br>
            De ce fait bonne suite de vos activités.";
        //fin message

        $this->envoieMail($this->donnees->emailClient, $message);


        if ($this->ReservationModel->approuverReservation($idReservation)) {
            Flash("admin", "la reservation N°" . $idReservation . " a été approuvé", "alert alert-succes alert-dismissible fade show");
            redirect("?page=admin&souspage=reservations");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function annulerReservation($idReservation)
    {
        $this->donnees = $this->ReservationModel->afficherReservation($idReservation);

        //message

        $message = "<p>Bonjour Cher(e) " . $this->donnees->nomClient . ", Votre reservation du " . $this->donnees->creeLe . " a été annuler pour des raisons des disponibilites des nos tables<br>
            De ce fait bonne suite de vos activités.</p>";
        //fin message

        $this->envoieMail($this->donnees->emailClient, $message);

        if ($this->ReservationModel->annulerReservation($idReservation)) {

            Flash("admin", "la reservation N°" . $idReservation . " a été annulé", "alert alert-succes alert-dismissible fade show");
            redirect("?page=admin&souspage=reservations");
        } else {
            die("Quelque chose ne va pas");
        }
    }
}
