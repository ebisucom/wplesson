</div> <!-- mycontents ここまで -->

<aside class="mymenu">
<div class="mycontainer">
<div class="alignwide mymenu-columns">

<section class="myprofile">
<h2>PROFILE</h2>
<figure>
<img src="<?php echo esc_url( get_theme_file_uri( 'profile.jpg' ) ); ?>" alt="">
</figure>
<strong><?php the_author_meta( 'display_name' ); ?></strong>
<p><?php the_author_meta( 'description' ); ?></p>
</section>

<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>

</div>
</div>
</aside>

</div> <!-- mycols ここまで -->