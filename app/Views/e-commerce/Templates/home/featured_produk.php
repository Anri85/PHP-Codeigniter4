<!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-primary" role="alert">
                <p class="text-center"><?= session()->getFlashdata('pesan'); ?></p>
            </div>
        <?php endif ?>
        <div class="section-header">
            <h1>Featured Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            <?php foreach ($produk as $p) : ?>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href=""><?= $p['Nama_Produk']; ?></a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                <img src="/img/<?= $p['Gambar_Produk']; ?>" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="/Cart/cart/<?= $p['ID']; ?>"><i class="fa fa-cart-plus"></i></a>
                                <a href="/Wishlist/<?= $p['ID']; ?>"><i class="fa fa-heart"></i></a>
                                <a href="/Product_Detail/<?= $p['ID']; ?>/<?= $p['Kategori_Produk']; ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><span>Rp.</span><?= $p['Harga_Produk']; ?></h3>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Featured Product End -->