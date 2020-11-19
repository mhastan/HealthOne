<?php

echo <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Health One Login Page </title>
<link href="../css/loginStyle.css" rel="stylesheet">
</head>
<body>
    <div class="login-page">
    <div class="form">
    <h3> Health One portaal </h3>
    <hr>
    <form class="login-form" method="POST">
        <input type="text" placeholder="Email" name="email"/>
        <input type="password" placeholder="Password" name="password"/>
        <input type="submit" value="Login" name="loginSubmit">
        <input type="submit" value="LOGOUT" name="logout">

    </form>
    </div>
</div>
</body>
</html>
EOF;

?>