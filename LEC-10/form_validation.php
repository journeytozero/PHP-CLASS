
<?php 

if (isset($_POST['submit']))
     {
    	

if ((!isset($_POST['fname'])) || (!isset($_POST['lname'])) || (!isset($_POST['address'])) || (!isset($_POST['pass']))  || (!isset($_POST['conpass'])) || (!isset($_POST['gender'])))
 {
	$error = "*"."pls fill all the fields";
}

if ($_POST['pass'] != $_POST['conpass']) {
	$error = "pass doesnt match";
}else{

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$address = $_POST['address'];
	$password = $_POST['pass'];
	$conpass = $_POST['conpass'];
	
	$hashed = password_hash($password, PASSWORD_DEFAULT);
	$gender = $_POST['gender'];
}

    }



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>basic Registration Form</title>
</head>
<body>


<h1>pls enter ur info</h1>
<fieldset>
	<legend><b>User Resigtration</b></legend>

<form method="post" action="">

	<?php 


    if (isset($_POST['submit']))
     {
    	

if (!empty($error)) {
	echo "<p style='color:red;'>" . $error . "</p>";

}


    }



	 ?>

		First Name:<br>
		<input type="text" name="fname">
		<span style="color: red">*</span><br>

		Last Name:<br>
		<input type="text" name="lname">
		<span style="color: red">*</span><br>

		Address:<br>
		<input type="text" name="address">
		<span style="color: red">*</span><br>

        Email:<br>
		<input type="Email" name="email">
		<span style="color: red">*</span><br>

		Password:<br>
		<input type="Password" name="pass">
		<span style="color: red">*</span><br>

		Confirm Pass:<br>
		<input type="Password" name="conpass">
		<span style="color: red">*</span><br>

		Gender:<br>
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">feMale
<br><br>

		<input type="submit" name="submit" value="Submit">

</form>
</fieldset>


<table border="1" style="border-collapse: collapse;">
	
<tr>
	<td>First Name</td>
	<td><?php echo $firstname; ?></td>
	<tr>
	<td>Last Name</td>
	<td><?php echo $lastname; ?></td>
</tr>
<tr>
	<td>Address</td>
	<td><?php echo $address; ?></td></tr>
	<tr>
	<td>Password</td>
	<td><?php echo $hashed; ?></td></tr>
	<tr><td>Gender</td>
	<td><?php echo $gender; ?></td></tr>


</tr>

</table>
</body>
</html>