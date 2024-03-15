<?php

use Livewire\Attributes\Validate;

if(!isset($_SESSION['productItemsId'])){
    $_SESSION['productItemsId'] = [];
}

if(!isset($_SESSION['productItems'])){
    $_SESSION['productItems'] = [];
}

if(isset($_POST['addItem'])){
    $productId = Validator($_POST['product_id']);
    $quantity = Validator($_POST['quantity']);

    $checkProduct = mysqli_query($conn, "SELECT * FROM products WHERE id='$products LIMIT 1");
    if($checkProduct){
        if(mysqli_num_rows($checkProduct) > 0){

            $row = mysqli_fetch_assoc($checkProduct);
            if($row['quantity'] < $quantity){
                redirect('order_create', 'Only' .$row['$quantity']. 'quantity is available');
            }
            $productData = [
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'price' => $row['price'],
                'quantity' => $quantity
            ];

            if(!in_array($row['id'], $_SESSION['productItemsId'])){
                array_push($_SESSION['productItemsId'],$row['id']);
                array_push($_SESSION['productItems'],$productData);

            }else{

                foreach($_SESSION['productItems'] as $key => $prodSessionItem){
                    if($prodSessionItem['product_id'] ==  $row['id']){
                        $newQuantity = $prodSessionItem['quantity'] + $quantity;

                        $productData = [
                            'product_id' => $row['id'],
                            'name' => $row['name'],
                            'image' => $row['image'],
                            'price' => $row['price'],
                            'quantity' => $newQuantity
                        ];
                        $_SESSION['productItems'][$key] = $productData;
                    }
                }

            }
            redirect('order_create', 'Item added'.$row['name']);

        }else{
            redirect('order_create', 'No Such product found ');
        }
    }else{
        redirect('order_create', 'Something went wrong');

    }
}else{

}


?>