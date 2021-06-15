<?php
    /* config file for mysql */

    $servername = "localhost";
    $username = "root";
    $password = "Dylan@5188";
    // $password = "";
    $database = "dylanfeng";

    // Create connection
    $link = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
