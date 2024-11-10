<?php
  $server="localhost";
  $user = "root";
  $password ="";
  $db= "biblioteka";
  $conn= new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="baner">
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </section>
    <section id="main">
        <div id="lewy">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <?php
                $sql = "SELECT imie, nazwisko FROM `autorzy` ORDER BY nazwisko; " ;
                $result = $conn->query($sql);
                $autorzy=$result->fetch_all(MYSQLI_ASSOC);
                foreach($autorzy as $autor)
                {
                    echo "<li> {$autor['imie']} {$autor['nazwisko']}</li>";
                }
                ?>
            </ol>
        </div>
        <div id="srodek">
            <h3>ul. Czytelnicza 25, Książkowice Wielkie</h3>
            <p><a href="sekretariat@biblioteka.pl">Napisz do nas</a></p>
            <img src="biblioteka.png" alt="książki">
        </div>
        <div id="prawy">
            <div class="prawy" id="prawy-gorny">
                <br>
                <h3>Dodaj czytelnika</h3>
                <form action="Biblioteka.php" method="post">
                    <label for="imie">Imię: </label>
                    <input name="imie" id="imie" type="text">
                    <br>
                    <label for="nazwisko">nazwisko: </label>
                    <input name="nazwisko" id="nazwisko" type="text">
                    <br>
                    <label for="symbol">symbol: </label>
                    <input name="symbol" id="symbol" type="number">
                    <br>
                    <button type="submit">DODAJ</button>
                </form>
            </div>
            <div class="prawy" id="prawy-dolny">
                
                <?php 
                if(isset($_POST['imie']) && !empty($_POST['imie'])){
                    $imie=$_POST['imie'];
                    $nazwisko=$_POST['nazwisko'];
                    $symbol=$_POST['symbol'];
                    $sql="INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');";
                    echo" <Br><p>Czytelnik $imie $nazwisko</p>";
                    $conn->query($sql);
                }
                $conn->close()
                ?>
            </div>
        </div>
    </section>
    <footer>
        <p>Projekt strony: Number zdającego</p>
    </footer>
</body>
</html>