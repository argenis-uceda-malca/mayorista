<?php
include_once __DIR__ . '/../templates/header.php';
?>

<!-- Hero Section Begin -->
<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="hero__search">
					<div class="hero__search__form">
						<form action="#">
							<div class="hero__search__categories">
								All Categories
								<span class="arrow_carrot-down"></span>
							</div>
							<input type="text" placeholder="What do yo u need?">
							<button type="submit" class="site-btn">SEARCH</button>
						</form>
					</div>
					<div class="hero__search__phone">
						<div class="hero__search__phone__icon">
							<i class="fa fa-phone"></i>
						</div>
						<div class="hero__search__phone__text">
							<h5>+51 991 702 781</h5>
							<span>Atención 24/7 </span>
						</div>
					</div>
				</div>
				<div class="hero__item set-bg" data-setbg="/build/img/hero/banner.jpg">
					<div class="hero__text">
						<span>FRUIT FRESH</span>
						<h2>Vegetable <br />100% Organic</h2>
						<p>Free Pickup and Delivery Available</p>
						<a href="#" class="primary-btn">SHOP NOW</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
	<div class="container">
		<div class="row">
			<div class="categories__slider owl-carousel">
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="/build/img/categories/cat-1.jpg">
						<h5><a href="#">Fresh Fruit</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="/build/img/categories/cat-2.jpg">
						<h5><a href="#">Dried Fruit</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="/build/img/categories/cat-3.jpg">
						<h5><a href="#">Vegetables</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="/build/img/categories/cat-4.jpg">
						<h5><a href="#">drink fruits</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="/build/img/categories/cat-5.jpg">
						<h5><a href="#">drink fruits</a></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Nuestros Productos</h2>
				</div>
				<div class="featured__controls">
					<ul>
						<li class="active" data-filter="*">Todos </li>
						<?php foreach ($categorias as $key => $categoria) { ?>

							<li data-filter=".categoria<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></li>
						<?php } ?>
						<!--<li data-filter=".fresh-meat">Fresh Meat</li>
						<li data-filter=".vegetables">Vegetables</li>
						<li data-filter=".fastfood">Fastfood</li>-->
					</ul>
				</div>
			</div>
		</div>



		<div class="row featured__filter">
			<?php
			foreach ($productos as $key => $producto) {
				foreach ($categorias as $key => $categoria) {
					if ($producto->idcategoria == $categoria->id) {
			?>
						<div class="col-lg-3 col-md-4 col-sm-6 mix categoria<?php echo $categoria->id ?>">
							<div class="featured__item">
								<div class="featured__item__pic set-bg" data-setbg="/build/img/featured/feature-2.jpg">
									<ul class="featured__item__pic__hover">
										<li>
											<a href="#"><i class="fa fa-heart"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-retweet"></i></a>
										</li>
										<li>
											<a href="/cart?id=<?php echo $producto->id; ?>"><i class="fa fa-shopping-cart"></i></a>
										</li>
									</ul>
								</div>
								<div class="featured__item__text">
									<h6><a href="#"><?php echo $producto->nombre; ?></a></h6>
									<h5>S/. <?php echo $producto->precio; ?></h5>
								</div>
							</div>
						</div>
			<?php }
				}
			} ?>
		</div>


	</div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="/build/img/banner/banner-1.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="banner__pic">
					<img src="/build/img/banner/banner-2.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Latest Products</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-1.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-2.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-3.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
						<div class="latest-prdouct__slider__item">
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-1.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-2.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-3.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Top Rated Products</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-1.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-2.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-3.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
						<div class="latest-prdouct__slider__item">
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-1.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-2.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-3.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Review Products</h4>
					<div class="latest-product__slider owl-carousel">
						<div class="latest-prdouct__slider__item">
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-1.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-2.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-3.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
						<div class="latest-prdouct__slider__item">
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-1.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-2.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a href="#" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="/build/img/latest-product/lp-3.jpg" alt="">
								</div>
								<div class="latest-product__item__text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Latest Product Section End -->

<br><br><br>
<div class="section-title">
	<h2>Encuentranos aquí</h2>
</div>
<br><br><br>

<!-- Map Begin -->
<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d975.4042684811426!2d-76.99822167081355!3d-12.069846799465754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c63b20e861b7%3A0x6d566c1933d6e617!2sAugusto%20Durand%202485%2C%20San%20Luis%2015021!5e0!3m2!1ses-419!2spe!4v1657497835662!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	<div class="map-inside">
		<i class="icon_pin"></i>
		<div class="inside-widget">
			<h4>HIN inversiones</h4>
			<ul>
				<li>Telefono: +51 991 702 781</li>
				<li>Augusto Durand 2485, San Luis 15021</li>
			</ul>
		</div>
	</div>
</div>
<!-- Map End -->


<?php
include_once __DIR__ . '/../templates/footer.php';
?>

<?php
$script = "
	<!-- Js Plugins -->
    <script src='/build/js/jquery-3.3.1.min.js'></script>
    <script src='/build/js/bootstrap.min.js'></script>
    <script src='/build/js/jquery.nice-select.min.js'></script>
    <script src='/build/js/jquery-ui.min.js'></script>
    <script src='/build/js/jquery.slicknav.js'></script>
    <script src='/build/js/mixitup.min.js'></script>
    <script src='/build/js/owl.carousel.min.js'></script>
    <script src='/build/js/main.js'></script>
	
    ";
?>