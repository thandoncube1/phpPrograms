<?php

    $quotes = array();
    // Add the following items in array
    array_push($quotes, "It is better to be feared than loved, if you cannot be both", "One who deceives will always find those who allow themselves to be deceived", "There is no avoiding war; it can only be postponed to the advantage of others", "Men judge generally more by the eye than by the hand, for everyone can see and few can feel", "It is not titles that honor men, but men that honor titles", "Politics have no relation to morals","Where the willingness is great, the difficulties cannot be great", "There is no other way to guard yourself against flattery than by making men understand that telling you the truth will not offend you");

    function getQuote($r_num, $arrayList) {
        return $arrayList[$r_num];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote</title>
    <style>
        div {
            width: 560px;
            padding: 0 10px;
        }
        span {
            vertical-align: -.6em;
            position: relative;
            display: inline-block;
            left: 1em;
            font-size: 0.8em;
            color: #f03;
        }
    </style>
</head>
<body>
    <h1>Niccolo Machiavelli Quote Page</h1>
    <div>
    <?php
        echo "Quote of the day!<br><br>";
        $length_quotes = count($quotes);
        $randomNumber = rand(0, $length_quotes - 1);

        $randomQuote = getQuote($randomNumber, $quotes);

        echo "<h2>$randomQuote <span>~ Niccolo Machiavelli</span></h2>";
    ?>
    </div>
    <hr>
    <?php echo "The current date is " . date("l M d, Y") ?>
</body>
</html>