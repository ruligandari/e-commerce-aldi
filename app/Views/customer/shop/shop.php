<?= $this->extend('customer/template'); ?>

<?= $this->section('content'); ?>
<style>
    .coret {
        text-decoration: line-through;
        color: #888;
        /* Opsional: Mengatur warna agar lebih pudar */
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="<?= base_url('/') ?>">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad" id="app">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <li><a href="#">Men (20)</a></li>
                                                <li><a href="#">Women (20)</a></li>
                                                <li><a href="#">Bags (20)</a></li>
                                                <li><a href="#">Clothing (20)</a></li>
                                                <li><a href="#">Shoes (20)</a></li>
                                                <li><a href="#">Accessories (20)</a></li>
                                                <li><a href="#">Kids (20)</a></li>
                                                <li><a href="#">Kids (20)</a></li>
                                                <li><a href="#">Kids (20)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($produk as $item): ?>
                        <?php
                        // menghitung diskon
                        // cari diskon terbesar
                        $maxDiscount = 0;
                        foreach ($item['size'] as $variant) {
                            if ($variant['discount'] > $maxDiscount) {
                                $maxDiscount = $variant['discount'];
                            } else {
                                $maxDiscount = $maxDiscount;
                            }
                        }
                        $diskon = $variant['price'] * $maxDiscount / 100;
                        $diskon = $variant['price'] - $diskon;
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="<?= base_url('shop/') . $item['produk_id'] ?>">
                                    <div class="product__item__pic set-bg" data-setbg="<?= base_url('produk/') . ($item['image'][0]['image']) ?>">
                                        <?php if ($maxDiscount > 0) : ?>
                                            <span class="label text-danger">-<?= $maxDiscount ?>%</span>
                                        <?php endif ?>
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6><?= $item['name'] ?></h6>
                                    <?php if ($maxDiscount > 0) : ?>
                                        <h5 class="text-danger">Rp. <?= number_format($diskon, 0, ',', '.') ?> <span class="coret">Rp. <?= number_format($variant['price'], 0, ',', '.') ?></span></h5>

                                    <?php else : ?>
                                        <h5>
                                            Rp. <?= number_format($variant['price'], 0, ',', '.') ?>
                                        </h5>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>