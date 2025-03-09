<?php

    $firstname = $row['firstname'] ?? ""; // If the row is available we pass the data
    $lastname = $row['lastname'] ?? ""; // else the value is empty
    $email = $row['email'] ?? "";

    echo "
        <legend>User Information</legend>
        <div><label for=firstname>First Name (Required)</label>
        <input type=text id=firstname name=firstname value=$firstname></div>
        <div><label for=lastname>Last Name (Required)</label>
        <input type=text id=lastname name=lastname value=$lastname></div>
        <div><label for=email>Email Address (Required)</label>
        <input type=email id=email name=email value=$email></div>
    ";

?>