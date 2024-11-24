<?php
$server="localhost";
$user="root";
$password="";
$db="sklep";
$conn = new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <main>
        <div id="lewy">
            <h2>Taniej o 30%</h2>
            <ul>
                <?php
                $sql="SELECT nazwa FROM `towary` WHERE promocja=1;";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $produkt){
                    echo"<li>{$produkt['nazwa']}</li>";
                }
                ?>
            </ul>
        </div>
        <div id="srodek">
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="post">
                <Select name="opcja">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </Select>
                <button type="submit">SPRAWDŹ</button>
            </form>
            <?php
            if(isset($_POST['opcja'])){
                $sql = "SELECT cena FROM `towary` WHERE nazwa = '{$_POST['opcja']}';";
                $result=$conn->query($sql);
                foreach($result as $produkt){
                    $obnizka=$produkt['cena']/100*70;
                    echo"<div id='skrypt2'>
                    <p>Cena regularna: {$produkt['cena']}</p>
                    <p>Cena w promocji 30%: $obnizka</p>
                    </div>";
                }
            }
            ?>
        </div>
        <div id="prawy">
            <h2>Kontakt</h2>
            <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja.png" alt="promocja">
        </div>
    </main>
    <footer> Autor strony: numer zdającego</footer>
</body>
</html>