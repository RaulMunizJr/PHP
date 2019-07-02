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
