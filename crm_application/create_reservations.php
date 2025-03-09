<?php

    include_once("./database_connection.php");

    $form_submitted = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $form_submitted = true;

        $firstname =  $_POST['firstname'] ?? null;
        $lastname = $_POST['lastname'] ?? null;
        $phone =  $_POST['phone'] ?? null;
        $email =  $_POST['email'] ?? null;

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['email'])) {

            $query = "INSERT INTO Reservations (firstname, lastname, phone, email) VALUES ('$firstname', '$lastname', '$phone', '$email')";

            try {

                $result = mysqli_query($dbc, $query);
                echo "<p>New Reservation completed for $firstname $lastname.</p>";
                print "<p>Navigate to view other participants. <a href=display_reservations.php>View Participants</a></p>";
            } catch (mysqli_sql_exception $ex) {
                $error_code = $ex->getCode();

                if ($error_code == 1062) {
                    echo "<p>Error: " . $ex->getMessage() . "</p>";
                } else {
                    echo "MySQL Error: " . $ex->getMessage();
                }
            } finally {
                if (isset($dbc)) {
                    mysqli_close($dbc);
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ontario Juijitsu Association | Reservation</title>
    <style>
        body { display: flex; flex-direction: column; align-items: center; }
        form { background-color:rgb(1, 189, 241); padding: 20px; & button { padding: 5px 10px; }}
        fieldset { width: 500px; margin-bottom: 10px; }
        div {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h2>Reservation list of the IBJJF Masters Seminar</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <?php include_once("./_form.php"); ?>
            <div><label for="phone">Phone Number (Required)</label>
            <input type="tel" id="phone" name="phone"></div>
        </fieldset>
        <input type="submit" value="Submit">
    </form>
    <?php echo "<div class=create><a href=display_reservations.php>Go to display reservation</a></div>"; ?>
</body>
</html>