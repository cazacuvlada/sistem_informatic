<?php
$necesitati_cumparare="";
$elemente="";
$individ="";
$mediu="";
//create connection

@include '../php/config.php';

$conn = mysqli_connect('localhost','root','','sistem_informatic');

$errorMessage="";
$successeMessage ="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $necesitati_cumparare=$_POST["necesitati_cumparare"];
    $elemente=$_POST["elemente"];
    $individ=$_POST["individ"];
    $mediu=$_POST["mediu"];
  do{
        if(empty($necesitati_cumparare)||empty($elemente)||empty($individ)||empty($mediu)){
            $errorMessage = "All the fields are required";
            break;
        }
       
        //add a new book to DB
        $sql = "INSERT INTO analiza_consumatorului(necesitati_cumparare,elemente,individ,mediu)
        VALUES ('$necesitati_cumparare','$elemente','$individ','$mediu' )";
        $result = mysqli_query($conn, $sql);
        # or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        #die(mysqli_error($analiz_econom_bucuria));
        #$result=$conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query:".$conn->error;
            break;
              }
       
              $necesitati_cumparare="";
              $elemente="";
              $individ="";
              $mediu="";


$successeMessage = "Row added correctly";
header("location:../menu/analiza.php");
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
    <a href="../menu/analiza.php">Analiza consumatorului</a>
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
<label class="col-sm-3 col-form-label ">Necesitatile consumatorului</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="necesitati_cumparare" value="<?php echo $necesitati_cumparare; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Elemente</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="elemente" value="<?php echo $elemente; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Individ</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="individ" value="<?php echo $individ; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Mediu</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="mediu" value="<?php echo $mediu; ?>">
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
    <a style="color:#820000;background-color:#4E6C50;" class="btn btn-outline-primary" href="../menu/analiza.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>
