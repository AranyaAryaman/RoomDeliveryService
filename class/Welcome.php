<?php
  session_start();
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,'users');

  if(isset($_POST["add"])){
    if(isset($_SESSION["Welcome"])){

      $item_array_id = array_column($_SESSION["Welcome"],"ItemID");

      if(!in_array($_GET["id"],$item_array_id)){
        $count = count($_SESSION["Welcome"]);
        $item_array = array(
          'ItemID' => $_GET["id"],
          'ItemName' => $_POST["hidden_name"],
          'ItemPrice' => $_POST["hidden_price"],
          'ItemQuantity' => $_POST["quantity"],
        );
        $_SESSION["Welcome"][$count] = $item_array;
        // echo '<script>window.location="Welcome.php"</script>';
      }else{
        echo '<script>Product is already added to cart</script>';
        echo '<script>window.location="Welcome.php"></script>';
      }
    }

    else{
      $item_array = array(
        'ItemID' => $_GET["id"],
        'ItemName' => $_POST["hidden_name"],
        'ItemPrice' => $_POST["hidden_price"],
        'ItemQuantity' => $_POST["quantity"],
      );
      $_SESSION["Welcome"][0] = $item_array;
    }

  }

  if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
      foreach ($_SESSION["Welcome"] as $keys => $value) {

        if($value["ItemID"] == $_GET["id"]){
          unset($_SESSION["Welcome"][$keys]);
          echo '<script> alert("Product has been removed.") </script>';
          echo '<script>window.location="Welcome.php"</script>';
        }
      }
    }
  }

?>

<html>
<head>
  <title> Place Your Order </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
  <br />
    <div class="container" style="width:700px;">
      <h2 align="center">Place Your Order</h2>
      <?php
        $query = "SELECT * FROM items WHERE ItemQuantity > 0";
        $result = mysqli_query($con,$query);
        $num = mysqli_num_rows($result);
        if( $num >0){

            while($row = mysqli_fetch_array($result)){
            ?>
            <div class="col-md-4">
              <form method="post" action="Welcome.php?action=add&id=<?php echo $row["ItemID"]; ?>">

                  <div class = "product">
                    <h4 class = "text-info"><?php echo $row["ItemName"]; ?></h4>
                    <h4 class="text-danger">Rs. <?php echo  $row["ItemPrice"]; ?></h4>
                    <input type = "text" name="quantity" class="form-control" value="1" >
                    <input type="hidden" name="hidden_name" value="<?php echo$row["ItemName"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo$row["ItemPrice"]; ?>">
                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart" />
                  </div>
                </form>
              </div>
            <?php
          }
        }
      ?>

      <div style="clear: both"></div>
      <br />
      <h3> Shopping Cart Details </h3>
      <div class="table-responsive">
        <table class="table table-bordered">
        <tr>
          <th width="30%">Product Name</th>
          <th width="10%">Quantity</th>
          <th width="13%">Price Details</th>
          <th width="10%">Total Price</th>
          <th width="17%">Remove Item</th>
        </tr>

        <?php
            if(!empty($_SESSION["Welcome"])){
              $total = 0;
              foreach ($_SESSION["Welcome"] as $keys => $value) {
                // code...
                ?>
              <tr>
                <td><?php echo $value["ItemName"]; ?></td>
                <td><?php echo $value["ItemQuantity"]; ?></td>
                <td>Rs. <?php echo $value["ItemPrice"]; ?></td>
                <td><?php echo number_format($value["ItemQuantity"] * $value["ItemPrice"],2); ?> </td>
                <td> <a href="Welcome.php?action=delete&id=<?php echo $value["ItemID"]; ?>"><span class="text-danger">Remove Item</span></a></td>
              </tr>
              <?php
                $total = $total + ($value["ItemQuantity"] * $value["ItemPrice"]);
              }
               ?>
               <tr>
                 <td colspan="3" align="right">Total </td>
                 <td align="right"> Rs. <?php echo number_format($total,2); ?></td>
                 <td></td>
               </tr>
               <?php
             }
            ?>
          </table>
          </div>
    </div>
    <br />
</body>
</html>
