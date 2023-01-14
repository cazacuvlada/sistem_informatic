<?php
$id = "";
$influenta="";
$factori="";
$argumente="";

@include "../php/config.php";
$conn = mysqli_connect('localhost','root','','sistem_informatic');


$influenta="";
$factori="";
$argumente="";

if($_SERVER['REQUEST_METHOD']=='GET'){
if(!isset($_GET["id"])){
    header("location:../menu/comportament.php");
    exit;
}

$id = $_GET["id"];
//Get method : show the data of the client
//read the row of the selected client from db
$sql = "SELECT * FROM `comportament_consumator` WHERE id=$id";
$result =mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
if(!$row){
    header("location:../menu/comportament.php");
    exit;
}
   
    
   
}
else{
//post method: update the data of the client
$id = $_POST["id"];
$influenta=$_POST["influenta"];
$factori=$_POST["factori"];
$argumente=$_POST["argumente"];


 
    do{
        if(empty($influenta)||empty($factori)||empty($argumente)){
            $errorMessage = "All the fields are required";
            break;
        }
        $sql="UPDATE  `comportament_consumator`  ".
        "SET influenta = '$influenta' , factori= '$factori', argumente='$argumente' ".
        "WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $errorMessage="Invalid query:".$conn->error;
            break;
        }

        $successeMessage="Row update correctly";
        header("location:../menu/comportament.php");
        exit;
 }while(true);

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
<title>Edit  a  row  </title>
</head>
<body>
<div class="home-btn">
    <a href="../php/admin.php">Sistem informatic privind identificarea si prognozarea preferintelor consumatorilor</a>
</div>
<div class="home-btn">
    <a href="../menu/comportament.php">Comportamentul consumatorului</a>
</div>
<div class="container my-5">
        <h2 style="position:relative;">Edit the  Row</h2>
        
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
            <input type="hidden"  name="id" value="<?php echo $id?>">
         
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Influenta</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="influenta" value="<?php echo $influenta; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Factori</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="factori" value="<?php echo $factori; ?>">
</div>
            </div>
            <div class="row mb-3">
<label class="col-sm-3 col-form-label ">Argumente</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="argumente" value="<?php echo $argumente; ?>">
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
                    <button style="color:#820000;background-color:#4E6C50;"  type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="col-sm-3 d-grid">
    <a style="color:#820000;background-color:#4E6C50;" class="btn btn-outline-primary" href="../menu/comportament.php" role="button">Cancel</a>
</div>
            </div>
        </form>
    </div>
</body>
</head>
</html>
