<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_publish-reminders',
    'title' => 'Publish Reminders',
    'fields' => array (
      array (
        'key' => 'field_531e230ae944a',
        'label' => 'Send an email to',
        'name' => 'send_an_email_to',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_531e231be944b',
            'label' => 'Email address',
            'name' => 'email_address',
            'type' => 'email',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Add Row',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
