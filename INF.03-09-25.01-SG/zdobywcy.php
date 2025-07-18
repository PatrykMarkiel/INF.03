<?php 
$server="localhost";
$username="root";
$password="";
$database="zdobywcy";
$conn = mysqli_connect($server, $username, $password, $database);
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ZDOBYWCY GÓR</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Klub zdobywców gór polskich</h1>
        </header>

        <nav>
            <a href="kw1.png">kwerenda1</a>
            <a href="kw2.png">kwerenda2</a>
            <a href="kw3.png">kwerenda3</a>
            <a href="kw4.png">kwerenda4</a>
        </nav>

        <div id="lewy">
            <img src="logo.png" alt="logo zdobywcy">
            <h3>razem z nami:</h3>
            <ul>
                <li>wyjazdy</li>
                <li>szkolenia</li>
                <li>rekreacja</li>
                <li>wypoczynek</li>
                <li>wyzwania</li>
            </ul>
        </div>

        <main>
            <h2>Dołącz do naszego zespołu!</h2>
            <p>Wpisz swoje dane do formularza:</p>
            <form action="zdobywcy.php" method="post">
                <label for="nazwisko">Nazwisko:</label>
                <input type="text" id="nazwisko" name="nazwisko" required>

                <label for="imie">Imię:</label>
                <input type="text" id="imie" name="imie" required>

                <label for="funkcja">Funkcja:</label>
                <select id="funkcja" name="funkcja">
                    <option value="uczestnik">uczestnik</option>
                    <option value="przewodnik">przewodnik</option>
                    <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                    <option value="organizator">organizator</option>
                    <option value="ratownik">ratownik</option>
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <input type="submit" value="Dodaj">
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Nazwisko</th>
                        <th>Imię</th>
                        <th>Funkcja</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT nazwisko, imie, funkcja, email FROM `osoby`;';
                    $result = $conn->query($sql);
                    $result= $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($result as $row) {
                        echo "<tr>
                                <td>{$row['nazwisko']}</td>
                                <td>{$row['imie']}</td>
                                <td>{$row['funkcja']}</td>
                                <td>{$row['email']}</td>
                              </tr>";
                    }
                    if(isset($_POST['nazwisko']) && isset($_POST['imie']) && isset($_POST['funkcja']) && isset($_POST['email'])) {
                        $nazwisko = $_POST['nazwisko'];
                        $imie = $_POST['imie'];
                        $funkcja = $_POST['funkcja'];
                        $email = $_POST['email'];
                        $sql = "INSERT INTO `osoby`(`nazwisko`, `imie`, `funkcja`, `email`) VALUES ('$nazwisko','$imie','$funkcja','$email');";
                        $conn->query($sql);
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>

        </main>

        <footer>
            <p>Stronę wykonał: Numer zdającego</p>
        </footer>
    </body>
</html>