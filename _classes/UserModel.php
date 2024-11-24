<?php
class UserModel
{
    protected $db;
    public function __construct()
    {
        $this->db = new Db();
    }

    public function tousLesUtilisateurs()
    {
        $this->db->query('SELECT * FROM utilisateur');

        $row = $this->db->resultSet();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    //find user by email or username
    public function trouverUtilisateurParEmail($email)
    {
        $this->db->query('SELECT * FROM utilisateur WHERE email =:email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function trouverEmailTemporaire($email)
    {
        $this->db->query('SELECT * FROM utilisateurTemporaire WHERE email =:email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function trouverMotdepasseParId($id)
    {
        $this->db->query('SELECT motdepasse FROM utilisateur WHERE id =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function saisirEmail($email, $codeCofirrmation)
    {
        $this->db->query('INSERT INTO utilisateurTemporaire (id,email,codeCofirrmation) VALUES 
        (null,:email,:codeCofirrmation)');
        $this->db->bind(':email', $email);
        $this->db->bind(':codeCofirrmation', $codeCofirrmation);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function confirmerCompte($codeCofirrmation, $email)
    {
        $this->db->query('SELECT * FROM utilisateurTemporaire WHERE codeCofirrmation =:codeCofirrmation AND email =:email');
        $this->db->bind(':codeCofirrmation', $codeCofirrmation);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function changerEtatDuCompte($email)
    {
        $row = $this->trouverEmailTemporaire($email);
        //debug($row);
        $this->db->query('UPDATE utilisateurTemporaire set estConfirmer=1 WHERE id=:id');
        $this->db->bind(':id', $row->id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function saisirDonneesUtilisateur($donnees, $email)
    {
        $this->db->query('INSERT INTO utilisateur (id,nom,sexe,email,motdepasse,telephone)
         VALUES (null,:nom,:sexe,:email,:motdepasse,:telephone)');
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':sexe', $donnees['sexe']);
        $this->db->bind(':email', $email);
        $this->db->bind(':motdepasse', $donnees['motdepasse']);
        $this->db->bind(':telephone', $donnees['telephone']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function definirAvatar($avatar, $email)
    {
        $this->db->query('UPDATE utilisateur set avatar=:avatar WHERE email = :email');
        $this->db->bind(':avatar', $avatar);
        $this->db->bind(':email', $email);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    /* public function register($donnees)
    {
        $this->db->query('INSERT INTO utilisateur (id,name,firstname,username,sex,email,phone,password)
         VALUES (null,:name,:firstname,:username,:sex,:email,:phone,:password)');
        $this->db->bind(':name', $donnees['name']);
        $this->db->bind(':firstname', $donnees['firstname']);
        $this->db->bind(':username', $donnees['username']);
        $this->db->bind(':sex', $donnees['sex']);
        $this->db->bind(':email', $donnees['email']);
        $this->db->bind(':phone', $donnees['phone']);
        $this->db->bind(':password', $donnees['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } */

    //login user
    public function login($email, $motdepasse)
    {
        $row = $this->trouverUtilisateurParEmail($email);

        if ($row == false) return false;
        $motdepasseCrypte = $row->motdepasse;
        if (password_verify($motdepasse, $motdepasseCrypte)) {
            return $row;
        } else {
            return false;
        }
    }

    public function obtenirDonneesUtilisateurParId($id)
    {
        $this->db->query('SELECT * FROM utilisateur WHERE id =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function modifierUtilisateur($id, $donnees)
    {
        $this->db->query('UPDATE utilisateur set nom=:nom,telephone=:telephone WHERE id = :id');
        $this->db->bind(':nom', $donnees['nom']);
        $this->db->bind(':telephone', $donnees['telephone']);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function modifierPhotoUtilisateur($id, $avatar)
    {
        $this->db->query('UPDATE utilisateur set avatar=:avatar WHERE id = :id');

        $this->db->bind(':avatar', $avatar);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modifierMotdepasseUtilisateur($id, $motdepasse)
    {
        $this->db->query('UPDATE utilisateur set motdepasse=:motdepasse WHERE id = :id');
        $this->db->bind(':motdepasse', $motdepasse);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /* public function delCookie($email)
    {
        $row = $this->trouverEmailTemporaire($email);
        $this->db->query('DELETE * from tempuser where id = :id');
        $this->db->bind(':id', $row->id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    } */
}
