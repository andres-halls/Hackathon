<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kiwi Network</title>

    <!-- jQuery -->
    <script type="text/javascript" src="lib/jquery/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css"/>
    <script type="text/javascript" src="lib/bootstrap/bootstrap.min.js"></script>

    <!-- Bootstrap Material Design Theme -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/material/roboto.min.css"/>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/material/material.min.css"/>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/material/ripples.min.css"/>
    <script type="text/javascript" src="lib/bootstrap/material/material.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/material/ripples.min.js"></script>

    <!-- Knockout -->
    <script type="text/javascript" src="lib/knockout-3.3.0.js"></script>

    <!-- Sammy -->
    <script type="text/javascript" src="lib/sammy-0.7.6.min.js"></script>

    <!-- Socket.io -->
    <script type="text/javascript" src="lib/socket.io.js"></script>

    <script type="text/javascript" src="lib/signwise.js"></script>
    <script type="text/javascript" src="lib/signwiseMobileId.js"></script>

    <!-- Site JS & CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/profile.js"></script>
    <script type="text/javascript" src="js/chat.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
</head>
<body>
<div id="page_container">
    <?php

        require("components/home.php");
        require("components/profile.php");
        //require("components/chat.php");

    ?>
</div>
</body>
</html>