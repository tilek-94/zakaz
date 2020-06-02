<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
      document.addEventListener("DOMContentLoaded", function(){
         var admin="";
         $.ajax({
            url:"registr_sotb.php",
            type:"POST",
            data:({name:admin}),
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
    var mag=obj.mag.value;
    var addres=obj.addres.value;
    var tel=obj.tel.value;
    var direct=obj.direct.value;

    $.ajax({
        url:"registr_sotb.php",
        type:"POST",
        data:({mag:mag,
            address:addres,
            tel:tel,
            direct:direct}),
        dataType:"html",
        success:funcSuccess

    });
    document.querySelectorAll('input, textarea').forEach(el=>el.value = '');
}

var id_magazin=0;
function test(){
     $.ajax({
        url:"registr_sotb.php",
        type:"POST",
        data:({mag_id:id_magazin}),
        dataType:"html",
        success:funcSuccess

});
}
function func_id(data){
   id_magazin=data;
}

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
</script>

</head>
<body>

	<div class="display_magazin">
       <form name="form1">
          <table style="width: 100%;">
              <tr>
                 <td>Ф.И.О:
                    <input type="text" name="mag"></td></tr><tr>
                        <td>Дата рождения:
                            <input type="text" name="addres"></td></tr><tr>
                                <td>Телефон:
                                    <input type="text" name="tel"></td></tr><tr>
                                        <td>Пароль:
                                            <input type="text" name="direct"></td></tr><tr>
                                             <td style="padding: 10px;"><center>

                                              <p id="load" onclick="registr(form1)"  class="btn btn-primary"  
                                              style="cursor: pointer;
                                              margin-top: 15px;
                                              width: 200px;
                                              " >
                                          Каттоо</p>
                                      </center>
                                  </td>
                              </tr>
                          </table>
                      </form>
                      <center><p id="load"
                       style="cursor: pointer;
                       font-size: 1.5em;
                       color:#319464;
                       "
                       >
                       Сотрудниктер
                   </p>
               </center>
               <div id="information"></div>
           </div>
       </body>
       </html>