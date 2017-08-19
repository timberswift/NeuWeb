<?php
//about theme info
add_action( 'admin_menu', 'play_school_abouttheme' );
function play_school_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'play-school'), esc_html__('About Theme', 'play-school'), 'edit_theme_options', 'play_school_guide', 'play_school_mostrar_guide');   
} 

//guidline for about theme
function play_school_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'play-school'); ?>
		   </div>
          <p><?php esc_attr_e('Play School is an education WordPress theme which can be used for Kindergarten, nursery, play schools, pre-schools, varsities, university, online courses, ecourses, online learning, e-learning, and other kinds of business, portfolio, photographer, simple and flexible kind of websites with it multiple and multipurpose appeal. It is responsive, colorful and is cross device, retina ready and HD ready template with WooCommerce compatibility for eCommerce, gallery plugins compatible with nextgen gallery and others and slider compatible. Translation ready school and education WordPress template suitable for all industries.','play-school'); ?></p>
		  <a href="<?php echo SKTTHEMES_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKTTHEMES_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'play-school'); ?></a> | 
				<a href="<?php echo SKTTHEMES_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'play-school'); ?></a> | 
				<a href="<?php echo SKTTHEMES_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'play-school'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKTTHEMES_THEMES; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>