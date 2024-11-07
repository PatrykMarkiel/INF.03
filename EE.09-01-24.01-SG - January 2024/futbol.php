<?php
    $server = "localhost";
    $user = "root";
    $password ="";
    $db ="egzamin";
    $conn = new mysqli($server, $user, $password, $db);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="baner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="EE.09-01-24.01-SG-pliki/obraz1.jpg" alt="boisko">
    </section>
    <section id="wszystkie-mecze">
        <?php 
        $sql="SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG';";
        $result = $conn->query($sql);
         $mecze = $result->fetch_all(MYSQLI_ASSOC);
         foreach($mecze as $mecz){
            echo"
                <section id='mecze'>
                    <h3>{$mecz['zespol1']} - {$mecz['zespol2']}</h3>
                    <h4>{$mecz['wynik']}</h4>
                    <p>W dniu: {$mecz['data_rozgrywki']}</p>
                </section>";
         } 
        ?>
    </section>
    <section id="main">
        <h2 >Reprezentacja Polski</h2>
        <section id="main-content">
            <div id="lewy">
                <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form action="futbol.php" method="POST">
                    <input type="number" name="pozycja">
                    <button type="submit">Sprawdź</button>
                </form>
                <ul>
                    <?php
                    if (isset($_POST['pozycja']) && !empty($_POST['pozycja'])) {
                        $pozycja_id = (int)$_POST['pozycja'];

                        $sql = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = {$pozycja_id}";
                        $result = $conn->query($sql);
                        $zawodnicy = $result->fetch_all(MYSQLI_ASSOC);
                        foreach ($zawodnicy as $zawodnik) {
                             echo "
                            <li>
                                <p>{$zawodnik['imie']}</p>
                                <p>{$zawodnik['nazwisko']}</p>
                            </li>";
                        }
                    }
                    $conn->close();
                    ?>
                </ul>
            </div>
            <div id="prawy">
                <img src="EE.09-01-24.01-SG-pliki//zad1.png" alt="piłkarz">
                <p>Autor: number zdającego</p>
            </div>
        </section>
    </section>
</body>
</html>