<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav class="navbar navbar-default center-block">
    <div class="mobilelogo">
     <?php if ( get_header_image() ) : ?> 
       <div class="header-image">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
         <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
       </a>
     </div>
   <?php endif; ?>
 </div>
 <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar">
  &#9776;
</button>
<div id="navbar" class="navbar-collapse collapse">

 <?php wp_nav_menu(array('theme_location' => 'left-header-menu', 'container' => false,'menu_class'=> 'nav navbar-nav','items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>')); ?>
 <div class="logo">
   <?php if ( get_header_image() ) : ?>	
     <div class="header-image">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
       <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
     </a>
   </div>
 <?php endif; ?>
</div>
<?php wp_nav_menu(array('theme_location' => 'right-header-menu', 'container' => false,'menu_class'=> 'nav navbar-nav','items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>')); ?>
</div>

</nav>
<div id="page" class="container-fluid">


	<div id="content" class="site-content">
