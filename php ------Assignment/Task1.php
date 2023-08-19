<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP Assignment</title>
</head>

<body>
    <h1>This is PHP Assignment </h1>

    <?php

    class Shape
    {
    }

    class Circle extends Shape
    {
        private $radius;
        function __construct($radius)
        {
            $this->radius = $radius;
        }
        function calculateArea()
        {
            $area = pi() * ($this->radius * $this->radius);
            return $area;
        }
    }

    class Rectangle extends Shape
    {
        private $width, $height;
        function __construct($width, $height)
        {
            $this->width = $width;
            $this->height =  $height;
        }
        function  calculateArea()
        {
            return $this->width * $this->height;
        }
    }



    $circle = new Circle(5);
    echo "Circle Area: " . $circle->calculateArea() . "<br>";

    $rectangle = new Rectangle(10, 5);
    echo "Area of  rectangle is: " . $rectangle->calculateArea() . "<br>"

    ?>
</body>

</html>