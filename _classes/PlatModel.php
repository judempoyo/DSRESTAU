<?php
class PlatModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function afficherPlat($id)
    {
        $this->db->query('SELECT * FROM plat WHERE idPlat =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function topPlat()
    {
        $this->db->query('SELECT * FROM `plat` LIMIT 0, 8 ');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherPlatParCategorie($idCategorie)
    {
        $this->db->query('SELECT * FROM plat WHERE idCategorie =:id');
        $this->db->bind(':id', $idCategorie);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherToutesPlat()
    {
        $this->db->query('SELECT * FROM plat');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterPlat($donnees)
    {
        $this->db->query('INSERT INTO plat (idPlat,nom,description,prix,qte,idCategorie)
         VALUES (null,:nom,:description,:prix,:qte,:idCategorie)');
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':description', $donnees['description']);
        $this->db->bind(':prix', $donnees['prix']);
        $this->db->bind(':qte', $donnees['qte']);
        $this->db->bind(':idCategorie', $donnees['idCategorie']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function modifierPlat($id, $donnees)
    {
        $this->db->query('UPDATE plat set nom=:nom,description=:description,prix=:prix,qte=:qte,idCategorie=:idCategorie WHERE IdPlat = :IdPlat');
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':description', $donnees['description']);
        $this->db->bind(':prix', $donnees['prix']);
        $this->db->bind(':qte', $donnees['qte']);
        $this->db->bind(':idCategorie', $donnees['idCategorie']);
        $this->db->bind(':IdPlat', $id);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function reduireQte($idPlat, $qte)
    {
        $this->db->query('UPDATE plat set 	qte= qte - :qte WHERE idPlat = :idPlat ');
        $this->db->bind(':qte', $qte);
        $this->db->bind(':idPlat', $idPlat);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function supprimerPlat($id)
    {
        $this->db->query('DELETE FROM plat WHERE IdPlat = :IdPlat');
        $this->db->bind(':IdPlat', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
