<?php
include('class/class.php');
?>
<!doctype html>
<html lang="es">
  <head>
  <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
<link href="https://bootswatch.com/4/superhero/bootstrap.css" rel="stylesheet" />	
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">

    <!--sweetalert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
  <!-- script JS-->
  <script type="text/javascript" language="javascript" src="js/funciones.js"></script>

  <!--ICONOS Google Materials-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>GESTION DE EMPLEADOS</title>
  </head>
  <body onload="limpiar();">

  <div class="container">
   <div class="card">
       <div class="card-header bg-info">
           <h3 class="text-white">GESTION DE EMPLEADOS</h3>
       </div> 
   </div> 
   <div class="card-body">
       <div class="row">
           <div class="col-md-3">
               <form name="form" action="insert.php" method="post">
                   <label for="id_e">Codigo:</label>
                   <input type="number" id ="id_e" name="id_e" class="form-control" placeholder="Digite el Codigo">
            </div>
                <div class="col-md-5"> 
                  <label for='nomb'>NOMBRE:</label>
                <input type="text" id="nomb" name="nomb" class="form-control" placeholder="Digite el Nombre">
                </div>
                <div class="col-md-4"> 
                  <label for='ape'>APELLIDOS:</label>
                <input type="text" id="ape" name="ape" class="form-control" placeholder="Digite el Apellido">
                </div>

                <div class="col-md-6"> 
                  <label for='em'>EMAIL:</label>
                <input type="email" id="em" name="em" class="form-control" placeholder="Digite el Email">
                </div>

                <div class="col-md-6"> 
                  <label for='fn'>Fecha Nac.:</label>
                <input type="date" id="fn" name="fn" class="form-control" >
                </div>
                
                <div class="col-md-4"> 
                  <label for='cod'>CODIGO DEP:</label>
                <input type="number" id="cod" name="cod" class="form-control" placeholder="Digite el codigo dep">
                </div>
                <div class="col-md-4"> 
                  
                </div>
                <div class="col-md-6"> 
                    <input type="button" value="Registrar Empleado"
                    class="btn btn-success" title="Registrar Empleado" onclick="validar()">
                  </div>

                  <div class="col-md-6"> 
                    <input type="reset" value="Limpiar" class="btn btn-info">
                  </div>




                </form>

           </div>
       </div>
   </div>
 
 </div>
<hr>
<?php
//crear el objeto de la clase Empleado
$emp=new Empleado;
$reg=$emp->ver_emple();
?>
<div class="card-footer">
   <table class="table table-striped">
     <thead>
       <tr>
         <th>CODIGO</th>
         <th>NOMBRE</th>
         <th>APELLIDO</th>
         <th>EMAIL</th>
         <th>FECHA NAC.</th>
         <th>COD DEPARTAMENTO</th>
         <th>ACCIONES</th>
       </tr>
     </thead>

     <?php
//traer los datos de la funcion ver_emple
   for($i=0;$i<count($reg);$i++){
     echo "<tr>
     <td>".$reg[$i]['id_e']."</td>
     <td>".$reg[$i]['nomb_e']."</td>
     <td>".$reg[$i]['apel_e']."</td>
     <td>".$reg[$i]['email_e']."</td>
     <td>".$reg[$i]['fecha_n']."</td>
     <td>".$reg[$i]['id_d']."</td>
     ";
 
 ?>
<td> 
<button class="btn btn-warning" onclick=window.location='./editar.php?id=<?php echo $reg[$i]['id_e'];?>'>
<span class="material-icons">edit_note</span>
</button>
   </td>
<td><button class="btn btn-danger" onclick="eliminar('eliminar.php?id=<?php echo $reg[$i]['id_e'];?>')">
<span class="material-icons">delete_sweep </span>
  </td>
  </tr>
      <?php } 
      ?>   
         
         
         

   </table>
</div>




    <!-- Optional JavaScript; choose one of the two! -->
    <script src="./jquery/jquery-3.6.0.min.js"></script>

    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>