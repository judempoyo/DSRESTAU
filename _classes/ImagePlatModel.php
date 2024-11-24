<?php
class ImagePlatModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function afficherImageplat($id)
    {
        $this->db->query('SELECT * FROM imageplat WHERE idImageplat =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherImageplatParPlat($idPlat)
    {
        $this->db->query('SELECT * FROM imageplat WHERE idPlat =:id');
        $this->db->bind(':id', $idPlat);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherPremiereImageplatParPlat($idPlat)
    {
        $this->db->query('SELECT * FROM `imageplat` WHERE idPlat=:id LIMIT 0, 1 ');
        $this->db->bind(':id', $idPlat);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherToutesimageplat()
    {
        $this->db->query('SELECT * FROM imageplat');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterimageplat($donnees)
    {
        $this->db->query('INSERT INTO imageplat (idImageplat,photo,nom,idPlat)
         VALUES (null,:photo,:nom,:idPlat)');
        $this->db->bind(':photo', $donnees['photo']);
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':idPlat', $donnees['idPlat']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierimageplat($id, $donnees)
    {
        $this->db->query('UPDATE imageplat set photo=:photo,nom=:nom,idPlat=:idPlat, WHERE IdImageplat = :IdImageplat');
        $this->db->bind(':photo', $donnees['photo']);
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':idPlat', $donnees['idPlat']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerimageplat($id)
    {
        $this->db->query('DELETE FROM imageplat WHERE IdImageplat = :IdImageplat');
        $this->db->bind(':IdImageplat', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
