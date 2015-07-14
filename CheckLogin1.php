
<?php
mysql_connect("localhost","username","password") or die(mysql_error());
$db = "mwikitest1";
$chk = mysql_select_db($db);
if(!$chk)
{
echo "Database not selected";
echo mysql_error();
}
$sql = "SELECT Username, Password from table2";

$flag = 0;
$result = mysql_query($sql);

$psw = htmlspecialchars($_POST[psw]);
$username = htmlspecialchars($_POST[username]);
$pwd = sha1($psw);

while( $field = mysql_fetch_assoc($result))
{
	if( $field['Username'] == $username)
	{
			
		if( $field['Password'] == $pwd)
		{
			$flag = 1;				
			echo "Welcome to the Illuminati";
		}
		
	}
	
}
if(!$flag)
{
	echo "Sorry your credentials were not found, you should be redirected to the registration page in 5 seconds";	
	header( 'refresh:5; url=RegistrationTest1.html' ) ;
}
mysql_close($db);
?>

