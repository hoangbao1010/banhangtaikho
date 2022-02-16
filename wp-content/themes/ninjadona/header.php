<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?php if(get_option('meta_des')){echo get_option('meta_des');} ?>" /> 
	<meta name="keywords" content="<?php if(get_option('meta_key')){echo get_option('meta_key');} ?> ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php if(is_front_page()){echo bloginfo('name');}else{ wp_title('',true,''); } ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<!-- css -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
	<!-- js -->
	<script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
	<?php wp_head(); ?>
</head>


<body <?php body_class() ?>>

	<div class="bg_opacity"></div>

	<?php if ( wp_is_mobile() ) { ?>
		<div id="menu_mobile_full">
			<nav class="mobile-menu">
				<p class="close_menu"><span><i class="fa fa-times" aria-hidden="true"></i></span></p>
				<?php 
				$args = array('
					theme_location' => 'menu_mobile');
					?>
					<?php wp_nav_menu($args);?>
				</nav>
			</div>
		<?php }?>
		<span class="icon_mobile_click"><i class="fa fa-bars" aria-hidden="true"></i></span>
		<header>
			<h1 style="display: none;">Mỹ phẩm cao cấp Quin</h1>
			<div class="header">
				<div class="top_hd">
					<div class="container">
						<div class="search_hd">
							<form role="search" method="get" id="searchform" action="<?php echo home_url('/');  ?>">
								<div class="list_group">
									<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Tìm kiếm...">
									<input type="hidden" value="product" name="post_type">
									<button type="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</form>
						</div>
						<div class="ot_info_hd">
							<div class="phone_hd">
								<?php 	$phone_hd = get_option('phone');
								$phone_trim = trim($phone_hd); ?>
								<h2><a href="tel:<?php echo $phone_trim; ?>"><?php echo $phone_trim; ?></a></h2>
							</div>
							<div class="email_hd">
								<?php $email_hd = get_option('email_header');
								$email_hd_trim = trim($email_hd); ?>
								<h2><a href="mailto:<?php echo $email_hd_trim; ?>"><?php echo $email_hd_trim; ?></a></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="bottom_hd">
					<div class="container">
						<div class="logo_hd">
							<?php 
							if(has_custom_logo()){
								the_custom_logo();
							}
							else { ?> 
								<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
							<?php } ?>
						</div>
						<div class="menu_hd">
							<nav class="nav nav_primary">
								<?php 
								$args = array(
									'theme_location' => 'primary',
									'menu_class' => 'qb_memu_header',
								);?>
								<?php wp_nav_menu($args); ?>
							</nav>
							<div class="g_cart">
								<?php global $woocommerce; ?>
								<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
									<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php //echo $woocommerce->cart->get_cart_total(); ?> 
								</a>
								<div class="header-quickcart">
									<?php woocommerce_mini_cart(); ?>
								</div>
<!-- <b>Deprecated</b>:  WC_Cart::get_cart_url đã bị <strong>loại bỏ</strong> từ phiên bản 2.5! Hãy sử dụng wc_get_cart_url. in <b>C:\xampp\htdocs\myphamquin\wp-includes\functions.php</b> on line <b>5211</b><br />
http://localhost/myphamquin"> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>



