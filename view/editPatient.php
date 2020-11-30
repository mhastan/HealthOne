<?php
$selectedPatient = $this->model->selectPatient($_GET['id']);
// print_r($selectedPatient);
// echo "Naam: " . $selectedPatient->naam . "<br>";
// echo "Adres " . $selectedPatient->adres . "<br>";
// echo "Woonplaats " . $selectedPatient->woonplaats . "<br>";
// echo "zkNummer" . $selectedPatient->zknummer . "<br>";
// echo "Geboortedatum " . $selectedPatient->geboortedatum . "<br>";
// echo "Soort verzekering ". $selectedPatient->soortverzekering . "<br>";
// echo @$id = $selectedPatient->id;
@$naam = $selectedPatient->naam;
@$adres = $selectedPatient->adres;
@$woonplaats = $selectedPatient->woonplaats;
@$zknummer =  $selectedPatient->zknummer;
@$geboortedatum = $selectedPatient->geboortedatum;
@$verzekering =  $selectedPatient->soortverzekering;

if($selectedPatient) {
  $msg = "Patient succesvol opgehaald!";
} else {
  $msg = "Kan geen patient vinden met dit id!!";
  header("Location: /patienten");
}



echo <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="" method="POST">
<div class="alert alert-secondary" role="alert">
  <b> $msg </b>
</div>
<div class="inputs">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputName">Naam:</label>
      <input type="text" class="form-control" id="inputName" placeholder="Naam:" value="$naam" name="newName">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address: </label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="$adres" name="newAddress">
  </div>
  <div class="form-group">
    <label for="inputWoonplaats">Woonplaats: </label>
    <input type="text" class="form-control" id="inputWoonplaats" placeholder="Voorbeeld: Den Haag" value="$woonplaats" name="newWoonplaats">
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputZK">Zknummer: </label>
      <input type="text" class="form-control" id="inputZK" placeholder="13373337" value="$zknummer" name="newZknummer">
    </div>
    <div class="form-group col-md-3">
      <label for="geboorteDatum">Geboortedatum: </label>
      <input type="datepicker
      " class="form-control" id="geboorteDatum" placeholder="27-11-2020" value="$geboortedatum" name="newDate">

    </div>
    <div class="form-group col-md-4">
      <label for="inputVerzekering">Soort verzekering</label>
      <input type="text" class="form-control" id="inputVerzekering" placeholder="Basis" value="$verzekering" name="newVerzekering">
    </div>
  </div>
  <div class="form-group">
  </div>
  <i> <p> Voer de velden in die je wilt wijzigen * </p> </i>

  <input type="submit" name="submit" value="submit  "> </button>
</form>
</div>
</div>


<style>

.inputs { 
    margin-top: 70px;
    margin-left: auto;
    margin-right: auto;
    width: 70%;
}

#headingText {

  margin-left: auto;
  margin-right: auto;
  width: 25%; 
  margin-top: 50px;
  background-color: black; 
  color: white;
  border-radius: 50px 50px 50px 50px; 
  text-align: center;
}


.alert {
  margin-top: 50px;
  width:40%;    
  margin-left: auto;
  margin-right: auto;
  
}

</style>

</body>
</html>
EOF;
