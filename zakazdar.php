<?
$connection=mysqli_connect('localhost','root','','beka_test') 
or die('ne udalost');
$result=mysqli_set_charset($connection,'utf8'); 
?>


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

<div style="overflow-y: auto; width: 100%; height: 350px;">
<?
 $name=$_POST['name'];
 $zakaz=$_POST['zakaz'];
 $id=$_POST['mag_id'];
 $price=$_POST['price'];
  $summa=$_POST['summa'];
 $sotrudnic_id=$_POST['id'];
$id_magazin=$_POST['mag_id'];

    if (!empty($id_magazin)) {
    	$sql="DELETE FROM zakazdar WHERE id='$id_magazin'";
		mysqli_query($connection,$sql);
    }



if(!empty($zakaz) and $price>0 ){
$query="INSERT INTO zakazdar(magazin_id,zakaz,client_id,price,summa)
 values('$id','$zakaz','$sotrudnic_id','$price','$summa')";
$res1 = mysqli_query($connection,$query);
}

$query = "SELECT zakazdar.id,magazin.name,zakazdar.zakaz,
zakazdar.`data`,magazin.address,magazin.tel_nomer, zakazdar.price-zakazdar.summa
 FROM zakazdar join magazin join client on zakazdar.magazin_id=magazin.id and
zakazdar.client_id=client.id and  zakazdar.client_id=$sotrudnic_id and zakazdar.performance=0 ORDER BY zakazdar.id DESC;";
$res1 = mysqli_query($connection,$query);
while($row =mysqli_fetch_array($res1)){
?>
<div style="
box-shadow: 0px 0px 5px rgba(0,0,0,0.5); 
margin-top: 10px;
padding: 5px;
width: 98%;
margin-left: 5px;
font-size: 1.1em;
">
<button type="button" 
			class="btn btn-danger" 
			data-toggle="modal" 
			data-target="#exampleModal"
			style="float: right;" 
			onclick="func_id('<? echo $row[0]; ?>')" 
			>
			  Х
			</button>
<b>Магазин:</b> <? echo $row[1];  ?>

<br>
<b>Заказ:</b> <b style="color: red;"><? echo $row[2];  ?></b>

<br>
<b>Дата:</b> <? echo $row[3];  ?>

<br>


<b>Дареги:</b> <? echo $row[4];  ?>
<br>
<b>Телефон:</b> <? echo $row[5];  ?>
<br>
<b>Карыз:</b> <? echo $row[6];  ?>
<br><br>
</div>
	<?}?>


</div>
