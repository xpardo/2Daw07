
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        

        <?php

        //bd
        $cnf = include(__DIR__ . "/../config/database.php");


        //Assegureu-vos que els nostres paràmetres de cadena de consulta existeixen.
        if(isset($_GET['token']) && isset($_GET['user'])){
            $token = $_GET['token'];
            $userId = $_GET['user'];
            $query = mysqli_query($cnf,
            "SELECT * FROM user_token WHERE user_id = :user_id AND token = :token"
            );
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);



            if (mysqli_num_rows($query) > 0) {
                $row= mysqli_fetch_array($query);
                if($row['email_verified_at'] == NULL){
                    mysqli_query($cnf, "SELECT * FROM user_token WHERE user_id = :user_id AND token = :token");//consultar la tabla token per veure si existeix
                    $msg = "Felicitats! El vostre correu electrònic s'ha verificat.";
                    header("location:./index.php");
                }else{
                    $msg = "Ja has verificat el teu compte amb nosaltres";
                    header("location:./register.php");
                }
            } 

            
        } else{
        $msg = "Perill! Alguna cosa va malament.";
        }

        ?>
        <div class="container">
        
            <div class=" text-center">
            Activació del compte d'usuari 
            </div>
        
            <p><?php echo $msg; "<a href='https:index.php/'>home</a>"?></p>
            
        </div>


    </body>
</html>