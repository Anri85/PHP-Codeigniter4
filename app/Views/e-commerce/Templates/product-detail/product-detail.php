<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <img src="/img/<?= $detailproduk['Gambar_Produk']; ?>" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2><?= $detailproduk['Nama_Produk']; ?></h2>
                                </div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <h4>Price:</h4>
                                    <p>Rp.<?= $detailproduk['Harga_Produk']; ?></p>
                                </div>
                                <div class="quantity">
                                    <h4>Quantity:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="p-size">
                                    <h4>Size:</h4>
                                    <div class="btn-group btn-group-sm">
                                        <?php if ($detailproduk['Size_Produk_S'] != null) : ?>
                                            <button type="button" class="btn"><?= $detailproduk['Size_Produk_S']; ?></button>
                                        <?php endif; ?>
                                        <?php if ($detailproduk['Size_Produk_M'] != null) : ?>
                                            <button type="button" class="btn"><?= $detailproduk['Size_Produk_M']; ?></button>
                                        <?php endif; ?>
                                        <?php if ($detailproduk['Size_Produk_L'] != null) : ?>
                                            <button type="button" class="btn"><?= $detailproduk['Size_Produk_L']; ?></button>
                                        <?php endif; ?>
                                        <?php if ($detailproduk['Size_Produk_XL'] != null) : ?>
                                            <button type="button" class="btn"><?= $detailproduk['Size_Produk_XL']; ?></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="price">
                                    <h4>Vendor :</h4>
                                </div>
                                <div class="p-size ml-3">
                                    <div class="row">
                                        <h4>Status : </h4>
                                        <p><?= $detailproduk['Status_Produk']; ?></p>
                                    </div>
                                </div>
                                <div class="row ml-1">
                                    <small>Created At : <?= $detailproduk['Created_At']; ?></small>
                                    <small class="ml-2">Updated At : <?= $detailproduk['Updated_At']; ?></small>
                                </div>
                                <br>
                                <div class="action">
                                    <a class="btn" href="/Cart/<?= $detailproduk['ID']; ?>"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                    <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#note">Note</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p>
                                    <?= $detailproduk['Deskripsi_Produk']; ?>
                                </p>
                            </div>
                            <div id="specification" class="container tab-pane fade">
                                <h4>Product specification</h4>
                                <ul>
                                    <li><?= $detailproduk['Spesifikasi_Produk']; ?></li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Lorem ipsum dolor sit amet</li>
                                </ul>
                            </div>
                            <div id="note" class="container tab-pane fade">
                                <h4>Product Note</h4>
                                <p>
                                    <?= $detailproduk['Catatan_Produk']; ?>
                                </p>
                            </div>
                            <div id="reviews" class="container tab-pane fade">
                                <div class="reviews-submitted">
                                    <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                    </p>
                                </div>
                                <div class="reviews-submit">
                                    <h4>Give your Review:</h4>
                                    <div class="ratting">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="row form">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea placeholder="Review"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3">
                        <?php foreach ($produkcategory as $pc) : ?>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href=""><?= $pc['Nama_Produk']; ?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="">
                                            <img src="/img/<?= $pc['Gambar_Produk']; ?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="/Product_Detai/<?= $pc['ID']; ?>/<?= $pc['Kategori_Produk']; ?>"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>Rp.</span><?= $pc['Harga_Produk']; ?></h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="sidebar-widget widget-slider">
                    <div class="sidebar-slider normal-slider">
                        <?php foreach ($produk as $p) : ?>
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
                                    <a href="">
                                        <img src="/img/<?= $p['Gambar_Produk']; ?>" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="/Product_Detail/<?= $p['ID']; ?>/<?= $p['Kategori_Produk']; ?>"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>Rp.</span><?= $p['Harga_Produk']; ?></h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="sidebar-widget brands">
                    <h2 class="title">Our Vendor</h2>
                    <ul>
                        <?php foreach ($vendor as $v) : ?>
                            <li><a href="#"><?= ($v['Name'] == null) ? $v['username'] : $v['Name']; ?></a><span></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- <div class="sidebar-widget tag">
                    <h2 class="title">Tags Cloud</h2>
                    <a href="#">Lorem ipsum</a>
                    <a href="#">Vivamus</a>
                    <a href="#">Phasellus</a>
                    <a href="#">pulvinar</a>
                    <a href="#">Curabitur</a>
                    <a href="#">Fusce</a>
                    <a href="#">Sem quis</a>
                    <a href="#">Mollis metus</a>
                    <a href="#">Sit amet</a>
                    <a href="#">Vel posuere</a>
                    <a href="#">orci luctus</a>
                    <a href="#">Nam lorem</a>
                </div> -->
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->