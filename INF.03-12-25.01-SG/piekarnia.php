<?php
$conn= new mysqli("localhost","root","","piekarnia");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
      <img src="wypieki.png" alt="Produkty naszej piekarni">
      <nav>
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
      </nav>
      <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
      </header>
      <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="piekarnia.php" method="post">
            <select name="rodzaj" id="rodzaj">
              <?php
              $sql = "SELECT DISTINCT Rodzaj FROM `wyroby` ORDER BY Rodzaj DESC;";
              $results =$conn->query($sql);
              $result= $results->fetch_all(MYSQLI_ASSOC);
              foreach ($result as $row) {
                  echo "<option value='{$row['Rodzaj']}'>{$row['Rodzaj']}</option>";
              }
              ?>
            </select>
            <button>Wybierz</button>
        </form>
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cema</th>
            </tr>
            <?php
            if(!isset($_POST['rodzaj']) || $_POST['rodzaj'] == null){
              $conn->close();
              return;
            }
            else{
              $sql= "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM `wyroby` WHERE Rodzaj = '{$_POST['rodzaj']}';";
              $results =$conn->query($sql);
              $result= $results->fetch_all(MYSQLI_ASSOC);
              foreach($result as $row){
                echo "
                <tr>
                  <td>{$row['Rodzaj']}</td>
                  <td>{$row['Nazwa']}</td>
                  <td>{$row['Gramatura']}</td>
                  <td>{$row['Cena']}</td>
                </tr>
                ";
              }
            }
            $conn->close()
            ?>
        </table>
      </main>
      <footer> 
        <p>AUTOR numer zdającego</p>
        <p>Data: 25.05.2025</p>
    </footer>
</body>
</html>
