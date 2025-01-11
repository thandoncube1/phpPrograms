<?php
    $giftbox;

    $giftbox = "<h1>Welcome to the Christmas you love!</h1>";
    echo $giftbox;

    if (!defined('CONST_PI')) {
        define('CONST_PI', 3.141593);
    }

    // PI * r * r
    $area_of_circle = CONST_PI * 12 * 12;
    echo "<p><b> Area of a circle:</b> $area_of_circle</p>";

    $red = '#ff0000';

    $color = 'red';

    echo "<p><strong>Value (Color):</strong><span style=\"color: $red; margin-left: 10px;\">RED</span> </p>";

    class Car {
        private string $make;
        private string $model;
        private int $year;
        private string $color;
        private int $maxSpeed;
        private int $gear;
        private int $maxGears;
        private int $speed;

        public function __construct(string $make, string $model, int $year, string $color) {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
            $this->color = $color;
        }

        public function getMake(): string {
            return $this->make;
        }

        public function setMake(string $make): void {
            $this->make = $make;
        }

        public function __toString() {
            return " {" . $this->make . ", " . $this->model . ", " . $this->year . ", " . $this->color . "}";
        }

    }

    $lambo = new Car("Lamborghini", "Aventador", 2024, "Yellow");
    if ($lambo instanceof Car) {
        echo "The object is an instance of Car";
    }

    echo $lambo;
    echo "<p><b>This is a Class Object: </b></p>", var_dump($lambo);

    echo "<br>*******************************************<br>";
    echo "<h3>Pattern (8 Columns and rows)</h3>";
    echo "<br>*******************************************<br>";

    $row = "";
    $rowNum = 8;

    for ($i = $rowNum; $i > 0; $i--) {
        if ($i < $rowNum) {
            $row = $row . " #";
        }
    }

    for ($i = 0; $i < $rowNum; $i++) {
        if ($i % 2 == 0) {
            echo "<p>&nbsp;$row</p>";
        } else {
            echo "<p>$row</p>";
        }
    }

?>
