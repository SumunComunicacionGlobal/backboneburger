<?php

// let's create the function for the custom type - PRODUCTS MENU
function custom_post_carta() { 
    // creating (registering) the custom type 
    register_post_type( 'carta', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Carta', 'blackbone'), /* This is the Title of the Group */
            'singular_name' => __('Carta', 'blackbone'), /* This is the individual type */
            'all_items' => __('Todos los productos de la carta', 'blackbone'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'blackbone'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo producto', 'blackbone'), /* Add New Display Title */
            'edit' => __( 'Editar', 'blackbone' ), /* Edit Dialog */
            'edit_item' => __('Editar producto', 'blackbone'), /* Edit Display Title */
            'new_item' => __('Nuevo producto', 'blackbone'), /* New Display Title */
            'view_item' => __('Ver producto', 'blackbone'), /* View Display Title */
            'search_items' => __('Buscar producto', 'blackbone'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada encontrado en base de datos.', 'blackbone'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada econtrado en papelera', 'blackbone'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 11, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-clipboard', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'has_archive' => false, /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_carta');


// now let's add custom Product categories 
register_taxonomy( 'category-carta', 
array('carta'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Categorías Carta', 'blackbone' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Categoría carta', 'blackbone' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar categorias', 'blackbone' ), /* search title for taxomony */
        'all_items' => __( 'Todas las categorias', 'blackbone' ), /* all title for taxonomies */
        'parent_item' => __( 'Categoría Superior', 'blackbone' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Parent categoria:', 'blackbone' ), /* parent taxonomy title */
        'edit_item' => __( 'Editar categoría', 'blackbone' ), /* edit custom taxonomy title */
        'update_item' => __( 'Actualizar categoría', 'blackbone' ), /* update title for taxonomy */
        'add_new_item' => __( 'Añadir categoría', 'blackbone' ), /* add new title for taxonomy */
        'new_item_name' => __( 'Nueva categoría', 'blackbone' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'public'  => false,  
    'query_var' => true,
    'has_archive' => false, /* you can rename the slug here */
    )
);

