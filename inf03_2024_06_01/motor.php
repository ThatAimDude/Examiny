<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Motocykle</title>
</head>

    <img src="motor.png" id="motor" alt="motor">
<body>
    
    <header><h1>Motocykle - moja pasja</h1></header>

    <main>

        <section class="left">
            <h2>Gdzie pojechać?</h2>
            <dl id="definition-list">

                <?php
                $conn = new mysqli("localhost","root","","motory");

                // Check connection
                if ($conn -> connect_errno) {
                  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                  exit();
                }
                
                $sql = "SELECT w.nazwa, w.opis, w.poczatek, zdjecia.zrodlo, w.opis FROM `wycieczki` as w join zdjecia on w.zdjecia_id = zdjecia.id;";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<dt>" . htmlspecialchars($row['nazwa']) . 
                         ", rozpoczyna się w " . htmlspecialchars($row['poczatek']) . 
                         ", <a href='http://localhost/Examiny/inf03_2024_06_01/zdjecia/" . 
                         htmlspecialchars($row["zrodlo"]) . ".jpeg'>zobacz zdjęcie</a></dt>";
                    echo "<dd>" . htmlspecialchars($row['opis']) . "</dd>";
                };
                ?>



            </dl>
           
        </section>

        <section class="right-container">
        <section class="right-upper">

            <h2>Co kupić?</h2>

            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section class="right-lower">
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek <?php 
            
            $conn = new mysqli("localhost","root","","motory");
            if ($conn -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
              }

             
              $result = $conn->query("SELECT COUNT(id) as total FROM `wycieczki`");
              $row = $result->fetch_assoc();
              echo $row["total"];
              
              $conn->close();

            
            ?></p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>
    </section>
    </main>

    <footer><p>Stronę wykonał:</p></footer>


</body>
</html>