<?php

echo <<<EOF
      <table class="table table-dark">
  <thead>
    <tr style="background-color: black;">
      <th scope="col"> ID </th>
      <th scope="col">Naam </th>
      <th scope="col">Werking</th>
      <th scope="col">Bijwerking</th>
      <th scope="col">Verzekerd</th>
      <th scope="col"> <b> EDIT </b> </th>
      <th scope="col" style="background-color: red; color: black;"> <b> DELETE </b> </th>
    </tr>
  </thead>
  EOF;

$medicijnen = $this->model->getMedicijnen();

if($medicijnen !== null) {
        foreach ($medicijnen as $medicijn) {
          echo "<tbody>";
              echo "<tr>
                  <td>" . $medicijn->id . "</td>
                  <td>" . $medicijn->naam . "</td>
                  <td>" . $medicijn->werking . "</td>
                  <td>" . $medicijn->bijwerking . "</td>
                  <td>" . $medicijn->verzekerd . "</td>
            
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
    width: 50%;

}

</style>



EOF;