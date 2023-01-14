<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/info.css">
</head>
<body>

<div class="home-btn">
    <a href="../php/admin.php">Sistem informatic privind identificarea si prognozarea preferintelor consumatorilor</a>
</div>
<div class="container_2 my-5">
    <h2 style="text-align:center;font-size: 4vh; "  >Analiza cosumatorului</h2>
    <a  style="color:#820000;background-color:#4E6C50; position:relative; left:6vh;"  class="btn btn-primary" href="../php/create_analiza.php" role="button">New Row</a>
    <br>
    <table style="position:relative; left:5vh; top:2vh;"  class="new_row" >
        <thead>
        <tr>
            <td>Id</td>
            <td style='position:relative;left:3vh;'>Necesitatile consumatorului</td>
            <td style='position:relative;left:3vh;'>Elemente</td>
            <td style='position:relative;left:3vh;'>Preferintele interne</td>
            <td style='position:relative;left:3vh;'>Preferintele externe</td>
        </tr>
        </thead>
        <tbody>
        <?php

        @include '../php/config.php';
        //check connection to db
        if($conn->connect_error){
            die("Connection failed:".$conn->connect_error);
        }
        //read all row from db table
        $sql = "SELECT * FROM analiza_consumatorului";
        $result =mysqli_query($conn,$sql);
        if(!$result){
            die("Invalid query:".$conn->error);
        }
        //read data of each row
        while($row = $result->fetch_assoc()){
            echo " 
            <tr>
           <td>$row[id]</td>
           <td style='position:relative;left:2vh;' >$row[necesitati_cumparare]</td>
           <td  style='position:relative;left:3vh;'>$row[elemente]</td>
           <td style='position:relative;left:4vh;'>$row[individ]</td>
           <td style='position:relative;left:5vh;'>$row[mediu]</td>
            
            <td>
                <a style='color:#820000;background-color:#4E6C50;position:relative;left:4vh;' class= 'btn btn-primary  btn-sm' href='../php/edit_analiza.php?id=$row[id]'>Edit</a>
                <a  style='color:#820000;background-color:#4E6C50;position:relative;left:5vh;'  class= 'btn btn-danger btn-sm'  href='../php/delete_analiza.php?id=$row[id]'>Delete</a>

                </td>
           </tr>";
           }
        ?>
        </tbody>
    </table>
</div>


</body>
</html>