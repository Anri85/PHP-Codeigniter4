<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('notif')) : ?>
            <div class="alert alert-primary" role="alert">
                <p class="text-center"><?= session()->getFlashdata('notif'); ?></p>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="col">
                <div class="cart-page-inner">
                    <div class="table-responsive-md">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Checkout</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php $i = 1 ?>
                                <?php foreach ($cart as $c) : ?>
                                    <form action="/Checkout/Process/<?= $c['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href=""><img src="/img/<?= $c['Gambar_Produk']; ?>" alt="Image"></a>
                                                    <p><?= $c['Nama_Produk']; ?></p>
                                                </div>
                                            </td>
                                            <td>Rp.<?= $c['Harga_Produk']; ?></td>
                                            <td>
                                                <select name="Size_Produk">
                                                    <?php if ($c['Size_Produk_S'] != null) : ?>
                                                        <option value="S">S</option>
                                                    <?php endif; ?>
                                                    <?php if ($c['Size_Produk_M'] != null) : ?>
                                                        <option value="M">M</option>
                                                    <?php endif; ?>
                                                    <?php if ($c['Size_Produk_L'] != null) : ?>
                                                        <option value="L">L</option>
                                                    <?php endif; ?>
                                                    <?php if ($c['Size_Produk_XL'] != null) : ?>
                                                        <option value="XL">XL</option>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td><?= $c['Status_Produk']; ?></td>
                                            <td>
                                                <div class="qty">
                                                    <!-- <button class="btn-minus" name="min" value="1"><i class="fa fa-minus"></i></button> -->
                                                    <input type="number" name="qty" value="1">
                                                    <!-- <button class="btn-plus" name="max" value="1"><i class="fa fa-plus"></i></button> -->
                                                </div>
                                            </td>
                                            <td><button class="btn btn-sm" <?= ($c['Status_Produk'] == 'Sold out') ? 'disabled' : ''; ?> type="submit"><i class="fa fa-check"></i></button></td>
                                            <td>
                                    </form>
                                    <form action="/Cart/Delete" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id" id="" value="<?= $c['id']; ?>">
                                        <button type="submit" class="btn mb-2 btn-sm" onclick="return confirm('Are you sure to delete this product?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>$99</span></p>
                                    <p>Shipping Cost<span>$1</span></p>
                                    <h2>Grand Total<span>$100</span></h2>
                                </div>
                                <a href="/Checkout"><button class="btn btn-md mt-3">Checkout</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Cart End -->