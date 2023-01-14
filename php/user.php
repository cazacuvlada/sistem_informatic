<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UserPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/info.css">
</head>
<body>
<div class="home-btn">
    <a href="../php/user.php">Sistem informatic privind identificarea si prognozarea preferintelor consumatorilor</a>
</div>
<div class="content">
    
    <h3 style=" position:relative; top:7vh; color:#820000; font-weight: bold;">Welcome User</h3>
    <a style=" position:relative; left:80vh;top:-8vh;cursor:pointer;font-size:3vh;color:#820000;text-decoration:none;" href="../php/homePage.php" class="btn"><i><b>Logout</i></b></a>
</div>
<div class="container_2 my-5">
    <h2 style="text-align:center;font-size: 4vh;"  >Sistem Informatic</h2>
    <br>
    <table style="position:absolute; left:3vh; top:40vh; font-style: italic; font-weight: bold;"  class="new_row" >
        <thead>
        <tr>
            <td>Componenta</td>
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
            <td>$row[componente]</td>
            <td>
                </td>
           </tr>";
           }
        ?>
        </tbody>
    </table>
</div>
<div class="images">
    <img  style=" width:auto;height:114vh;"src="../images/sistem2.jpg">
</div>
<div   style="position:relative;top:-70vh;"class="user_info">
    <p style="font-weight:bold;">Toţi specialiştii recunosc că, în fapt, 
    comportamentul consumatorului nu se poate explica,
decât prin cunoaşterea sistemului de factori ce acţionează în strânsă legătură şi intercondiţionare
reciprocă, dar modul în care acţionează şi mai ales locul şi rolul pe care aceştia le au în sistem
sunt privite în mod diferit şi de aceea întâlnim în literatura de specialitate diferite clasificări ale
acestor factori. </p>
<h4 style="text-align:center;font-weight:bold;">Factorii care influenteaza consumatorul:</h4>
<ul style="font-weight:bold;">
            <li>factori culturali – reprezentaţi de: cultura, subcultura şi clasa socială;</li>
            <li>factori sociali – care includ: grupuri de referinţă, familie, roluri şi statusuri; </li>
            <li>factori personali – care se referă la: vârsta şi stadiul din ciclul de viaţă, ocupaţia, stilul
de viaţă, circumstanţele economice, personalitatea şi părerea despre sine;</li>
            <li>factori psihologici – desemnaţi prin: motivaţie, percepţie, învăţare, convingeri şi
atitudini. </li>
            <li>factori individuali ai comportamentului consumatorului, care includ: nevoile şi
motivaţiile, personalitatea şi imaginea despre sine, stilul de viaţă, atitudinile şi preferinţele;</li>
        </ul>

        <h3 style="text-align:center;font-weight:bold;">Analiza sistemului de factori care influenţează comportamentul consumatorului individual </h3>
        <img  style="height:30vh;position:relative;left:75vh;"src="../images/schema.jpg">
</div>

</body>
</html>