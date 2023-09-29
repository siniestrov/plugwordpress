<?php
/*
Plugin Name: Cambiar estilo de titulo Posts
Description: Cambia dinámicamente el estilo del título del post segun la categoría seleccionada.
Author: Carlos Valdespino
Version: 1.8
*/

// Función para estilos dinamicos
function custom_dynamic_category_styles() {
    $category_colors = array(
        'nacional' => array(
            'background' => '#00B049',
            'color' => '#FFFFFF',
            'text-align' => 'center',
        ),
        'entretenimiento' => array(
            'background' => '#FFC915',
            'color' => '#FFFFFF',
            'text-align' => 'right',
        ),
        'tecnologia' => array(
            'background' => '#00D3F8',
            'color' => '#FFFFFF',
            'text-align' => 'left',
        ),
        'mascotas' => array(
            'background' => '#90456D',
            'color' => '#FFFFFF',
            'text-align' => 'right',
        ),
        'deportes' => array(
            'background' => '#FF372C',
            'color' => '#FFFFFF',
            'text-align' => 'center',
        ),
    );

    // Categoria actual
    $categories = get_the_category();
    if (!empty($categories)) {
        $category_slug = $categories[0]->slug; 

        // Estilos segun la categoría
        $style = isset($category_colors[$category_slug]) ? $category_colors[$category_slug] : null;

        // Cambiar el estilo dentro del titulo del bloque
        if ($style) {
            echo '<style>';
            echo '.wp-block-post-title {';
            echo '    background-color: ' . esc_attr($style['background']) . ';';
            echo '    color: ' . esc_attr($style['color']) . ';';
            echo '    text-align: ' . esc_attr($style['text-align']) . ';';
            echo '}';
            echo '</style>';
        }
    }
}

// Hook de wordpress
add_action('wp_head', 'custom_dynamic_category_styles');
