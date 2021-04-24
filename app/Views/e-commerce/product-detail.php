<?= $this->extend('e-commerce/Templates/template'); ?>

<?= $this->section('Content'); ?>



<?php include('Templates/navbar.php') ?>

<?php include('Templates/bottom_bar.php') ?>

<!-- Breadcrumb Start -->
<!-- <div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
        </ul>
    </div>
</div> -->
<!-- Breadcrumb End -->

<?php include('Templates/product-detail/product-detail.php') ?>

<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            <div class="brand-item"><img src="/img/brand-1.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-2.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-3.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-4.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-5.png" alt=""></div>
            <div class="brand-item"><img src="/img/brand-6.png" alt=""></div>
        </div>
    </div>
</div>
<!-- Brand End -->

<?php include('Templates/footer.php') ?>

<?php include('Templates/footer_bottom.php') ?>

<!-- Back to Top -->
<a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?= $this->endSection('Content'); ?>