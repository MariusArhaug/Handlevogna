<?php 
$tilkobling = mysqli_connect("localhost", "root", "", "loginregister");


$name = $_POST['name'];

$sql = "SELECT * FROM matvare_id WHERE varer_navn = '$name';";

$result = mysqli_query($tilkobling, $sql); 
$product = mysqli_fetch_array($result);

header('location: ../side'.$product['kategori_kategori_id'].'.php?action=add&id='.$product['mat_id']);

?>