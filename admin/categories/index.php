<?php 
include('../../connection/conn.php');
//header include
include_once('../../headfoot/header.php');



$statment = $pdo->prepare("SELECT * FROM `categories`");
$statment->execute();
$categories = $statment->fetchAll(PDO::FETCH_ASSOC);


?>



<!doctype html>
<html lang="en">

<head>
  <title>categories</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--buttun script-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <section style="margin-left: 5%;">
    <div style="margin-left: 1.5%;">
      <h3>Edit categorie</h3>
      <p>
        <a href="./create_categories.php" class="btn btn-success">ADD categorie</a>
      </p>
      <!-- On tables -->
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4"
      style="display: grid; grid-template-columns: auto auto auto auto; gap: 20px; margin-left: 5px; width: 99%">

      <?php foreach($categories as $i => $categorie): ?>
      <div class="col">
        <div class="card">
          <img src="./images/<?php echo $categorie['category_img']; ?>" class="card-img-top" style="width: 150px; height: 150px; display: block; margin-left: auto; margin-right: auto;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $categorie['category_name']?></h5>
            
            <form style="display: inline-block" method="post" action="./delete.php">
              <input type="hidden" name="id" value="<?php echo $categorie['category_id']; ?>">
              <button type="submit" id="<?php echo $categorie['category_id'];?>"
                class="btn btn-outline-danger">Delete</button>
            </form>
            <a href="./edit.php?id=<?php echo $categorie['category_id']?>" class="btn btn-outline-primary">Edit</a>
          </div>
        </div>
      </div>
      
      <?php endforeach ?>
    </div>
  </section>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>




<?php
//sidebar include 
include_once('../../headfoot/saidebar.php');
?>