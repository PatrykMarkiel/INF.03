<?php
$server="localhost";
$user="root";
$password="";
$db="galeria";
$conn = new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <main>
        <div id="m1">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miast</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ol>
        </div>
        <div id="m2">
            <?php
                $sql='SELECT tytul, plik, polubienia, imie, nazwisko FROM `zdjecia` LEFT JOIN autorzy ON autorzy.id=zdjecia.autorzy_id ORDER BY nazwisko;';
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $result){
                    echo"
                    <div class='obraz'>
                        <img src='pliki/{$result['plik']}' alt='zdjęcie'>
                        <h3>{$result['tytul']}</h3>
                    ";
                    if($result['polubienia']>40){
                        echo"
                        <p>Autor: {$result['imie']} {$result['nazwisko']}</p>
                    ";
                    }
                    echo"
                      <a href='pliki/{$result['plik']}' download='pliki/{$result['plik']}'> Pobierz </a>
                      </div>
                    ";
                }
            ?>
        </div>
        <div id="m3">
            <h2>Najbardziej lubiane</h2>
                <?php
                $sql="SELECT tytul, plik FROM `zdjecia` WHERE polubienia >=100;";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $result){
                    echo"<img src='pliki/{$result['plik']}' alt='pliki/{$result['tytul']}'>";
                }
                $conn->close();
                ?>
            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </div>
    </main>
    <footer>
        <h5>tronę wykonał: numer zdającego</h5>
    </footer>
</body>
</html>