<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_22122312312',
	'title' => 'CTA Block',
	'fields' => array(
         array(
            'key' => 'field_cta_background-color',
            'label' => 'Kolor Tła',
            'name' => 'cta_background_color',
            'instructions' => 'Wybierz kolor tła',
            'type' => 'color_picker',
            'default_value' => '#0860C4',
        ),
        array(
            'key' => 'field_cta_wysiwyg',
            'label' => 'Treść CTA',
            'name' => 'cta_wysiwyg',
            'instructions' => 'Dodaj opis',
            'type' => 'wysiwyg'
        ),
        array(
            'key' => 'field_cta_buttons',
            'label' => 'Przyciski CTA',
            'name' => 'cta_buttons',
            'type' => 'repeater',
            'instructions' => 'Dodaj przyciski',
            'min' => 2,
            'layout' => 'block',
            'button_label' => 'Dodaj przycisk',
            'sub_fields' => array(
                array(
                    'key' => 'field_cta_button_text',
                    'label' => 'Tekst przycisku',
                    'required' => true, 
                    'name' => 'cta_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_cta_button_link',
                    'label' => 'Link',
                    'name' => 'cta_button_link',
                    'type' => 'url',
                    'required' => true,
                ),
                array(
                    'key' => 'field_cta_button_target',
                    'label' => 'Target',
                    'name' => 'cta_button_target',
                    'type' => 'select',
                    'return_format' => 'value',
                    'choices' => array(
                        '_blank' => 'Blank',
                        '_self' => 'Self',
                        '_parent' => 'Parent',
                        '_top' => 'Top',
                    ),
                    'default_value' => 'Blank',
                    'required' => true,
                ),
            ),
        )
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/cta-block',
            ),
        ),
    ),
));

endif;