<?php
/*
Template Name: Members Directory
*/
?>

<?php get_header(); ?>

<div class="wrapper section medium-padding">
										
	<div class="section-inner">
	
		<div class="content full-width">
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<div class="post">
				
					<div class="post-header">
												
					    <h2 class="post-title"><?php the_title(); ?></h2>
					    				    
				    </div> <!-- /post-header -->
				
					<?php if ( has_post_thumbnail() ) : ?>
						
						<div class="featured-media">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							
								<?php the_post_thumbnail('post-image'); ?>
								
								<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
										
									</div>
									
								<?php endif; ?>
								
							</a>
									
						</div> <!-- /featured-media -->
							
					<?php endif; ?>
				   				        			        		                
					<div class="post-content">
								                                        
						<?php 

							the_content();
						
							// The Query
						    $wp_user_search = new WP_User_Query(array(
						    	'fields' => 'all_with_meta'
						    ));
						    $members = $wp_user_search->get_results();

							foreach ($members as $member) {
								echo '<strong>' . $member->display_name . '</strong><br />';
								echo '<p>' . $member->get('description') . '</p>';
							}
						?>
															            			                        
					</div> <!-- /post-content -->
														
				</div> <!-- /post -->
			
			<?php endwhile; else: ?>
			
				<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "baskerville"); ?></p>
		
			<?php endif; ?>
		
			<div class="clear"></div>
			
		</div> <!-- /content -->
				
		<div class="clear"></div>
	
	</div> <!-- /section-inner -->

</div> <!-- /wrapper -->
								
<?php get_footer(); ?>