<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="biuro";
    $conn= new mysqli($server, $user, $password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <main>
        <div id="dane">
            <h3>Wycieczki, na które są wolne miejsca</h3>
            <ul>
                <?php
                $sql='SELECT id, dataWyjazdu, cel, cena FROM `wycieczki` WHERE dostepna=1;';
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $wycieczka){
                    echo "<li>{$wycieczka['id']}. dnia  {$wycieczka['dataWyjazdu']} jedziemy do  {$wycieczka['cel']}, cena  {$wycieczka['cena']}</li>";
                }
                ?>
            </ul>
        </div>
        <section id="mainDivs">
            <div id="lewy">
                <h2>Bestselery</h2>
                <table>
                    <tr>
                        <td>Wenecja</td>
                        <td>kwiecień</td>
                    </tr>
                    <tr>
                        <td>Londyn</td>
                        <td>lipiec</td>
                    </tr>
                    <tr>
                        <td>Rzym</td>
                        <td>wrzesień</td>
                    </tr>
                </table>
            </div>
            <div id="srodek">
                <h2>Nasze zdjęcia</h2>
                <?php
                $sql='SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis DESC;';
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $zdjecie){
                    echo"<img src='{$zdjecie['nazwaPliku']}' alt='{$zdjecie['podpis']}'>";
                }
                $conn->close();
                ?>
            </div>
            <div id="prawy">
                <h2>Skontaktuj się</h2>
                <a href="mailto:e-mail turysta@wycieczki.pl">napisz do nas</a>
                <p>telefon: 111222333</p>
            </div>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: numer zdającego</p>
    </footer>
</body>
</html>