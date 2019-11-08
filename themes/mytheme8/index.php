<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): 
the_post(); ?>

<article <?php post_class( 'mycontainer' ); ?>>

<div class="myposthead">
<?php the_category(); ?>

<h1><?php the_title(); ?></h1>

<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
<?php echo esc_html( get_the_date() ); ?>
</time>
</div>

<?php the_content(); ?>

<?php the_post_navigation(); ?>

</article>

<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
