<?
$connection=mysqli_connect('localhost','root','','beka_test') 
or die('ne udalost');
$result=mysqli_set_charset($connection,'utf8'); 
?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Чындыгында удалить кылууну каалайсызбы?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
				<button type="button" class="btn btn-primary"
				onclick="test()" 
				data-dismiss="modal">Удалить</button>
			</div>
		</div>
	</div>
</div>


<div>

	<?
	$mag=$_POST['mag'];
	$address=$_POST['address'];
	$tel=$_POST['tel'];
	$direct=$_POST['direct'];
	$id_magazin=$_POST['mag_id'];

    if (!empty($id_magazin)) {
    	 $sql="DELETE FROM magazin WHERE id='$id_magazin'";
		mysqli_query($connection,$sql);
    }

	if (!empty($mag)&&!empty($address)&&
		!empty($tel)&&!empty($direct)) {
		mysqli_query($connection,
			"INSERT INTO magazin(name,address,tel_nomer,direct)
			VALUES('$mag','$address','$tel','$direct');
			");
}



$name=$_POST['name'];
$query = "SELECT * FROM magazin WHERE name LIKE '$name%' ORDER BY id DESC";
$res1 = mysqli_query($connection,$query);
while($row =mysqli_fetch_array($res1)){
//echo "Данные: ".$_POST['name']."  цифра: ".$_POST['number'];
	$r=$row[0];
	?>

	<div style="
	box-shadow: 0px 0px 5px rgba(0,0,0,0.5); 
	margin-top: 10px;
	padding: 5px;
	font-size: 1.1em;
	">

	<!-- <button type="button" 
	class="btn btn-danger" 
	data-toggle="modal" 
	data-target="#exampleModal"
	style="float: right;"
	onclick="func_id('<? echo $row[0]; ?>')" 
	>
	Х
</button> -->
<a href="index.php?page=zakaz&id=<? echo $r; ?>">
	<b>Магазин:</b> <? echo $row[1];  ?>

	<br>
	<b>Дарени:</b> <? echo $row[2];  ?>
	<br>
	<b>Телефон:</b> <? echo $row[3];  ?>
	<br>
	<b>Директор:</b> <? echo $row[4];  ?>

	<br><br>
</a>
</div>

<?}?>


</div>
