<?php
/** Tribune Publishing Wordpress Theme
 *  By Brice Bertels 11/14/2013, the maiden voyage launched.
 */
?>
<!-- get header  here -->
<html>
    <head>
        <title>Tribune Publishing</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet'
        type='text/css' />
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel='stylesheet' type="text/css" />
        
        <!-- PHP INIT -->
        <!-- Assign variables for page wide operations -->
        <?php $category_in_url = (get_query_var( 'category_name' )) ? get_query_var('category_name') : "home"; ?>
        <?php $large_cat = get_cat_ID("Large"); ?>
        <?php $medium_cat = get_cat_ID("Medium"); ?>
        <?php $small_cat = get_cat_ID("Small"); ?>
        <?php $neck_cat = get_cat_ID("Neck"); ?>
        <?php $location_cat = get_category_by_slug($category_in_url)->term_id; ?>
    </head>
    <body>
        
        <div class="everything">
        
        <div class="header">
            <div class="header-left">
                <img class="header-logo" src="/wp-content/themes/tribune/img/Tribune-Publishing-logo.png" />
                <p class="header-title">Tribune Publishing</p>
            </div>
            <div class="header-right">
                <p class="header-address">
                    <span class="address-line">101 North Fourth Street</span>
                    <span class="address-comma">, </span>
                    <span class="address-line">Columbia, MO 65201</span>
                    <span class="address-comma">, </span>
                    <span class="address-line">(800) 333-6256</span>
                </p>
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
        
            
        </div> <!-- class="header" -->
        <div class="clear"></div>
        <div class="content">
        
            <!-- NECK BLOCK -->
            <div class="neck-container">
                <?php $neck_args = array('category__and' => array($location_cat, $neck_cat));
                $neck_query = new WP_Query($neck_args);
                if ( $neck_query -> have_posts()):
                while ($neck_query -> have_posts()) : 
                $neck_query -> the_post(); 
                
                $attachments = get_children(array('post-type' => 'attachment', 'post_parent' => get_the_ID()));
                foreach ($attachments as $attachment) {
                    $attachment_id = $attachment->ID;
                }
                $image_attributes = wp_get_attachment_image_src( $attachment_id,full );?>
                <div class="neck-image-container" style='background-image: url("<?php echo esc_url($image_attributes[0]);?>");'>
                </div>
                
                <div class="neck-text-container">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                        <p>
                            <?php the_content(); ?>
                        </p>
                </div>
                
                 <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <!--<?php _e( sprintf("No neck post in location cat ID %s",$location_cat)); ?>-->
                <?php endif; ?>
            </div> <!-- class="neck-container" -->
                    
            <div class="clear"></div>
             
            <div class="small-block-container">
            <!-- SMALL BLOCKS -->
                <?php
                $small_args = array('category__and' => array($location_cat, $small_cat));
                $small_query = new WP_Query($small_args);
                if ( $small_query -> have_posts()):
                    while ($small_query -> have_posts()) : 
                        $small_query -> the_post(); ?>
                        <div class="small-block">
                            <h2 class="small-block-title header-red">
                                <?php the_title(); ?>
                            </h2>
                            <div class="small-block-body">
                                <?php the_content(); ?>
                            </div>
                        </div>
                     <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <!--<?php _e( sprintf("No Small Blocks in location cat ID %s",$location_cat)); ?>-->
                <?php endif; ?>
            </div> <!-- class="small-block-container" -->
            
            <div class="clear"></div>
            
            <div class="medium-block-container">
            <!-- MEDIUM BLOCKS -->
                <?php
                $medium_args = array('category__and' => array($location_cat, $medium_cat));
                $medium_query = new WP_Query($medium_args);
                if ( $medium_query -> have_posts()):
                    while ($medium_query -> have_posts()) : 
                        $medium_query -> the_post(); ?>
                        <div class="medium-block">
                            <h2 class="medium-block-title header-red">
                                <?php the_title(); ?> 
                            </h2>
                            <div class="medium-block-body">
                                <?php the_content(); ?>
                            </div>
                        </div>
                     <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <!--<?php _e( sprintf("No Medium Blocks in location cat ID %s",$location_cat)); ?>-->
                <?php endif; ?>
            </div> <!-- class="medium-block-container"-->    
            
            <div class="clear"></div>
            
            <div class="large-block-container">
            <!-- LARGE BLOCKS -->
                <?php
                $large_args = array('category__and' => array($location_cat, $large_cat));
                $large_query = new WP_Query($large_args);
                if ( $large_query -> have_posts()):
                    while ($large_query -> have_posts()) : 
                        $large_query -> the_post(); ?>
                        <div class="large-block">
                            <h2 class="large-block-title header-red">
                                <?php the_title(); ?>
                            </h2>
                            <div class="large-block-body">
                                <?php the_content(); ?>
                            </div>
                        </div>
                     <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <!--<?php _e( sprintf("No Large Blocks in location cat ID %s",$location_cat)); ?>-->
                <?php endif; ?>
            </div> <!-- class="large-block-container" -->
            
            <div class="clear"></div>
            
        </div><!--class="content"-->

        <!-- get footer here -->
        <div class="footer">
 
            <div class="clear"></div>
            <div class="footer-menu"><?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?></p>
            <div class="clear"></div>
            <p class="copyright">Content copyright Tribune Publishing Company. All Rights Reserved.</p>
        </div>
        
        </div> <!-- class="everything"-->
    </body>
</html>
