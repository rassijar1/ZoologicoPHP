<?php

include("./class/class.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
//$id2=$_request['newid'];
echo "<div class='col-md-6' align='center'> 
                  <label for='username'>NUM ID:</label>
                  <input  type='text' name='newid' class='form-control' value = '".$_REQUEST['id']."' readonly>
                </div>";

  
 
 
 ?>
<?php
//crear el objeto de la clase Empleado
$emp=new Usuario;
$reg=$emp->ver_usu();
?>
<div class="card-footer">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>id</th>
         <th>NOMBRE usuario</th>
         <th>Tipo usuario</th>
         <th>respuesta 1</th>
         <th>Respuesta 2</th>
         <
       </tr>
     </thead>

     <?php
//traer los datos de la funcion ver_emple
   for($i=0;$i<count($reg);$i++){
     echo "<tr>
     <td>".$reg[$i]['id']."</td>
     <td>".$reg[$i]['username']."</td>
     <td>".$reg[$i]['usertype']."</td>
     <td>".$reg[$i]['respuesta1']."</td>
     <td>".$reg[$i]['respuesta2']."</td>
    
     ";
 
 ?>
<td> 

<
  </tr>
      <?php } 
      ?>   
         
         
         

   </table>
</div>


</body>
</html>