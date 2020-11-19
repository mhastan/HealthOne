<?php

use controller\Controller;
include_once 'controller/Controller.php';
$controller = new Controller();

/* formulier met gegevens tonen om een rij bij te werken */
if(isset($_POST['showForm']))
    {
        $controller->showFormPatientAction( $_POST['showForm']);
    }
/* UPDATE: formulier afhandeling om een rij bij te werken */
else if(isset($_POST['update']))
    {
        $controller->updatePatientAction();
    }
/* CREATE:  formulier afhandeling nieuwe rij */
else if(isset($_POST['create']))
    {
        $controller->createPatientAction();
    }
/* DELETE:  verwijderen rijen */
else if(isset($_POST['delete']))
    {
        $controller->deletePatientAction($_POST['delete']);
    }
/*READ:  overzicht alle patienten */
else
    {
        $controller->readPatientenAction();
    }




