<?php
    $server= "localhost";
    $user="root";
    $password="";
    $db="hodowla";
    $conn= new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="baner">
        <h1>Hodowla świnek morskich - zamów
            świnkowe maluszki</h1>
    </section>
    <section id="main">
        <section id="lewy">
            <div id="menu">
                <a href="peruwianka.php">Rasa Peruwianka</a>
                <a href="american.php">Rasa American</a>
                <a href="crested.php">Rasa Crested</a>
            </div>
            <div id="glowny">
                <img src="pliki/peruwianka.jpg" alt="Świnka morska rasy peruwianka">
                <?php
                    $sql="SELECT data_ur, miot, rasy.rasa FROM `swinki` LEFT JOIN rasy on rasy.id=swinki.rasy_id WHERE rasy.id=1;";
                    $result=$conn->query($sql);
                    $swinka=$result->fetch_assoc();
                    echo "<h2>Rasa: {$swinka['rasa']}</h2>
                          <p>Data urodzenia {$swinka['data_ur']}</p>
                          <p>Oznaczenie miotu: {$swinka['miot']}</p>";
                ?>
                <hr>
                <h2>Świnki w tym miocie</h2>
                <?php
                $sql="SELECT imie, cena, opis FROM `swinki` WHERE rasy_id=1;";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $swinka){
                    echo "<h3>{$swinka['imie']}-{$swinka['cena']} zł</h3>
                          <p>{$swinka['opis']}</p>";
                }
                ?>
            </div>
        </section>
        <section id="prawy">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                    <?php
                        $sql="SELECT rasa FROM `rasy` ;";
                        $result=$conn->query($sql);
                        $result->fetch_all(MYSQLI_ASSOC);
                        foreach($result as $swinka){
                            echo "<li>{$swinka['rasa']}</li>";
                        }
                        $conn->close();
                        ?>
            </ol>
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: numer zdającego</p>
    </footer>
</body>
</html>