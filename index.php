<?php 
/**
 * Main template file.
 * 
 * @package Codecx
 */

get_header();
?>

<main>
<?php
    if(have_posts()) :
    while (have_posts()) : the_post(); ?>
    
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p>
        <?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>"> Read more...</a>
    </p>

    <p class="info_meta">
        <?php the_author();
            echo ' || '; the_time();
        ?>
    </p>
            
<?php endwhile;
    else:
        echo "<p?>Tidak ada artikel</p>";
    endif;
?>
</main>

<nav>
    <?php echo paginate_links() ;?>
</nav>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0dcaf0" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,229.3C672,235,768,181,864,170.7C960,160,1056,192,1152,176C1248,160,1344,96,1392,64L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

<?php
get_footer(); 
?>