<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_11231234123',
	'title' => 'Siatka Linków',
	'fields' => array(
        array(
            'key' => 'field_link_boxes',
            'label' => 'Siatka Linków',
            'name' => 'link_boxes',
            'type' => 'repeater',
            'instructions' => 'Dodaj boxy z grafiką w tle i wyśrodkowanym tekstem.',
            'min' => 6,
            'max' => 6,
            'layout' => 'block',
            'button_label' => 'Dodaj Box',
            'sub_fields' => array(
                array(
                    'key' => 'field_box_image',
                    'label' => 'Grafika w tle',
                    'name' => 'box_image',
                    'type' => 'image',
                    'required' => 1,
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_box_text',
                    'label' => 'Tekst',
                    'name' => 'box_text',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_box_link',
                    'label' => 'Link',
                    'name' => 'box_link',
                    'type' => 'url',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_box_target',
                    'label' => 'Target',
                    'name' => 'box_target',
                    'type' => 'select',
                    'return_format' => 'value',
                    'choices' => array(
                        '_blank' => 'Blank',
                        '_self' => 'Self',
                        '_parent' => 'Parent',
                        '_top' => 'Top',
                    ),
                    'default_value' => 'Blank',
                    'required' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/link-boxes',
            ),
        ),
    ),
));

endif;