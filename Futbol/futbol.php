<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="baner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>
    <div class="mecze">
    <?php
    $host = 'localhost';
    $uzytkownik = 'root';
    $haslo = '';
    $baza = 'egzamin';
    $conn = mysqli_connect($host, $uzytkownik, $haslo, $baza);
    $zapytanie = "SELECT zespol1, zespol2, wynik, data_rozgrywki from rozgrywka where zespol1 = 'EVG';";
    $wynik = $conn->query($zapytanie);
    while($row = $wynik -> fetch_array()) {
        echo "<div class='okno'>";
        echo "<h3>" . $row['zespol1'] . "-" . $row['zespol2'] . "</h3>";
        echo "<h4>" . $row['wynik'] . "</h4>";
        echo "<p>" . "w dniu:". $row['data_rozgrywki'] . "</p>";
        echo "</div>";
    }
    ?>
    </div>
    <div class="glowny">
        <h2>Reprezentacja Polski</h2>
    </div>
    <div class="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
        <form action="futbol.php" method="post">
            <input type="number" name="zawodnik">
            <input type="submit" value="Sprawdź">
        </form>
        <?php
        if(!empty($_POST["zawodnik"])) {
            $zawodnik = $_POST["zawodnik"];

            $zapytanie = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $zawodnik;";
            $wynik = $conn->query($zapytanie);

            echo "<ul>";
            while($row = $wynik -> fetch_array()) {
                echo "<li> $row[0] $row[1] </li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

    <div class="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: Marcel Szczypta</p>
    </div>
</body>
</html>