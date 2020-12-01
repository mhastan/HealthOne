<?php
namespace controller;
include_once "view/View.php";
use view\View;
include_once "model/Patient.php";
use model\Model;

class Controller
{
    private $view;
    private $model;
    public function __construct(){
        $this->model = new Model();
        $this->view = new View($this->model);
    }

    public function getCurrentPage($page) {
        // We gebruiken een .htaccess file dat by default altijd index.php?p= pakt voor ons
        if(isset($_GET['p'])) {
            $parameter = $_GET['p'];
            // yes we think about security sir!
            $filtered = trim($parameter);
            $filtered = strip_tags($parameter);
            $filtered = htmlspecialchars($parameter);
            $filtered = htmlentities($parameter, ENT_QUOTES, "UTF-8");
            return $filtered;
        }
    }


function xss_clean($data){
    // Fix &entity\n;
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do
    {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    }
    while ($old_data !== $data);
// we are done...
return $data;
}


    public function showHeader(){
        $this->view->showHeader();
    }

    public function showDashBoard() {
        $this->view->showDashBoard();
    }

    public function showLogin() {
    $this->view->showLoginPage();
    }

    public function show404(){
        $this->view->show404();
    }

    public function showPatienten() { 
        $this->view->showPatienten();
    }

    public function getMedicijnen() {
        $this->view->getMedicijnen();
        $this->model->getMedicijnen();
    }

    public function checkLogin($email, $password) {
        echo "<script type='text/javascript'>

        let Div = document.getElementById('errorMsg').innerHTML = '<h3> Verkeerde details </h3>';


        </script>
 ";
                $this->model->checkLogin($email, $password);
    
    }

    public function checkSession() {
        @session_start();
        return isset($_SESSION['email']);   
    }

    public function logoutUser() {
        @session_start();
        unset($_SESSION['email']);
        unset($_SESSION['voornaam']);
        unset($_SESSION['role']);
        session_destroy();
        header("Location: index.php");
    }
    

    public function readPatientenAction(){
        $this->view->showPatienten();
    }

    public function editPatient() {
        $this->view->editPatient();
        if(isset($_POST['submit'])){
            $selectedId = $this->xss_clean($_GET['id']);
            $selectedPatient = $this->model->selectPatient($selectedId);
                $id = $this->xss_clean($selectedPatient->id);
                $naam = $this->xss_clean($_POST['newName']);
                $adres = $this->xss_clean($_POST['newAddress']);
                $woonplaats = $this->xss_clean($_POST['newWoonplaats']);
                $geboortedatum = $this->xss_clean($_POST['newDate']);
                $zkNummer = $this->xss_clean($_POST['newZknummer']);
                $verzekering = $this->xss_clean($_POST['newVerzekering']);
            $this->updatePatientAction($id, $naam, $adres, $woonplaats, $geboortedatum, $zkNummer, $verzekering);
        }

    }

    public function create(){
        $this->view->create();
        $this->createPatientAction();
 
        $submitted = @$_POST['submit'];
        
        if(@isset($submitted)) {       
            echo '
            <div class="alert alert-success" role="alert" style="
                margin: 0px auto 0px auto; width: 50%; margin-top: 50px; text-align: center;">
            <i> Patient is succesvol toegevoegd! </i>
            </div>
            <meta http-equiv = "refresh" content = "2; url = /patienten" />
            ';
        }

    }
    


    public function showFormPatientAction($id=null){
    //    $this->view->showFormPatienten($id);
    }
    public function createPatientAction(){
       
        // teachin those kids how 2 write insecure code?? :^((     
        // $naam = filter_input(INPUT_POST,'naam');
        // $adres = filter_input(INPUT_POST,'adres');
        // $woonplaats = filter_input(INPUT_POST,'woonplaats');
        // $geboortedatum = filter_input(INPUT_POST,'geboortedatum');
        // $soortverzekering = filter_input(INPUT_POST,'soortverzekering');
        // $zknummer = filter_input(INPUT_POST,'zknummer');
        // $result = $this->model->insertPatient($naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering);


        $naam = $this->xss_clean(@$_POST['naam']);
        $adres = $this->xss_clean(@$_POST['adres']);
        $woonplaats = $this->xss_clean(@$_POST['woonplaats']);
        $geboortedatum = $this->xss_clean(@$_POST['geboortedatum']);
        $soortverzekering = $this->xss_clean(@$_POST['soortverzekering']);
        $zknummer = $this->xss_clean(@$_POST['zknummer']);
        $result = $this->model->insertPatient($naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering);

    }
    public function updatePatientAction($id, $naam, $adres, $woonplaats, $geboortedatum, $zknummer, $verzekering){
                
        $result = $this->model->updatePatient($id, $naam,$adres,$woonplaats,$geboortedatum,$zknummer,$verzekering);

        if($result === TRUE) {
            // echo '<meta http-equiv = "refresh" content = "2; url = /patienten?id="' . $id;
            echo "<meta http-equiv='refresh' content='0'>";

        } else {
            echo "Er ging iets mis!";
        }


    }


    public function deletePatientAction($id){

        $result = $this->model->deletePatient($id);
        
        // header("Location: /patienten", true, 301);        
    }
}