<!DOCTYPE html>
<html>
<body>

<h1>Calculator</h1>
<h4>Type an expression in the following box (e.g., 10.5+20*3/25).</h3>

<form method="get" action= "<?php echo $_SERVER["PHP_SELF"]?>">
<b>	Enter the expression </b><input type = "text" name = "fname">
	<input type = "submit" value = "CALCULATE" >
</form>
<h4>
1. Only numbers and +,-,* and / operators are allowed in the expression.</br>
2. The evaluation follows the standard operator precedence.</br>
3. The calculator does not support parentheses.</br>
4. The calculator handles invalid input "gracefully". It does not output PHP error messages.</br>
<br>
<u>Example test cases:</u><br>
	-A basic arithmetic operation: 3+4*5=23</br>
	-An expression with floating point or negative sign : -3.2+2*4-1/3 = 4.46666666667, 3*-2.1*2 = -12.6</br>
	-Some typos inside operation (e.g. alphabetic letter): Invalid input expression 2d4+1</br>
========================================================================

</h4>
<?php

		// Check if the expression contains a '(' or a ';' and print invalid expression
	if (((isset($_GET['fname'])))) {
		$name = $_GET["fname"];
		$p="";

		if($name !== '')
		{
		// this function checks if the expression of type 09*09. this should be shown as invalid expression
		// for this the function finds all operands and checks the first character of the operands to determine
		//if they are of type 09 or 04 etc
		//will return 1 if 09 or similar numbers re found
		//here instead of explode a regular expression function can be used. but just too lazy XD


		// Check if the expression contains a '(' or a ';' and print invalid expression
		if (strpos($name, ';') !== FALSE || strpos($name, ';') !== FALSE) {
			echo "<br>$name"." = ";
		    	echo 'Invalid Expression. Please enter a valid expression';
			return 1;
			}	

		function checkforprezero($name) {
			$expression_array=explode("*",$name);
			foreach($expression_array as $item) {
				if((strcmp($item[0],"0")==0) && strlen($item)>1) {
					echo "<br>$name"." = ";
		    			echo 'Invalid Expression. Please enter a valid expression*';
					return 1;
					}
				}

			$expression_array=explode("+",$name);
			foreach($expression_array as $item) { 
				if((strcmp($item[0],"0")==0) && strlen($item)>1) {
					echo "<br>$name"." = ";
		    			echo 'Invalid Expression. Please enter a valid expression+';
					return 1;
					}
				}

			$expression_array=explode("-",$name);
			foreach($expression_array as $item) {
				if((strcmp($item[0],"0")==0) && strlen($item)>1) {
					echo "<br>$name"." = ";
		    			echo 'Invalid Expression. Please enter a valid expression-';
					return 1;
					}
				}
	
			$expression_array=explode("/",$name);
			foreach($expression_array as $item) {
				if((strcmp($item[0],"0")==0) && strlen($item)>1) {
				echo "<br>$name"." = ";
		    		echo 'Invalid Expression. Please enter a valid expression/';
				return 1;
				}
			}
		}

		//handle the "4--4 case"
		//basically replace -- with - - 	

		if (strpos($name, '--') !== false) {
			$name = str_replace('--', '- -', $name);
			}
		// Check if the expression contains a '(' or a ';' and print invalid expression
	
		//@ added to supress output stream
		$result = @eval($name . "; return true;");

		// following function checks if the above eval generated any error
		if (error_get_last()){
			echo "<br>$name"." = ";
	
			if (strpos($name, '/0') !== false) {
				echo 'Divide by zero error';
				}
			else {
    				echo 'Invalid Expression. Please enter a valid expression';
				}
			}
		else {
			if($name == '') {
		//Come here if user passes blank query
			}
			else {
				$error_val = checkforprezero($name);
				if($error_val ==1 ) {}
				else {
					if (strpos($name, '--') !== false) {
						echo "here --";
						$name = str_replace('--', '- -', $name);
						}
		
					$p = eval('return '.$name.';');
					echo "<br>$name"." = ";
					print $p;
					}
				}
			}

		}
	}
?>

</body>
</html>
