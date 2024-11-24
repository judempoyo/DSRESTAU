<?php
class AdresseModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    //find user by email or username
    public function afficherAdresse($id)
    {
        $this->db->query('SELECT * FROM adresse WHERE IdAdresse =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherAdresseParUtilisateur($idUtilisateur)
    {
        $this->db->query('SELECT * FROM adresse WHERE idUtilisateur =:id');
        $this->db->bind(':id', $idUtilisateur);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function afficherToutesAdresse()
    {
        $this->db->query('SELECT * FROM adresse');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterAdresse($donnees)
    {
        $this->db->query('INSERT INTO adresse (IdAdresse,avenue,quartier,commune,ville,IdUtilisateur)
         VALUES (null,:avenue,:quartier,:commune,:ville,:IdUtilisateur)');
        $this->db->bind(':avenue', $donnees['avenue']);
        $this->db->bind(':quartier', $donnees['quartier']);
        $this->db->bind(':commune', $donnees['commune']);
        $this->db->bind(':ville', $donnees['ville']);
        $this->db->bind(':IdUtilisateur', $donnees['IdUtilisateur']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierAdresse($id, $donnees)
    {
        $this->db->query('UPDATE adresse set avenue=:avenue,quartier=:quartier,commune=:commune,ville=:ville WHERE IdAdresse = :IdAdresse');
        $this->db->bind(':avenue', $donnees['avenue']);
        $this->db->bind(':quartier', $donnees['quartier']);
        $this->db->bind(':commune', $donnees['commune']);
        $this->db->bind(':ville', $donnees['ville']);
        $this->db->bind(':IdAdresse', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerAdresse($id)
    {
        $this->db->query('DELETE adresse WHERE IdAdresse = :IdAdresse');
        $this->db->bind(':IdAdresse', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
