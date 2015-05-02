<?php get_header();?>
<div class="glass glass-default" style="background-image: url('<?php echo get_theme_mod('front_image_url')?>')">
    <div class="glass-content">
        <div class="container">
            <h1>Videos featuring Dr. Sounds</h1>
        </div>
    </div>
</div>
<div class="section section-default">
    <div class="section-content">
        <div class="container">
            <hr>
            <h1>Videos featuring Dr. Sounds <a href="/videos" class="btn btn-primary pull-right">See more</a></h1>
            <br>
            <div class="row">
                <?php
                
                while(have_posts()): the_post();
                get_template_part('template', 'videos');
                endwhile;?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>