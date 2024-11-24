<?php
class Categorie
{
    private $CategorieModel;
    protected $donnees;
    public function __construct()
    {
        $this->CategorieModel = new CategorieModel();
    }

    public function afficherCategorie($id)
    {
        return $this->CategorieModel->afficherCategorie($id);
    }
    public function afficherToutesCategorie()
    {

        return $this->CategorieModel->afficherToutesCategorie();
    }
    public function ajouterCategorie()
    {

        $this->donnees['nom']           = str_secure(trim($_POST["nom"]));
        $this->donnees['description']            = str_secure(trim($_POST["description"]));


        //add Adresse
        if ($this->CategorieModel->ajouterCategorie($this->donnees)) {
            redirect("?page=admin&souspage=categories");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierCategorie($id)
    {
        /* $this->donnees['IdAdresse']           = str_secure(trim($_POST["IdAdresse"])); */
        $this->donnees['nom']           = str_secure(trim($_POST["nom"]));
        $this->donnees['description']            = str_secure(trim($_POST["description"]));

        //add Adresse
        if ($this->CategorieModel->modifierCategorie($id, $this->donnees)) {
            redirect("?page=admin&souspage=categories");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerCategorie($id)
    {
        if ($this->CategorieModel->supprimerCategorie($id)) {
            redirect("?page=admin&souspage=categories");
        } else {
            die("Quelque chose ne va pas");
        }
    }
}
