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
            
                
                Product Name : <input class="fname" type="text" name="pname" placeholder="Product Name"> 
                Product Price : <input type="text" name="price" placeholder="Product Price">
                Product Description : <input type="text" name="des" placeholder="Product Description">
                Product Category : <input type="text" name="cate" placeholder="Product Category">
                
        </div>
        <button type="submit" href="/">Insert</button>
        <button type="submit" href="/" name="display">display</button>

      </form>
    </div>
    <?php
            if(isset($_REQUEST['display']))
            {
                $con=mysqli_connect('localhost','root','','product');
                $result=mysqli_query($con,"select * from product1");
                echo "<table border=2px>
                <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Product Category</th>
                <th>update</th>
                <th>delete</th>
                </tr>";
                while($r=mysqli_fetch_array($result))
                {
                    echo "<tr><td>$r[product_id]</td>
                     <td>$r[product_name]</td>
                     <td>$r[product_price]</td>
                     <td>$r[product_description]</td>
                     <td>$r[product_category]</td>
                     <td><a href=\"upd.php?id=$r[product_id]\">update</a></td>
                <td><a href=\"del.php?id=$r[product_id]\">delete</a></td>

                
                </tr>";

                }
            }
           
        ?>
    </table>
  </body>
</html>
<?php
    if(!empty($_REQUEST['pname'])&&($_REQUEST['price'])&&($_REQUEST['des'])&&($_REQUEST['cate']))
    {
        $con=mysqli_connect('localhost','root','','product');
        $pname=$_POST['pname'];
        $price=$_POST['price'];
        $des=$_POST['des'];
        $cate=$_POST['cate'];
        
        $sql="insert into product1 values('','$pname','$price','$des','$cate')";
        mysqli_query($con,$sql);
        echo "successfully inserted your record";
    }
    

?>