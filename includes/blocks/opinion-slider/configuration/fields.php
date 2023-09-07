<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_24245251224121312',
	'title' => 'Slajder z opiniami',
	'fields' => array(
        array(
            'key' => 'field_opinion_slides',
            'label' => 'Slajdy',
            'name' => 'opinion_slides',
            'type' => 'repeater',
            'instructions' => 'Dodaj slajdy z opiniami',
            'min' => 3,
            'layout' => 'block',
            'button_label' => 'Dodaj Slajd',
            'sub_fields' => array(
                array(
                    'key' => 'field_opinion_description',
                    'label' => 'Opis',
                    'name' => 'slide_description',
                    'type' => 'textarea',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_opinion_name',
                    'label' => 'Imię i nazwisko',
                    'name' => 'slide_names',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_opinion_position',
                    'label' => 'Stanowisko',
                    'name' => 'slide_position',
                    'type' => 'text',
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
                'value' => 'acf/opinion-slider',
            ),
        ),
    ),
));

endif;