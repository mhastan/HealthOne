<?php
    
$url =  $_SERVER['REQUEST_URI'];
$urlTitle = substr($url, 1);
$urlTitle =  ucfirst($urlTitle);

echo <<<EOF

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/headerStyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="../css/headerStyle.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
        <title> HealthOne - $urlTitle </title>
    </head>
<header>
<nav class="navbar navbar-expand-lg navbar-dark black">
<div class="container">
    <a class="navbar-brand" href="dashboard ">
        <strong>
            <b><i>HealthOne</i></b>
        </strong> 
   </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right -->
        <ul class="nav navbar-nav  ml-auto"> 
        
            <li class="nav-item">
            <a class="nav-link" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item"> <!-- active -->
                <a class="nav-link" href="aanbod">Aanbod <span class="sr-only">(current)</span> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="medicijnen">Medicijnen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="patienten">Patiënten</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?logout" style="color: red;"><b>Logout</b></a>
        </li>
        </ul>
    </div>
    </div>
    </nav>
  </header>

EOF;

?>