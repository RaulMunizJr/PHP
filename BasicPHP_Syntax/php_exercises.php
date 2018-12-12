<html>

<head>
<title>PHP Basics</title>
</head>

<body>

<h1>PHP Exercises</h1>

<p>Edit this file and upload to the repo here:</p>

<pre>https://classroom.github.com/a/C30qbA_J</pre>

<h3>Question 1</h3>
<?php date_default_timezone_set("America/Matamoros"); ?>
<p>Put the current date and time right here: <?php echo date("D, M d, Y, h:ia") ?> </p>

<h3>Question 2</h3>

<p>Print the IP address of the client browser right here: <?php echo $_SERVER['REMOTE_ADDR'] ?></p>

<h4>Question 3</h4>

<p>Create an associative array of your favorite things and print them out like so:</p>



<?php
$randomStuff = array( 
    array( 
    	"title" => "Pug",
        "trait" => "Stubborn lovable creatures", 
        "list" => "They destroy everything",
        "list1" => "Always around you",
        "list2" => "A friend in need" 
    ), 
    array(
    	"title" => "Taco",
        "trait" => "Spicy and can't get enough", 
        "list" => "End up in the toilet",
        "list1" => "Delicioso",
        "list2" => "Don't forget the salsa!" 
    ) 
); 

$keys = array_keys($randomStuff); 

foreach( $randomStuff as $key => $val)
{

?>
<div style="border:1px solid black; padding: 5px; width: 50%; margin: 5px">
	<p><strong><?php echo $val["title"] ?></strong></p>
	<p><em><?php echo $val["trait"] ?></em></p>
	<p>Because...</p>
	<ol>
		<li><?php echo $val["list"] ?></li>
		<li><?php echo $val["list1"] ?></li>
		<li><?php echo $val["list2"] ?></li>
	</ol>
</div>
<?php } ?>


<div style="border:1px solid black; padding: 5px; width: 50%; margin: 5px">
	<p><strong>Bears</strong></p>
	<p><em>put up a fight with a might so fearlessly</em></p>
	<p>Because...</p>
	<ol>
		<li>They eat everything</li>
		<li>That cool roar they make</li>
		<li>Khalil Mack</li>
	</ol>
</div>

<div style="border:1px solid black; padding: 5px; width: 50%; margin: 5px">
	<h4>Seaweed</h4>
	<p><em>Versatile and delicious</em></p>
	<p>Because...</p>
	<ol>
		<li>Musubi!</li>
		<li>Makizushi</li>
		<li>Dashi</li>
	</ol>
</div>

<h3>Question 4</h3>

<p>The link below comes back to this same page, with a querystring added to the URL.</p>

<p>Finish the question (answer only appears when you click on the link):</p>

<p><a href="?n1=14&n2=16">14 + 16 = 

<?php

//$_GET['n1'] + $_GET['n2'];
if (isset($_GET['n1']))
{
echo htmlspecialchars($_GET["n1"]) + $_GET['n2'];
}

?>

</a></p>

<h3>Question 5</h3>

<p>The form below POSTs back to this page (empty action). When the POST comes
in, reverse whatever they typed in the box.</p>

<form action="" method="POST">

	<p>My nickname: <input type="textbox" name="nickname" value=
		<?php if(isset($_POST['nickname'])) 
		{
		echo strrev($_POST["nickname"]); 
		}
		?>></p>

	<button>Reverse it</button>




</form>

</body>
</html>