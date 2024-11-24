<?php
class DetailCommande
{
    private $DetailCommandeModel;
    protected $donnees;
    public function __construct()
    {
        $this->DetailCommandeModel = new DetailCommandeModel();
    }
    public function afficherDetailCommande($id)
    {
        return $this->DetailCommandeModel->afficherDetailCommande($id);
    }

    public function afficherDetailCommandeParCommande($idCommande)
    {
        return $this->DetailCommandeModel->afficherDetailCommandeParCommande($idCommande);
    }
    public function afficherToutesDetailsCommandes()
    {

        return $this->DetailCommandeModel->afficherToutesDetailCommande();
    }
    public function ajouterDetailCommande($donneesDetail, $idCommande)
    {

        $this->donnees['qte'] = str_secure(trim($donneesDetail["qte"]));
        $this->donnees['prixUnitaire'] = str_secure(trim($donneesDetail["prix"]));
        $this->donnees['sousTotal'] = str_secure(trim($donneesDetail["sousTotal"]));
        $this->donnees['idCommande'] = str_secure(trim($idCommande));;
        $this->donnees['idplat'] = str_secure(trim($donneesDetail["idPlat"]));



        //add Adresse
        if ($this->DetailCommandeModel->ajouterDetailCommande($this->donnees)) {
            //redirect("");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierDetailCommande($id)
    {
        $this->donnees['qte'] = str_secure(trim($_POST["qte"]));
        $this->donnees['prixUnitaire'] = str_secure(trim($_POST["prixUnitaire"]));
        $this->donnees['sousTotal'] = str_secure(trim($_POST["sousTotal"]));
        $this->donnees['idCommande'] = str_secure(trim($_POST["idCommande"]));;
        $this->donnees['idplat'] = str_secure(trim($_POST["idplat"]));

        //add Adresse
        if ($this->DetailCommandeModel->modifierDetailCommande($id, $this->donnees)) {
            redirect("?page=amettre");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerDetailCommande($id)
    {
        if ($this->DetailCommandeModel->supprimerDetailCommande($id)) {
            redirect("?page=amettre");
        } else {
            die("Quelque chose ne va pas");
        }
    }
}
