<?php



        $uri = $_SERVER['REQUEST_URI'];

        
        $uri = trim($uri, "/");
        $uri = explode("/", $uri);

        $file = 'home';

        if(!empty($uri[0])) {
                $file = $uri[0];
        }

        require 'app/' . $file . '.php';

        
?>