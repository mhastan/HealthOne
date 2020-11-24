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

    public function checkLogin($email, $password) {
        echo "<p style='color: red; 
                font-weight: bold; 
                text-align: center; 
                font-size: 1.5vw'>" .  
                $this->model->checkLogin($email, $password);
    }

    public function checkSession() {
        @session_start();
        return isset($_SESSION['email']);   
    }

    public function logoutUser() {
        @session_start();
        unset($_SESSION['email']);
        session_destroy();
        header("Location: index.php");
    }
    

    public function readPatientenAction(){
        $this->view->showPatienten();
    }

    public function showFormPatientAction($id=null){
       $this->view->showFormPatienten($id);
    }
    public function createPatientAction(){
        $naam = filter_input(INPUT_POST,'naam');
        $adres = filter_input(INPUT_POST,'adres');
        $woonplaats = filter_input(INPUT_POST,'woonplaats');
        $geboortedatum = filter_input(INPUT_POST,'geboortedatum');
        $soortverzekering = filter_input(INPUT_POST,'soortverzekering');
        $zknummer = filter_input(INPUT_POST,'zknummer');
        $result = $this->model->insertPatient($naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering);
        $this->view->showPatienten($result);
    }
    public function updatePatientAction(){
        $id = filter_input(INPUT_POST,'id');
        $naam = filter_input(INPUT_POST,'naam');
        $adres = filter_input(INPUT_POST,'adres');
        $woonplaats = filter_input(INPUT_POST,'woonplaats');
        $geboortedatum = filter_input(INPUT_POST,'geboortedatum');
        $zknummer = filter_input(INPUT_POST,'zknummer');
        $soortverzekering = filter_input(INPUT_POST,'soortverzekering');
        $result=$this->model->updatePatient($id,$naam,$adres,$woonplaats,$geboortedatum,$zknummer,$soortverzekering);
        $this->view->showPatienten($result);
    }
    public function deletePatientAction($id){
        $result = $this->model->deletePatient($id);
        $this->view->showPatienten($result);
    }
}