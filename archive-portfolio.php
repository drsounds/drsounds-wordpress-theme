<?php get_header();?>
<div class="glass glass-default" style="background-position: fixed; background-size: cover; background-image: url('<?php echo get_theme_mod('front_image_url')?>'); height:200pt;">
    <div class="glass-content">
        <div class="container">
        <h1>Portfolio</h1>
    </div>
</div>
</div>
<div class="section">
    <div class="section-content">
    <div class="container">
        <div class="row">
            <?php
            $q = new WP_Query();
            $q->query(array('post_type' => 'portfolio'));

            while($q->have_posts()): $q->the_post();
                $image = get_post_meta($q->post->ID, 'image', TRUE);
            ?>
                <div class="col-md-4" >
                    <div class="box box-default" style="min-height: 400pt">
                        <div class="box-image" style="height: 120pt; background-size: 100%; background-image: url('<?php echo $image?>')"></div>

                        <div class="box-content">
                            <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                            <?php the_content()?>
                            <small>Frameworks:<br><?php echo get_the_term_list( $post->id, array('platforms'), '', ', ', '' ) ?></small><br> 
                            <small>Industry:<br><?php echo get_the_term_list( $post->id, 'industries', '', ', ', '' ) ?></small> 
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
