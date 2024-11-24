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
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <div id="lewy">
            <h2>Nasze ceny</h2>
            <table>
                <?php
                $sql="SELECT nazwa, cena FROM `towary`; ";
                $result= $conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                $i=0;
                foreach($result as $produkt){
                    if($i<4){
                        $i++;
                        echo
                        "
                        <tr>
                            <td>{$produkt['nazwa']}</td>
                            <td>{$produkt['cena']}</td>
                        </tr>
                        ";
                    }
                }
                ?>
            </table>
        </div>
        <div id="srodek">
            <h2>Koszt zakupów</h2>
            <form action="index.php" method="post">
                <label for="wybor">Wybierz arytkół:</label>
                <select name="wybor" id="wybor">
                    <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                    <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                    <option value="Cyrkiel">Cyrkiel</option>
                    <option value="Linijka 30 cm">Linijka 30 cm</option>
                </select>
                <br>
                <label for="sztuki">liczba sztuk: </label>
                <input type="number" name="sztuki" id="sztuki">
                <br>
                <button type="submit">Oblicz</button>
            </form>
            <?php
                if(isset($_POST['wybor']) && isset($_POST['cena'])){
                    $sql="SELECT cena FROM `towary` WHERE nazwa = '{$_POST['wybor']}';";
                    $result=$conn->query($sql);
                    foreach($result as $produkt){
                        $wynik=$produkt['cena']*$_POST['sztuki'];
                        echo"<p>wartość zakupów: $wynik</p>";
                    }
                }
            ?>
        </div>
        <div id="prawy">
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia">
            <p>e-mail: <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a></p>
        </div>
    </main>
    <footer>
        <h4>Witrynę wykonał: numer zdającego</h4>
    </footer>
</body>
</html>