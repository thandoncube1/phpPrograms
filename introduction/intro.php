<?php
  print("<h1>Hello world!</h1>");

  $fruits = ["Banana", "Apples", "Oranges", "Grapes"];

  // Loop through the array
  echo "<ul>";
  foreach($fruits as $fruit) {
    echo "<li>$fruit</li>";
  }
  echo "</ul>";

  // Display the current date
  print "Today is ".date('Y-m-d');

?>
