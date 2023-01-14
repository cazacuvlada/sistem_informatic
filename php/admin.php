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

<div class="content">
    
    <h3 style=" position:relative; top:7vh; color:#820000; font-weight: bold;">Welcome Admin</h3>
    <a style=" position:relative; left:80vh;top:-8vh;cursor:pointer;font-size:3vh; color:#820000;text-decoration:none;" href="../php/homePage.php" class="btn"><i><b>Logout</i></b></a>
</div>
<div class="container_2 my-5">
    <h2 style="text-align:center;font-size: 4vh; "  >Sistem Informatic</h2>
    <a  style="color:#820000;background-color:#4E6C50; position:relative; left:6vh; top:15vh;"  class="btn btn-primary" href="../php/create_sistem.php" role="button">New Row</a>
    <br>
    <table style="position:relative; left:50vh; top:2vh;"  class="new_row" >
        <thead>
        <tr>
            <td>Id</td>
           
            <td style="position:relative;left:1vh;">Componenta</td>
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
        $sql = "SELECT * FROM componente_sistem";
        $result =mysqli_query($conn,$sql);
        if(!$result){
            die("Invalid query:".$conn->error);
        }
        //read data of each row
        while($row = $result->fetch_assoc()){
            echo " 
            <tr>
           <td>$row[id]</td>
            <td style='position:relative;left:1vh;'>$row[componente]</td>
            
            <td>
                <a style='color:#820000;background-color:#4E6C50;position:relative;left:1vh;' class= 'btn btn-primary  btn-sm' href='../php/edit_sistem.php?id=$row[id]'>Edit</a>
                <a  style='color:#820000;background-color:#4E6C50;position:relative;left:2vh;'  class= 'btn btn-danger btn-sm'  href='../php/delete_sistem.php?id=$row[id]'>Delete</a>

                </td>
           </tr>";
           }
        ?>
        </tbody>
    </table>
</div>
<div class="menu">
    <a style="position:relative;top:10vh;left:25vh;text-decoration:none;color:#F2DEBA;background-color:#820000;font-weight:bold;font-style:italic;" href="../menu/comportament.php">Comportamentul consumatorului</a>
    <a style="position:relative;top:10vh;left:35vh;text-decoration:none;color:#F2DEBA;background-color:#820000;font-weight:bold;font-style:italic;" href="../menu/factori.php">Factori</a>
    <a style="position:relative;top:10vh;left:45vh;text-decoration:none;color:#F2DEBA;background-color:#820000;font-weight:bold;font-style:italic;" href="../menu/analiza.php">Analiza consumatorului</a>
    <a style="position:relative;top:10vh;left:55vh;text-decoration:none;color:#F2DEBA;background-color:#820000;font-weight:bold;font-style:italic;" href="../menu/etape.php">Implicarea cumpărătorului în etapele procesului decizional</a>
</div>

</body>
</html>