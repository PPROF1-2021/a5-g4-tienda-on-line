<?php

$servidor='localhost';
$bd='greenbuddiesbd';
$user='root';
$pass='';

try{
    $conexion=new PDO('mysql:host='.$servidor.';dbname='.$bd, $user, $pass);

}catch (PDOException $e){
    die ('Error: '. $e->getMessage());
    exit;
    
}
return null;

?>

