<?php
if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'parent_slug'   => '',
        'position'      => false,
        'icon_url'      => false,
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Post Settings',
        'menu_title'    => 'Post Settings',
        'menu_slug'     => 'post-settings',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'edit.php',
        'position'      => false,
        'icon_url'      => false,
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Project Settings',
        'menu_title'    => 'Project Settings',
        'menu_slug'     => 'project-settings',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'edit.php?post_type=project',
        'position'      => false,
        'icon_url'      => false,
    ));
}
