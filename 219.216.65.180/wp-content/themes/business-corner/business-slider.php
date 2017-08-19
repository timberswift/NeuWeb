<?php 
/**
 * Template part for displaying slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business Corner
 */
	$slider_display = get_theme_mod( 'business_corner_display_slider_setting', 0);
	$slider_cat = get_theme_mod( 'business_corner_category_slider');
	//query posts
	$args =	array(
		'offset'           => 0,
		'category_name'    => $slider_cat,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);
	
	$the_query = new WP_Query( $args );
	if($slider_display == 1 && $slider_cat!=''){ 
	if($the_query->have_posts()) : ?>  
<!-- Slider -->
<div class="row bs-home-slider">
	<!-- <div class="container"> -->
		<div class="swiper-container home-slider">
			<div class="swiper-wrapper ">
			<?php while ($the_query->have_posts()) : 
			$the_query->the_post(); 
			if ( has_post_thumbnail() ) { ?>
				<div class="swiper-slide">
				<?php the_post_thumbnail( 'business_corner_slide', array( 'class' => 'img-responsive' ) ); ?>
					<div class="overlay"></div>
					<div class="carousel-caption">
						<div class="container">
							<div class="row slider-text">
								<h1 class="slider-heading animation animated-item-1"><?php the_title(); ?></h1>
								<p class="slider-desc animation animated-item-2"><?php echo esc_html(wp_trim_words( get_the_content(), 25, '' )); ?></p>
								<a href="<?php the_permalink(); ?>" class="slider-link animation animated-item-3"><?php esc_html_e('Read More','business-corner'); ?></a>
							</div>
						</div>
					</div>
				</div>
			<?php } endwhile; ?>
			</div>	
			<div class="swiper-button-prev slider-prev"><i class="fa fa-angle-left"></i></div>
			<div class="swiper-button-next slider-next"><i class="fa fa-angle-right"></i></div>
		</div>
	<!-- </div> -->
</div>
<!-- Slider -->
<?php endif;
wp_reset_postdata();
} ?>