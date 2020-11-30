<?php


if(@$result == 1){
    echo "<h4>Actie geslaagd</h4>";
}
        $patienten = $this->model->getPatienten();
        // $this->controller->deletePatientAction(1337);
        // echo $this->controller->blabla();
        // var_dump($result);
        
        echo <<<EOF
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col"><b>Naam</b></th>
        <th scope="col"><b>Adres</b></th>
        <th scope="col"><b>Woonplaats</b></th>
        <th scope="col"><b>Zknummer</b></th>
        <th scope="col"><b>Geboortedatum</b></th>
        <th scope="col"><b>Soortverzekering</b> </th>
        <th scope="col"><b>EDIT</b> </th>
        <th scope="col" style="background-color: red; color: black;"><b>DELETE</b> </th>


      </tr>
    </thead>
    EOF;
        if($patienten !== null) { 
            foreach ($patienten as $patient) {
            echo "<tbody>";
            echo "<tr>
                <td>" . $patient->naam . "</td>
                <td>" . $patient->adres . "</td>
                <td>" . $patient->woonplaats . "</td>
                <td>" . $patient->zknummer . "</td>
                <td>" . $patient->geboortedatum . "</td>
                <td>" . $patient->soortverzekering . "</td>
                <td> <a href=\"editPatient?id="."$patient->id\" </a><i class=\"fas fa-user-edit\"> </i> </td>
                <td> <a href=\"patienten?del="."$patient->id\" </a> <i class=\"far fa-trash-alt\"></i> </td> 
                </form></td>
              </tr>"; 
        echo "</tbody>";

          }
        }

      else{
          echo "Geen patienten gevonden";
      }

      echo <<<EOF

<style>


.table { 
    margin-top: 70px;
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    text-align: center;

}

th {
  background-color: black;
  color: white;
}

fas fa-user-edit { 

  background-color: black;

}

</style>



EOF;

    
?>