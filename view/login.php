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
<div id="particle"></div>
    <div class="login-page">
    <div class="form">
    <h3> Health One portaal </h3>
    <hr>
    <form class="login-form" method="POST">
        <input type="text" placeholder="Email" name="email"/>
        <input type="password" placeholder="Password" name="password"/>
        <input type="submit" value="Login" name="loginSubmit">
        
    </form>
    </div>
</div>

</body>
</html>
<style>

#particle {
    background-color: black;
    position:fixed;
    top:0;
    right:0;
    bottom:0;
    left:0;
    z-index:0; 
  }
  #overlay {
    position: relative;
  }

</style>



<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<script>

var options = {"particles":{"number":{"value":99,"density":{"enable":true,"value_area":552.4033491425909}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":3},"image":{"src":"img/github.svg","width":70,"height":100}},"opacity":{"value":1,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":2,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":1.5782952832645452,"direction":"none","random":true,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"repulse"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":false};
particlesJS("particle", options);


</script>

EOF;

?>