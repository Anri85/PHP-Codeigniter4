<?= $this->extend('e-commerce/Templates/template'); ?>

<?= $this->section('Content'); ?>

<?php include('Templates/topbar.php') ?>

<?php include('Templates/navbar.php') ?>

<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.php">
                        <img src="/img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- Breadcrumb Start -->
<!-- <div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Login & Register</li>
        </ul>
    </div>
</div> -->
<!-- Breadcrumb End -->

<?php include('Templates/login/login-user.php') ?>

<?php include('Templates/footer.php') ?>

<?php include('Templates/footer_bottom.php') ?>

<!-- Back to Top -->
<a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?= $this->endSection('Content'); ?>