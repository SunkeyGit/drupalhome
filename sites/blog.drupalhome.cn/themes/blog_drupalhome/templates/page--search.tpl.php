<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">

  <header class="header" id="header" role="banner">
    <section class="content-inside">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php print render($page['header']); ?>
    </section>
  </header>

  <div id="main">
	<section class="content-inside">
    <div id="content" class="column" role="main">
	  <div class="search-menu">
	      <?php
		      $current_path = $_GET['q'];
		      $is_menu1 = preg_match('/^search\/key*/i', $current_path);
			  $is_menu2 = preg_match('/^search\/tag*/i', $current_path);
		  ?>
		  <a href="/search/key" class="search-key <?php if($is_menu1) print 'active';?>"><?php print t('全文搜索');?></a>
		  <a href="/search/tag" class="search-tag <?php if($is_menu2) print 'active';?>"><?php print t('Tag搜索');?></a>
	  </div>
      <?php print render($page['content']); ?>
    </div>
    </section>
  </div>
  <section class="footer-wrapper">
      <?php print render($page['footer']); ?>
  </section>

</div>
