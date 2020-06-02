<? session_start();
$connection=mysqli_connect('localhost','root','','beka_test') 
or die('ne udalost');
$result=mysqli_set_charset($connection,'utf8'); 
$id=$_GET['id'];
$pass=$_POST['pass'];

if (!empty($pass)) {
	
	$query = "SELECT * FROM client";
	$res1 = mysqli_query($connection,$query);
	while($row =mysqli_fetch_array($res1)){
		if ( $pass==$row['passw']) {
			 $_SESSION['pass']= $row['passw'];
			 $_SESSION['id']= $row['id'];
			 $_SESSION['name']= $row['name'];
			

		}
	}
}

?>