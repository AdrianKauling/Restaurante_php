<?php
    $servername = 'mysql:host=localhost;dbname=restaurante_bd';
    $user = 'root';
    $pass = 'Adrzinho@13';

    $conn = new PDO($servername, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
