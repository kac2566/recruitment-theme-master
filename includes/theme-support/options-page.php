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
                        'label' => 'Treść stropki',
                        'name' => 'footer_content',
                        'type' => 'textarea',
                    ],
                    [
                        'key' => 'footer_contact',
                        'label' => 'Adress kontaktowy',
                        'name' => 'footer_contact',
                        'type' => 'wysiwyg',
                    ],
                    [
                        'key' => 'footer_email',
                        'label' => 'Adres e-mail',
                        'name' => 'footer_email',
                        'type' => 'email',
                    ],
                    [
                        'key' => 'footer_phone',
                        'label' => 'Numer telefonu',
                        'name' => 'footer_phone',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'footer_social_icons',
                        'label' => 'Ikony społecznościowe',
                        'name' => 'footer_social_icons',
                        'type' => 'repeater',
                        'instructions' => 'Dodaj ikonę społecznościową wraz z linkiem.',
                        'min' => 0,
                        'layout' => 'table',
                        'button_label' => 'Dodaj ikonę społecznościową',
                        'sub_fields' => [
                            [
                                'key' => 'icon',
                                'label' => 'Ikona społecznościowa',
                                'name' => 'icon',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'link',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'url',
                            ],
                        ],
                    ],
                    [
                        'key' => 'footer_copyright',
                        'label' => 'Treść copyright',
                        'name' => 'footer_copyright',
                        'type' => 'text',
                    ]
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