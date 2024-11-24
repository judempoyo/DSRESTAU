<?php
class Adresse
{
    private $AdresseModel;
    protected $donnees;
    public function __construct()
    {
        $this->AdresseModel = new AdresseModel();
    }

    public function afficherAdresse($id)
    {
        return $this->AdresseModel->afficherAdresse($id);
    }

    public function afficherAdresseParUtilisateur($idUtilisateur)
    {
        return $this->AdresseModel->afficherAdresseParUtilisateur($idUtilisateur);
    }
    public function afficherToutesAdresse()
    {
    
            return $this->AdresseModel->afficherToutesAdresse();
    }

    public function ajouterAdresse()
    {

        $this->donnees['avenue']           = str_secure(trim($_POST["avenue"]));
        $this->donnees['quartier']            = str_secure(trim($_POST["quartier"]));
        $this->donnees['commune']          = str_secure(trim($_POST["commune"]));
        $this->donnees['IdUtilisateur']       = str_secure(trim($_SESSION["id"]));
        
        //add Adresse
        if ($this->AdresseModel->ajouterAdresse($this->donnees)) {
            redirect("?page=amettre");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierAdresse($id)
    {
        /* $this->donnees['IdAdresse']           = str_secure(trim($_POST["IdAdresse"])); */
        $this->donnees['avenue']           = str_secure(trim($_POST["avenue"]));
        $this->donnees['quartier']            = str_secure(trim($_POST["quartier"]));
        $this->donnees['commune']          = str_secure(trim($_POST["commune"]));
        $this->donnees['IdUtilisateur']       = str_secure(trim($_SESSION["id"]));
        
        //add Adresse
        if ($this->AdresseModel->modifierAdresse($id,$this->donnees)) {
            redirect("?page=amettre");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerAdresse($id)
    {
        if ($this->AdresseModel->supprimerAdresse($id)) {
            redirect("?page=amettre");
        } else {
            die("Quelque chose ne va pas");
        }
    }
   
}

