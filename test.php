<!DOCTYPE html>
<html>
<body>

<h1>Calculator</h1>

<form method="get" action= "<?php echo $_SERVER["PHP_SELF"]?>">
	Enter the expression <input type = "text" name = "fname">
	<input type = "submit">
</form>

<?php

	if ($_SERVER["REQUEST_METHOD"] == "GET"){
		$name = $_GET["fname"];
		echo "<br>$name"." = ";
		$p = eval('return '.$name.';');
		print $p;
	}

?>

</body>
</html>
