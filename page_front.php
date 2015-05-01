<?php
/** 
 * Template Name: Front
 */
get_header();
?>
<div class="glass glass-default" style="text-align: center; width:100%; background-size: cover; background-attachment: fixed; display: block; height:500pt; background-color: #333; background-image: url('<?php echo get_theme_mod('front_image_url')?>')">
    <div class="glass-content">
        <div class="container">
            <h1>Welcome</h1>

<?php /* if (!empty(get_theme_mod('front_video_url'))):?>
    <iframe id="tungevaag-player" style="width: 1920px; height: 1080px; left: 0px; top: 0px;" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1920" height="1080" src="<?php echo get_theme_mod('front_video_url')?>?controls=0&amp;showinfo=0&amp;modestbranding=1&amp;wmode=transparent&amp;enablejsapi=1&amp;autoplay=<?php echo wp_is_mobile() ? '0' : '0';?>&amp; origin=http%3A%2F%2Fanebrun.com"></iframe>
<?php endif; */?>
        </div>
    </div>
    

</div>
<div class="section section-default">
    <div class="section-content">
        <div class="container">

            <?php
            $q = new WP_Query();
            $q->query(array('post_type' => 'page', 'pagename' => 'biography'));
            while($q->have_posts()): $q->the_post();?>
            <div class="row">
                
                <div class="col-md-6" style="font-size: 20pt">
                    <p><?php the_excerpt();?></p>
                </div>
            </div>
        <?php endwhile;?>
        </div>
    </div>
</div>
<div class="glass glass-default" style="text-align: center; background-size: cover; width:100%; background-attachment: fixed; display: block; height:100pt; background-color: #333; background-image: url('<?php echo get_theme_mod('secondary_image_url')?>')">
    <div class="glass-content">
        <div class="container">
          

<?php /* if (!empty(get_theme_mod('front_video_url'))):?>
    <iframe id="tungevaag-player" style="width: 1920px; height: 1080px; left: 0px; top: 0px;" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1920" height="1080" src="<?php echo get_theme_mod('front_video_url')?>?controls=0&amp;showinfo=0&amp;modestbranding=1&amp;wmode=transparent&amp;enablejsapi=1&amp;autoplay=<?php echo wp_is_mobile() ? '0' : '0';?>&amp; origin=http%3A%2F%2Fanebrun.com"></iframe>
<?php endif; */?>
        </div>
    </div>
    

</div>
<div class="section section-default">
    <div class="section-content">
        <div class="container">
            <h1>Latest releases <a href="/releases" class="btn btn-primary pull-right">See more releases</a></h1>
            <br>
            <div class="row">
            <?php
            $q = new WP_Query();
            $q->query(array('post_type' => 'releases'));

            while($q->have_posts()): $q->the_post();
                $year = get_post_meta($q->post->ID, 'release_date', TRUE);
                $cover = get_post_meta($q->post->ID, 'cover', TRUE);
                $labels = wp_get_post_terms($q->post->ID, array('labels'));
                $spotify_uri = get_post_meta($q->post->ID, 'spotify_uri', TRUE);
            ?>
                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-content">
                            <img src="<?php echo $cover?>" width="100%">
                            <h3><?php the_title()?></h3>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
            </div>
        </div>
    </div>
</div>
<div class="glass glass-default" style="text-align: center; width:100%; background-size: cover; background-attachment: fixed; display: block; height:300pt; background-color: #333; background-image: url('<?php echo get_theme_mod('tertiary_image_url')?>')">

<?php /* if (!empty(get_theme_mod('front_video_url'))):?>
    <iframe id="tungevaag-player" style="width: 1920px; height: 1080px; left: 0px; top: 0px;" frameborder="0" allowfullscreen="1" title="YouTube video player" width="1920" height="1080" src="<?php echo get_theme_mod('front_video_url')?>?controls=0&amp;showinfo=0&amp;modestbranding=1&amp;wmode=transparent&amp;enablejsapi=1&amp;autoplay=<?php echo wp_is_mobile() ? '0' : '0';?>&amp; origin=http%3A%2F%2Fanebrun.com"></iframe>
<?php endif; */?>
    
    

</div>
<div class="section section-default">
    <div class="section-content">
        <div class="container">
            <h1>Portfolio <a href="/releases" class="btn btn-primary pull-right">See more</a></h1>
            <br>
            <div class="row">
            <?php
            $q = new WP_Query();
            $q->query(array('post_type' => 'portfolio'));

            while($q->have_posts()): $q->the_post();
                $image = get_post_meta($q->post->ID, 'image', TRUE);
            ?>
                <div class="col-md-4">
                    <div class="box box-default">
                        <div class="box-header" style=")"></div>
                        <div class="box-image" style="height: 100pt; background-size: 100%; background-image: url('<?php echo $image?>')"></div>

                        <div class="box-content">
                            <h3><?php the_title()?></h3>
                            <p><?php the_content()?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>