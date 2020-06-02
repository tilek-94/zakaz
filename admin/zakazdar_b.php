<div style="overflow-y: auto; width: 100%; height: 650px;">
<?

$id=$_GET['id'];
$query = "SELECT zakazdar.id,magazin.name,zakazdar.zakaz,
zakazdar.`data`,magazin.address,magazin.tel_nomer,
 client.name, zakazdar.price,zakazdar.summa,
 zakazdar.price-zakazdar.summa
 FROM zakazdar join magazin join client on zakazdar.magazin_id=magazin.id and
zakazdar.client_id=client.id and zakazdar.performance=0 and 
zakazdar.id='$id' 
ORDER BY zakazdar.id DESC;";
$res1 = mysqli_query($connection,$query);
$row =mysqli_fetch_array($res1);
?>
<div style="
box-shadow: 0px 0px 5px rgba(0,0,0,0.5); 
margin-top: 10px;
padding: 5px;
width: 98%;
margin-left: 5px;
font-size: 1.1em;
">

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
<b>Сумма:</b> <? echo $row[7];  ?><br>
<b>Төлөнгөн акча:</b> <? echo $row[8];  ?><br>
<b>Карыз:</b> <? echo $row[9];  ?><br>
<b>Сотрудник:</b> <? echo $row[6];  ?>
<br><br>
</div>
  <center>
    <input type="text" name="tel" style="
    width: 300px;
    height: 40px;
    margin-top: 10px;
    border-radius: 5px;
    "><br>
<a href="index.php?page=zakazdar_a&vp=<? echo $row[0];?>" class="btn btn-primary" 
      style="width: 250px;
      height: 70px;
      margin-top: 20px;
      
      ">
      <font style="
      font-size: 1.5em; 
      color: white;
      ">
      Карыз кабыл алуу
      
    </font>
  </a>
  <br>

<a href="index.php?page=zakazdar_a&vp=<? echo $row[0];?>" class="btn btn-primary" 
      style="width: 250px;
      height: 70px;
      margin-top: 20px;
      
      ">
      <font style="
      font-size: 1.5em; 
      color: white;
      ">
      Аткарылды
      
    </font>
  </a>
    </center>

</div>
