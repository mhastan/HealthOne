<?php



echo <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>


<form action="create" method="POST">


<div class="inputs">

  <div class="form-row">
  
    <div class="form-group col-md-2">
    
      <label for="inputID">Id: </label>
      <input type="text" name="id" class="form-control" id="inputID" placeholder="ID">
    </div>
    <div class="form-group col-md-10">
      <label for="inputName">Naam:</label>
      <input type="text" name="naam" class="form-control" id="inputName" placeholder="Naam:">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address: </label>
    <input type="text" name="adres" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputWoonplaats">Woonplaats: </label>
    <input type="text" name="woonplaats" class="form-control" id="inputWoonplaats" placeholder="Voorbeeld: Den Haag">
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputZK">Zknummer: </label>
      <input type="text" name="zknummer" class="form-control" id="inputZK" placeholder="13373337">
    </div>
    <div class="form-group col-md-3">
      <label for="geboorteDatum">Geboortedatum: </label>
      <input type="datepicker
      " name="geboortedatum" class="form-control" id="geboorteDatum" placeholder="27-11-2020">

    </div>
    <div class="form-group col-md-4">
      <label for="inputVerzekering">Soort verzekering</label>
      <input type="text" name="soortverzekering" class="form-control" id="inputVerzekering" placeholder="Basis">
    </div>
  </div>
  <div class="form-group">
  </div>
  <i> <p> Voer alle invoervelden in om een patient toe te voegen. * </p> </i>

  <button type="submit" class="btn btn-dark" name="submit"> Opslaan </button>
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
</style>

</body>
</html>
EOF;
?>