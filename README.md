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
