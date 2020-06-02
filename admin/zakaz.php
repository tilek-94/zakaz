
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
       
  document.addEventListener("DOMContentLoaded", function(){
    			var admin="";
var sotrudnik_id = <?php echo json_encode($_SESSION['id']); ?>;
        
    			$.ajax({
    				url:"zakazdar.php",
    				type:"POST",
    				data:({name:admin,id:sotrudnik_id}),
    				dataType:"html",
    				success:funcSuccess

    			});

    	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.3.0/lodash.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
    function funcBefore(){
    	$("#information").text("Издөө...");
    }		
    function funcSuccess(data){
       $("#information").html(data);
	    }

    function registr(obj){
        var admin=obj.zakaz_magazin.value;
        var price=obj.price.value;
        var summa=obj.summa.value;
        var xdata = <?php echo json_encode($id); ?>;
        var sotrudnik_id = <?php echo json_encode($_SESSION['id']); ?>;
                   $.ajax({
                    url:"zakazdar.php",
                    type:"POST",
                    data:({zakaz:admin,
                        mag_id:xdata,
                        price:price,
                        summa:summa,
                        id:sotrudnik_id
                    }),
                    dataType:"html",
                    success:funcSuccess

                });
document.querySelectorAll('input, textarea').forEach(el=>el.value = '');
            }




    $(document).ready(function(){
    	$("#load").bind("click", function(){
    			var admin="";
    			$.ajax({
    				url:"zakazdar.php",
    				type:"POST",
    				data:({name:admin}),
    				dataType:"html",
    				success:funcSuccess

    			});

    	});

    });

var id_magazin=0;
function test(){
 var sotrudnik_id = <?php echo json_encode($_SESSION['id']); ?>;
       
    $.ajax({
        url:"zakazdar.php",
        type:"POST",
        data:({mag_id:id_magazin,id:sotrudnik_id}),
        dataType:"html",
        success:funcSuccess

});
}
function func_id(data){
   id_magazin=data;
}
 
	</script>
</head>
<body>
	<div class="display_magazin">
        <center>
        <h4 style="color: red;">
<?
$query = "SELECT * FROM magazin WHERE id='$id'";
$res1 = mysqli_query($connection,$query);
$row =mysqli_fetch_array($res1);
echo $row[1];
?>
       

    </h4>
        </center>
	<form name="form1">
		<table width="100%;">
		<tr>
			<td>
                <textarea name="zakaz_magazin" >
                </textarea>
            </td>
            </tr>
<tr>
    <td>
        Баасы
        <input type="text" name="price"></td>
</tr>
<tr>
    <td>
        Төлөдү
        <input type="text" name="summa" value="0"></td>
</tr>
            <tr>
			<td style="padding: 10px;">
<center>
		<p onclick="registr(form1)" class="btn btn-primary"  
		style="cursor: pointer;
		 		 width: 200px;
                 font-size: 1.2em;
		 "  id="submit_z" >

			Заказ алуу</p>
</center>
        </td>
		</tr>
</table>
</form>
<center>
    <p style="
font-size: 1.5em;
color:#319464;
 "
  >
Заказдардын тизмеси
</p>
	</center>
<div id="information"></div>
</div>
</body>
</html>