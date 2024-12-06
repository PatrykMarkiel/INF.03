<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="terminarz";
    $conn = new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <div id="lewy">
            <img src="logo1.png" alt="lipiec">
        </div>
        <div id="prawy">
            <span>najbliższe zadania:</span>
            <?php
            $sql="SELECT DISTINCT(wpis) FROM `zadania` WHERE wpis IS NOT NULL AND wpis !='' AND dataZadania BETWEEN '2020-07-01' AND '2020-07-07';";
            $result = $conn->query($sql);
            $wynik = $result->fetch_all(MYSQLI_ASSOC);
            foreach($wynik as $info){
                echo "<span>{$info['wpis']} ; </span>";
            }
        ?>
        </div>
    </header>
    <main>
    <?php
           $sql="SELECT dataZadania,wpis FROM `zadania` WHERE dataZadania like '%-07-%'; ";
           $result = $conn->query($sql);
           $wynik = $result->fetch_all(MYSQLI_ASSOC);
           foreach($wynik as $info){
            echo "
            <div id='kalendarz'>
                <h6>{$info['dataZadania']}</h6>
                <p>{$info['wpis']}</p>
            </div>";
           }
        $conn->close();
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: numer zdającego</p>
    </footer>
</body>
</html>