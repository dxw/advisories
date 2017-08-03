<?php

namespace Dxw\DxwSecurity2017\Posts;

class CustomFields implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        acf_add_local_field_group(array(
            'key' => 'group_59427d8ae4e29',
            'title' => 'Page introduction',
            'fields' => array(
                array(
                    'key' => 'field_59427dab146fc',
                    'label' => 'Introduction',
                    'name' => 'introduction',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

        acf_add_local_field_group(array (
            'key' => 'group_5971ca59db830',
            'title' => 'Homepage services',
            'fields' => array (
                array (
                    'key' => 'field_5971ccdec65d9',
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5971ca9692ec2',
                    'label' => 'Services',
                    'name' => 'services',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 2,
                    'max' => 2,
                    'layout' => 'row',
                    'button_label' => 'Add Service',
                    'sub_fields' => array (
                        array (
                            'key' => 'field_5971cb7c92ec3',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array (
                            'key' => 'field_5971f03903de9',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'page_link',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'post_type' => array (
                            ),
                            'taxonomy' => array (
                            ),
                            'allow_null' => 0,
                            'allow_archives' => 1,
                            'multiple' => 0,
                        ),
                        array (
                            'key' => 'field_5971cc3292ec5',
                            'label' => 'Icon name',
                            'name' => 'icon_name',
                            'type' => 'text',
                            'instructions' => '\'Plug\' or \'info\'',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array (
                            'key' => 'field_5971cc3e92ec6',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array (
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                            'delay' => 0,
                        ),
                    ),
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array (
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'discussion',
                3 => 'comments',
            ),
            'active' => 1,
            'description' => '',
        ));
    }
}
