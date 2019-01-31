<!--single-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap row">

					<main id="main" class="col-xs-12 col-sm-9 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="hero">
								<?php the_post_thumbnail('full'); ?>
							</div>
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                <header class="article-header entry-header">

                  <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

                  <p class="byline entry-meta vcard">

                    <?php printf( __( 'Posted', 'treystheme' ).' %1$s %2$s',
                       /* the time the post was published */
                       '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       /* the author of the post */
                       '<span class="by">'.__( 'by', 'treystheme' ).'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    ); ?>

                  </p>

                </header>

                <section class="entry-content cf" itemprop="articleBody">
                  <?php the_content(); ?>
                </section>

                <footer class="article-footer">

                  <?php printf( __( 'filed under', 'treystheme' ).': %1$s', get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'treystheme' ) . '</span> ', ', ', '</p>' ); ?>

                </footer> <?php // end article footer ?>

              </article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'treystheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'treystheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'treystheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</main>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
