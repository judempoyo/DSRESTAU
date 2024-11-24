<?php
class ReservationModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function afficherReservation($id)
    {
        $this->db->query('SELECT * FROM reservation WHERE idReservation =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherReservationParStatut($statut)
    {
        $this->db->query('SELECT * FROM reservation WHERE statutRes =:statutRes');
        $this->db->bind(':statutRes', $statut);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function afficherReservationParUtilisateur($idUtilisateur)
    {
        $this->db->query('SELECT * FROM reservation WHERE idUtilisateur =:id');
        $this->db->bind(':id', $idUtilisateur);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherToutesReservation()
    {
        $this->db->query('SELECT * FROM reservation');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterReservation($donnees)
    {
        $this->db->query('INSERT INTO reservation (idReservation,date,heure,nombrePersonne,commentaire,idUtilisateur,emailClient)
         VALUES (null,:date,:heure,:nombrePersonne,:commentaire,:idUtilisateur,:emailClient)');
        $this->db->bind(':date', $donnees['date']);
        $this->db->bind(':heure', $donnees['heure']);
        $this->db->bind(':nombrePersonne', $donnees['nombrePersonne']);
        $this->db->bind(':commentaire', $donnees['commentaire']);
        $this->db->bind(':idUtilisateur', $donnees['idUtilisateur']);
        $this->db->bind(':emailClient', $donnees['emailClient']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierReservation($id, $donnees)
    {
        $this->db->query('UPDATE reservation set date=:date heure=:heure,nombrePersonne=:nombrePersonne,statutRes=:statutRes,commentaire=:commentaire,emailClient=:emailClient WHERE IdReservation = :IdReservation');
        $this->db->bind(':date', $donnees['date']);
        $this->db->bind(':heure', $donnees['heure']);
        $this->db->bind(':nombrePersonne', $donnees['nombrePersonne']);
        $this->db->bind(':statutRes', $donnees['statutRes']);
        $this->db->bind(':commentaire', $donnees['commentaire']);
        $this->db->bind(':emailClient', $donnees['emailClient']);
        $this->db->bind(':idReservation', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerReservation($id)
    {
        $this->db->query('DELETE FROM reservation WHERE IdReservation = :IdReservation');
        $this->db->bind(':IdReservation', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function approuverReservation($id)
    {
        $this->db->query('UPDATE reservation set 	statutRes="approuver" WHERE idReservation = :idReservation AND 	statutRes="en attente"');
        $this->db->bind(':idReservation', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function annulerReservation($id)
    {
        $this->db->query('UPDATE reservation set 	statutRes="refuser" WHERE idReservation = :idReservation AND 	statutRes="en attente"');
        $this->db->bind(':idReservation', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
