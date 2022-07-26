<?php 
/**
 * Main template file.
 * 
 * @package Codecx
 */

get_header();
?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php
            if( have_posts() ) {
                ?>
                <div class="container">
                    <?php
                        if ( is_home() && ! is_front_page() ) {
                            ?>
                            <header class="mb-5">
                                <h1 class="page-title">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                            <?php
                        }
                    ?>


                    <div class="row">
                        <?php
                            $index = 0;
                            $no_of_colomns = 1;
                            
                            // Case: index = 0;
                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                if ( 0 === $index % $no_of_colomns ) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <?php
                                }

                                ?>
                                <h3><?php the_title(); ?></h3>
                                <div><?php the_excerpt(); ?></div>
                                <?php

                                $index++;
                                // Index value = 1;

                                    if ( 0 !== $index && 0 === $index % $no_of_colomns ) {
                                    ?>
                                    </div>
                                    <?php
                                    }
                            endwhile;
                        ?>
                    </div>
                </div>
                <?php
            }
        ?>
    </main>
</div>

<?php
get_footer(); 
?>