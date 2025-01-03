<?php
$server="localhost";
$user="root";
$password="";
$db="sklep2";
$conn = new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rtykuły biurowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </header>
    <main>
        <div id="m1">
            <h4>Ile będą kosztować Twoje zakupy?</h4>
            <form action="" method="post">
                <label for="opcje">wybierz artykuł</label>
                <select name="opcje" id="opcje">
                    <option value="1">Zeszyt 60 kartek</option>
                    <option value="2">Zeszyt 32 kartki</option>
                    <option value="3">Cyrkiel</option>
                    <option value="4">Linijka 30 cm</option>
                    <option value="5">Ekierka</option>
                    <option value="6">Linijka 50 cm</option>
                </select>
                <br>
                <label for="liczba">liczba sztuk:</label>
                <input type="number" id="liczba" name="liczba">
                <br>
                <button type="submit">OBLICZ</button>
            </form>
            <?php
                if(isset($_POST['opcje'])){
                    $opcja=$_POST['opcje'];
                    $ile=(int)$_POST['liczba'];
                    switch($opcja){
                        case(1):
                            $opcja='Zeszyt 60 kartek';
                            break;
                        case(2):
                            $opcja='Zeszyt 32 kartki';
                            break;
                        case(3):
                            $opcja='Cyrkiel';
                            break;
                        case(4):
                            $opcja='Linijka 30 cm';
                            break;
                        case(5):
                            $opcja='Ekierka';
                            break;
                        case(6):
                            $opcja='Linijka 50 cm';
                            break;
                    }
                    $sql="SELECT cena FROM `towary` WHERE nazwa ='$opcja';";
                    $result=$conn->query($sql);
                    $result = (float)$result->fetch_assoc()['cena'];
                    $result*=$ile;
                    $result= round($result,1);
                    echo"<p>$result</p>";
                }
            ?>
        </div>
        <div id="m2">
            <img src="zakupy2.png" alt="hurtownia">
            <h4>Kontakt</h4>
            <p>telefon: 888999777 <br><a href="mailto:hurt@wp.pl"> e-mail: hurt@wp.pl</a></p>
        </div>
        <div id="m3">
            <h4>Ceny wybranych artykułów w hurtowni:</h4>
            <table>
            <?php
                $sql="SELECT nazwa, cena FROM `towary` LIMIT 4;";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $result){
                    echo"
                    <tr>
                        <td>{$result['nazwa']}</td>
                        <td>{$result['cena']}</td>
                    </tr>
                    ";
                }
                $conn->close();
            ?>
            </table>
        </div>
    </main>
    <footer>
        <h2>Witrynę wykonał: numer zdjącego</h2>
    </footer>
</body>
</html>