<?php
$server='localhost';
$user='root';
$password='';
$db='kino';
$conn = new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Za rogiem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="baner.jpg" alt="baner">
    </header>
    <main>
        <div id="lewy">
            <ul>
                <li><a href="index.html">Strona główna</a></li>
            </ul>
            <hr>
            <form action="rezerwacje.php" method="post">
                <label>Data i godzina seansu</label>
                <br>
                <input type="date" id="data" name="data">
                <input type="time" id="time" name="time">
                <button type="submit">Pokaż</button>
            </form>
        </div>
        <div id="prawy">
            <?php
            if (!empty($_POST['data']) && !empty($_POST['time'])) {
                $data = $_POST['data'];
                $time = $_POST['time'];

                echo "<p>EKRAN</p><br>";
                echo "<div id='tabelka'><table>";
                $sql = "SELECT Rzad, Miejsce FROM `rezerwacje` WHERE Data = '$data' AND Godzina = '$time'";
                $result = $conn->query($sql);

                $zarezerwowane = [];
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        $zarezerwowane[$row['Rzad']][] = $row['Miejsce'];
                    }
                }
                for ($rzad = 1; $rzad <= 15; $rzad++) {
                    echo "<tr><th>$rzad</th>";
                    for ($miejsce = 1; $miejsce <= 20; $miejsce++) {
                        $class = in_array($miejsce, $zarezerwowane[$rzad] ?? []) ? 'zajente' : 'wolne';
                        echo "<td class='$class'>$miejsce</td>";
                    }
                    echo "</tr>";
                }
                echo "</table></div>";
            }
            $conn->close();
            ?>
            </div>
        </div>
    </main>
    <footer>
        <h5>Egzamin INF.03 - AUTOR: numer zdającego</h5>
    </footer>
</body>
</html>