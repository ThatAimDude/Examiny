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
                            
                            $mysqli = new mysqli("localhost","my_user","","biblioteka");

            // Check connection
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }
                            
            $query = "SELECT imie, nazwisko from autorzy" ;
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

                <form method='post' action='biblioteka.php'>
                    <label> imie: <input type=text name ='imie'> </label>
                    <label> nazwisko: <input type=text name ='nazwisko'> </label>
                    <label> symbol: <input type=number name ='imie'> </label>
                    <input type="submit" value="Dodaj">


                    

                </form>



             </section>

            <section class='right-lower'>
            

            <?php 
            
            $mysqli = new mysqli("localhost","my_user","","biblioteka");

            // Check connection
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }
            ?>
            
            
            
            </section>
</div>
        
</div>

    <footer>
        <p>Projekt strony:00000000</p>
    </footer>

    
</body>
</html>