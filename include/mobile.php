<?php
include_once "header.php";
// require 'connect.php';

?>

<style>
  body
  {
    background:#eaedfe;
  }
</style>

           



<section class="cat_product_area section_gap my-5">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="latest_product_inner">
          <div class="row">
          <?php
  $sql = $pdo->prepare("SELECT * FROM products WHERE category_id=?");
  $sql->execute([$_GET['c_id']]); 
 
   while ($product = $sql->fetch())  { ?>
<div class="col-lg-4 col-md-6 my-5">
                <div class="single-product card pb-3">
                  <div class="product-img">
                    <a href="single-product.php?id=<?php echo $product['product_id'] ?>">
                      <img class="card-img" src="image/<?php echo $product['product_m_img'] ?>" style="height:200px" alt="" />
                    </a>
                    <div class="p_icon text-center">
                      <a href="single-product.php?id=<?php echo $product['product_id'] ?>">
                      <i class="fa-regular fa-eye" style="font-size:1.5em; color :#707bfb;"></i>
                      </a>
                      <a href="#">
                      <i class="fa-regular fa-heart" style="font-size:1.5em; color :#707bfb;"></i>
                      </a>
                      <a href="category.php?action=add_to_cart&page=index&quantity=1&size=25&pcid=<?php echo $product['product_id']; ?>&ucid=<?php echo $_SESSION['userLogin'] ?>&image=<?php echo $product['product_m_img'] ?>&name=<?php echo $product['product_name']  ?>&price=<?php echo $product['product_price'] ?>">
                      <!-- <a href="category.php?action=add_to_cart&page=index&quantity=1&size=25&pcid=<?php echo $product['product_id']; ?>&ucid=<?php echo $_SESSION['userLogin'] ?>"> -->
                      <i class="fa-solid fa-cart-arrow-down" style="font-size:1.5em; color :#707bfb;"></i>
                      </a>
                    </div>
                  </div>
                  <div class="product-btm text-center">
                    <a href="#" class="d-block">
                      <h4><?php echo $product['product_name'] ?></h4>
                    </a>
                    
                      <div class="mt-3">
                        <span class="mr-4"><?php echo $product['product_price']?> JOD</span>
                      </div>
                  </div>
                </div>
              </div>
              


      <?php } ?>
      </div>
          <nav aria-label="Page navigation example" class="mx-auto my-5">
            <ul class="pagination pg-blue justify-content-center">
              <li class="page-item"><a class="page-link">Previous</a></li>
              <li class="page-item"><a href="secondPage.php" class="page-link">1</a></li>
              <li class="page-item"><a href="secondPage.php" class="page-link">2</a></li>
              <li class="page-item"><a href="thirdPage.php" class="page-link">3</a></li>
              <li class="page-item"><a class="page-link">Next</a></li>
            </ul>
          </nav>

        </div>
      </div>
       <!-- ===============SIDE BAR ===================== -->
       <?php include("./sidebar.php") ?>
    </div>
  </div>
</section>
     
  <?php 
include "footer.php";
?>
  <!-- <div class="container mt-5 d-flex justify-content-center">;
    <div class="row row-cols-1 row-cols-md-4 g-4">;
     
      
     
      <div class="col-lg-4 col-md-6 my-5" >
          
      <div class="card" style="background:#f9f9f9">
    
      <img class="card-img-top" src="image/<?php echo $row['product_m_img'] ?>" alt="Card image">
     
       <div class="card-body">
          <h4 class="card-title text-center" style="color:black"><?php echo $row['product_name'] ?></h4>
          <p class="card-text text-center"style="color:black">$ <?php echo $row['product_price']?></p>
         
        </div>
        </div>
        </div>
      
  
        </div>
      </div> -->
