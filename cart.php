<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body bg=brown>

<?php
    require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
								$total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₱<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>₱<?php
                            echo $total;
                            ?></h6><div class=\"col-md-6\">
							<a href="Method.html">PROCEED TO CHECKOUT</a>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	        <a href="index.php" class="previous">&#8249;</a>
        
 
<style>
	@import url("https://fonts.googleapis.com/css2?family=Lato&family=Nunito:wght@300&display=swap");
body {
    font-family: 'Nunito', sans-serif;
}

* > * {
    margin: 0%;
    padding: 0%;
}

.container {
    width: 80%;
    margin: auto;
}

@media screen and (max-width: 768px) {
    .container {
        width: 100%;
    }
}

.text-center {
    text-align: center;
}

.text-white {
    color: white;
}

.text-gray {
    color: #e9ecef;
}

.font-title {
    font-family: 'Lato', sans-serif;
}

/*          Cart.html           */
main#cart-main .site-title h1 {
    margin: 2em 0em;
}

main#cart-main .container > .grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 3fr 1fr;
    grid-template-columns: 3fr 1fr;
    margin: 0 2rem;
}

main#cart-main .container > .grid > .col-1 > .item {
    border-top: 1px solid #e9ecef;
    border-bottom: 1px solid #e9ecef;
    padding: 1.5em 3em;
}

main#cart-main .container > .grid > .col-1 > .item .img img {
    width: 60%;
}

main#cart-main .container > .grid > .col-1 > .item .buttons {
    margin-top: 1em;
}

main#cart-main .container > .grid > .col-1 > .item .buttons input {
    padding: .3rem .2rem;
    border: 1px solid #e9ecef;
    width: 20%;
    text-align: center;
}

main#cart-main .container > .grid > .col-1 > .item .buttons input:focus {
    outline: none;
}

main#cart-main .container > .grid > .col-1 > .item .buttons button {
    background-color: transparent;
    border: 1px solid #e9ecef;
    padding: .3em .3em;
    margin-bottom: .8rem;
}

main#cart-main .container > .grid > .col-1 > .item a {
    text-decoration: none;
    color: #fca311;
}

main#cart-main .container > .grid > .col-1 > .item .price {
    color: #ef476f;
}

main#cart-main .container > .grid > .col-2 .subtotal {
    border: 1px solid #e9ecef;
    padding: 1em 2.4em;
    margin: 0 2rem;
}

main#cart-main .container > .grid > .col-2 .subtotal > h3 {
    margin-bottom: 1rem;
}

main#cart-main .container > .grid > .col-2 .subtotal ul hr {
    border: 1px solid #e9ecef;
    margin: .3rem 0;
}

main#cart-main .container > .grid > .col-2 .subtotal ul li {
    padding: .2rem 0;
}

main#cart-main .flex {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}

main#cart-main .justify-content-between {
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

main#cart-main .text-red {
    color: #ef476f;
}
/*# sourceMappingURL=style.css.map */



	</style>

</body>
</html>
