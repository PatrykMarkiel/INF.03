<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="psy";
    $conn= new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <main>
        <div id="lewy">
            <img src="obraz.jpg" alt="foksterier">
        </div>
        <div id="prawy">
            <div id="pGorny">
                <br>
                <h2>Zapisz się</h2>
                <form action="login.php" method="post">
                    <label for="login">login:</label>
                    <input type="text" name="login">
                    <br>
                    <label for="haslo">hasło:</label>
                    <input type="password" name="haslo">
                    <br>
                    <label for="haslo2"> powtórz hasło:</label>
                    <input type="password" name="haslo2">
                    <br>
                    <button type="submit">Zapisz</button>
                </form>
                <!--Skrypt1-->
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(!empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['haslo2'])){
                            $login = $_POST['login'];
                            $haslo = $_POST['haslo'];
                            $haslo2 = $_POST['haslo2'];
                            $sql="SELECT login FROM uzytkownicy where login='$login'";
                            $result=$conn->query($sql);
                            if($result->num_rows<1){
                                if($haslo==$haslo2){
                                    $haslo=sha1($haslo);
                                    $sql="INSERT INTO `uzytkownicy`(`login`, `haslo`) VALUES ('$login', '$haslo')";
                                    $conn->execute_query($sql);
                                    echo"<p>konto zostało dodane</P>";
                                }
                                else{
                                    echo"<p>hasła nie są takie same, konto nie zostało dodane</P>";
                                }
                            }
                            else{
                                echo"<p>login występuje w bazie danych, konto nie zostało dodane</P>";
                            }

                        }
                        else{
        
                            echo"<p>wypełnij wszystkie pola</P>";
                        }
                }
                $conn->close();
                ?>
            </div>
            <div id="pDolny">
                <br>
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właściceli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </div>
        </div>
    </main>
    <footer>numer zdającego</footer>
</body>
</html>