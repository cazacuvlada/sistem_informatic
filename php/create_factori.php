<?php

$factori="";
$descriere="";
//create connection

@include '../php/config.php';

$conn = mysqli_connect('localhost','root','','sistem_informatic');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    $factori=$_POST["factori"];
    $descriere=$_POST["descriere"];
  do{
        if(empty($factori||empty($descriere))){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO factori(factori,descriere)
        VALUES ('$factori','$descriere' )";
        $result = mysqli_query($conn, $sql);
        # or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        #die(mysqli_error($analiz_econom_bucuria));
        #$result=$conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query:".$conn->error;
            break;
              }
       
              
           
              $factori="";
              $descriere="";
            


$successeMessage = "Row added correctly";
header("location:../menu/factori.php");
exit;

    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/info.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<title>Create a new row registration </title>
</head>
<body >
<div class="home-btn">
    <a href="../php/admin.php">Sistem informatic privind identificarea si prognozarea preferintelor consumatorilor</a>
</div>
<div class="home-btn">
    <a href="../menu/factori.php">Factori</a>
</div>
    <div class="container my-5">
        <h2 style="position:relative;">New Row</h2>
<?php
if(!empty($errorMessage)){
    echo"
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    
    ";
}


?>
        <form method="post">
       
            
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Factori</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="factori" value="<?php echo $factori; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Descriere</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="descriere" value="<?php echo $descriere; ?>">
</div>
            </div>
<?php
if(!empty($successeMessage)){
    echo"
    div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successeMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
    </div>
    </div>
    ";
    
}


?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button style="color:#820000;background-color:#4E6C50;;"type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a style="color:#820000;background-color:#4E6C50;" class="btn btn-outline-primary" href="../menu/factori.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>
