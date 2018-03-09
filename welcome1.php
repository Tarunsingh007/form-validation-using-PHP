<!DOCTYPE HTML>
<html>  
<body>
<?php
$name=$email=$phone=$website=$sex=$comment="";
$nameErr=$emailErr=$phoneErr=$websiteErr=$sexErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if(empty($_POST["name"]))
	$nameErr = "Name is required";
	else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

	if(empty($_POST["email"]))
	$emailErr = "email is required";
	else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

	if(empty($_POST["website"]))
	$websiteErr = "website is required";
	else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }    
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

	if(empty($_POST["phone"]))
	$phoneErr = "phone is required";
	else
	$phone = test_input($_POST["phone"]);

	if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
function test_input($data)
{
	$data= trim($data);
	$data= stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}

?>
<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name"><?php echo $nameErr; ?><br/><br/>
E-mail: <input type="email" name="email"><?php echo $emailErr; ?><br/><br/>
phone number: <input type="tel" name="phone"><?php echo $phoneErr; ?><br/><br/>
website: <input type="text" name="website"><?php echo $websiteErr; ?><br/><br/>
Comment: <textarea name="comment" rows="5" cols="40"></textarea><br/><br/>
gender: <input type="radio" name="sex">Female
<input type="radio" name="sex">Male<?php echo " *$sexErr"; ?><br/><br/>
<input type="submit">
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $sex;
?>
</body>
</html>