<!-- Checkout Start -->
<div class="checkout">
    <div class="container-fluid">
        <form action="/Checkout/checkout/<?= $ID_Cart; ?>" method="POST">
            <input type="hidden" name="ID_User" value="<?= user_id(); ?>">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-primary" role="alert">
                    <p class="text-center"><?= session()->getFlashdata('success'); ?></p>
                </div>
            <?php endif ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Billing Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" name="BA_First_Name" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input class="form-control" name="BA_Last_Name" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="BA_Email" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" name="BA_Mobile_No" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" name="Billing_Address" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select" name="BA_Country">
                                        <option selected>Indonesia</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" name="BA_City" type="text" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="billing-address">
                            <h2>Shipping Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" name="SA_First_Name" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" name="SA_Last_Name" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="SA_Email" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" name="SA_Mobile_No" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" name="Shipping_Address" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" name="SA_City" type="text" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select" name="SA_Country">
                                        <option selected>Indonesia</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Deliver By</label>
                                    <select class="custom-select" name="Deliver_By">
                                        <option selected>JNE</option>
                                        <option>Ninja Express</option>
                                        <option>JNT</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Payment Method</label>
                                    <select class="custom-select" name="Payment">
                                        <option selected>Paypal</option>
                                        <option>Dana</option>
                                        <option>OVO</option>
                                        <option>Direct Bank Transfer</option>
                                        <option>Cash On Delivery</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Checkout Summary</h1>
                            <div class="text-center mb-2">
                                <img class="rounded" src="/img/<?= $Gambar_Produk; ?>" alt="" width="85">
                            </div>
                            <p><?= $Nama_Produk; ?><span>Rp. <?= $Harga_Produk; ?></span></p>
                            <hr>
                            <p>Qty<span><?= $Kuantitas; ?></span></p>
                            <hr>
                            <p>Size<span><?= $Size; ?></span></p>
                            <p class="sub-total">Sub Total<span>Rp. <?= $Harga_Produk * $Kuantitas; ?></span></p>
                            <p class="ship-cost">Shipping Cost<span>Rp. <?= $Shipping_Cost = 10000; ?></span></p>
                            <h2>Grand Total<span>Rp. <?= $Harga_Produk * $Kuantitas + $Shipping_Cost; ?></span></h2>
                            <hr>
                            <div class="d-grid gap-2">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure The Information Is Correct?')">Place Order</button>
                            </div>
                        </div>
                        <!-- <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Payment Methods</h1>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-1" name="payment" value="Paypal">
                                        <label class="custom-control-label" for="payment-1">Paypal</label>
                                    </div>
                                    <div class="payment-content" id="payment-1-show">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                        </p>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-2" name="payment" value="Dana">
                                        <label class="custom-control-label" for="payment-2">Dana</label>
                                    </div>
                                    <div class="payment-content" id="payment-2-show">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                        </p>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-3" name="payment" value="OVO">
                                        <label class="custom-control-label" for="payment-3">OVO</label>
                                    </div>
                                    <div class="payment-content" id="payment-3-show">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                        </p>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-4" name="payment" value="Direct_Bank_Transfer">
                                        <label class="custom-control-label" for="payment-4">Direct Bank Transfer</label>
                                    </div>
                                    <div class="payment-content" id="payment-4-show">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                        </p>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-5" name="payment" value="Cash_On_Delivery">
                                        <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                    </div>
                                    <div class="payment-content" id="payment-5-show">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> <!-- Checkout End -->