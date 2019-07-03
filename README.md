# PHP
- Generating dynamic page content
- Creating, opening, reading, writing, deleting, and closing files on the server
- Collecting form data
- Adding, deleting, and modifying information stored in your database
- controlling user-access
- encrypting data
- and much more!

## Basic Syntax
```
<?php
  // PHP code goes here
?>

//multiple statements
<?php
  echo "A";
  echo "B";
  echo "C";
?>

//embedded html
<?php
   echo "<strong>This is a bold text.</strong>";
?>
```
## Variables
```
<?php
   $name = 'John';
   $age = 25;
   echo $name;

  // Outputs 'John'
?>

//Constants
define(name, value, case-insensitive)
name: Specifies the name of the constant;
value: Specifies the value of the constant;
case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false;

<?php
  define("MSG", "Hi SoloLearners!");
  echo MSG;

   // Outputs "Hi SoloLearners!"
?> 
```
You can join two strings together using the dot ( .) concatenation operator.
For example: echo $s1 . $s2

- Adding Variables
```
<?php
  $str = "10";
  $int = 20;
  $sum = $str + $int;
  echo ($sum);

  // Outputs 30
?>
```
- Variables Scope
```
<?php
  $name = 'David';
  function getName() {
    echo $name;
  }
  getName();

  // Error: Undefined variable: name
?>
/**************************************/
<?php
  $name = 'David';
  function getName() {
    global $name;
    echo $name;
  }
  getName();

  //Outputs 'David'
?>

<?php
  $a = 'hello';
  $hello = "Hi!";
  echo $$a;

  // Outputs 'Hi!'
?>
```
- Arithmetic
```
<?php
  $num1 = 8;
  $num2 = 6;

  //Addition
  echo $num1 + $num2; //14

  //Subtraction
  echo $num1 - $num2; //2

  //Multiplication
  echo $num1 * $num2; //48

  //Division
   echo $num1 / $num2; //1.33333333333
   
   //modulus
   $x = 14;
   $y = 3;
   echo $x % $y; // 2
?>
```
== : equal (doesn't check data type

=== : Identical ; !== : Not Identical

and    or   xor   &&    ||   !

- Arrays
```
$names = array("David", "Amy", "John");

$names[0] = "David";
$names[1] = "Amy";
$names[2] = "John";

echo $names[1]; // Outputs "Amy"

//You can have integers, strings, and other data types together in one array.
<?php
$myArray[0] = "John";
$myArray[1] = "<strong>PHP</strong>";
$myArray[2] = 21;

echo "$myArray[0] is $myArray[2] and knows $myArray[1]";

// Outputs "John is 21 and knows PHP"
?>
```
- Associative Arrays
```
$people = array("David"=>"27", "Amy"=>"21", "John"=>"42");
// or
$people['David'] = "27";
$people['Amy'] = "21";
$people['John'] = "42";

echo $people['Amy']; // Outputs 21"
```
- Multi-Dimensional Arrays
```
$people = array(
   'online'=>array('David', 'Amy'),
   'offline'=>array('John', 'Rob', 'Jack'),
   'away'=>array('Arthur', 'Daniel')
);

echo $people['online'][0]; //Outputs "David"
echo $people['away'][1]; //Outputs "Daniel"
```
- Elseif Statement
```
<?php
$age = 21;

if ($age<=13) {
   echo "Child.";
} elseif ($age>13 && $age<19) {
   echo "Teenager";
} else {
   echo "Adult";
}

//Outputs "Adult"
?>
```
- foreach loop
```
foreach (array as $value) {
  code to be executed;
}
//or
foreach (array as $key => $value) {
   code to be executed;
}

/***************************************/

$names = array("John", "David", "Amy");
foreach ($names as $name) {
   echo $name.'<br />';
}

// John
// David
// Amy
```
- Include & Require
```
// header.php
<?php
  echo '<h1>Welcome</h1>';
?>

//other page
<html>
  <body>

  <?php include 'header.php'; ?>

  <p>Some text.</p>
  <p>Some text.</p>
  </body>
</html>

//The require statement is identical to include, the exception being that, upon failure, it produces a fatal error. 
//When a file is included using the include statement, but PHP is unable to find it, the script continues to execute.
```
- functions
```
function sayHello() {
  echo "Hello!";
}

sayHello(); //call the function

//Outputs "Hello!"

/*********************************/

function multiplyByTwo($number) {
  $answer = $number * 2;
  echo $answer;
}
multiplyByTwo(3);
//Outputs 6

function multiply($num1, $num2) {
  echo $num1 * $num2;
}
multiply(3, 6);
//Outputs 18

/**********************************/

function setCounter($num=10) {
   echo "Counter is ".$num;
}
setCounter(42);  //Counter is 42
setCounter();  //Counter is 10
```
- Predefined Variables

A superglobal is a predefined variable that is always accessible, regardless of scope. You can access the PHP superglobals through any function, class, or file.

PHP's superglobal variables are $_SERVER, $GLOBALS, $_REQUEST, $_POST, $_GET, $_FILES, $_ENV, $_COOKIE, $_SESSION.
```
//$_SERVER is an array that includes information such as headers, paths, and script locations. The entries in this array are //created by the web server.
//$_SERVER['SCRIPT_NAME'] returns the path of the current script:

<?php
echo $_SERVER['SCRIPT_NAME'];
//Outputs "/somefile.php"
?>
/****************************/
<?php
echo $_SERVER['HTTP_HOST'];
//Outputs "localhost"
?>
/****************************/
//Create a config.php file, that holds the path to your images:
<?php
$host = $_SERVER['HTTP_HOST'];
$image_path = $host.'/images/';
?>

<?php
require 'config.php';
echo '<img src="'.$image_path.'header.png" />';
?>
```
- Forms

The purpose of the PHP superglobals $_GET and $_POST is to collect data that has been entered into a form.
```
<form action="first.php" method="post">
  <p>Name: <input type="text" name="name" /></p>
  <p>Age: <input type="text" name="age" /></p>
  <p><input type="submit" name="submit" value="Submit" /></p>
</form>
/**************************************************************/
<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br />
Your age: <?php echo $_POST["age"]; ?>

</body>
</html>
```
- Get & Post

POST is the preferred method for sending form data.

Information sent via a form using the GET method is visible to everyone (all variable names and values are displayed in the URL)
```
<form action="actionGet.php" method="get">
  Name: <input type="text" name="name" /><br /><br />
  Age: <input type="text" name="age" /><br /><br />
  <input type="submit" name="submit" value="Submit" />
</form>

//actionGet.php
<?php
echo "Hi ".$_GET['name'].". ";
echo "You are ".$_GET['age']." years old.";
?>
```
GET should NEVER be used for sending passwords or other sensitive information!
When using POST or GET, proper validation of form data through filtering and processing is vitally important to protect your form from hackers and exploits!

- Session

Using a session, you can store information in variables, to be used across multiple pages.
Information is not stored on the user's computer, as it is with cookies.
By default, session variables last until the user closes the browser.
```
//A session is started using the session_start() function.
//Use the PHP global $_SESSION to set session variables.
<?php
// Start the session
session_start();

$_SESSION['color'] = "red";
$_SESSION['name'] = "John";
?>

//Another page can be created that can access the session variables we set in the previous page:
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
echo "Your name is " . $_SESSION['name'];
// Outputs "Your name is John"
?>
</body>
</html>

//All global session variables can be removed manually by using session_unset(). 
//You can also destroy the session with session_destroy().
```

- Cookies

Cookies are often used to identify the user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page through a browser, it will send the cookie, too. With PHP, you can both create and retrieve cookie values.
```
setcookie(name, value, expire, path, domain, secure, httponly);
```
1. name: Specifies the cookie's name
2. value: Specifies the cookie's value
3. expire: Specifies (in seconds) when the cookie is to expire. The value: time()+86400*30, will set the cookie to expire in 30 days. If this parameter is omitted or set to 0, the cookie will expire at the end of the session (when the browser closes). Default is 0.
4. path: Specifies the server path of the cookie. If set to "/", the cookie will be available within the entire domain. If set to "/php/", the cookie will only be available within the php directory and all sub-directories of php. The default value is the current directory in which the cookie is being set.
5. domain: Specifies the cookie's domain name. To make the cookie available on all subdomains of example.com, set the domain to "example.com".
6. secure: Specifies whether or not the cookie should only be transmitted over a secure, HTTPS connection. TRUE indicates that the cookie will only be set if a secure connection exists. Default is FALSE.
7. httponly: If set to TRUE, the cookie will be accessible only through the HTTP protocol (the cookie will not be accessible to scripting languages). Using httponly helps reduce identity theft using XSS attacks. Default is FALSE.
```
//The name parameter is the only one that's required. All of the other parameters are optional.

//The following example creates a cookie named "user" with the value "John". The cookie will expire after 30 days, which is //written as 86,400 * 30, in which 86,400 seconds = one day. The '/' means that the cookie is available throughout the entire //website.

//We then retrieve the value of the cookie "user" (using the global variable $_COOKIE). We also use the isset() function to //find out if the cookie is set:

<?php
$value = "John";
setcookie("user", $value, time() + (86400 * 30), '/'); 

if(isset($_COOKIE['user'])) {
  echo "Value is: ". $_COOKIE['user'];
}
//Outputs "Value is: John"
?>

//The setcookie() function must appear BEFORE the <html> tag.
//The value of the cookie is automatically encoded when the cookie is sent, and is automatically decoded when it's received. //Nevertheless, NEVER store sensitive information in cookies.
```

### OOP
```
class Person {
  public $age; //property
  public function speak() { //method
    echo "Hi!"
  }
}
$p1 = new Person(); //instantiate an object
$p1->age = 23; // assignment 
echo $p1->age; // 23
$p1->speak(); // Hi!

/*******************************************/

class Dog {
  public $legs=4;
  public function display() {
    echo $this->legs;
  }
}
$d1 = new Dog();
$d1->display(); //4

$d2 = new Dog();
$d2->legs = 2;
$d2->display(); //2
```
- Constructor & Destructor

PHP provides the constructor magic method __construct(), which is called automatically whenever a new object is instantiated. 
```
class Person {
  public function __construct() {
    echo "Object created";
  }
}
$p = new Person();
/**********************************/
class Person {
  public $name;
  public $age;
  public function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }
}
$p = new Person("David", 42);

/*************************************/

class Person {
  public function __destruct() {
    echo "Object destroyed";
  }
}
$p = new Person();
```

- Inheritance
```
class Animal {
  public $name;
  public function hi() {
    echo "Hi from Animal";
  }
}
class Dog extends Animal {
}

$d = new Dog();
$d->hi();
```

- Interfaces

An interface specifies a list of methods that a class must implement. However, the interface itself does not contain any method implementations. This is an important aspect of interfaces because it allows a method to be handled differently in each class that uses the interface.
```
//The interface keyword defines an interface.
//The implements keyword is used in a class to implement an interface.

<?php
interface AnimalInterface {
  public function makeSound();
}

class Dog implements AnimalInterface {
  public function makeSound() {
    echo "Woof! <br />";
  }
}
class Cat implements AnimalInterface {
  public function makeSound() {
    echo "Meow! <br />";
  }
}

$myObj1 = new Dog();
$myObj1->makeSound();

$myObj2 = new Cat();
$myObj2->makeSound();
?>

//A class can implement multiple interfaces. More than one interfaces can be specified by separating them with commas. For //example:
class Demo implements AInterface, BInterface, CInterface {
  // Functions declared in interfaces must be defined here
}
```
- Abstract Classes

Abstract classes can be inherited but they cannot be instantiated. 
They offer the advantage of being able to contain both methods with definitions and abstract methods that aren't defined until they are inherited
```
<?php
abstract class Fruit { 
  private $color; 
    
  abstract public function eat(); 
    
  public function setColor($c) { 
    $this->color = $c; 
  } 
} 

class Apple extends Fruit {
  public function eat() {
    echo "Omnomnom";
  }
}

$obj = new Apple();
$obj->eat();
?>
```
