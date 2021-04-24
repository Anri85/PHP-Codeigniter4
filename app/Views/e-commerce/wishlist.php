<?= $this->extend('e-commerce/Templates/template'); ?>

<?= $this->section('Content'); ?>



<?php include('Templates/navbar.php') ?>

<?php include('Templates/bottom_bar.php') ?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/Product_List">Products</a></li>
            <li class="breadcrumb-item"><a href="/Cart">Cart</a></li>
            <li class="breadcrumb-item"><a href="/Checkout">Checkout</a></li>
            <li class="breadcrumb-item"><a href="/MyAccount">My Account</a></li>
            <li class="breadcrumb-item active">Wishlist</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<?php include('Templates/wishlist/wishlist.php') ?>

<?php include('Templates/footer.php') ?>

<?php include('Templates/footer_bottom.php') ?>

<!-- Back to Top -->
<a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?= $this->endSection('Content'); ?>