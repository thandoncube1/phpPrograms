<?php

    include_once("./database_connection.php");

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // show databases
    $sql = "CREATE TABLE IF NOT EXISTS Reservations (
        id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        phone CHAR(10) NOT NULL UNIQUE,
        email VARCHAR(60) NOT NULL,
        rsvp_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (mysqli_query($dbc, $sql)) {
        echo "<p>Table Reservations as been created Successfully.</p>";
        print "<h3>Click here <a href='./create_reservations.php'>Go to Reservation Form</a></h3>";
    } else {
        echo "Error creating table: " . mysqli_error($dbc);
    }

    mysqli_close($dbc);
 ?>