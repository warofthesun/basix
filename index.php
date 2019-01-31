<!--index-->
<?php get_header(); ?>
			<?php
			if ( is_front_page() ) {
				echo '<div id="content" class="page--front-page">';
			} else {
				echo '<div id="content">';
			}
			?>
				<div id="inner-content" class="wrap row">


						<div id="main" class="col-xs-12 col-md-10" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( ' single-post' ); ?> role="article">
								<div class="hero">
									<?php the_post_thumbnail('full'); ?>
								</div>


								<header class="article-header">
									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline entry-meta vcard">
	                      <?php printf( __( '', 'treystheme' ).' %1$s %2$s',
	       								/* the time the post was published */
	       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	       								/* the author of the post */
	       								'<span class="by">'.__( '', 'treystheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
	    							); ?>
									</p>

								</header>

								<section class="entry-content ">
									<?php the_content(); ?>
								</section>

								<?php
								if ( is_front_page() ) {
									echo '<footer class="article-footer">';
								} else {
									echo '<footer class="article-footer">';
								}
								?>

                 	<?php printf( '<p class="footer-category">' . __('filed under', 'treystheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'treystheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>

							<?php endwhile; ?>

									<?php starter_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry ">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'treystheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'treystheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'treystheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

						<?php
						if ( is_front_page() ) {
						  //
						} else {
						  get_sidebar();
						}
						?>



				</div>

			</div>

<?php get_footer(); ?>
