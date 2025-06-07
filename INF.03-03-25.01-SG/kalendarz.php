<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="kalendarz";
$conn = mysqli_connect($servername, $username, $password, $db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>
            Dni, miesiące, lata...
        </h2>
    </header>
    <section id='napis'>
        <p>
            <?php
            $sql = "SELECT imieniny.data, imiona FROM imieniny WHERE imieniny.data = DATE_FORMAT(CURRENT_DATE, '%m-%d');";
            $result = $conn->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $data=date("D");
            if ($data == "Mon") {
                echo "Dzisiaj jest poniedziałek, ";
            } elseif ($data == "Tue") {
                echo "Dzisiaj jest wtorek, ";
            } elseif ($data == "Wed") {
                echo "Dzisiaj jest środa, ";
            } elseif ($data == "Thu") {
                echo "Dzisiaj jest czwartek, ";
            } elseif ($data == "Fri") {
                echo "Dzisiaj jest piątek, ";
            } elseif ($data == "Sat") {
                echo "Dzisiaj jest sobota, ";
            } else {
                echo "Dzisiaj jest niedziela, ";
            }
            echo date("d-m-Y").", ";
            $length = count($result);
            $i = 0;

            foreach ($result as $row) {
                echo $row['imiona'];
                if (++$i < $length) {
                    echo ", ";
                }
            }
            ?>
        </p>
    </section>
    <main>
 <section id="lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>
    <section id="srodkowy">
        <h2>Sprawdź kto ma urodziny</h2>

        <form action="kalendarz.php" method="post">
            <input type="date" name="data" min="2024-01-01" max="2024-12-31" id="data" required>
            <button>wyślij</button>
        </form>
        <?php
        if (isset($_POST['data'])) {
            $data = $_POST['data'];
            $data = date('m-d', strtotime($data));
            $sql = "SELECT imiona FROM imieniny WHERE imieniny.data = '$data';";
            echo "Dnia". $data. " są imieniny: ";
            $result = $conn->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $length = count($result);
            $i = 0;
            foreach ($result as $row) {
                echo $row['imiona'];
                if (++$i < $length) {
                    echo ", ";
                }
                $conn->close();
            }
        }
        ?>

    </section>
    <section id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank" rel="noopener noreferrer"><img src="kalendarz.gif" alt="Kalendarz majów"></a>
        <h2>Rodzaje Kalendarzy</h2>
        <ol>
            <li>słoneczny</li>
            <ul>
                <li>kalendarz Majów</li>
                <li>juliański</li>
                <li>gregoriański</li>
            </ul>
            <li>księżycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babiloński</li>
            </ul>
        </ol>
    </section>
    </main>
    <footer>Stronę opracował(a): Numer zdjącego</footer>
</body>
</html>