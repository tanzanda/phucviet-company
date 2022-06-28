<?php
/**
 * Main template file.
 *
 * @package Aquila
 */

get_header();


?>

    <div id="primary">
        <main id="main" class="site-main mt-5" role="main">
                <?php
                if ( have_posts() ) {
                    ?>
                    <div class="container">
                        <?php
                        // see https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png
                        // home.php (image above) == is_home() (include font-page + blog posts page)
                        if( is_home() && !is_front_page()){
                            ?>
                            <header class="mb-5">
                                <h1 class="page-title screen-reader-text">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                            <?php
                        }
                        ?>



                        <div class="row">
                            <?php
                            $index         = 0;
                            $no_of_columns = 3;

                            while ( have_posts() ) : the_post();

                                if ( 0 === $index % $no_of_columns ) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <?php
                                }
                            ?>

                                        <h3><?php the_title(); ?></h3>
                                        <div><?php the_content(); ?></div>

                            <?php
                                $index ++;

                                if ( 0 !== $index && 0 === $index % $no_of_columns ) {
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

