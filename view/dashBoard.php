<?php

$voornaam = $_SESSION['voornaam'];
$role = $_SESSION['role'];

$date = date('d-m-y');

echo <<<EOF

<link href="../css/dashBoardStyle.css" rel="stylesheet">


<body>
    <h2 id="dashboardHeading"> Welkom $role: <u> $voornaam! </u> </h2>
    <h5 id="date"> Het is vandaag: <i> $date </i> </h5>
    
    <div class="container">


    </div>

</body>
</html>
EOF;

?>