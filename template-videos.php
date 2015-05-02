$url = get_post_meta($post->ID, 'url', TRUE);
?>
<div class="col-md-6">
    <div class="box box-default">
        <div class="box-image" style="height: 250pt">
            <iframe frameborder="0" src="<?php echo str_replace('watch?v=', 'embed/', $url)?>" style="width: 100%; height:100%"></iframe>
        </div>

        <div class="box-content">
            <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
           
        </div>
    </div>
</div>
<?php 