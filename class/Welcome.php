<?php
  session_start();
  $con = mysqli_connect('localhost','root','');
  mysqli_select_db($con,'users');

  if(isset($_POST["add"])){
    if(isset($_SESSION["Welcome"])){

      $item_array_id = array_column($_SESSION["Welcome"],"item_id");

      if(!in_array($_GET["id"],$item_array_id)){
        $count = count($_SESSION("Welcome"));
        $item_array = array(
          'ItemID' => $_GET["id"],
          'ItemName' => $_POST["hidden_name"],
          'ItemPrice' => $_POST["hidden_price"],
          'ItemQuantity' => $_POST["quantity"],
        );
        $_SESSION["Welcome"][$count] = $item_array;
        echo '<script>window.location="Welcome.php"</script>';
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
      foreach ($_SESSION as $keys => $value) {
        if($value["ItemID"] == $_GET["id"]){
          unset($_SESSION["Welcome"][$keys]);
          echo '<script> alert("Product has been removed.") </script>';
        }
      }
    }
  }

?>

<html>
<head>
  <title> Place Your Order </title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
    *{
      font-family: 'Titillium Web', sans-serif;
    }
    .product{
      border: 1px solid #eaeaec;
      margin: -1px 19px 3px -1px;
      padding 10px;
      text-align: center;
      background-color: #efefef;
    }

    table, th, tr{
      text-align: center;
    }

    .title2{
      text-align: center;
      color: #66afe9;
      background-color: #efefef;
      padding: 2%;
    }
    h2{
      text-align: center;
      color: #66afe9;
      background-color: #efefef;
      padding: 2%;
    }

  table th{
    background-color: #efefef;
  }

  </style>

</head>
<body>
    <div class="container" style="width: 65%">
      <h2>Place Your Order</h2>
      <?php
        $query = "SELECT * FROM items WHERE ItemQuantity > 0";
        $result = mysqli_query($con,$query);
        $num = mysqli_num_rows($result);
        if( $num >0){
            while($row = mysqli_fetch_array($result)){
            ?>
            <div class="col-md-3">
              <form method="post" action="Welcome.php?action=add&id=<?php echo $row["ItemID"]; ?>">

                  <div class = "product">
                    <h4 class = "text-info"><?php echo $row["ItemName"]; ?></h4>
                    <h4 class="text-danger">Rs. <?php echo  $row["ItemPrice"]; ?></h4>
                    <input type = "text" name="quantity" class="form-control" value="1" >
                    <input type="hidden" name="hidden_name" value="<?php echo$row["ItemName"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo$row["ItemPrice"]; ?>">
                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                  </div>
                </form>
              </div>
            <?php
          }
        }
      ?>

      <div style="clear: both"></div>
      <br />
      <h3 class="title2"> Shopping Cart Details </h3>
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
              foreach ($_SESSION["Welcome"] as $key => $value) {
                // code...
                ?>
              <tr>
                <th><?php echo $value["ItemName"]; ?></th>
                <th><?php echo $value["ItemQuantity"]; ?></th>
                <th>$ <?php echo $value["ItemPrice"]; ?></th>
                <th><?php echo number_format($value["ItemQuantity"] * $value["ItemPrice"],2); ?> </th>
                <th> <a href="Welcome.php?action=delete&id=<?php echo $value["ItemID"]; ?>"><span class="text-danger">Remove Item</span></a></th>
              </tr>
              <?php
                $total = $total + ($value["ItemQuantity"] * $value["ItemPrice"]);
              }
               ?>
               <tr>
                 <th colspan="3" align="right">Total </th>
                 <th align="right"> $ <?php echo number_format($total,2); ?></th>
                 <th></th>
               </tr>
               <?php
             }
            ?>
          </table>
          </div>
    </div>




</body>
</html>
