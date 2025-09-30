<?php
// =============================
// magic_methods.php
// =============================

// 1. __get
class DemoGet {
    private $data = ["name" => "Yomna", "age" => 22];

    public function __get($key) {
        return $this->data[$key] ?? "Not Found";
    }
}

$obj1 = new DemoGet();
echo "__get Example: " . $obj1->name . "<br>"; // Yomna
echo "__get Example: " . $obj1->city . "<br>"; // Not Found


// 2. __set
class DemoSet {
    private $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key] ?? null;
    }
}

$obj2 = new DemoSet();
$obj2->course = "PHP OOP";
echo "__set Example: " . $obj2->course . "<br>"; // PHP OOP


// 3. __call
class DemoCall {
    public function __call($name, $args) {
        return "Method ($name) not found. Args: " . implode(", ", $args);
    }
}

$obj3 = new DemoCall();
echo "__call Example: " . $obj3->sayHello("Yomna") . "<br>";


// 4. __callStatic
class DemoCallStatic {
    public static function __callStatic($name, $args) {
        return "Static method ($name) not found!";
    }
}

echo "__callStatic Example: " . DemoCallStatic::test() . "<br>";


// 5. __clone
class DemoClone {
    public $name;
    public function __clone() {
        $this->name = "Cloned " . $this->name;
    }
}

$obj4 = new DemoClone();
$obj4->name = "Original";

$obj5 = clone $obj4;
echo "__clone Example: " . $obj5->name . "<br>"; // Cloned Original


// 6. __toString
class DemoToString {
    public $lang = "PHP";
    public function __toString() {
        return "This object is about {$this->lang}";
    }
}

$obj6 = new DemoToString();
echo "__toString Example: $obj6 <br>";


// 7. __invoke
class DemoInvoke {
    public function __invoke($msg) {
        return "Invoked with message: $msg";
    }
}

$obj7 = new DemoInvoke();
echo "__invoke Example: " . $obj7("Hello OOP") . "<br>";

?>
