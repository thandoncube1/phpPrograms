<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
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
    <?php

        require_once("./database_connection.php");

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

        // Grab the ID from the Url
        $userId = $_GET['id'] ?? null;

        // Get the User Information after Update and push to the database
        // On Success Redirect User to the View Page
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            // User Id from the URL
            $uid = $_POST['id'];
            // Get the post variables
            $firstname = $_POST['firstname'] ?? null;
            $lastname = $_POST['lastname'] ?? null;
            $email = $_POST['email'] ?? null;

            if (isset($firstname) && isset($lastname) && isset($email)) {
                $update = "UPDATE Reservations SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id = $uid";

                $result_update = mysqli_query($dbc, $update);

                if ($result_update) {
                    echo "Successfully updated!";
                    header("location: display_reservations.php");
                } else {
                    echo "Failed to update reservation.";
                }
            }
        }



        // Query to update the User
        $query = "SELECT * FROM Reservations WHERE id = $userId";

        $result = mysqli_query($dbc, $query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<form action=$_SERVER[PHP_SELF] method=POST>
                    <fieldset>
                    <div><label for=id >User Id</label>
                    <input type=number id=id name=id value=$row[id] readonly></div>
            ";
            echo include_once("./_form.php");
            echo "
                    </fieldset>
                    <input type=submit value=Update>
                </form>
            ";
        }

        mysqli_close($dbc);
    ?>
</body>
</html>