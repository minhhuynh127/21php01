<?php
    include 'model/model.php';
    class Controller extends Model {
        function handleRequest() {
            $action = $_GET['action'];
            switch ($action) {
                case 'home':
                    echo '<br>';
                    echo '<h3 class="text-success">Welcome to the Store</h3>';
                    break;
                case 'product':
                    $this->getProducts();
                    include 'view/products.php';
                    break;
                case 'selling':
                    $this->getSelling();
                    include 'view/selling.php';
                    break;    
                case 'cart':
                    $this->getCart();
                    include 'view/cart.php';
                    break;        
            }
        }
    }