<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="kwiaciarnia"; 
    $conn = new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section id="baner">
        <h1>Grupa Polskich Kwiaciarni</h1>
    </section>
    <section id="main">
        <div id="lewy">
            <h2>Menu</h2>
            <ul>
                <li>
                    <a href="ndex.html">Strona główna</a>
                </li>
                <li>
                    <a href="https://www.kwiaty.pl/">Rozpoznaj kwiaty</a>
                </li>
                <li>
                    <a href="znajdz.php">Znajdź kwiaciarnię</a>
                    <ol>
                        <li>
                            w Warszawie
                        </li>
                        <li>
                            w Malborku
                        </li>
                        <li>
                            w Poznaniu  
                        </li>
                    </ol>
                </li>
    
            </ul>
        </div>
        <div id="prawy">
            <h2>Znajdź kwiaciarnie</h2>
            <form action="znajdz.php" method="POST">
                <label for="miasto"></label>
                <input name="miasto" id="miasto" type="text">
                <button type="submit">SPRAWDŹ</button>
            </form>
            <?php 
            if(isset($_POST['miasto']) && !empty($_POST['miasto'])){
                $miasto=$_POST['miasto'];
                $sql = "SELECT nazwa, ulica FROM `kwiaciarnie` WHERE miasto='$miasto'";
                $result=$conn->query($sql);
                $adresy=$result->fetch_all(MYSQLI_ASSOC);
                foreach($adresy as $adres){
                    echo"<p>{$adres['ulica']}, {$adres['nazwa']} </p>";
                }
            }
            $conn->close();
            ?>
        </div>
    </section>
    <footer>
        Stronę opracował:numer zdającego
    </footer>
</body>
</html>