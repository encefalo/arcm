<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *	 least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *	 or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *	 when linking to the front page. This includes the language domain or
 *	 prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *	 in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *	 in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *	 site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *	 the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *	 modules, intended to be displayed in front of the main title tag that
 *	 appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *	 modules, intended to be displayed after the main title tag that appears in
 *	 the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *	 prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *	 (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *	 menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *	 associated with the page, and the node ID is the second argument
 *	 in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *	 comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content_top']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['content_bottom']: Items for the header region.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>


<?php if ( !theme_get_setting( 'theme995_breadcrumb_show' ) ) :
	$breadcrumb = NULL;
endif; ?>

<?php if ( $main_menu ) : ?>
	<a href="#main-menu" class="element-invisible element-focusable"><?php print t( 'Skip to navigation' ); ?></a>
<?php endif; ?>
<a href="#content" class="element-invisible element-focusable"><?php print t( 'Skip to main content' ); ?></a>


<div id="page-wrapper" class="page-wrapper">
	<div id="page" class="page">
		
		<!-- Header
		======================================================================================= -->
		<header id="header" class="header page-header clearfix" role="banner">
			<!-- Region Header Top -->
			<?php if ( $page['header_top'] ) : ?>
				<div class="container-12">
					<div class="grid-12">
						<?php print render( $page['header_top'] ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( !$is_front ) : ?>
				<div class="img-bg parallax-box image-parallax-box">
					<div class="parallax-bg" data-parallax-type="image" data-img-url="<?php echo base_path().path_to_theme(); ?>/images/bg04.jpg" data-speed="0.5" data-invert="false"></div>
			<?php endif; ?>
			<div class="header-section-1">
				<div class="<?php if ( theme_get_setting( 'theme995_sticky_menu' ) ) { echo 'stickup '; } ?>inner"> <!-- Sticky menu wrapper -->
					<div class="container-12">
						<div class="grid-4">
							<!-- Logo -->
							<?php if ( $logo || $site_name || $site_slogan ) :?>
								<div id="logo" class="logo">
									<?php if ( $logo ) : // logo image ?>
										<a href="<?php print $front_page; ?>" title="<?php print t( 'Home' ); ?>" rel="home" id="img-logo" class="img-logo">
											<img src="<?php print $logo; ?>" alt="<?php print t( 'Home' ); ?>">
										</a>
									<?php endif;
	
									if ( $site_name ) : //site name ?>
										<h1 title="<?php print $site_name; ?>" id="site-name" class="site-name">
											<a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><?php print $site_name; ?></a>
										</h1>
									<?php endif;
	
									if ( $site_slogan ) : // site slogan ?>
										<div title="<?php print $site_slogan; ?>" id="slogan" class="slogan">
											<?php print $site_slogan; ?>
										</div>
									<?php endif; ?>
								</div><!-- /#name-and-slogan -->
							<?php endif; ?>
						</div>
	
						<div class="grid-8">
							<!-- Region Menu -->
							<?php if ( $page['menu'] ) :
								print render( $page['menu'] );
							endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if ( !$is_front ) : ?>
				</div>
			<?php endif; ?>

			<!-- Region Header -->
			<?php if ( $page['header'] ) : 
				theme995_region_preffix ( 'header' );
					print render( $page['header'] );
				theme995_region_suffix ( 'header' );
			endif; ?>

			<!-- Region Header bottom -->
			<?php if ( $page['header_bottom'] ) : 
				theme995_region_preffix ( 'header_bottom' );
					print render( $page['header_bottom'] );
				theme995_region_suffix ( 'header_bottom' );
			endif; ?>
		</header>

		<!-- Content
		======================================================================================= -->
		<div id="main-wrapper" class="main-wrapper" role="main">
			<!-- Region content top -->
			<?php if ( $page['content_top'] ) : 
				theme995_region_preffix ( 'content_top' );
					print render( $page['content_top'] );
				theme995_region_suffix ( 'content_top' );
			endif; ?>
			
			<!-- Region Section top 1 -->
			<?php if ( $page['section_top_1'] ) : 
				theme995_region_preffix ( 'section_top_1' );
					print render( $page['section_top_1'] );
				theme995_region_suffix ( 'section_top_1' );
			endif; ?>
			
			<!-- Region Section top 2 -->
			<?php if ( $page['section_top_2'] ) : 
				theme995_region_preffix ( 'section_top_2' );
					print render( $page['section_top_2'] );
				theme995_region_suffix ( 'section_top_2' );
			endif; ?>
			
			<!-- Region Section top 3 -->
			<?php if ( $page['section_top_3'] ) : 
				theme995_region_preffix ( 'section_top_3' );
					print render( $page['section_top_3'] );
				theme995_region_suffix ( 'section_top_3' );
			endif; ?>
			
			<div id="main" class="main clearfix">
				<div class="main-before"></div>
				<div class="container-12">
					<div class="grid-12">
						<?php if ( $page['sidebar_first'] ) : ?>
							<!-- Left sidebar -->
							<aside id="sidebar-first" class="sidebar-first sidebar grid-4 alpha" role="complementary">
								<?php print render( $page['sidebar_first'] ); ?>
							</aside>
						<?php endif; ?>

						<!-- Page content -->
						<div id="content" class="content content-main <?php if ( ( $page['sidebar_first'] ) && ( $page['sidebar_second'] ) ) : print 'grid-4'; elseif ( $page['sidebar_first'] ) : print 'grid-8 omega'; elseif ( $page['sidebar_second'] ) : print 'grid-8 alpha'; endif; ?>">
							<?php if ( $page['highlighted'] || $breadcrumb || ( $title && !$is_front ) || $tabs['#primary'] || $action_links || $page['help'] || $messages ) : ?>
								<header id="content-header" class="content-header">
									<?php if ( $messages ) : ?>
										<!-- System messages -->
										<div id="messages" class="messages-wrapper clearfix">
											<?php print $messages; ?>
										</div>
									<?php endif; ?>

									<?php if ( $page['highlighted'] ) : ?>
										<!-- Highlighted -->
										<div id="highlighted" class="highlighted"><?php print render( $page['highlighted'] ); ?></div>
									<?php endif; ?>

									<?php if ( $breadcrumb ) : ?>
										<!-- Breadcrumbs -->
										<div id="breadcrumb" class="breadcrumb clearfix"><?php print $breadcrumb; ?></div>
									<?php endif; ?>

									<?php if ( $title && !$is_front ) :
										print render( $title_prefix ); ?>
											<!-- Page title -->
											<h2 id="page-title" class="title page-title" ><?php print $title; ?></h2>
										<?php print render( $title_suffix );
									endif; ?>

									<?php if ( $page['help'] ): ?>
										<!-- System help block -->
										<?php print render( $page['help'] );
									endif; ?>

									<?php if ( !empty( $tabs['#primary'] ) ) : ?>
										<!-- Tabs links -->
										<div class="tabs"><?php print render( $tabs ); ?></div>
									<?php endif; ?>

									<?php if ( $action_links ) : ?>
										<!-- Action links -->
										<ul class="action-links">
											<?php print render( $action_links ); ?>
										</ul>
									<?php endif; ?>
								</header>
							<?php endif; ?>

							<!-- Page content -->
							<?php print render( $page['content'] ); ?>
						</div>

						<?php if ( $page['sidebar_second'] ) : ?>
							<!-- Right sidebar -->
							<aside id="sidebar-second" class="sidebar-second sidebar grid-4 omega" role="complementary">
								<div class="section">
									<?php print render( $page['sidebar_second'] ); ?>
								</div>
							</aside>
						<?php endif; ?>
					</div>
				</div>
				<div class="main-after"></div>
			</div>
			
			<!-- Region Section bottom 1 -->
			<?php if ( $page['section_bottom_1'] ) : 
				theme995_region_preffix ( 'section_bottom_1' );
					print render( $page['section_bottom_1'] );
				theme995_region_suffix ( 'section_bottom_1' );
			endif; ?>
			
			<!-- Region Section bottom 2 -->
			<?php if ( $page['section_bottom_2'] ) : 
				theme995_region_preffix ( 'section_bottom_2' );
					print render( $page['section_bottom_2'] );
				theme995_region_suffix ( 'section_bottom_2' );
			endif; ?>
			
			<!-- Region Section bottom 3 -->
			<?php if ( $page['section_bottom_3'] ) : 
				theme995_region_preffix ( 'section_bottom_3' );
					print render( $page['section_bottom_3'] );
				theme995_region_suffix ( 'section_bottom_3' );
			endif; ?>
			
			<!-- Region Content bottom -->
			<?php if ( $page['content_bottom'] ) : 
				theme995_region_preffix ( 'content_bottom' );
					print render( $page['content_bottom'] );
				theme995_region_suffix ( 'content_bottom' );
			endif; ?>
		</div>

		<!-- Footer
		======================================================================================= -->
		<footer id="footer" class="footer page-footer img-bg parallax-box image-parallax-box" role="contentinfo">
			<div class="parallax-bg" data-parallax-type="image" data-img-url="<?php echo base_path().path_to_theme(); ?>/images/bg03.jpg" data-speed="0.5" data-invert="false"></div>
			<!-- Region Footer top -->
			<?php if ( $page['footer_top'] ) : 
				theme995_region_preffix ( 'footer_top' );
					print render( $page['footer_top'] );
				theme995_region_suffix ( 'footer_top' );
			endif; ?>

			<div id="footer-wrapper" class="footer-wrapper">
				<div class="container-12">
					<div class="grid-12">
						<!-- Region Footer -->
						<?php if ( $page['footer'] ) :
							print render( $page['footer'] );
						endif; ?>

					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
