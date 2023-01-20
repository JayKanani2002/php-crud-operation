<?php


$c = mysqli_connect('localhost', 'root', '', 'product');
if (!$c) {
    echo "database not connected";
}
$id = $_GET['id'];

$se = mysqli_query($c, "select * from product1 where product_id='$id'");
while ($row = mysqli_fetch_assoc($se)) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Product form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      justify-content: center;
      }
      h1 {
      margin: 0 0 20px;
      font-weight: 400;
      color: #1c87c9;
      
      }
      p {
      margin: 0 0 5px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #1c87c9;
      }
      form {
      padding: 25px;
      margin: 25px;
      box-shadow: 0 2px 5px #f5f5f5; 
      background: #f5f5f5; 
      
      }
      .fas {
      margin: 25px 10px 0;
      font-size: 72px;
      color: #fff;
      }
      .fa-envelope {
      transform: rotate(-20deg);
      }
      .fa-at , .fa-mail-bulk{
      transform: rotate(10deg);
      }
      input, textarea {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #1c87c9;
      outline: none;
      }
      input::placeholder {
      color: #666;
      }
      button {
      width: 100%;
      padding: 10px;
      border: 2px solid #fff;
      background: #1c87c9; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      button:hover {
      background: #2371a0;
      }    
      @media (min-width: 568px) {
      .main-block {
      flex-direction: row;
      }
      .left-part, form {
      width: 50%;
      }
      .fa-envelope {
      margin-top: 0;
      margin-left: 20%;
      }
      .fa-at {
      margin-top: -10%;
      margin-left: 65%;
      }
      .fa-mail-bulk {
      margin-top: 2%;
      margin-left: 28%;
      }
      }
    </style>
  </head>
  <body>
    <!-- <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div> -->
      <form action="" method="post">
        <h1>Product Detail Form </h1>
        <div class="info">
            
        
                Product id : <input class="fname" type="text" name="id" placeholder="Product id" value="<?php echo $row['product_id']?> ">          
                Product Name : <input class="fname" type="text" name="pname" placeholder="Product Name" value="<?php echo $row['product_name']?>"> 
                Product Price : <input type="text" name="price" placeholder="Product Price" value="<?php echo $row['product_price'] ?> ">
                Product Description : <input type="text" name="des" placeholder="Product Description" value="<?php echo $row['product_description']?> ">
                Product Category : <input type="text" name="cate" placeholder="Product Category" value="<?php echo $row['product_category']?> ">
                
        </div>
        <button type="submit" href="/" name="submit">submit</button>
        

      </form>
      </div>
      </body>
</html>
<?php


}
if(isset($_POST['submit'])) {
    
  $pname=$_POST['pname'];
  $price=$_POST['price'];
  $des=$_POST['des'];
  $cate=$_POST['cate'];

    $up = mysqli_query($c, "UPDATE  product1 SET product_name='$pname',product_price='$price',product_description='$des',product_category='$cate'  WHERE product_id=$id");

    if(!$up){
        echo "not updated";
    }else{
        echo "record updated";
    }
    echo "<button><a href='formdb.php'>back</a></button>";
}
?>