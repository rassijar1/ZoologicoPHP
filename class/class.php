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
    <title> USUARIOS</title>
  </head>
  <body>
<?php
//realizar la conexion a la BD
class Conectar{
    public static function con(){
    $link=mysqli_connect('localhost','root','') 
    or die ("ERROR al concetar la BD".mysqli_error($link));
    mysqli_select_db($link,'zoo');
    mysqli_query($link,"SET NAMES 'utf8'")
    or die("ERROR al selecconar la BD".mysqli_error($link));
    return $link;
    }
}
//clase empleados - CRUD de Empleados 
class Usuario{
 private $user;
 public function __construct(){
     $this->user=array();
 }
 //mostrar los empleados
 public function ver_usu(){
   $sql="select * from usuarios";
   $res=mysqli_query(Conectar::con(),$sql);
   while($row=mysqli_fetch_assoc($res)){
       $this->user[]=$row;
   }
   return $this->user;

 }

 public function ver_usuarios($user){
  $sql="select * from usuarios where tipo_usuario=$user";
  $res=mysqli_query(Conectar::con(),$sql);
  while($row=mysqli_fetch_assoc($res)){
      $this->user[]=$row;
  }
  return $this->user;

}

 public function registrar($id_u,$username,$pass,$usertype,$respuesta1,$respuesta2){
   $sql="insert into usuarios values($id_u,'$username','$pass','$usertype','$respuesta1','$respuesta2')";
   $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
   echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El usuario se Registro Correctamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='index.php';
        }
   });
   </script>";
}

public function insertar($id_u,$username,$pass,$usertype,$respuesta1,$respuesta2){
  $sql="insert into usuarios values($id_u,'$username','$pass','$usertype','$respuesta1','$respuesta2')";
  $res=mysqli_query(Conectar::con(),$sql) or die ("Error en la consulta $sql");
  echo"
  <script type='text/javascript'>
  Swal.fire({
   title:'Exito',
   text:'El usuario se Registro Correctamente',
   icon : 'success',
  }).then((result)=>{
       if(result.value){
         window.location='usuarioinsert.php';
       }
  });
  </script>";
}



public function editaremp($nom,$ape,$em,$fn,$id){
  $sql="UPDATE empleados SET nomb_e='$nom',apel_e='$ape',email_e='$em',fecha_n='$fn' WHERE id_e = '$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El empleado con id $id fue Modificado',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='login.php';
        }
   });
   </script>";
} 

public function editarUsuario($id,$username,$pass,$respuesta1,$respuesta2){
  $sql="UPDATE usuarios SET usuario='$username',clave='$pass',respuesta1='$respuesta1',respuesta2='$respuesta2' WHERE codigo = '$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El empleado con id $id fue Modificado',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='usuarioinsert.php';
        }
   });
   </script>";
} 




//Crear una funcion para capturar el id de los botones de accion
public function usu_id($id) {

  $sql="select * from usuarios where codigo=$id";
  $res=mysqli_query(Conectar::con(),$sql);
  if($reg=mysqli_fetch_assoc($res)) {
    $this->emple[]=$reg;
  }
  return $this->emple;
}

public function eliusu($id){

$sql="delete from usuarios where codigo=$id";
$res=mysqli_query(Conectar::con(),$sql);
echo"
<script type='text/javascript'>
Swal.fire({
 title:'Exito',
 text:'El usuario con id $id fue Eliminado',
 icon : 'success',
}).then((result)=>{
     if(result.value){
       window.location='usuarioinsert.php';
     }
});
</script>";

}

public function modificarClave($pass,$id){
  $sql="UPDATE usuarios SET clave='$pass' where codigo='$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El Usuario con id $id ha cambiado su contraseña exitosamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='index.php';
        }
   });
   </script>";
} 


public function editarAdmin($pass,$id,$respuesta1,$respuesta2){
  $sql="UPDATE usuarios SET clave='$pass',respuesta1='$respuesta1',respuesta2='$respuesta2' where codigo='$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El Administrador con id $id ha actualizado su informacion exitosamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='adminhome.php?id=$id';
        }
   });
   </script>";
} 
public function editaruser($pass,$id,$respuesta1,$respuesta2){
  $sql="UPDATE usuarios SET clave='$pass',respuesta1='$respuesta1',respuesta2='$respuesta2' where codigo='$id'";
  $res=mysqli_query(Conectar::con(),$sql);
    echo"
   <script type='text/javascript'>
   Swal.fire({
    title:'Exito',
    text:'El Administrador con id $id ha actualizado su informacion exitosamente',
    icon : 'success',
   }).then((result)=>{
        if(result.value){
          window.location='usuariohome.php?id=$id';
        }
   });
   </script>";
} 
}





?>
   <!-- Optional JavaScript; choose one of the two! -->
<script src="./jquery/jquery-3.6.0.min.js"></script>

<script src="./sw/dist/sweetalert2.all.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>
</html>