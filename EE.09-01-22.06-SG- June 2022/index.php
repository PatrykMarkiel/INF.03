<?php
$server="localhost";
$user="root";
$password="";
$db="baza";
$conn=new mysqli($server,$user,$password,$db);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <main>
        <div id="m1">
            <img src="Avatar.png" alt="Użytkownik forum">
            <?php
            $sql="SELECT nick, postow, pytania.pytanie AS pytanie FROM `konta` LEFT JOIN pytania ON pytania.konta_id=konta.id WHERE konta.id=1";
            $result=$conn->query($sql);
            $result->fetch_all(MYSQLI_ASSOC);
            foreach($result as $result){
                echo "
                <h4>Użytkownik {$result['nick']}</h4>
                <p>{$result['postow']} postów na forum</p>
                <p>{$result['pytanie']}</p>
                ";
            }
            ?>
            <video id="videoPlayer" loop controls>
                <source src="Pliki/video.mp4">
            </video>
        </div>
        <div id="m2">
            <form action="" method="post">
                <textarea name="pole" id="pole" cols="40" rows="4"></textarea>
                <br>
                <button type="submit">Dodaj odpowiedź</button>
            </form>
            <?php
            if(isset($_POST['pole']) && !empty($_POST['pole'])){
                $pytanie=$_POST['pole'];
                $sql="INSERT INTO `odpowiedzi`(`Pytania_id`, `konta_id`, `odpowiedz`) VALUES ('1','5','$pytanie')";
                $conn->query($sql);
            }
            ?>
            <h2>Odpowiedzi na pytanie</h2>
            <ol>
                <?php
                $sql="SELECT odpowiedzi.id, odpowiedz, nick FROM odpowiedzi JOIN konta ON odpowiedzi.konta_id = konta.id WHERE odpowiedzi.Pytania_id = 1;";
                $result=$conn->query($sql);
                $result->fetch_all(MYSQLI_ASSOC);
                foreach($result as $result){
                    echo"<li>{$result['odpowiedz']} {$result['nick']}</li>";
                }

                ?>
            </ol>
        </div>
    </main>
    <footer>
        <p>Autor: numer zdającego <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a></p>
    </footer>
</body>
</html>