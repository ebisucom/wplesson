<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): 
the_post(); ?>

<main <?php post_class( 'mycontainer' ); ?>>
<?php the_content(); ?>
</main>

<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
