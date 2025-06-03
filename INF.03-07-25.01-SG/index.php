<?php
$server='localhost';
$username='root';
$db="wykaz";
$haslo='';
$conn = mysqli_connect($server, $username, $haslo, $db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>
<body>
    <main>
    <header>
        <img src="baner.jpg" alt="Polska">
    </header>
        <section id="lewy1">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="index.php" method="post">
                <input type="text" name="miasto" id="miasto">
                <input type="submit" value="Szukaj">
            </form>
        </section>
        <section id="prawy">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <?php
            if(isset($_POST['miasto'])){
                $filtr = $_POST['miasto'];
                echo "<p>$filtr</p>";
                $sql = "SELECT miasta.nazwa as 'nazwa1', wojewodztwa.nazwa as 'nazwa2' FROM `miasta` LEFT JOIN wojewodztwa ON miasta.id_wojewodztwa=wojewodztwa.id WHERE miasta.nazwa LIKE '$filtr%' ORDER BY miasta.nazwa";
                $result=$conn->query($sql);
                $result= $result->fetch_all(MYSQLI_ASSOC);
                echo '
                <table>
                    <tr>
                        <th>Miasto</th>
                        <th>Województwo</th>
                    </tr>';
                        foreach($result as $row){
                            echo "<tr>";
                            echo "<td>".$row['nazwa1']."</td>";
                            echo "<td>".$row['nazwa2']."</td>";
                            echo "</tr>";
                        }
                echo'                    
                </table>';
            }
            $conn->close();
            ?>
        </section>
        <section id="lewy2">
            <p>Egzamin INF.03</p>
            <p>Autor: numer zdającego</p>
        </section>
    <footer></footer>
    </main>
</body>
</html>