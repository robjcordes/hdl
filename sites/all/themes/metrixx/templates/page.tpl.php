<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
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

<div class="top_header">
  <div class="top_header_inner_wrapper">
    <?php print render($page['search_bar']); ?>

      <?php if (theme_get_setting('social_links', 'metrixx')): ?>
          <div class="social-icons">
              <ul>
                  <li><a href="<?php echo theme_get_setting('facebook_url', 'metrixx'); ?>" class="facebook" target="_blank" rel="me">Facebook</a></li>
                  <!--                    <li><a href="<?php echo theme_get_setting('twitter_url', 'metrixx'); ?>" class="twitter" target="_blank" rel="me">twitter</a></li>   -->
                  <li><a href="<?php echo theme_get_setting('googleplus_url', 'metrixx'); ?>" class="googleplus" target="_blank" rel="me">googleplus</a></li>
                  <li><a href="<?php echo theme_get_setting('linkedin_url', 'metrixx'); ?>" class="linkedin" target="_blank" rel="me">linkedin</a></li>
                  <!--                    <li><a href="--><?php //echo theme_get_setting('skype_url', 'metrixx'); ?><!--" class="skype" target="_blank" rel="me">Skype</a></li>-->
                  <!--                    <li><a href="--><?php //echo theme_get_setting('vimeo_url', 'metrixx'); ?><!--" class="vimeo" target="_blank" rel="me">Vimeo</a></li>  -->
                  <!--                     <li><a href="<?php print $front_page; ?>/rss.xml" class="rss">RSS</a></li> -->
              </ul>
          </div>
      <?php endif; ?>
  </div>
</div>

  <div id="container">

    <div id="header_wrapper">

        <div id="header" role="banner">



          <?php if ($logo): ?>
              <div id="logo">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                  <img src="<?php print $logo; ?>"/></a>
              </div>
          <?php endif; ?>

            <?php print render($page['contact_no']); ?>

        </div>

        <nav id="main-menu"  role="navigation">
          <a class="nav-toggle" href="#">Navigation</a>
          <div class="menu-navigation-container">
            <?php 
            if (module_exists('i18n')) {
              $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
            } else {
              $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
            }
            print drupal_render($main_menu_tree);
            ?>
          </div>
          <div class="clear"></div>
        </nav><!-- end main-menu -->
        
    </div>

    <?php print render($page['google_map']); ?>

    <?php if ($is_front): ?>

    <?php print render($page['slideshow']); ?>

     <?php if ($page['top_first'] || $page['top_second'] || $page['top_third']): ?> 
      <div id="top-area" class="clearfix">
        <?php if ($page['top_first']): ?>
        <div class="column"><?php print render($page['top_first']); ?></div>
        <?php endif; ?>
        <?php if ($page['top_second']): ?>
        <div class="column"><?php print render($page['top_second']); ?></div>
        <?php endif; ?>
        <?php if ($page['top_third']): ?>
        <div class="column"><?php print render($page['top_third']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php print render($page['front_welcome']); ?>

    <?php endif; ?>

    <?php if (theme_get_setting('breadcrumbs', 'metrixx')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?>

    <div class="content-sidebar-wrap">

    <div id="content">
      
      <section id="post-content" role="main">
        <?php print $messages; ?>
        <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
      </section> <!-- /#main -->
    </div>

    <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar-first" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>
  
    </div>

    <?php if ($page['sidebar_second']): ?>
      <aside id="sidebar-second" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <?php if ($is_front): ?>
    <div class="tab_testimonials_wrapper">
      <?php print render($page['tab']); ?>
      <?php print render($page['testimonials']); ?>
    </div>
    <?php endif; ?>

    <?php print render($page['clients']); ?>
  
</div>

<div id="footer">

  <div id="footer_wrapper">

    <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?> 
      <div id="footer-area" class="clearfix">
        <?php if ($page['footer_first']): ?>
        <div class="column"><?php print render($page['footer_first']); ?></div>
        <?php endif; ?>
        <?php if ($page['footer_second']): ?>
        <div class="column"><?php print render($page['footer_second']); ?></div>
        <?php endif; ?>
        <?php if ($page['footer_third']): ?>
        <div class="column"><?php print render($page['footer_third']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="footer_credit">
    <div class="footer_inner_credit">
    <?php if ($page['footer']): ?>
       <div id="foot">
        <?php print render($page['footer']) ?>
      </div>
   <?php endif; ?>


      
    <div id="copyright">
      <p class="copyright"><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>,
          Harris|Dixon Trial Attorneys, PLLC  </p>
      <p class="credits"> <?php print t('Developed by'); ?>  
      <a href="http://www.principlepoint.com">Principle Point Marketing, LLC</a></p>
    <div class="clear"></div>
    </div>
  </div>

  </div>

</div>


