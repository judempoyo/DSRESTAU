<?php
class ImagePlat
{
    private $ImagePlatModel;
    protected $donnees;
    public function __construct()
    {
        $this->ImagePlatModel = new ImagePlatModel();
    }

    public function afficherImageplat($id)
    {
        return $this->ImagePlatModel->afficherImageplat($id);
    }

    public function afficherImagePlatParPlat($idPlat)
    {
        return $this->ImagePlatModel->afficherImagePlatParPlat($idPlat);
    }

    public function afficherPremiereImagePlatParPlat($idPlat)
    {
        return $this->ImagePlatModel->afficherPremiereImageplatParPlat($idPlat);
    }
    public function afficherToutesimageplat()
    {
    
            return $this->ImagePlatModel->afficherToutesimageplat();
    }
    public function ajouterimageplat()
    {
        
        $this->donnees['photo'] = str_secure(trim($_POST["photo"]));
        $this->donnees['nom'] = str_secure(trim($_POST["nom"]));
        $this->donnees['idPlat'] = str_secure(trim($_POST["idPlat"]));

        if (isset($_FILES['photo']) && $_FILES['photo']['tmp_name'] != '') {
            $fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/images/upload/plats/' . $fname);
            $this->donnees['photo'] = $fname;
        }

        
        //add Adresse
        if ($this->ImagePlatModel->ajouterimageplat($this->donnees)) {
            redirect("?page=admin&souspage=plats");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function modifierimageplat($id)
    {
        $this->donnees['photo'] = str_secure(trim($_POST["photo"]));
        $this->donnees['nom'] = str_secure(trim($_POST["nom"]));
        $this->donnees['idPlat'] = str_secure(trim($_POST["idPlat"]));
        
        //add Adresse
        if ($this->ImagePlatModel->modifierimageplat($id,$this->donnees)) {
            redirect("?page=admin&souspage=plats");
        } else {
            die("Quelque chose ne va pas");
        }
    }

    public function supprimerimageplat($id)
    {
        if ($this->ImagePlatModel->supprimerimageplat($id)) {
            redirect("?page=admin&souspage=plats");
        } else {
            die("Quelque chose ne va pas");
        }
    }    
}