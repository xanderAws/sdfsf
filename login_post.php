<?php 
 //Conexion con la base de datos.
 $conexion= new mysqli("localhost","root", "");
   
 if($conexion->connect_errno){
      echo "Fallo al conectar a MySQL:(". $conexion->connect_errno.")";
 }
 else{
 $conexion->select_db("clinicamedica");
      
 //declaramos como variables a los campos de texto del formulario.
 $nombre=$_POST["txtUsuario"];
 $password=$_POST["txtClave"];

 //Consulta del usuario y el password
 $consulta="SELECT Correo,Clave FROM usuario 
 WHERE Correo='$nombre' and Clave='$password'";
 if($query= $conexion->query($consulta)){
 $row=$query->fetch_array(); 
 $nr =$query->num_rows; 
 //Si existe el usuario lo va a redireccionar a la pagina de Bienvenida.
 if($nr == 1){ 
   header ("Location:paginaPrincipal.php"); 
 }
 //Si no existe lo va a enviar al login otra vez.
 else if($nr <= 0) { 
               header("Location:paginaPrincipal.php"); 
 }  
 }
 else{
 echo $conexion->error;  
 }
}  
?>