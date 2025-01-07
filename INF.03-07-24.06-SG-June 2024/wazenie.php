<?php
$server="localhost";
$user="root";
$password="";
$db="baza2";
$conn= new mysqli($server,$user,$password,$db);
ob_start();
header("Refresh:10");
$sql="INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5', FLOOR(1 + (RAND() * 10)),'DW12345',CURRENT_DATE,CURRENT_TIME);";
$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <div id="h1">
            <h1>Ważenie pojazdów we
                Wrocławiu</h1>
        </div>
        <div id="h2">
            <img src="obraz1.png" alt="waga">
        </div>
    </header>
    <main>
        <div id="m1">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    $sql="SELECT ulica FROM `lokalizacje` ;";
                    $result=$conn->query($sql);
                    $result->fetch_all(MYSQLI_ASSOC);
                    foreach($result as $result){
                        echo"
                        <li>ulica {$result['ulica']}</li>
                        ";
                    }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </div>
        <div id="m2">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <td>
                        rejestracja
                    </td>
                    <td>
                        ulica
                    </td>
                    <td>
                        waga
                    </td>
                    <td>
                        dzien
                    </td>
                    <td>
                        czas
                    </td>
                </tr>
                <?php
                $sql="SELECT rejestracja,waga,dzien,czas, lokalizacje.ulica AS ulica FROM `wagi`LEFT JOIN lokalizacje ON wagi.lokalizacje_id=lokalizacje.id  WHERE waga>=5;";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $result){
                    echo"
                        <tr>
                            <td>
                                {$result['rejestracja']}
                            </td>
                            <td>
                                {$result['ulica']}
                            </td>
                            <td>
                                {$result['waga']}
                            </td>
                            <td>
                                 {$result['dzien']}
                            </td>
                            <td>
                                {$result['czas']}
                            </td>
                        </tr>
                    ";
                }
                ?>
            </table>
            <?php
                $conn->close();
                ob_end_flush();
            ?>
        </div>
        <div id="m3">
            <img src="obraz2.jpg" alt="tir" id="obraz2">
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: numer zdającego</p>
    </footer>
</body>
</html>