<?php


namespace model;
include_once ('model/Patient.php');
class Model
{
    private $database;

    private function makeConnection(){
        try {
            $this->database = new \PDO('mysql:host=localhost;dbname=healthone', "root", "");
        }

        catch(PDOException $e) {        
            echo "[-] Cant connect to MySQL Database! " + $e->getMessage(); 

        }
    }


    public function checkLogin($email, $password) {
        $this->makeConnection();

        $query = $this->database->prepare ("SELECT * FROM `auth` where `email`=:email and `password`=:password");
        
        // Md5 is weak, maar omdat het gebruikt werd in de database zal ik me hieraan houden! beter DEFAULT_PASSWORD van password_hash voor bcrypt
        $password = md5($password);
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);

        $result = $query->execute();
        $count = $query->rowCount();
        $row = $query->fetch();

        if($count == 1 && !empty($row)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            
            header("Location: /dashboard");
            
        } else {  
            return "Credentials kloppen niet!";
    }
}


    public function insertPatient($naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering){
        $this->makeConnection();
        if($naam !='')
        {
            $query = $this->database->prepare (
                "INSERT INTO `patienten` (`id`, `naam`, `adres`, `woonplaats`, `zknummer`, `geboortedatum`, `soortverzekering`) 
                VALUES (NULL, :naam, :adres, :woonplaats, :zknummer, :geboortedatum, :soortverzekering)");
            $query->bindParam(":naam", $naam);
            $query->bindParam(":adres", $adres);
            $query->bindParam(":woonplaats",$woonplaats);
            $query->bindParam(":zknummer", $zknummer);
            $query->bindParam(":geboortedatum", $geboortedatum);
            $query->bindParam(":soortverzekering",$soortverzekering);
            $result = $query->execute();
            return $result;
        }
        return -1;
        // id hoeft niet te worden toegevoegd omdat de id in de databse op autoincrement staat.


    }
    public function updatePatient($id,$naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering){
        $this->makeConnection();

        // id moet worden toegevoegd omdat de id in de databse wordt gezocht
        $query = $this->database->prepare (
            "UPDATE `patienten` SET `naam` = :naam, `adres`=:adres, `woonplaats` = :woonplaats,
            `zknummer`=:zknummer, `geboortedatum`=:geboortedatum, `soortverzekering`=:soortverzekering 
            WHERE `patienten`.`id` = :id ");
        $query->bindParam(":id", $id);
        $query->bindParam(":naam", $naam);
        $query->bindParam(":adres", $adres);
        $query->bindParam(":woonplaats",$woonplaats);
        $query->bindParam(":zknummer", $zknummer);
        $query->bindParam(":geboortedatum", $geboortedatum);
        $query->bindParam(":soortverzekering",$soortverzekering);
        $result = $query->execute();
        return $result;
    }

    public function getPatienten(){

        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM `patienten`');
        if($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,\model\Patient::class);
            return $result;
        }
        return null;
    }
    public function selectPatient($id){

        $this->makeConnection();
        $selection = $this->database->prepare(
            'SELECT * FROM `patienten` 
            WHERE `patienten`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        if($result){
            $selection->setFetchMode(\PDO::FETCH_CLASS, \model\Patient::class);
            $patient = $selection->fetch();
            return $patient;
        }
        return null;
    }
    public function deletePatient($id){
        $this->makeConnection();
        $selection = $this->database->prepare(
            'DELETE FROM `patienten` 
            WHERE `patienten`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        return $result;
    }

}