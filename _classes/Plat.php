<?php
class Plat
{
    private $PlatModel;
    protected $donnees;
    public function __construct()
    {
        $this->PlatModel = new PlatModel();
    }
    public function afficherplat($id)
    {
        return $this->PlatModel->afficherPlat($id);
    }

    public function afficherPlatParCategorie($idCategorie)
    {
        return $this->PlatModel->afficherPlatParCategorie($idCategorie);
    }

    public function reduireQte($idPlat, $qte)
    {
        return $this->PlatModel->reduireQte($idPlat, $qte);
    }

    public function topPlat()
    {

        return $this->PlatModel->topPlat();
    }

    public function afficherToutesPlat()
    {

        return $this->PlatModel->afficherToutesPlat();
    }
    public function ajouterPlat()
    {

        $this->donnees['nom'] = str_secure(trim($_POST["nom"]));
        $this->donnees['description'] = str_secure(trim($_POST["description"]));
        $this->donnees['prix'] = str_secure(trim($_POST["prix"]));
        $this->donnees['qte'] = str_secure(trim($_POST["qte"]));
        $this->donnees['idCategorie'] = (int) str_secure(trim($_POST["idCategorie"]));

        //add Adresse
        if ($this->PlatModel->ajouterPlat($this->donnees)) {
            redirect("?page=admin&souspage=plats");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierPlat($id)
    {
        $this->donnees['nom'] = str_secure(trim($_POST["nom"]));
        $this->donnees['description'] = str_secure(trim($_POST["description"]));
        $this->donnees['prix'] = str_secure(trim($_POST["prix"]));
        $this->donnees['qte'] = str_secure(trim($_POST["qte"]));
        $this->donnees['idCategorie'] = (int) str_secure(trim($_POST["idCategorie"]));

        //add Adresse
        if ($this->PlatModel->modifierPlat($id, $this->donnees)) {
            redirect("?page=admin&souspage=plats");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerPlat($id)
    {
        if ($this->PlatModel->supprimerPlat($id)) {
            redirect("?page=admin&souspage=plats");
        } else {
            die("Quelque chose ne va pas");
        }
    }
}
