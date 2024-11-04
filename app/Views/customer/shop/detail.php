<?= $this->extend('customer/template'); ?>

<?= $this->section('content'); ?>

<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span><?= $produk['name'] ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php foreach ($produk['image'] as $image) : ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $image['is_primary'] == 1 ? 'active' : '' ?>" data-toggle="tab" href="#tabs-<?= $image['id'] ?>" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?= base_url('produk/' . $image['image']) ?>">
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <?php foreach ($produk['image'] as $img) : ?>
                            <div class="tab-pane <?= $img['is_primary'] == 1 ? 'active' : '' ?>" id="tabs-<?= $img['id'] ?>" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?= base_url('produk/' . $img['image']) ?>" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4><?= $produk['name'] ?></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Review</span>
                        </div>
                        <div class="rating">
                            <span>Stok:</span>
                            <span id="stock-display"></span>
                        </div>
                        <div class="row justify-content-center">

                            <h3 id="price-display">Rp. 119000</h3>
                            <h3>
                                <span id="original-price"></span>
                            </h3>
                        </div>

                        <!-- <p>Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable
                            cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening
                            with placket.</p> -->
                        <input type="hidden" id="varian_id" value="">
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <?php foreach (array_unique(array_column($produk['size'], 'size')) as $size) : ?>
                                    <label for="size-<?= $size ?>"><?= $size ?>
                                        <input type="radio" name="size" id="size-<?= $size ?>" value="<?= $size ?>">
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <div class="product__details__option__color__custom">
                                <span>Warna:</span>
                                <?php foreach (array_unique(array_column($produk['size'], 'color')) as $color) : ?>
                                    <label for="color-<?= $color ?>"><?= $color ?>
                                        <input type="radio" name="color" id="color-<?= $color ?>" value="<?= $color ?>">
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="product__details__cart__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <button class="primary-btn" onclick="addToChart()">add to cart</button>
                        </div>
                        <div class="product__details__last__option">
                            <ul>
                                <li><span>Categories:</span> Clothes</li>
                                <li><span>Tag:</span> Clothes, Skin, Body</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Produk Informasi</h5>
                                        <?= $produk['description'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>A Pocket PC is a handheld computer, which features many of the same
                                            capabilities as a modern PC. These handy little devices allow
                                            individuals to retrieve and store e-mail messages, create a contact
                                            file, coordinate appointments, surf the internet, exchange text messages
                                            and more. Every product that is labeled as a Pocket PC must be
                                            accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                        <p>As is the case with any new technology product, the cost of a Pocket PC
                                            was substantial during it’s early release. For approximately $700.00,
                                            consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                            These days, customers are finding that prices have become much more
                                            reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                            from synthetic materials, not natural like wool. Polyester suits become
                                            creased easily and are known for not being breathable. Polyester suits
                                            tend to have a shine to them compared to wool and cotton suits, this can
                                            make the suit look cheap. The texture of velvet is luxurious and
                                            breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                        solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                        ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.</p>
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>A Pocket PC is a handheld computer, which features many of the same
                                            capabilities as a modern PC. These handy little devices allow
                                            individuals to retrieve and store e-mail messages, create a contact
                                            file, coordinate appointments, surf the internet, exchange text messages
                                            and more. Every product that is labeled as a Pocket PC must be
                                            accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                        <p>As is the case with any new technology product, the cost of a Pocket PC
                                            was substantial during it’s early release. For approximately $700.00,
                                            consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                            These days, customers are finding that prices have become much more
                                            reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                            from synthetic materials, not natural like wool. Polyester suits become
                                            creased easily and are known for not being breathable. Polyester suits
                                            tend to have a shine to them compared to wool and cotton suits, this can
                                            make the suit look cheap. The texture of velvet is luxurious and
                                            breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br />
<script>
    // Data varian dari PHP (array yang memuat size, color, dan price)
    const variants = <?= json_encode($produk['size']) ?>;
    console.log(variants);

    // Menambahkan event listener untuk perubahan pada ukuran dan warna
    document.querySelectorAll('input[name="size"]').forEach(input => {
        input.addEventListener('change', updatePriceAndActiveState);
    });

    document.querySelectorAll('input[name="color"]').forEach(input => {
        input.addEventListener('change', updatePriceAndActiveState);
    });

    // Memilih ukuran dan warna pertama secara otomatis
    function selectDefaultOptions() {
        // Pilih ukuran dan warna pertama
        const firstSizeInput = document.querySelector('input[name="size"]');
        const firstColorInput = document.querySelector('input[name="color"]');

        if (firstSizeInput) {
            firstSizeInput.checked = true;
        }

        if (firstColorInput) {
            firstColorInput.checked = true;
        }

        // Update harga dan kelas aktif
        updatePriceAndActiveState();
    }

    function updatePriceAndActiveState() {
        // Update harga
        updatePrice();

        // Mengatur kelas aktif untuk ukuran
        document.querySelectorAll('input[name="size"]').forEach(input => {
            const label = input.closest('label');
            if (input.checked) {
                label.classList.add('active');
            } else {
                label.classList.remove('active');
            }
        });

        // Mengatur kelas aktif untuk warna
        document.querySelectorAll('input[name="color"]').forEach(input => {
            const label = input.closest('label');
            if (input.checked) {
                label.classList.add('active');
            } else {
                label.classList.remove('active');
            }
        });
    }

    function updatePrice() {
        const selectedSize = document.querySelector('input[name="size"]:checked')?.value;
        const selectedColor = document.querySelector('input[name="color"]:checked')?.value;

        if (selectedSize && selectedColor) {
            // Find the matching variant with the selected size and color
            const variant = variants.find(v => v.size === selectedSize && v.color === selectedColor);

            if (variant) {
                // Calculate discounted price if discount is available
                const discountPercentage = parseInt(variant.discount);
                const originalPrice = parseInt(variant.price);
                const finalPrice = discountPercentage > 0 ?
                    originalPrice - (originalPrice * discountPercentage / 100) :
                    originalPrice;

                // tambahkan class text-danger jika ada diskon
                if (discountPercentage > 0) {
                    document.getElementById('price-display').classList.add('text-danger');
                    document.getElementById('price-display').textContent = `Rp. ${finalPrice.toLocaleString()}`;
                    document.getElementById('original-price').textContent = `Rp. ${originalPrice.toLocaleString()} Disc. ${discountPercentage}%`;
                    document.getElementById('original-price').style.display = "inline";
                } else {
                    document.getElementById('price-display').classList.remove('text-danger');
                    document.getElementById('price-display').textContent = `Rp. ${finalPrice.toLocaleString()} `;
                    document.getElementById('original-price').textContent = ``;
                    document.getElementById('original-price').style.display = "none";
                }
                document.getElementById('stock-display').textContent = variant.stock;
                document.getElementById('varian_id').value = variant.variant_id;
            } else {
                // If no variant is found, display unavailable message
                document.getElementById('price-display').textContent = 'Harga tidak tersedia';
                if (originalPriceElement) originalPriceElement.style.display = "none";
                document.getElementById('variant_id').value = '';
            }
        }
    }

    function addToChart() {
        const variant_id = document.getElementById('varian_id').value; // Ambil variant_id dari input tersembunyi
        const qty = document.querySelector('.pro-qty input').value;
        const userId = '<?= session()->get('id') ?>';

        console.log('Variant ID:', variant_id);
        console.log('Quantity:', qty);
        console.log('User ID:', userId);

        // Kirim request AJAX ke server
        fetch('<?= base_url('cart/add') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    variant_id: variant_id,
                    qty: qty,
                    user_id: userId
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // sweetalert
                Swal.fire({
                    icon: 'success',
                    title: 'Produk berhasil ditambahkan ke keranjang',
                    showConfirmButton: false,
                    timer: 1500
                });
            })
            .catch((error) => {
                console.error('Error:', error);
                // sweetalert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menambahkan ke keranjang!',
                });
            });
    }


    // Panggil fungsi selectDefaultOptions saat halaman dimuat
    window.onload = selectDefaultOptions;
</script>




<?= $this->endSection(); ?>