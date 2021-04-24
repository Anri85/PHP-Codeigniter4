<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-primary" role="alert">
            <p class="text-center"><?= session()->getFlashdata('pesan'); ?></p>
        </div>
    <?php endif ?>
    <form action="/MyAccount/Update/<?= $editproduk['ID']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" id="" value="<?= $editproduk['ID']; ?>">
        <input type="hidden" name="Gambar_Sebelumnya" value="<?= $editproduk['Gambar_Produk']; ?>" id="">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-2">
                <label for="">Product Name</label>
                <input class="form-control  <?= ($validation->hasError('Nama_Produk')) ? 'is-invalid' : ''; ?>" type="text" name="Nama_Produk" autocomplete="off" value="<?= $editproduk['Nama_Produk']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('Nama_Produk'); ?>
                </div>
            </div>
            <div class="col-md-2">
                <label for="">Price</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input class="form-control  <?= ($validation->hasError('Harga_Produk')) ? 'is-invalid' : ''; ?>" type="number" name="Harga_Produk" value="<?= $editproduk['Harga_Produk']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('Harga_Produk'); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <label for="">Status</label>
                <select class="form-control" name="Status_Produk">
                    <?php if ($editproduk['Status_Produk'] == 'Aviable') : ?>
                        <option>Aviable</option> : <option>Sold out</option>
                    <?php endif; ?>
                    <?php if ($editproduk['Status_Produk'] == 'Sold out') : ?>
                        <option>Sold out</option> : <option>Aviable</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="">Category</label>
                <select class="form-control" name="Kategori_Produk">
                    <?php if ($editproduk['Kategori_Produk'] == 'Clothes') : ?>
                        <option>Clothes</option> : <option>Jacket</option> : <option>Dress</option> : <option>Accessories</option>
                    <?php endif; ?>
                    <?php if ($editproduk['Kategori_Produk'] == 'Jacket') : ?>
                        <option>Jacket</option> : <option>Clothes</option> : <option>Dress</option> : <option>Accessories</option>
                    <?php endif; ?>
                    <?php if ($editproduk['Kategori_Produk'] == 'Dress') : ?>
                        <option>Dress</option> : <option>Jacket</option> : <option>Clothes</option> : <option>Accessories</option>
                    <?php endif; ?>
                    <?php if ($editproduk['Kategori_Produk'] == 'Accessories') : ?>
                        <option>Accessories</option> : <option>Jacket</option> : <option>Dress</option> : <option>Clothes</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="col-md-3 mb-2">
                <label for="">Size</label>|
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="S" name="Size_Produk_S" <?php if ($editproduk['Size_Produk_S'] != null) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="inlineCheckbox1">S</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="M" name="Size_Produk_M" <?php if ($editproduk['Size_Produk_M'] != null) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="inlineCheckbox2">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="L" name="Size_Produk_L" <?php if ($editproduk['Size_Produk_L'] != null) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="inlineCheckbox2">L</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="XL" name="Size_Produk_XL" <?php if ($editproduk['Size_Produk_XL'] != null) : ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="inlineCheckbox2">XL</label>
                </div>
            </div>

            <div class="col-md-12">
                <label for="">Product Description</label>
                <textarea name="Deskripsi_Produk" class="form-control <?= ($validation->hasError('Deskripsi_Produk')) ? 'is-invalid' : ''; ?>" id="" cols="30" rows="3"><?= $editproduk['Deskripsi_Produk']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('Deskripsi_Produk'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Product Specification</label>
                <textarea name="Spesifikasi_Produk" class="form-control <?= ($validation->hasError('Spesifikasi_Produk')) ? 'is-invalid' : ''; ?>" id="" cols="30" rows="3"><?= $editproduk['Spesifikasi_Produk']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('Spesifikasi_Produk'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <label for="">Product Note</label>
                <textarea name="Catatan_Produk" class="form-control" id="" cols="30" rows="3"></textarea>
            </div>
            <div class="col-md-3 mb-3">
                <img src="/img/<?= $editproduk['Gambar_Produk']; ?>" class="img-thumbnail img-preview" width="200">
                <div class="custom-file mt-2">
                    <input type="file" id="Gambar" name="Gambar_Produk" value="<?= $editproduk['Gambar_Produk']; ?>" onchange="previewImg()" class="custom-file-input <?= ($validation->hasError('Gambar_Produk')) ? 'is-invalid' : ''; ?>">
                    <label class="custom-file-label">Choose file</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('Gambar_Produk'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn" type="submit"><i class="fa fa-edit">Edit Product</i></button>
                <a class="btn" href="/MyAccount/"><i class="fa fa-sign-out-alt"></i>Back</a>
                <br><br>
            </div>
        </div>
    </form>
</div>