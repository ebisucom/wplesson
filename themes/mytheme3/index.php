<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if(have_posts()): while(have_posts()): 
the_post(); ?>

<article <?php post_class( 'mycontainer' ); ?>>

<h1><?php the_title(); ?></h1>

<?php the_content(); ?>

</article>

<?php endwhile; endif; ?>

<?php wp_footer(); ?>
</body>
</html>
