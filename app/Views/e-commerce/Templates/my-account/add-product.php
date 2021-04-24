<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-primary" role="alert">
            <p class="text-center"><?= session()->getFlashdata('pesan'); ?></p>
        </div>
    <?php endif ?>
    <form action="/MyAccount/Addproduct" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID_Vendor" id="" value="<?= user_id(); ?>">
        <input type="hidden" name="Nama_Vendor" id="" value="<?= (user()->Name == null) ? user()->username : user()->Name; ?>">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-2">
                <label for="">Product Name</label>
                <input class="form-control <?= ($validation->hasError('Nama_Produk')) ? 'is-invalid' : ''; ?>" type="text" name="Nama_Produk" autocomplete="off">
                <div class="invalid-feedback">
                    <?= $validation->getError('Nama_Produk'); ?>
                </div>
            </div>
            <div class="col-md-2">
                <label for="">Price</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input class="form-control <?= ($validation->hasError('Harga_Produk')) ? 'is-invalid' : ''; ?>" aria-describedby="basic-addon1" type="number" name="Harga_Produk">
                    <div class="invalid-feedback">
                        <?= $validation->getError('Harga_Produk'); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <label for="">Status</label>
                <select class="form-control" name="Status_Produk">
                    <option>Aviable</option>
                    <option>Sold out</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="">Category</label>
                <select class="form-control" name="Kategori_Produk">
                    <option>Clothes</option>
                    <option>Jacket</option>
                    <option>Dress</option>
                    <option>Accessories</option>
                </select>
            </div>

            <div class="col-md-3 mb-2 mt-1">
                <label for="">Size</label>|
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="S" name="Size_Produk_S">
                    <label class="form-check-label" for="inlineCheckbox1">S</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="M" name="Size_Produk_M">
                    <label class="form-check-label" for="inlineCheckbox2">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="L" name="Size_Produk_L">
                    <label class="form-check-label" for="inlineCheckbox2">L</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="XL" name="Size_Produk_XL">
                    <label class="form-check-label" for="inlineCheckbox2">XL</label>
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Product Description</label>
                <textarea name="Deskripsi_Produk" class="form-control <?= ($validation->hasError('Deskripsi_Produk')) ? 'is-invalid' : ''; ?>" id="" cols="30" rows="3"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('Deskripsi_Produk'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Product Specification</label>
                <textarea name="Spesifikasi_Produk" class="form-control <?= ($validation->hasError('Spesifikasi_Produk')) ? 'is-invalid' : ''; ?>" id="" cols="30" rows="3"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('Spesifikasi_Produk'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Product Note</label>
                <textarea name="Catatan_Produk" class="form-control" id="" cols="30" rows="3"></textarea>
            </div>
            <div class="col-md-3 mb-3">
                <img src="/img/" class="img-thumbnail img-preview" width="200">
                <div class="custom-file mt-2">
                    <input type="file" id="Gambar" name="Gambar_Produk" onchange="previewImg()" class="custom-file-input <?= ($validation->hasError('Gambar_Produk')) ? 'is-invalid' : ''; ?>">
                    <label class="custom-file-label">Choose file</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('Gambar_Produk'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn" type="submit">Add Product</button>
                <a class="btn" href="/MyAccount/"><i class="fa fa-sign-out-alt"></i>Back</a>
                <br><br>
            </div>
        </div>
    </form>
</div>