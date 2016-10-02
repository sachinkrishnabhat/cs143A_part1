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
		$p="";
		
		// this function checks if the expression of type 09*09. this should be shown as invalid expression
		// for this the function finds all operands and checks the first character of the operands to determine
		//if they are of type 09 or 04 etc
		//will return 1 if 09 or simmilar numbers re found
		//here instead of explode a regular expression function can be used. but just too lazy XD
		function checkforprezero($name) 
{
					$expression_array=explode("*",$name);
foreach($expression_array as $item) 
{
	if((strcmp($item[0],"0")==0) && strlen($item)>1)
	{
			echo "<br>$name"." = ";

		    echo 'Invalid Expression. Please enter a valid expression*';
			return 1;
		//echo "yo";
	}
}

			$expression_array=explode("+",$name);
foreach($expression_array as $item) 
{
	if((strcmp($item[0],"0")==0) && strlen($item)>1)
	{
			echo "<br>$name"." = ";

		    echo 'Invalid Expression. Please enter a valid expression+';
			return 1;

		//echo "yo";
	}
}

			$expression_array=explode("-",$name);
foreach($expression_array as $item) 
{
	if((strcmp($item[0],"0")==0) && strlen($item)>1)
	{
			echo "<br>$name"." = ";

		    echo 'Invalid Expression. Please enter a valid expression-';
			return 1;

		//echo "yo";
	}
}
	
			$expression_array=explode("/",$name);
foreach($expression_array as $item) 
{
	if((strcmp($item[0],"0")==0) && strlen($item)>1)
	{
			echo "<br>$name"." = ";

		    echo 'Invalid Expression. Please enter a valid expression/';
					return 1;

		//echo "yo";
	}
}
}
	


	
	
//@ added to supress output stream
$result = @eval($name . "; return true;");

			


// following function checks if the above eval generated any error
if (error_get_last()){
		echo "<br>$name"." = ";

    echo 'Invalid Expression. Please enter a valid expression';
   // print_r(error_get_last());
}
else
{
	if($name == '')
	{

		//Come here if user passes blank query
		
	}
	else
	{
	$error_val = checkforprezero($name);
	if($error_val ==1 )
	{}
	else
	{
	$p = eval('return '.$name.';');
	}
	echo "<br>$name"." = ";
	print $p;
	}
}

			
		
	}

?>

</body>
</html>
