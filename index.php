<?php require_once("cart.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php
            $catalog = Catalog::get_catalog();

            foreach($catalog as $code => $product) {
                echo "<input name='{$code}' value='0'>{$product['name']} | {$product['price']}</input>" . "<br>";
            }
        ?>
        <input type="submit">
    </form>
    <h2>Cart</h2>
    <hr>
    <?php
        $cart = new cart();
        foreach($_POST as $name => $value) {
            if($value > 0) {
                for($i = 0; $i < $value; $i++) {
                    $cart->add_to_cart($name);
                }
            }
        }

//        echo "<script>console.log(".json_encode(var_export($cart->cart, true)).");</script>";

        if(isset($cart->cart)) {
            foreach ($cart->cart as $code => $item) {
                echo "{$item['name']} | {$item['price']} | {$item['quantity']} " . "<br>";
            }


            echo "Total: " . $cart->get_total();
        }
    ?>
</body>
</html>