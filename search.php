<?php
// $connection = mysqli_connect("localhost", "root", "", "ecommerce");
require_once("./header.php");

?>

<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content d-md-flex justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
          <h2>Shop Category</h2>
          <p>Very us move be blessed multiply night</p>
        </div>
        <div class="page_link">
          <a href="index.php">Home</a>
          <a href="category.php">Shop</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">
    <div class="row flex-row-reverse">
      <div class="col-lg-9">


        <div class="latest_product_inner">
          <div class="row">
            <?php

            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $sqlSearch = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
              $stmt = $pdo->query($sqlSearch);
              // $stmt->execute([""]);
              // $search_query = mysqli_query($connection, $query);
              if (!$stmt) {
                die("QUERY FAILED" . $stmt->errorInfo()); //just to check if its work

              }
              $resultCount = $stmt->rowCount();
              // echo $resultCount;
              if ($resultCount == 0) {
                echo "<h1>No Result!</h1>";
              } else {
                while ($resultSearch = $stmt->fetch()) {
                  $product_id = $resultSearch['product_id'];
                  $product_name = $resultSearch['product_name'];
                  $product_description = $resultSearch['product_description'];
                  $product_m_img = $resultSearch['product_m_img'];
                  $product_price = $resultSearch['product_price'];
                  // $product_price_on_sale = $resultSearch['product_price_on_sale'] ?? null;
                  // $sale_status = $resultSearch['sale_status'] ?? null;







            ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="single-product card">
                      <div class="product-img ">
                        <a href="single-product.php?id=<?php echo $product_id; ?>">
                          <img class="card-img" src="./admin/product/images/<?php echo $product_m_img ?>" style="height:200px" alt="product_img" />
                          <!-- <img class="card-img" src="./logo2.png" alt="product_img" /> -->
                        </a>
                        <div class="p_icon">
                        <a href="single-product.php?id=<?php echo $product_id; ?>">
                      <i class="fa-regular fa-eye" style="font-size:1.5em;"></i>
                          </a>
                          <a href="#">
                          <i class="fa-regular fa-heart" style="font-size:1.5em;"></i>
                          </a>
                          <form method="POST" action="" class = "d-inline">
                    <input type="hidden" name="action" value="add_to_cart">
                    <input type="hidden" name="page" value="index">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="color" value="black">
                    <input type="hidden" name="pcid" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="ucid" value="<?php echo $_SESSION['userLogin'] ?>">
                    <input type="hidden" name="image" value="<?php echo $product_m_img ?>">
                    <input type="hidden" name="name" value="<?php echo $product_name ?>">
                    <input type="hidden" name="price" value="<?php echo $product_price ?>">
                    <input type="hidden" name="addlog" value="addalert">
                    <button type="submit" name="addlog" value="addalert"><i class="fa-solid fa-cart-arrow-down" style="font-size:1.5em;"></i></button>
                    
                  </form>
                    
                        </div>
                      </div>
                      <div class="product-btm text-center">
                        <a href="#" class="d-block">
                          <h4><?php echo $product_name ?></h4>
                        </a>
                        <div class="mt-3 text-center">
                          <span class=""><?php echo $product_price . "JOD" ?></span>
                          <!-- <del><?php echo  "JOD" ?></del> -->
                        </div>
                      </div>
                    </div>
                  </div>
            <?php    }
              }
            } ?>
          </div>

        </div>
      </div>

      <!-- ===============SIDE BAR ===================== -->
      <?php include("./sidebar.php") ?>
    </div>
  </div>
</section>
<!--================End Category Product Area =================-->

<!--================ start footer Area  =================-->
<?php include("./footer.php") ?>