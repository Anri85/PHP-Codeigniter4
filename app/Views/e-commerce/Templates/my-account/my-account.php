        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-primary" role="alert">
                        <p class="text-center"><?= session()->getFlashdata('pesan'); ?></p>
                    </div>
                <?php endif ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>address</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <?php if (in_groups('Vendor')) : ?><a class="nav-link" id="product-nav" data-toggle="pill" href="#product-tab" role="tab"><i class="fa fa-box"></i>Your Product</a><?php endif; ?>
                            <a class="nav-link" href="/logout"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <div class="text-center">
                                    <img src="/img-user/<?= user()->UserImg; ?>" class="rounded-circle" alt="Image" width="170">
                                </div>
                                <h2 class="mb-2 mt-2 text-center"><?= (user()->Name == null) ? user()->username : user()->Name; ?></h2>
                                <hr>
                                <p class="text-center">
                                    <?= user()->Description; ?>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <h2 class="text-center mb-3">Orders</h2>
                                <hr>
                                <?php if (session()->getFlashdata('order')) : ?>
                                    <div class="alert alert-primary" role="alert">
                                        <p class="text-center"><?= session()->getFlashdata('order'); ?></p>
                                    </div>
                                <?php endif ?>
                                <?php if (in_groups('Vendor')) : ?>
                                    <?php foreach ($OrderListVendor as $OV) : ?>
                                        <div class="card mb-3">
                                            <div class="row">
                                                <div class="col-md-3 mt-2">
                                                    <img src="/img/<?= $OV['Product_Pict']; ?>" width="200" alt="..." class="rounded">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="card-title"><?= $OV['Nama_Produk']; ?></h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">ID Payment : <?= $OV['ID_Random']; ?></h5>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Order By : <?= $OV['BA_First_Name'] . ' ' . $OV['BA_Last_Name']; ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Mobile No : <?= $OV['BA_Mobile_No']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Deliver To : <?= $OV['SA_First_Name'] . ' ' . $OV['SA_Last_Name']; ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Mobile No : <?= $OV['SA_Mobile_No']; ?></p>
                                                            </div>
                                                        </div>
                                                        <p>Billing Address : <?= $OV['Billing_Address']; ?></p>
                                                        <p>Shipping Address : <?= $OV['Shipping_Address']; ?></p>
                                                        <p><small class="text-muted">Created At : <?= $OV['Created_At']; ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if (in_groups('User')) : ?>
                                    <?php foreach ($OrderListUser as $OU) : ?>
                                        <div class="card mb-3">
                                            <div class="row">
                                                <div class="col-md-3 mt-2">
                                                    <img src="/img/<?= $OU['Product_Pict']; ?>" width="200" alt="..." class="rounded">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="card-title"><?= $OU['Nama_Produk']; ?></h5>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">ID Payment : <?= $OU['ID_Random']; ?></h5>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Order By : <?= $OU['BA_First_Name'] . ' ' . $OU['BA_Last_Name']; ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Mobile No : <?= $OU['BA_Mobile_No']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Deliver To : <?= $OU['SA_First_Name'] . ' ' . $OU['SA_Last_Name']; ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Mobile No : <?= $OU['SA_Mobile_No']; ?></p>
                                                            </div>
                                                        </div>
                                                        <p>Billing Address : <?= $OU['Billing_Address']; ?></p>
                                                        <p>Shipping Address : <?= $OU['Shipping_Address']; ?></p>
                                                        <p><small class="text-muted">Created At : <?= $OU['Created_At']; ?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h2 class="text-center mb-3">Payment Method</h2>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h2 class="text-center mb-3">Address</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h5>Payment Address</h5>
                                        <p><?= user()->Payment_Address; ?></p>
                                        <p>Mobile: <?= user()->Mobile_No; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Shipping Address</h5>
                                        <p><?= user()->Payment_Address; ?></p>
                                        <p>Mobile: <?= user()->Mobile_No; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h2 class="text-center mb-3">Account Details</h2>
                                <hr>
                                <form action="/MyAccount/UserMethod/<?= user_id(); ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= user_id(); ?>">
                                    <input type="hidden" name="Gambar_Profile_Sebelumnya" value="<?= user()->UserImg; ?>">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Username</label>
                                            <input class="form-control" type="text" placeholder="Username" name="Name" value="<?= (user()->Name == null) ? user()->username : user()->Name; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Mobile No</label>
                                            <input class="form-control" type="number" placeholder="Mobile Number" name="Mobile_No" value="<?= user()->Mobile_No; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Gender</label>
                                            <select class="form-control" aria-label="Default select example" name="Gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Payment Address</label>
                                            <textarea name="Payment_Address" placeholder="Insert Address" class="form-control" id="" cols="30" rows="3"><?= user()->Payment_Address; ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Shipping Address</label>
                                            <textarea name="Shipping_Address" placeholder="Insert Address" class="form-control" id="" cols="30" rows="3"><?= user()->Shipping_Address; ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Description</label>
                                            <textarea name="Description" placeholder="Description" class="form-control" id="" cols="30" rows="3"><?= user()->Description; ?></textarea>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="/img-user/<?= user()->UserImg ?>" class="img-thumbnail img-preview rounded-lg" width="150">
                                            <div class="custom-file mt-2">
                                                <input type="file" id="Gambar" name="UserImg" onchange="previewImg()" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn">Update Account</button>
                                            <br><br>
                                        </div>
                                </form>
                            </div>
                            <!-- <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div> -->

                        </div>
                        <?php if (in_groups('Vendor')) : ?>
                            <div class="tab-pane fade" id="product-tab" role="tabpanel" aria-labelledby="product-nav">
                                <div class="table-responsive-sm">
                                    <h2 class="text-center mb-3">Your Product</h2>
                                    <hr>
                                    <div class="row">
                                        <a href="/MyAccount/Createproduct"><button class="btn mb-2 btn-sm ml-3">Add Product</button></a>
                                        <div class="col-md-4">
                                            <form action="" method="POST">
                                                <?= csrf_field(); ?>
                                                <div class="input-group">
                                                    <input class="form-control form-control-sm" type="text" placeholder="Search" name="Search" aria-label=".form-control-sm example">
                                                    <span><button class="btn btn-sm" type="submit"><i class="fa fa-search"></i></button></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produkvendor as $pv) : ?>
                                                <tr>
                                                    <td class="text-left"><?= $pv['Nama_Produk']; ?></td>
                                                    <td><?= $pv['Created_At']; ?></td>
                                                    <td>Rp.<?= $pv['Harga_Produk']; ?></td>
                                                    <td><?= $pv['Status_Produk']; ?></td>
                                                    <td>
                                                        <div class="row ml-1">

                                                            <a href="/MyAccount/Detail/<?= $pv['ID']; ?>">
                                                                <button type="button" class="btn mb-2 btn-sm">Detail</button>
                                                            </a>

                                                            <a href="/MyAccount/Edit/<?= $pv['ID']; ?>">
                                                                <button type="button" class="btn mb-2 btn-sm">Edit</button>
                                                            </a>

                                                            <form action="/MyAccount/Delete" method="POST" class="d-inline">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="ID" id="" value="<?= $pv['ID']; ?>">
                                                                <button type="submit" class="btn mb-2 btn-sm" onclick="return confirm('Are you sure to delete this product?')">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- My Account End -->