<?php
class Animal {
    public function makeSound() {
        return "Some animal sound.";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof!";
    }
}

class Cow extends Animal {
    public function makeSound() {
        return "Moo!";
    }
}

// Usage
$animals = array(
    new Cat(),
    new Dog(),
    new Cow()
);

foreach ($animals as $animal) {
    echo get_class($animal) . " says: " . $animal->makeSound() . "<br><br>";
}
