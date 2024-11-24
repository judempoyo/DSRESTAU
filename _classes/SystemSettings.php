<?php 

Class SystemSettings 
{
    private $db;
    public function __construct() {
        $this->db = new Db();
    }

    public function getSystemInfo() {
        $this->db->query("SELECT * FROM systemsetting WHERE id=1");

        $row = $this->db->single();

        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}