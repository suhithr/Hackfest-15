
<?php
mysql_connect("localhost","username","password") or die(mysql_error());
$db = "mwikitest1";
mysql_query("CREATE DATABASE $db");
$chk = mysql_select_db($db);
if(!$chk)
{
echo "Database not selected";
echo mysql_error();
}

$chk = mysql_query("CREATE TABLE table2
(
id INT NOT NULL AUTO_INCREMENT,
Username VARCHAR(50) NOT NULL,
Password TEXT NOT NULL,
Age INT NOT NULL,
PRIMARY KEY(id)
)");
mysql_close();
$conn = mysql_connect("localhost","username","password") or die ("Failed to connect: ". mysql_error());
$conn = mysql_select_db($db);
if(!$conn)
{
	echo "Cannot select database\n";
	echo mysql_error();
}
$age = htmlspecialchars($_POST[age]);
$psw = htmlspecialchars($_POST[psw]);
$username = htmlspecialchars($_POST[username]);
if($age==NULL || $psw=="" || $username=="")
{
	echo "Please fill in all the fields before submitting, wait 5 seconds for the browser to redirect you back to the registration page";	
	header( 'refresh:5; url=RegistrationTest1.html' ) ;
	die();
} 
if($age > 18)
{

	$pwd = sha1($psw);
	$sql = "INSERT INTO table2(Username,Password,Age) VALUES('$username','$pwd','$age')";
	$check = mysql_query($sql);
	echo "Congratulations, you have been successfully registered.";
}
else
{
		
	echo "Sorry but you must be older than 18 to register.After 5 seconds you will be redirected to the Registration Page.";	
	header( 'refresh:5; url=RegistrationTest1.html' );

}
mysql_close();
?>

