<?php get_header();
while(have_posts()): the_post();
$image = get_post_meta($post->ID, 'image', TRUE);
$url = get_post_meta($post->ID, 'url', TRUE);
?>

<div class="section section-default">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php the_title();?></h1>
                    <p><?php the_content();?></p>
                    <a href="<?php echo $url?>" class="btn btn-primary">Visit site</a>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $image?>" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile;

get_footer();?>
