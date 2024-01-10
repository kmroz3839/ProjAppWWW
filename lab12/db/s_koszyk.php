<?php
    function addToCart($id, $count){
        foreach ($_SESSION['cart'] as $k => $cartentry){
            if ($cartentry[0] == $id){
                $_SESSION['cart'][$k][1] += $count;
                return;
            }
        }
        $_SESSION['cart'][] = [$id, $count];
    }
    function removeFromCart($id) {
        foreach ($_SESSION['cart'] as $k => $cartentry){
            if ($cartentry[0] == $id){
                if (--$_SESSION['cart'][$k][1] <= 0){
                    unset($_SESSION['cart'][$k]);
                }
            }
            return;
        }
    }

    function dbg_printCart(){
        return print_r($_SESSION['cart'], true);
    }

    function handleCartPost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['cart_add']) && isset($_GET['id'])) {
                addToCart($_GET['id'], $_POST['cart_count']);
            }
            elseif (isset($_POST['cart_wipe'])) {
                $_SESSION['cart'] = [];
            }
            elseif (isset($_POST['cart_add'])) {
                addToCart($_POST['cart_id'], 1);
            }
            elseif (isset($_POST['cart_remove'])) {
                removeFromCart($_POST['cart_id']);
            }
        }
    }

    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    handleCartPost();
?>