<!-- Bottom Bar Start -->
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
            <div class="col-md-9">
                <div class="user">
                    <?php if (user_id() != null) : ?>
                        <a class="btn wishlist" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-envelope"></i>
                            <span>(<?= (in_groups('Vendor') ? $jmlOrderVendor : $jmlOrderUser); ?>)</span>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive-md">
                                            <table class="table table-bordered border-dark">
                                                <?php if (in_groups('Vendor')) : ?>
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>
                                                                <h6>Username</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Product</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Price</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Size</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Quantity</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Payment Method</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Shipping Cost</h6>
                                                            </th>
                                                            <th>
                                                                <h6>ID Payment</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Total</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Detail</h6>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="align-middle">
                                                        <?php foreach ($OrderListVendor as $OV) : ?>
                                                            <tr class="text-center">
                                                                <td>
                                                                    <h6><?= $OV['Username/Name']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OV['Nama_Produk']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6>Rp. <?= $OV['Harga_Produk']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OV['Size']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OV['Kuantitas']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OV['Payment_Method']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6>Rp. <?= $OV['Shipping_Cost']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OV['ID_Random']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6>Rp. <?= $OV['Total']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><a href="/MyAccount">See Detail</a></h6>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                <?php endif; ?>
                                                <?php if (in_groups('User')) : ?>
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>
                                                                <h6>Product Picture</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Product Name</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Price</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Size</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Quantity</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Payment Method</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Shipping Cost</h6>
                                                            </th>
                                                            <th>
                                                                <h6>ID Payment</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Total</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Detail</h6>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="allign-middle">
                                                        <?php foreach ($OrderListUser as $OU) : ?>
                                                            <tr class="text-center">
                                                                <td>
                                                                    <img src="/img/<?= $OU['Product_Pict']; ?>" width="50" alt="">
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Nama_Produk']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Harga_Produk']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Size']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Kuantitas']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Payment_Method']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Shipping_Cost']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['ID_Random']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><?= $OU['Total']; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6><a href="/MyAccount">See Detail</a></h6>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                <?php endif; ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <a href="/Wishlist" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>(0)</span>
                    </a>
                    <a href="/Cart" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>(<?= $count; ?>)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->