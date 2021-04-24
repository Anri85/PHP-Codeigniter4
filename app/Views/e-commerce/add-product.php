<?= $this->extend('e-commerce/Templates/template'); ?>

<?= $this->section('Content'); ?>

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

<?php include('Templates/my-account/add-product.php') ?>

<?php include('Templates/footer.php') ?>

<?php include('Templates/footer_bottom.php') ?>

<!-- Back to Top -->
<a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?= $this->endSection('Content'); ?>