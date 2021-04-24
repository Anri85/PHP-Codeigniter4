<?= $this->extend('e-commerce/Templates/template'); ?>

<?= $this->section('Content'); ?>



<?php include('Templates/navbar.php') ?>

<?php include('Templates/bottom_bar.php') ?>

<?php include('Templates/home/main_slider.php') ?>

<?php include('Templates/home/sponsorship.php') ?>

<!-- Call to Action Start -->
<!-- <div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>call us for any queries</h1>
            </div>
            <div class="col-md-6">
                <a href="tel:0123456789">+012-345-6789</a>
            </div>
        </div>
    </div>
</div> -->
<!-- Call to Action End -->

<?php include('Templates/home/featured_produk.php') ?>

<!-- Newsletter Start -->
<!-- <div class="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Subscribe Our Newsletter</h1>
            </div>
            <div class="col-md-6">
                <div class="form">
                    <input type="email" value="Your email here">
                    <button>Submit</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Newsletter End -->

<?php include('Templates/home/recent_produk.php') ?>

<?php include('Templates/home/reviewer.php') ?>

<?php include('Templates/footer.php') ?>

<?php include('Templates/footer_bottom.php') ?>

<!-- Back to Top -->
<a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<?= $this->endSection('Content'); ?>