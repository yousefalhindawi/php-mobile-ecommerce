<?php 
include_once('../../connection/conn.php');
//header include
include_once('../../headfoot/header.php');



$id = $_GET['id'] ?? null;
if(!$id) {
    header('location: index.php');
    exit;
}
$statment = $pdo->prepare('SELECT * FROM admins WHERE admin_id = :id');
$statment->bindvalue(':id', $id);
$statment->execute();
$admins = $statment->fetchAll(PDO::FETCH_ASSOC);

    //print_r($admins);
    $admin_name = $admins[0]['admin_name'];
    $admin_email = $admins[0]['admin_email'];
    $admin_password = $admins[0]['admin_password'];
  
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
      
    
      
          $statment = $pdo->prepare("UPDATE `admins` SET `admin_name` = :admin_name, 
                                      `admin_email` = :admin_email, `admin_password` = :admin_password  WHERE admin_id = :id");
          $statment->bindValue(':admin_name', $admin_name);
          $statment->bindValue(':admin_email', $admin_email);
          $statment->bindValue(':admin_password', $admin_password);
          $statment->bindValue(':id', $id);

          $statment->execute();
          header("location: index.php");
          }
      
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</head>

<body>
    <section style="margin-left: 4%;">

        <form method="post" style="margin-left: 2%; margin-right: 2%" enctype="multipart/form-data">

        <div class="form-group">
            <label>admin name</label>
            <input type="text" class="form-control" name="admin_name" value = "<?php echo $admins[0]['admin_name']?>">
        </div>
        <div class="form-group">
            <label>admin email</label>
            <input type="email" class="form-control" name="admin_email" value = "<?php echo $admins[0]['admin_email']?>">
        </div>
        <div class="form-group">
            <label>admin password</label>
            <input type="password" class="form-control" name="admin_password" value = "<?php echo $admins[0]['admin_password']?>">
        </div>
        <button type="submit" class="btn btn-primary">update</button>
        <a href="./index.php" class="btn btn-primary">admin Page</a>
        </form>
    </section>

</body>

</html>
<?php

//sidebar include 
include_once('../../headfoot/saidebar.php');

?>