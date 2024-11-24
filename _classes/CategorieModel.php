<?php
class CategorieModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }
    public function afficherCategorie($id)
    {
        $this->db->query('SELECT * FROM categorie WHERE idCategorie=:id');
        $this->db->bind(":id", $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherToutesCategorie()
    {
        $this->db->query('SELECT * FROM categorie');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterCategorie($donnees)
    {
        $this->db->query('INSERT INTO categorie (Idcategorie,nom,description)
         VALUES (null,:nom,:description)');
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':description', $donnees['description']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierCategorie($id, $donnees)
    {
        $this->db->query('UPDATE categorie set nom=:nom,description=:description WHERE Idcategorie = :Idcategorie');
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':description', $donnees['description']);
        $this->db->bind(':Idcategorie', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerCategorie($id)
    {
        $this->db->query('DELETE FROM categorie WHERE Idcategorie = :Idcategorie');
        $this->db->bind(':Idcategorie', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
