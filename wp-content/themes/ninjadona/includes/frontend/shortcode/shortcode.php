<?php 
	// shortcode sk sidebar homepage
function myshortcode_banner_homepage(){ 
	ob_start();?>
	<div class="banner_homepage">
		<?php $banner_arg = array(
			'post_type' => 'slide',
			'order' => 'ASC',
			'orderby' => 'date',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
		$banner_query = new WP_Query($banner_arg);
		if($banner_query->have_posts()) : ?>
			<ul>
				<?php while ($banner_query->have_posts()) : $banner_query->the_post(); ?>
					<li>
						<?php 
						global $post;
						$banner_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
						<figure style="background: url('<?php echo $banner_image[0]; ?>');"><a href="#"></a></figure>
					</li>
				<?php endwhile; 
				wp_reset_postdata();
				?>
			</ul>
			<?php else : echo 'No data'; 
			endif; ?>
		</div>
		<?php 
		return ob_get_clean();
	}
	add_shortcode('sc_banner_hp','myshortcode_banner_homepage');

	// shortcode newspapers homepage
	function myshortcode_newspapers_homepage(){ 
		ob_start();?>
		<div class="newspapers_homepage">
			<?php $newspapers_arg = array(
				'post_type' => 'newspapers',
				'order' => 'ASC',
				'orderby' => 'date',
				'post_status' => 'publish',
				'posts_per_page' => -1
			);
			$newspapers_query = new WP_Query($newspapers_arg);
			if($newspapers_query->have_posts()) : ?>
				<ul class="row">
					<?php while ($newspapers_query->have_posts()) : $newspapers_query->the_post(); ?>
						<li class="col-sm-3">
							<a href="<?php echo excerpt(300);?>" target="_blank"><?php the_post_thumbnail(); ?></a>
						</li>
					<?php endwhile; 
					wp_reset_postdata();
					?>
				</ul>
				<?php else : echo 'No data'; 
				endif; ?>

			</div>
			<?php 
			return ob_get_clean();
		}
		add_shortcode('sc_newspapers_hp','myshortcode_newspapers_homepage');

			// shortcode events homepage
		function myshortcode_events_homepage(){ 
			ob_start();?>
			<div class="events_homepage">
				<?php $events_arg = array(
					'post_type' => 'events',
					'order' => 'ASC',
					'orderby' => 'date',
					'post_status' => 'publish',
					'posts_per_page' => 4
				);
				$events_query = new WP_Query($events_arg);
				if($events_query->have_posts()) : ?>
					<ul>
						<?php while ($events_query->have_posts()) : $events_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
							</li>
						<?php endwhile; 
						wp_reset_postdata();
						?>
					</ul>
					<?php else : echo 'No data'; 
					endif; ?>

				</div>
				<?php 
				return ob_get_clean();
			}
			add_shortcode('sc_events_hp','myshortcode_events_homepage');

						// shortcode video homepage
			function myshortcode_video_homepage(){ 
				ob_start();?>
				<div class="video_homepage">
					<?php $video_arg = array(
						'post_type' => 'video',
						'order' => 'ASC',
						'orderby' => 'date',
						'post_status' => 'publish',
						'posts_per_page' => 3
					);
					$video_query = new WP_Query($video_arg);
					if($video_query->have_posts()) : ?>
						<ul class="row">
							<?php while ($video_query->have_posts()) : $video_query->the_post(); ?>
								<li class="col-sm-4">
									<?php the_content(); ?>
									<h2 class="video_title"><?php the_title(); ?></h2>
									<div class="excerpt">
										<p><?php echo the_excerpt(200); ?></p>
									</div>
								</li>
							<?php endwhile; 
							wp_reset_postdata();
							?>
						</ul>
						<?php else : echo 'No data'; 
						endif; ?>

					</div>
					<?php 
					return ob_get_clean();
				}
				add_shortcode('sc_video_hp','myshortcode_video_homepage');

										// shortcode customer exchange homepage
				function myshortcode_customer_exchange_homepage(){ 
					ob_start();?>
					<div class="customer_exchange_homepage show_hide_tab_parent">
						<?php $customer_exchange_arg = array(
							'post_type' => 'customer_exchange',
							'order' => 'ASC',
							'orderby' => 'date',
							'post_status' => 'publish',
							'posts_per_page' => -1
						);
						$customer_exchange_query = new WP_Query($customer_exchange_arg);
						if($customer_exchange_query->have_posts()) : ?>
							<?php while ($customer_exchange_query->have_posts()) : $customer_exchange_query->the_post(); ?>
								<div class="list_title show_hide_tab">
									<ul>
										<li data-tab="tab-">
											<h2><?php the_title(); ?></h2>
											<?php global $post;
											$job_customer = get_post_meta($post->ID,'_job_customer', true); ?>
											<span class="exc_job_title"><?php echo $job_customer; ?></span>
										</li>
									</ul>
								</div>
							<?php endwhile; 
							wp_reset_postdata();
							?>
							<?php else : echo 'No data'; 
							endif; ?>
							<div class="list_post_cat">
								<div class="item_cat tab-content">

								</div>
							</div>
						</div>
						<?php 
						return ob_get_clean();
					}
					add_shortcode('sc_customer_exchange_hp','myshortcode_customer_exchange_homepage');
