<?php
/** Tribune Publishing Wordpress Theme
 *  By Brice Bertels 11/14/2013, the maiden voyage launched.
 */
?>
<!-- get header  here -->
<html>
    <head>
        <title>Tribune Publishing</title>
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet'
        type='text/css' /> -->
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel='stylesheet' type="text/css" />
    </head>
    <body>
        <!-- beginning of the body tag -->
        <!-- get neck here -->
        <div class="neck">i&#39;m the neck</div>
        <!-- get page contennt here -->

        <div class="content">
        <?php $category_in_url = (get_query_var( 'category_name' )) ? get_query_var('category_name') : "home"; ?>
        <?php echo "<pre><span>category_in_url: </span>"; print_r( $category_in_url ); echo "</pre>"; ?>
        <?php $large_cat = get_cat_ID("Large"); ?>
        <?php $medium_cat = get_cat_ID("Medium"); ?>
        <?php $small_cat = get_cat_ID("Small"); ?>
        <?php $location_cat = get_cat_ID($category_in_url); ?>
        <!-- LARGE BLOCKS -->
            <?php
            $large_args = array('category__and' => array($location_cat, $large_cat));
            $large_query = new WP_Query($large_args);
            if ( $large_query -> have_posts()):
                while ($large_query -> have_posts()) : 
                    $large_query -> the_post(); ?>
                    <div class="large-block">
                        <h2 class="large-block-title">
                            <?php the_title(); ?>
                        </h2>
                        <h3>
                            <?php the_category(); ?>
                        </h3>
                        <div class="large-block-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                 <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e( sprintf("No Large Blocks in location cat ID %s",$location_cat)); ?></p>
            <?php endif; ?>
            
        <!-- MEDIUM BLOCKS -->
            <?php
            $medium_args = array('category__and' => array($location_cat, $medium_cat));
            $medium_query = new WP_Query($medium_args);
            if ( $medium_query -> have_posts()):
                while ($medium_query -> have_posts()) : 
                    $medium_query -> the_post(); ?>
                    <div class="medium-block">
                        <h2 class="medium-block-title">
                            <?php the_title(); ?>
                        </h2>
                        <h3>
                            <?php the_category(); ?>
                        </h3>
                        <div class="medium-block-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                 <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e( sprintf("No Medium Blocks in location cat ID %s",$location_cat)); ?></p>
            <?php endif; ?>
            
        <!-- SMALL BLOCKS -->
            <?php
            $small_args = array('category__and' => array($location_cat, $small_cat));
            $small_query = new WP_Query($small_args);
            if ( $small_query -> have_posts()):
                while ($small_query -> have_posts()) : 
                    $small_query -> the_post(); ?>
                    <div class="small-block">
                        <h2 class="small-block-title">
                            <?php the_title(); ?>
                        </h2>
                        <h3>
                            <?php the_category(); ?>
                        </h3>
                        <div class="small-block-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                 <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e( sprintf("No Small Blocks in location cat ID %s",$location_cat)); ?></p>
            <?php endif; ?>
        </div><!--class="content"-->
        
        
        
        <!-- get footer here -->
        <div class="footer">i&#39;m the footer</div>
    </body>
</html>
