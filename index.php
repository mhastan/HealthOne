<?php

use controller\Controller;
include_once 'controller/Controller.php';
$controller = new Controller();

/* formulier met gegevens tonen om een rij bij te werken */

// $checkLoggedin = $controller->checkSession();




echo $controller->checkSession();

// if($controller->checkSession()) {
//     echo "Logged in!";
// } else {
//     echo "logged out!";
// }

if(isset($_POST['logout'])) {
    $controller->logoutUser();
}



if($controller->checkSession() === True) {
    echo "Je bent ingelogt!";
} else { 
    echo "Je bent niet ingelogt";
}



$controller->showLogin();   
if(isset($_POST['loginSubmit'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if($email != "" && $password != "") {
        $controller->checkLogin($email, $password);
    }
}        


// if(isset($_POST['showForm']))
//     {
//         $controller->showFormPatientAction( $_POST['showForm']);
//     }
// /* UPDATE: formulier afhandeling om een rij bij te werken */
// else if(isset($_POST['update']))
//     {
//         $controller->updatePatientAction();
//     }
// /* CREATE:  formulier afhandeling nieuwe rij */
// else if(isset($_POST['create']))
//     {
//         $controller->createPatientAction();
//     }
// /* DELETE:  verwijderen rijen */
// else if(isset($_POST['delete']))
//     {
//         $controller->deletePatientAction($_POST['delete']);
//     }
// /*READ:  overzicht alle patienten */
// else
//     {
//         // $controller->readPatientenAction();
//         $controller->showLogin();
//     }




