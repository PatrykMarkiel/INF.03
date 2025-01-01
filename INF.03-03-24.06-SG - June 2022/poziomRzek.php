<?php
$server="localhost";
$user="root";
$password="";
$db="rzeki";
$conn = new mysqli($server, $user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <div id="h1">
            <img src="obraz1.png" alt="Mapa Polski">
        </div>
        <div id="h2">
            <h1>Rzeki w województwie
                dolnośląskim</h1>
        </div>
    </header>
    <main>
        <div id="menu">
            <form action="" method="post">
                <input type="radio" name="opcja" id="wszystkie" value="1">
                <label for="wszystkie">Wszystkie</label>

                <input type="radio" name="opcja" id="ostrzegawczy" value="2">
                <label for="ostrzegawczy">Ponad stan ostrzegawczy</label>

                <input type="radio" name="opcja" id="alarmowy" value="3">
                <label for="alarmowy">Ponad stan alarmowy</label>

                <button type="submit">pokaż</button>
                </select>
            </form>
        </div>
        <section>
            <div id="m1">
                <h3>Stany na dzień 2022-05-05</h3>
                <table>
                    <tr>
                        <td>Wodomierz</td>
                        <td>Rzeka</td>
                        <td>Ostrzegawczy</td>
                        <td>Alarmowy</td>
                        <td>Aktualny</td>
                    </tr>
                    <?php
                        if(isset($_POST["opcja"])){
                            $opcja=$_POST["opcja"];
                            switch($opcja){
                                case 1:
                                    $sql="SELECT nazwa,rzeka,stanOstrzegawczy,stanAlarmowy, pomiary.stanWody FROM `wodowskazy` LEFT JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id WHERE pomiary.dataPomiaru='2022-05-05';";
                                    break;
                                case 2:
                                    $sql="SELECT nazwa,rzeka,stanOstrzegawczy,stanAlarmowy, pomiary.stanWody FROM `wodowskazy` LEFT JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id WHERE pomiary.dataPomiaru='2022-05-05' AND pomiary.stanWody>stanOstrzegawczy;";
                                    break;
                                case 3:
                                    $sql="SELECT nazwa,rzeka,stanOstrzegawczy,stanAlarmowy, pomiary.stanWody FROM `wodowskazy` LEFT JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id WHERE pomiary.dataPomiaru='2022-05-05' AND pomiary.stanWody>stanAlarmowy;";
                            }
                            $result=$conn->query($sql);
                            $result->fetch_all(MYSQLI_ASSOC);
                            foreach($result as $rzeka){
                                echo"
                                    <tr>
                                    <td>{$rzeka['nazwa']}</td>
                                    <td>{$rzeka['rzeka']}</td>
                                    <td>{$rzeka['stanOstrzegawczy']}</td>
                                    <td>{$rzeka['stanAlarmowy']}</td>
                                    <td>{$rzeka['stanWody']}</td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </table>
            </div>
            <div id="m2">
                <h3>Informacje</h3>
                <ul>
                    <li>Brak ostrzeżeń o burzach z gradem</li>
                    <li>Smog w mieście Wrocław</li>
                    <li>Silny wiatr w Karkonoszach”</li>
                </ul>
                <h3>Średnie stany wód</h3>
                <?php
                $sql="SELECT dataPomiaru, AVG(stanWody) as 'stanWody' FROM `pomiary` GROUP BY (dataPomiaru);";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $result){
                    echo"<p>{$result['dataPomiaru']} : {$result['stanWody']}</p>";
                }
                $conn->close();
                ?>
                <img src="obraz2.jpg" alt="rzeka" id="obraz2">
            </div>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: numer zdającego</p>
    </footer>
</body>
</html>