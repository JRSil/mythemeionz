<?php
/**
 * @package WordPress
 * @subpackage Íonz
 */

get_header();
?> 
<?php print_r(get_fields()); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post() ?>
    <?php
        if( has_post_thumbnail() ) {
            the_post_thumbnail();
        }
    ?>

    <h2>
        <a href="<?php the_permalink() ?>">
            <?php the_title() ?>
        </a>
    </h2>

    <div class="content">
        <?php the_content() ?>
    </div>
<?php endwhile; ?>

<?php else : ?>
    <p>Não existem posts.</p>
<?php endif ?>

<?php get_footer(); ?>