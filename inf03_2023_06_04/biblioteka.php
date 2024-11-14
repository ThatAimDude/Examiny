<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteka publiczna</title>
</head>
<body>

    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    
    <div class='row'>
        <section class='left'>


            <h3>Polecamy dzieła autorów</h3>


                    <ol>
                       
                            <?php
                            
                            $mysqli = new mysqli("localhost","root","","biblioteka");

            // Check connection
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }
                            
            $query = "SELECT imie, nazwisko FROM `autorzy` order by nazwisko ASC;" ;
            $result = $mysqli->query($query);           
                            
            while($row = $result->fetch_assoc()){
                echo "<li>" . $row['imie'] . $row['nazwisko'] . "</li>";
            }              
                            ?>
                     
                    </ol>


        </section>

        <section class='center'>
            <h3>ul. Czytelnicza 25, Książkowice Wielkie</h3>
            <p><a href='sekretariat@biblioteka.pl'>Napisz do nas</a></p>


            <img src='biblioteka.png' alt='książki'>

        </section>

        <div class='right-side'>
            <section class='right-upper'>
            
                <h3>Dodaj czytelnika</h3>

                <form method='POST' action=''>
                    <label> imie: <input type=text name ='imie'> </label>
                    <label> nazwisko: <input type=text name ='nazwisko'> </label>
                    <label> symbol: <input type=number name ='symbol'> </label>
                    <input type="submit" value="Dodaj" name = 'button'>
                </form>



             </section>

            <section class='right-lower'>
            

            <?php 
            
            $conn = new mysqli("localhost","root","","biblioteka");

            // Check connection
            if ($conn -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }

            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $symbol = $_POST['symbol'];
            $sql = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('$imie','$nazwisko', $symbol)";
            $conn->query($sql);
            // if(issset($_POST['button'])) {
            //     $conn->query($sql);
            // };
            echo "<p>Czytelnik $imie $nazwisko został(a) dodany do bazy danych</p>"

            ?>
            
            
            
            </section>
</div>
        
</div>

    <footer>
        <p>Projekt strony:Filip Zmurowski</p>
    </footer>

    
</body>
</html>