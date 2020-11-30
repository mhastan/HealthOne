<?php

use controller\Controller;
include_once 'controller/Controller.php';
$controller = new Controller();


if(isset($_GET['logout'])) {
    $controller->logoutUser();
}

if(isset($_GET['del'])) {
     header("Location: /patienten", true, 301);
}



// if($controller->checkSession() === True) {
    
//     // $controller->showHeader();
//     // echo var_dump($_POST);
//     if(isset($_POST['showForm']))
//      {
//          $controller->showFormPatientAction( $_POST['showForm']);
//      }
//      else if(isset($_POST['update']))
//     {
//         $controller->updatePatientAction();
//     }
// /* CREATE:  formulier afhandeling nieuwe rij */
//     else if(isset($_POST['create']))
//         {
//             $controller->createPatientAction();
//         }

//     else if(isset($_POST['delete']))
//     {
//         $controller->deletePatientAction($_POST['delete']);
//     } 
// } else {  
//         $controller->showLogin();
//     }

if($controller->checkSession() === True) {
    
$param = $controller->getCurrentPage($_GET['p']);

switch ($param) {
    case 'dashboard':
        $controller->showHeader();
        $controller->showDashBoard();
        break;
    case 'aanbod':
        $controller->showHeader();
            echo "aanbod";
        break;
        case 'create':
        $controller->showHeader();
        $controller->create();
        break;
        case 'medicijnen':
            $controller->showHeader();
            $controller->getMedicijnen();
        break;
        case 'patienten':
            $controller->showHeader();
            $controller->showPatienten();
            $id =  @$_GET['del'];
            if(isset($id)) {
                $controller->deletePatientAction($id);
            }
        break;
        case 'editPatient':
            $controller->showHeader();
            $controller->editPatient();    
        break;  
    default:
        $controller->show404();
    break;
    }
} else { 
    $controller->showLogin();
}


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




