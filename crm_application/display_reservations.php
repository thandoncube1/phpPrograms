<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ontario Juijitsu Association | Participants</title>
    <style>
        body { text-align: center; }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 800px;
            margin: 0 auto;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color:rgb(7, 5, 103);
            color: white;
        }
        .create {
            margin-top: 20px;
        }
    </style>
    <script type="text/javascript" async>
        function confirmDelete(userId) {
            const userConfirmed = confirm("Are you sure you want to delete?");

            fetch('display_reservations.php', {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'confirmed=' + userConfirmed + '&userId=' + userId
            })
            .then(response => response.text())
            .then(data => {
                console.log('Response from PHP: ', data);
                window.location.reload();
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        }
    </script>
</head>
<body>
    <h1>OJA Seminar | Participant list</h1>
    <p>Attendees will be emailed close to the date.</p>
    <?php
        require_once("./database_connection.php");

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Select all columns
        $query = "SELECT id, firstname, lastname, phone, email FROM Reservations";

        $result = mysqli_query($dbc, $query);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
            echo "in the Request method.";
            if (isset($_POST['confirmed']) && $_POST['confirmed'] === 'true') {
                mysqli_query($dbc, "DELETE FROM Reservations WHERE id = {$userId}");
                header("Refresh: 0");
            } else {
                echo "Failed to delete record.";
            }
        }

        echo "<table id=reservations>";
        echo "<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        ";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>$row[firstname]</td>
                        <td>$row[lastname]</td>
                        <td>$row[phone]</td>
                        <td>$row[email]</td>
                        <td><a href=update_page.php?id=$row[id]>Update</a></td>
                        <td><a href=# onclick=confirmDelete($row[id])>Delete</a></td>
                    </tr>
                ";
            }
        }
        echo "</table>";
        echo "<div class=create><a href=create_reservations.php>Create a new reservation</a></div>";

        mysqli_close($dbc);
    ?>
</body>
</html>