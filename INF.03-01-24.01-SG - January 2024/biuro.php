<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="podroze";
    $conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europęt</title>
    <link rel="stylesheet" href="styl9.css">
</head>
<body>
    <section class="banerFooter" id="baner">
        <h1>BIURO PODRÓŻY</h1>
    </section>
    <section id="srodek">
        <div class="boczny" id="lewy">
            <h2>Promocje</h2>
            <table>
                <tr>
                    <td>
                        Warszawa
                    </td>
                    <td>
                        od 600 zł
                    </td>
                </tr>
                <tr>
                    <td>
                        Wenecja
                    </td>
                    <td>
                        od 1200 zł
                    </td>
                </tr>
                <tr>
                    <td>
                        Paryż 
                    </td>
                    <td>
                        od 1200 zł
                    </td>
                </tr>
            </table>
        </div>
        <div id="srodkowy">
            <h2>W tym roku jedziemy do...</h2>
                <section>
                <?php
                    $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis;";
                    $result = $conn->query($sql);
                    $zdjecia = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($zdjecia as $zdjecie){
                        echo "<img  id='obraz' src='inf3_st24_pliki/{$zdjecie["nazwaPliku"]}' alt='{$zdjecie["podpis"]}' title='{$zdjecie["podpis"]}'>";
                    }
                    ?>
                </section>
        </div>
        <div class="boczny" id="prawy">
            <h2>Kontakt</h2>
            <a href="biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </div>
    </section>
    <section id="dane">
        <h3>W poprzednich latach byliśmy...</h3>
                <ol>
                <?php
                    $sql = "SELECT wycieczki.cel, wycieczki.dataWyjazdu FROM wycieczki WHERE wycieczki.dostepna = 0;";
                    $result = $conn->query($sql);
                    $wycieczki = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($wycieczki as $wycieczka){
                        echo "<li>Dnia {$wycieczka["dataWyjazdu"]} pojechaliśmy do {$wycieczka["cel"]} </li>";
                    }
                    $conn->close();
                    ?>
                </ol>
    </section>
    <section>
        <footer class="banerFooter">
            <p>Stronę wykonał: numer zdającego</p>
        </footer>
    </section>
</body>
</html>