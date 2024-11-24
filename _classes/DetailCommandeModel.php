<?php
class DetailCommandeModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function afficherDetailCommande($id)
    {
        $this->db->query('SELECT * FROM detailcommande WHERE idDetailCommande =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherDetailCommandeParCommande($idCommande)
    {
        $this->db->query('SELECT * FROM detailcommande WHERE idCommande =:id');
        $this->db->bind(':id', $idCommande);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherToutesDetailCommande()
    {
        $this->db->query('SELECT * FROM detailcommande');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterDetailCommande($donnees)
    {
        $this->db->query('INSERT INTO detailcommande (qte,prixUnitaire,sousTotal,idCommande,idplat)
         VALUES (:qte,:prixUnitaire,:sousTotal,:idCommande,:idplat)');
        $this->db->bind(':qte', $donnees['qte']);
        $this->db->bind(':prixUnitaire', $donnees['prixUnitaire']);
        $this->db->bind(':sousTotal', $donnees['sousTotal']);
        $this->db->bind(':idCommande', $donnees['idCommande']);
        $this->db->bind(':idplat', $donnees['idplat']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierDetailCommande($id, $donnees)
    {
        $this->db->query('UPDATE detailcommande set qte=:qte,prixUnitaire=:prixUnitaire,sousTotal=:sousTotal,idCommande=:idCommande,idplat=:idplat WHERE Iddetailcommande = :Iddetailcommande');
        $this->db->bind(':qte', $donnees['qte']);
        $this->db->bind(':prixUnitaire', $donnees['prixUnitaire']);
        $this->db->bind(':sousTotal', $donnees['sousTotal']);
        $this->db->bind(':idCommande', $donnees['idCommande']);
        $this->db->bind(':idplat', $donnees['idplat']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerDetailCommande($id)
    {
        $this->db->query('DELETE FROM detailcommande WHERE Iddetailcommande = :Iddetailcommande');
        $this->db->bind(':Iddetailcommande', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
