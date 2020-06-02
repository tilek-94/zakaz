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

<div style="overflow-y: auto; width: 100%; height: 650px;">
<?

$query = "SELECT zakazdar.id,magazin.name,zakazdar.zakaz,
zakazdar.`data`,magazin.address,magazin.tel_nomer, zakazdar.price-zakazdar.summa
 FROM zakazdar join magazin join client on 
 zakazdar.magazin_id=magazin.id and zakazdar.performance=0 and
zakazdar.client_id=client.id ORDER BY zakazdar.id DESC;";
$res1 = mysqli_query($connection,$query);
while($row =mysqli_fetch_array($res1)){
?>

<a href="index.php?page=zakazdar_a&ud=<? echo $row[0];?>"
            class="btn btn-danger" 
            data-toggle="modal" 
            data-target="#exampleModal"
            style="float: right;
            width: 40px;
             margin-right: 10px; margin-top: 5px;" 
            
            >
              Х
            </a>
<a href="index.php?page=zakazdar_b&id=<? echo $row['id']?>">
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
<b>Карыз:</b> <? echo $row[6];  ?>
<br><br>
</div>
</a>
    <?}?>


</div>
