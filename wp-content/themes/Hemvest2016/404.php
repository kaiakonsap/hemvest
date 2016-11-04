<?php
get_header(); ?>
			<section class="error-404 not-found">
				<header class="header">
					<h1 class="entry-title"><?php _e( 'Lehte ei leitud', 'hemvest2016' ); ?></h1>
				</header><!-- .page-header -->

				  <div class="col-xs-12 col-md-12">
					<p><?php _e( 'Ehk proovite otsingut?', 'hemvest2016' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

<?php get_footer(3); ?>
