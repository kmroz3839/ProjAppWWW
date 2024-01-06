<?php
    function addToCart($id){
        $_SESSION['cart'][] = $id;
    }

    function dbg_printCart(){
        return print_r($_SESSION['cart'], true);
    }

    function handleCartPost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['cart_add']) && isset($_GET['id'])) {
                addToCart($_GET['id']);
            }
            elseif (isset($_POST['cart_wipe'])) {
                $_SESSION['cart'] = [];
            }
        }
    }

    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    handleCartPost();
?>