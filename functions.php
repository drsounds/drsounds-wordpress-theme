<?php
require_once('wp_bootstrap_navwalker.php');
require_once('metapress/metapress.php');
require_once('metapress/datapress.php');
// load script to admin
function wpss_admin_js() {
    wp_enqueue_media(); 
}
 add_action('admin_enqueue_scripts', 'wpss_admin_js');
add_action('enqueue_scripts', 'drsounds_enqueue_scripts');
function drsounds_enqueue_scripts () {
    wp_enqueue_script('jquery');
}
$post_types = array(
    'tracks' => array(
        'title' => 'Tracks',
        'meta_fields' => array(
            'spotify_uri' => array(
                'title' => 'Spotify URI'
            )
        )
    ),
    'portfolio' => array(

        'title' => 'Portfolio',
        'meta_fields' => array(
            'image' => array(
                'type' => 'image',
                'title' => 'Image'
            ),
            'url' => array(
                'type' => 'url',
                'title' => 'URL'
            )
        )
    ),
    'dreams' => array(
        'title' => 'Dreams',
        'meta_fields' => array()
    ),
    'page' => array(
        'title' => array(),
        'meta_fields' => array(
            'image' => array(
                'type' => 'image'
            )
        )
    ),
    'releases' => array(    
        'title' => 'Releases',
        'meta_fields' => array(
            'upc' => array(
                'title' => 'UPC'
            ),
            'cover' => array(
                'type' => 'image',
                'title' => 'Cover'
            ),
            'release_date' => array(
                'type' => 'date',
                'title' => 'Release Date'
            ),
            'spotify_uri' => array(
                'type' => 'uri',
                'title' => 'Spotify URI'
            )
        )
    ),
    'videos' => array(
        'title' => 'Video',
        'meta_fields' => array(
            'url' => array(
                'title' => 'Video URL'
            ),
            'own' => array(
                'title' => 'Own',
                'type' => 'bool'
            )
        )
    ),
    'collaborations' => array(
        'title' => 'Collaboration',
        'meta_fields' => array(
            'url' => array(
                'title' => 'Video URL'
            )
        )
    ),
    'resume' => array(
        'title' => 'Resumé',
        'meta_fields' => array(
            'duration' => array(
                'title' => 'Duration'
            )
        )
    )
);

/*
 * Calculate correct md that mateches the count of itesm
 */
function bootstrap_blockize($count) {
    // max col md
    $max_segments = 12;

    $t = (12 / ($count)) * 2;
    return $t;

}

$models = array(
    'track_relations' => array(
        'title' => 'Track Relation',
        'fields' => array(
            'id' => array(
                'type' => 'integer',
                'primaryKey' => true
            ),
            'source' => array(
                'type' => 'varchar(255)',
                'title' => __('Source')
            ),
            'target' => array(
                'type' => 'varchar(255)',
                'title' => __('Target')
            ),
            'type' => array(
                'type' => 'integer',
                'title' => __('Relation type')
            ),
            'established' => array(
                'type' => 'datetime',
                'title' => __('Established')
            )
        )
    )
);

$taxonomies = array(
    'realms' => array(
        'for' => array('tracks', 'dreams'),
        'title' => 'Realm'
    ),
    'release_formats' => array(
        'for' => array('releases'),
        'title' => 'Format'
    ),
    'releases' => array(
        'for' => array('tracks'),
        'title' => 'Release'
    ),
    'industries' => array(
        'for' => array('portfolio', 'videos', 'resume'),
        'title' => 'Industry'
    ),
    'platforms' => array(
        'for' => array('portfolio', 'resume'),
        'title' => 'Platform'
    ),
    'genres' => array(
        'for' => array('tracks', 'releases', 'videos'),
        'title' => 'Genre'
    ),
    'labels' => array(
        'for' => array('releases'),
        'title' => 'Record Label'
    ),
    'mood' => array(
        'for' => 'tracks',
        'title' => 'Mood'
    ),
    'languages' => array(
        'for' => 'videos',
        'title' => 'Language'
    ),
    'bpm' => array(
        'for' => 'tracks',
        'title' => 'BPM'
    ),
    'collection' => array(
        'for' => 'tracks',
        'title' => 'Collection'
    ),
    'companies' => array(
        'for' => array('portfolio', 'resume'),
        'title' => 'Company'
    ),
    'work_type' => array(
        'for' => 'portfolio',
        'title' => 'Work type'
    ),
    'roles' => array(
        'for' => 'resume',
        'title' => 'Role'
    )
);

$settings = array(
    'sections' => array(
        'drsounds' =>  array(
            'title' => 'Dr. Sounds settings',
            'settings' => array(
                'logo_url' => array(
                    'type' => 'image',
                    'title' => 'Logotype'
                ),
                'front_image_url' => array(
                    'type' => 'image',
                    'title' => 'Front image'
                ),
                'secondary_image_url' => array(
                    'type' => 'image',
                    'title' => 'Secondary image'
                ),
                'tertiary_image_url' => array(
                    'type' => 'image',
                    'title' => 'Tertiary image'
                ),
                'headline' => array(
                    'title' => 'Headline'
                )
            )
        )
    )
);


add_filter( 'releases_orderby', 'drsounds_orderby_release_date', 10, 2 );
function drsounds_orderby_release_date  ( $orderby, $query ) {
    global $wpdb;
    return " CAST( $wpdb->postmeta.meta_value AS DATE ) " . $query->get( 'order', 'desc' );
}

metapress_init($post_types, $settings, $taxonomies);

$app_namespace = 'drsounds';
$app_title = "Dr. Sounds";

datapress_init();