<?php global $dm_settings; ?>
<?php if ( has_nav_menu( 'main_menu' ) ) : ?>

    <div class="row dmbs-top-menu">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                        <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					
					<?php if (!$dm_settings['show_header']) : ?>
						<a class="navbar-brand" href="/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
                </div>
				<div class="collapse navbar-collapse navbar-1-collapse">
					<form role="search" method="get" class="navbar-form navbar-right form-group-md" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div>
							<div class="form-group has-feedback">
								<label class="sr-only" for="s">搜索：</label>
								<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control">
								<i class="glyphicon glyphicon-search form-control-feedback"></i>
							</div>
						</div>
					</form>
					<?php
					wp_nav_menu( array(
							'theme_location'    => 'main_menu',
							'depth'             => 2,
							'container'         =>false,
							'menu_class'        => 'nav navbar-nav navbar-right',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
					);
					?>
				</div>
            </div>
        </nav>
    </div>

<?php endif; ?>