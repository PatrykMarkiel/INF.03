<?php
$server="localhost";
$user="root";
$password="";
$db="wedkowanie";
$conn = new mysqli($server,$user,$password,$db);
if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['adres'])){
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $adres=$_POST['adres'];
    $sql="INSERT INTO `karty_wedkarskie`(`imie`, `nazwisko`, `adres`) VALUES ('$imie','$nazwisko','$adres');";
    $conn->query($sql);
    $conn->close();
}
?>