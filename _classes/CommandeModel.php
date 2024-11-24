<?php
class CommandeModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function afficherCommande($id)
    {
        $this->db->query('SELECT * FROM commande WHERE idCommande =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function derniereCommande () {
        $this->db->query('SELECT * FROM commande ORDER BY idCommande DESC LIMIT 1');
        
        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }


    }

    public function afficherCommandeParStatut($statut)
    {
        $this->db->query('SELECT * FROM commande WHERE statut =:statut');
        $this->db->bind(':statut', $statut);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function afficherCommandeParUtilisateur($idUtilisateur)
    {
        $this->db->query('SELECT * FROM commande WHERE idUtilisateur =:id');
        $this->db->bind(':id', $idUtilisateur);

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function afficherToutesCommande()
    {
        $this->db->query('SELECT * FROM commande');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function ajouterCommande($donnees)
    {
        $this->db->query('INSERT INTO commande (Idcommande,montant,modePaiement,dateLiv,heureLiv,idUtilisateur,nomClient,emailClient,telephoneClient,typeCommande,avenue,quartier,commune,ville)
         VALUES (null,:montant,:modepaiement,:dateLiv,:heureLiv,:idUtilisateur,:nomClient,:emailClient,:telephoneClient,:typeCommande,:avenue,:quartier,:commune,:ville)');
        $this->db->bind(':montant', $donnees['montant']);
        $this->db->bind(':modepaiement', $donnees['mode']);
        $this->db->bind(':dateLiv', $donnees['dateLiv']);
        $this->db->bind(':heureLiv', $donnees['heureLiv']);
        $this->db->bind(':idUtilisateur', $donnees['idUtilisateur']);
        $this->db->bind(':nomClient', $donnees['nomClient']);
        $this->db->bind(':emailClient', $donnees['emailClient']);
        $this->db->bind(':telephoneClient', $donnees['telephoneClient']);
        $this->db->bind(':typeCommande', $donnees['typeCommande']);
        $this->db->bind(':avenue', $donnees['avenue']);
        $this->db->bind(':quartier', $donnees['quartier']);
        $this->db->bind(':commune', $donnees['commune']);
        $this->db->bind(':ville', $donnees['ville']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierCommande($id, $donnees)
    {
        $this->db->query('UPDATE commande set date=:date,montant=:montant,statut=:statut,modepaiement=:modepaiement,dateLiv=:dateLiv,heureLiv=:heureLiv,estpaye=:estpaye,nomClient=:nomClient,emailClient=:emailClient,telephoneClient=:telephoneClient, WHERE Idcommande = :Idcommande');
        $this->db->bind(':date', $donnees['date']);
        $this->db->bind(':montant', $donnees['montant']);
        $this->db->bind(':statut', $donnees['statut']);
        $this->db->bind(':modepaiement', $donnees['modepaiement']);
        $this->db->bind(':dateLiv', $donnees['dateLiv']);
        $this->db->bind(':heureLiv', $donnees['heureLiv']);
        $this->db->bind(':estpaye', $donnees['estpaye']);
        $this->db->bind(':nomClient', $donnees['nomClient']);
        $this->db->bind(':emailClient', $donnees['emailClient']);
        $this->db->bind(':telephoneClient', $donnees['telephoneClient']);
        $this->db->bind(':Idcommande', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerCommande($id)
    {
        $this->db->query('DELETE FROM commande WHERE Idcommande = :Idcommande');
        $this->db->bind(':Idcommande', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function approuverCommande($id)
    {
        $this->db->query('UPDATE commande set statut="approuver" WHERE Idcommande = :Idcommande AND statut="en attente"');
        $this->db->bind(':Idcommande', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function annulerCommande($id)
    {
        $this->db->query('UPDATE commande set statut="annuler" WHERE Idcommande = :Idcommande AND statut="en attente"');
        $this->db->bind(':Idcommande', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
