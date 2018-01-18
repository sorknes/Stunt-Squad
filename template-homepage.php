<?php
/**
 * Template Name: Tilpasset hjemmeside
 * This is a custom homepage for Stunt Squad
 * 
 */
get_header();  ?>

<?php
	// start query intro
	$args_intro = "post_type=intro&posts_per_page=1&orderby=date&order=DESC"; // query the newest from intro (1 item)

	// the Query
	$query_intro = new WP_Query( $args_intro );

	// the Loop
	if ( $query_intro->have_posts() ) {
		$query_intro->the_post();

		$intro_background 		= get_post_custom_values('pt_background');
		$intro_background 		= $intro_background[0];

		$intro_custom_link_text = get_post_custom_values('pt_link_text');
		$intro_custom_link_text = $intro_custom_link_text[0];
		$intro_custom_link 		= get_post_custom_values('pt_link');
		$intro_custom_link 		= $intro_custom_link[0];

    	?>

			<div class="jumbo-wrapper" style="background-image: url('<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'jumbotron-thumb', true); echo $thumb_url[0]; ?>')">
				<div class="jumbotron">
					<div class="col-full">
						<div class="content">
							<h1 itemprop="headline"><?php echo get_the_title( $query_intro->post->ID ); ?></h1>
							<?php echo get_the_content( $query_intro->post->ID ); ?>

							<?php if($intro_custom_link){ ?>
								<div class="button-wrapper">
										<a itemprop="url" class="button" href="<?php echo $intro_custom_link ?>" role="button" title="<?php echo $intro_custom_link_text ?>"><?php echo $intro_custom_link_text ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
<?php } // while

wp_reset_postdata(); ?>

<?php
/**
 * Functions hooked in to storefront_before_content
 *
 * @hooked storefront_header_widget_region - 10
 */
do_action( 'storefront_before_content' ); ?>

<?php
get_footer();