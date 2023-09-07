<?php 
declare(strict_types=1);

\defined('ABSPATH') || exit('File cannot be opened directly!');

\add_action('init', 'register_options_page_custom_fields', 99);

if (false === \function_exists('register_options_page_custom_fields')) {
    /**
     * Initialise and add options page to WP dashboard.
     *
     * @since 2.0.0
     */
    function register_options_page_custom_fields(): void
    {
        if (false === \function_exists('acf_add_options_page')) {
            return;
        }

        \acf_add_options_page(array(
            'page_title'    => __('Ustawienia szablonu'),
            'menu_title'    => __('Ustawienia szablonu'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));

        \acf_add_local_field_group(
            [
                'key' => 'group_theme_settings',
                'title' => 'Ustawienia',
                'fields' => [
                    [
                        'key' => 'site_logo',
                        'label' => 'Logo Strony',
                        'name' => 'site_logo',
                        'type' => 'image',
                    ],
                    [
                        'key' => 'footer_content',
                        'label' => 'Footer Content',
                        'name' => 'footer_content',
                        'type' => 'wysiwyg',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-general-settings',
                        ],
                    ],
                ],
            ]
        );
    }
}