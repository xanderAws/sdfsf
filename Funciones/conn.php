<?php
try{
$conn = new PDO('mysql:host=localhost; dbname=clinicamedica', 'root', '');
} catch(PDOException $e){
   echo "Error: ". $e->getMessage();
   die();
}
?>