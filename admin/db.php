<? session_start();
$connection=mysqli_connect('localhost','root','','beka_test') 
or die('ne udalost');
$result=mysqli_set_charset($connection,'utf8'); 



$id=$_GET['id'];
 $vp=$_GET['vp'];
 $ud=$_GET['ud'];
$pass=$_POST['pass'];
$_SESSION['pass'];

if(!empty($vp)){
 $query = "UPDATE zakazdar SET 
performance='1' where id='$vp'";
mysqli_query($connection,$query);
}
if(!empty($ud)){
 $query = "UPDATE zakazdar SET 
performance='2' where id='$ud'";
mysqli_query($connection,$query);
}

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