<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
  document.addEventListener("DOMContentLoaded", function(){
    			var admin="";
    			$.ajax({
    				url:"func.php",
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
        var admin=obj.addres.value;
       				$.ajax({
                    url:"func.php",
                    type:"POST",
                    data:({name:admin}),
                    dataType:"html",
                   success:funcSuccess

                });
            }

    $(document).ready(function(){
    	$("#load").bind("click", function(){
    			var admin="";
    			$.ajax({
    				url:"func.php",
    				type:"POST",
    				data:({name:admin}),
    				dataType:"html",
    				beforeSend:funcBefore,
    				success:funcSuccess

    			});

    	});

    });

 
	</script>
</head>
<body>
	<div class="display_magazin">
	<form name="form1">
		<table>
		<tr>
			<td>
				<input type="text" name="addres" 
				onkeydown="registr(form1)"></td>
			<td style="padding: 10px;">
		<p id="load" class="btn btn-primary"  
		style="cursor: pointer;
		 margin-top: 15px;
		 width: 100px;
		 " >
			Издөө</p></td>
		</tr>
</table>
</form>
<center><p id="load"
 style="cursor: pointer;
font-size: 1.5em;
color:#319464;
 "
  >
Магазиндер
</p>
	</center>
<div id="information"></div>
</div>
</body>
</html>