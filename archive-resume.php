<?php get_header();?>
<div class="glass glass-default" style="background-image: url('<?php echo get_theme_mod('front_image_url')?>')">
    <div class="glass-content">
        <div class="container">
            <h1>Resumé</h1>
        </div>
    </div>
</div>
<div class="section section-default">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <?php
                while(have_posts()): the_post();
                $companies = wp_get_post_terms($post->ID, array('roles'));
                $roles = wp_get_post_terms($post->ID, array('roles'));

                $
                ?>
                <article class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3><?php the_title()?><?php echo $companies[0]->name?></h3>
                            <small>at <?php echo $companies[0]->name?></small>
                            <p><?php the_content();?></p>
                        </div>
                    </div>
                </article>
            <?php endwhile;?>
            </div>
        </div>
    </div>
</div>w
<?php get_footer();?>
