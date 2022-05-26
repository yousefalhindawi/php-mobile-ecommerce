
<?php
 if(isset($_POST['orders'])) {
    $id = $_SESSION['userLogin'];
    // SELECT * FROM users JOIN users_cart ON users.user_id = users_cart.user_id WHERE users.user_id = $id;
      $sql = "SELECT * FROM orders  JOIN users ON orders.user_id = users.user_id WHERE orders.user_id = $id ;";
      $stat = $pdo->query($sql);
      $order = $stat->fetchAll();
  
      $coun = $stat->rowCount();
  if ($coun === 0 ){
  echo '<div class="container-fluid  mt-100">
  <div class="row">
  
  <div class="col-md-12">
  
  <div class="card">
    <div class="card-header">
        <h5>Cart</h5>
    </div>
    <div class="card-body cart">
        <div class="col-sm-12 empty-cart-cls text-center">
            <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
            <h3><strong>Your order is Empty</strong></h3>
            <h4>Add order to make me happy:)</h4>
            <a href="#" class="btn btn-primary cart-btn-transform m-3" data-abc="true" style="background-color: #717ce8;">continue shopping</a>
  
  
        </div>
    </div>
  </div>
  
  
  </div>
  
  </div>
  
  </div>';
  }else {
       ?>
  <div class="container">
          <h3>Your order</h3>
          <br>
          <table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th scope="col">Name </th>
                      <th scope="col">Email</th>
                      <th scope="col">Address </th>
                      <th scope="col">Phone</th>
                      <th scope="col">Total</th>
                      <th scope="col">Details</th>
                  </tr>
              </thead>
              <tbody>
                     <?php
               
                foreach($order as $value):
                 
  
                  ?>
                  
                      <tr scope="row">
                      <td> <?php  echo  $value['user_name']; ?></td>
                          <td> <?php  echo  $value['user_email'] ; ?></td>
                          <td><?php echo   $value['order_address']; ?></td>
                          <td> <?php  echo '(+962)'.$value['phone_number'] ; ?></td>
                          <td><?php echo   $value['order_total_amount']; ?></td>
                          <td>
                              <form action = "order-history.php" method="POST">
                                  <input type="hidden" name="order_date" value="<?php echo $value['order_date']; ?>"/>
                                  <button type="submit" name="historysubmit" class="btn btn-primary">More Details</button>
                
                              </form>
                          </td>
                            
                      </tr>     <?php
                     endforeach;
                  }}?>
              </tbody>
            </table>
  </div>
                 
                
    
