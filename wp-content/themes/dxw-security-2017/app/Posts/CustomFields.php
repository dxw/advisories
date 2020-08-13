<?php

namespace Dxw\DxwSecurity2017\Posts;

class CustomFields implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        $this->addPageTemplatesFields();
        $this->addHomePageFields();
        $this->addPostFields();
    }

    public function addPageTemplatesFields()
    {
        acf_add_local_field_group([
            'key' => 'group_59427d8ae4e29',
            'title' => 'Page introduction',
            'fields' => [
                [
                    'key' => 'field_59427dab146fc',
                    'label' => 'Introduction',
                    'name' => 'introduction',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => 'wpautop',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ]);

        acf_add_local_field_group([
            'key' => 'group_598326606c784',
            'title' => 'Recommendations',
            'fields' => [
                [
                    'key' => 'field_59832752ae698',
                    'label' => 'Recommendations heading',
                    'name' => 'recommendations_heading',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ],
                [
                    'key' => 'field_598327e2ae699',
                    'label' => 'Recommendations',
                    'name' => 'recommendations',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 3,
                    'layout' => 'row',
                    'button_label' => 'Add Recommendation',
                    'sub_fields' => [
                        [
                            'key' => 'field_59832881ae69a',
                            'label' => 'Security warning',
                            'name' => 'security_warning',
                            'type' => 'radio',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'choices' => [
                                'red' => 'Potentially unsafe',
                                'orange' => 'Use with caution',
                                'green' => 'No issues found',
                            ],
                            'allow_null' => 0,
                            'other_choice' => 0,
                            'save_other_choice' => 0,
                            'default_value' => '',
                            'layout' => 'vertical',
                            'return_format' => 'value',
                        ],
                        [
                            'key' => 'field_598329cfae69b',
                            'label' => 'Subtitle',
                            'name' => 'subtitle',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => '',
                        ],
                        [
                            'key' => 'field_59832a89ae69c',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'tabs' => 'visual',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                            'delay' => 0,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-reviews.php',
                    ],
                ],
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-inspections.php',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ]);

        acf_add_local_field_group([
            'key' => 'group_59834207067c2',
            'title' => 'Failure criteria',
            'fields' => [
                [
                    'key' => 'field_5983428185451',
                    'label' => 'Failure criteria description',
                    'name' => 'failure_criteria_description',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'delay' => 0,
                ],
                [
                    'key' => 'field_5983454e62ac7',
                    'label' => 'Table caption',
                    'name' => 'table_caption',
                    'type' => 'text',
                    'instructions' => 'Caption tag helps make the table accessible. It is meant to contain a description of the table contents.
        Only visible for screen readers.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ],
                [
                    'key' => 'field_5983429e85452',
                    'label' => 'Failure criteria table',
                    'name' => 'failure_criteria_table',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'row',
                    'button_label' => 'Add Row',
                    'sub_fields' => [
                        [
                            'key' => 'field_598342c585453',
                            'label' => 'Criterion',
                            'name' => 'criterion',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ],
                        [
                            'key' => 'field_598342ee85454',
                            'label' => 'Explanation',
                            'name' => 'explanation',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                            'delay' => 0,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-inspections.php',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ]);
    }

    public function addHomePageFields()
    {
        acf_add_local_field_group([
            'key' => 'group_5971ca59db830',
            'title' => 'Homepage services',
            'fields' => [
                [
                    'key' => 'field_5971ccdec65d9',
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ],
                [
                    'key' => 'field_5971ca9692ec2',
                    'label' => 'Services',
                    'name' => 'services',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'collapsed' => '',
                    'min' => 2,
                    'max' => 2,
                    'layout' => 'row',
                    'button_label' => 'Add Service',
                    'sub_fields' => [
                        [
                            'key' => 'field_5971cb7c92ec3',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ],
                        [
                            'key' => 'field_5971f03903de9',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'page_link',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'post_type' => [
                            ],
                            'taxonomy' => [
                            ],
                            'allow_null' => 0,
                            'allow_archives' => 1,
                            'multiple' => 0,
                        ],
                        [
                            'key' => 'field_5971cc3292ec5',
                            'label' => 'Icon name',
                            'name' => 'icon_name',
                            'type' => 'text',
                            'instructions' => '\'Plug\' or \'info\'',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ],
                        [
                            'key' => 'field_5971cc3e92ec6',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => [
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ],
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                            'delay' => 0,
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => [
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'discussion',
                3 => 'comments',
            ],
            'active' => 1,
            'description' => '',
        ]);
    }

    public function addPostFields()
    {
        if (function_exists("register_field_group")) {

          // Advisories

            register_field_group([
            'id' => 'acf_advisories',
            'title' => 'Advisory Details',
            'fields' => [
              [
                'layout' => 'vertical',
                'choices' => [
                  'yes' => 'Yes',
                  'no' => 'No',
                ],
                'default_value' => '',
                'key' => 'field_11bef6fc3019a',
                'label' => 'Is it a WordPress plugin?',
                'name' => 'is_plugin',
                'type' => 'radio',
              ],

              [
                'default_value' => '',
                'formatting' => 'text',
                'key' => 'field_51beddd730196',
                'label' => 'Link',
                'instructions' => 'Use the directory link if it\'s a plugin',
                'name' => 'codex_link',
                'required' => true,
                'type' => 'text',
              ],

              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_e9f7a6e31b782',
                'label' => 'Version',
                'name' => 'version',
                'type' => 'text',
              ],

              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_51bef80d01ef3',
                'label' => 'Component name',
                'name' => 'component',
                'type' => 'text',
              ],
              [
                'default_value' => '',
                'formatting' => 'text',
                'key' => 'field_51bef52901ef3',
                'label' => 'CVE',
                'name' => 'cve',
                'type' => 'text',
              ],
              [
                'toolbar' => 'full',
                'media_upload' => 'yes',
                'default_value' => '',
                'key' => 'field_51bef81601ef4',
                'label' => 'Description of issue',
                'name' => 'issue',
                'type' => 'wysiwyg',
                'instructions' => 'What\'s the problems?',
              ],
              [
                'toolbar' => 'full',
                'media_upload' => 'yes',
                'default_value' => '',
                'key' => 'field_51bef8aa01ef4',
                'label' => 'Proof of concept',
                'name' => 'proof',
                'type' => 'wysiwyg',
                'instructions' => 'What are the steps to reproduce this issue?'
              ],
              [
                'toolbar' => 'full',
                'media_upload' => 'yes',
                'default_value' => '',
                'key' => 'field_51befaaa01ef4',
                'label' => 'Mitigations/Recommended action',
                'name' => 'mitigations',
                'type' => 'wysiwyg',
                'instructions' => 'What should people do to stay safe?'
              ],
              [
                'toolbar' => 'full',
                'media_upload' => 'yes',
                'default_value' => '',
                'key' => 'field_51befaaa01ff4',
                'label' => 'Timeline',
                'name' => 'timeline',
                'type' => 'wysiwyg',
                'instructions' => 'What happened when (reported, fix released, disclosed, etc)?'
              ],
              [
                'key' => 'field_59d78986e0d0c',
                'label' => 'Hide CVSS score',
                'name' => 'hide_cvss_score',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
              ],
              [
                'multiple' => 0,
                'allow_null' => 0,
                'choices' => [
                  '0.395' => 'Local',
                  '0.646' => 'Adjacent network',
                  '1.0' => 'Network',
                ],
                'default_value' => '',
                'key' => 'field_51c89590ecd69',
                'label' => 'Access Vector',
                'name' => 'access_vector',
                'type' => 'select',
                'instructions' => '<p><b>The access vector (AV) shows how a vulnerability may be exploited.</b></p>
                <p>Local: The attacker must either have physical access to the vulnerable system (e.g. firewire attacks) or a local account (e.g. a privilege escalation attack).<br>
                Adjacent Network: The attacker must have access to the broadcast or collision domain of the vulnerable system.<br>
                Network: The vulnerable interface is remotely exploitable.</p>',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_59d78986e0d0c',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
              ],
              [
                'multiple' => 0,
                'allow_null' => 0,
                'choices' => [
                  '0.35' => 'High',
                  '0.61' => 'Medium',
                  '0.71' => 'Low',
                ],
                'default_value' => '',
                'key' => 'field_51c896b023544',
                'label' => 'Access Complexity',
                'name' => 'access_complexity',
                'type' => 'select',
                'instructions' => '<p><b>The access complexity metric describes how easy or difficult it is to exploit the discovered vulnerability.</b></p>
                <p>High: Specialised conditions exist, such as a race condition with a narrow window, or a requirement for social engineering methods that would be readily noticed by knowledgeable people.<br>
                Medium: There are some additional requirements for access, such as a limit on the origin of the attacks, or a requirement for the vulnerable system to be running with an uncommon, non-default configuration.<br>
                Low: There are no special conditions for access to the vulnerability, such as when the system is available to large numbers of users, or the vulnerable configuration is ubiquitous.</p>',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_59d78986e0d0c',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
              ],
              [
                'multiple' => 0,
                'allow_null' => 0,
                'choices' => [
                  '0.45' => 'Multiple',
                  '0.56' => 'Single',
                  '0.704' => 'None',
                ],
                'default_value' => '',
                'key' => 'field_51c8972523545',
                'label' => 'Authentication',
                'name' => 'authentication',
                'type' => 'select',
                'instructions' => '<p><b>The authentication metric describes the number of times that an attacker must authenticate to a target in order to be able to exploit it.</b></p>
                <p>Multiple: Exploitation of the vulnerability requires that the attacker authenticate two or more times, even if the same credentials are used each time.<br>
                Single: The attacker must authenticate once in order to exploit the vulnerability.<br>
                None: There is no requirement for the attacker to authenticate.</p>',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_59d78986e0d0c',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
              ],
              [
                'multiple' => 0,
                'allow_null' => 0,
                'choices' => [
                  '0.0' => 'None',
                  '0.275' => 'Partial',
                  '0.66' => 'Complete',
                ],
                'default_value' => '',
                'key' => 'field_51c8977823546',
                'label' => 'Confidentiality',
                'name' => 'confidentiality',
                'type' => 'select',
                'instructions' => '<p><b>The confidentiality metric describes the impact on the confidentiality of data on or processed by the system.</b><p>
                <p>None: There is no impact on the confidentiality of the system.<br>
                Partial: There is considerable disclosure of information, but the scope of the loss is constrained such that not all of the data is available.<br>
                Complete: There is total information disclosure, providing access to any / all data on the system.</p>',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_59d78986e0d0c',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
              ],
              [
                'multiple' => 0,
                'allow_null' => 0,
                'choices' => [
                  '0.0' => 'None',
                  '0.275' => 'Partial',
                  '0.66' => 'Complete',
                ],
                'default_value' => '',
                'key' => 'field_51c897ef23547',
                'label' => 'Integrity',
                'name' => 'integrity',
                'type' => 'select',
                'instructions' => '<p><b>The Integrity metric describes the impact on the integrity of the exploited system.</b></p>
                <p>None: There is no impact on the integrity of the system.<br>
                Partial: Modification of some data or system files is possible, but the scope of the modification is limited.<br>
                Complete: There is total loss of integrity; the attacker can modify any files or information on the target system.</p>',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_59d78986e0d0c',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
              ],
              [
                'multiple' => 0,
                'allow_null' => 0,
                'choices' => [
                  '0.0' => 'None',
                  '0.275' => 'Partial',
                  '0.66' => 'Complete',
                ],
                'default_value' => '',
                'key' => 'field_51c898776db2e',
                'label' => 'Availability',
                'name' => 'availability',
                'type' => 'select',
                'instructions' => '<p><b>The availability metric describes the impact on the availability of the target system. Attacks that consume network bandwidth, processor cycles, memory or any other resources will affect the availability of a system.</b></p>

                <p>None: There is no impact on the availability of the system.	<br>
                Partial: There is reduced performance or loss of some functionality.<br>
                Complete: There is total loss of availability of the attacked resource.</p>',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_59d78986e0d0c',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
              ],

              [
                'layout' => 'horizontal',
                'choices' => [
                  'identified' => 'Identified',
                  'reported' => 'Reported',
                  'fixed' => 'Fixed',
                ],
                'default_value' => '',
                'key' => 'field_51baaaa30199',
                'label' => 'Workflow state',
                'name' => 'workflow_state',
                'type' => 'radio',
              ],
            ],
            'location' => [
              [
                [
                  'param' => 'post_type',
                  'operator' => '==',
                  'value' => 'advisories',
                  'order_no' => 0,
                  'group_no' => 0,
                ],
              ],
            ],
            'options' => [
              'position' => 'normal',
              'layout' => 'default',
              'hide_on_screen' => [
                0 => 'the_content',
              ],
            ],
            'menu_order' => 0,
          ]);

            // Plugins

            register_field_group([
            'id' => 'acf_plugins',
            'title' => 'Plugin Results',
            'fields' => [
              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_51bef6c730196',
                'type' => 'text',
                'label' => 'Plugin link',
                'instructions' => 'Use the directory link if possible',
                'name' => 'codex_link',
                'required' => true,
              ],
              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_51bef3cd30191',
                'label' => 'Name of plugin',
                'required' => true,
                'name' => 'name_of_plugin',
                'type' => 'text',
              ],
              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_585bbf7cc7f03',
                'label' => 'Plugin slug',
                'required' => true,
                'name' => 'slug',
                'type' => 'text',
                'instructions' => 'For plugins in dxw\'s repo this should match the repo name.
        For directory plugins this usually matches the last part of the URL',
              ],
              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_51bef66430192',
                'required' => true,
                'label' => 'Versions of plugin checked',
                'name' => 'version_of_plugin',
                'instructions' => 'Comma separated list, no spaces, eg: 1.0,1.1,1.6',
                'type' => 'text',
              ],
              [
                'default_value' => '',
                'formatting' => 'html',
                'key' => 'field_51bef6ae30195',
                'label' => 'Author',
                'name' => 'author',
                'type' => 'text',
              ],
              [
                'media_upload' => 'no',
                'default_value' => '',
                'key' => 'field_51bef69830194',
                'label' => 'Plugin description',
                'name' => 'description',
                'type' => 'text',
              ],
              [
                'layout' => 'horizontal',
                'choices' => [
                  'inspected' => 'Inspected',
                  'codereviewed' => 'Code Reviewed',
                ],
                'default_value' => '',
                'key' => 'field_51bef74030199',
                'label' => 'Assurance level',
                'name' => 'assurance_level',
                'type' => 'radio',
              ],
              [
                'toolbar' => 'full',
                'media_upload' => 'no',
                'default_value' => '',
                'key' => 'field_51beccc830194',
                'label' => 'Pluginscan output',
                'name' => 'pluginscan_output',
                'type' => 'textarea',
              ],
              [
                'default_value' => '',
                'key' => 'field_51bef7de30000',
                'label' => 'Private notes',
                'name' => 'private_notes',
                'type' => 'textarea',
                'instructions' => 'Notes for yourself, or other testers. Will not be published.',
              ],
              [
                'layout' => 'vertical',
                'choices' => [
                  'a' => 'Lack of input sanitisation',
                  'b' => 'Execution of unprepared SQL statements',
                  'c' => 'Unsafe generation of PHP code',
                  'd' => 'Poor coding style',
                  'e' => 'Poor architecture',
                  'f' => 'Failure to use available core functionality',
                  'g' => 'Unsafe request processing',
                  'h' => 'Unsafe file or network IO',
                  'i' => 'Lack of proper output escaping',
                  'j' => 'Unsafe execution of system commands',
                  'k' => 'Potential compatibility issues',
                  'k' => 'Very large codebase',
                ],
                'default_value' => '',
                'key' => 'field_51bef6fc3019a',
                'label' => 'Matched criteria',
                'name' => 'matched_criteria',
                'type' => 'checkbox',
              ],
              [
                'toolbar' => 'full',
                'media_upload' => 'yes',
                'default_value' => '',
                'key' => 'field_51bef6de30197',
                'label' => 'Findings',
                'name' => 'findings',
                'type' => 'wysiwyg',
              ],
              [
                'key' => 'field_51bef6fc30198',
                'label' => 'Recommendation',
                'name' => 'recommendation',
                'type' => 'radio',
                'choices' => [
                  'green' => 'No issues found',
                  'yellow' => 'Use with caution',
                  'red' => 'Potentially unsafe',
                ],
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
              ],
              [
                'key' => 'field_51bef6de30022',
                'label' => 'Recommendation criterion',
                'name' => 'recommendation_criterion_yellow',
                'type' => 'radio',
                'conditional_logic' => [
                  'status' => 1,
                  'rules' => [
                    [
                      'field' => 'field_51bef6fc30198',
                      'operator' => '==',
                      'value' => 'yellow',
                    ],
                  ],
                  'allorany' => 'all',
                ],
                'choices' => [
                  'e' => 'The plugin contains or is likely to contain a vulnerability which could be exploited by a privileged user to affect the site’s confidentiality, integrity or availability in a manner exceeding their privileges',
                  'a' => 'The plugin appears not to be vulnerable, but could interact with another component in such a way as to become vulnerable',
                  'b' => 'The plugin meets a large number of failure criteria and is of poor quality, leading the tester to fear that subsequent versions of the plugin are likely to introduce vulnerabilities',
                  'c' => 'The plugin is written such that its expected, ordinary use is likely to harm the site’s performance',
                  'd' => 'The plugin has been given this recommendation at the tester\'s discretion',
                ],
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
              ],
              [
                'key' => 'field_51bef6de30011',
                'label' => 'Recommendation criterion',
                'name' => 'recommendation_criterion_red',
                'type' => 'radio',
                'conditional_logic' => [
                  'status' => 1,
                  'rules' => [
                    [
                      'field' => 'field_51bef6fc30198',
                      'operator' => '==',
                      'value' => 'red',
                    ],
                  ],
                  'allorany' => 'all',
                ],
                'choices' => [
                  'a' => 'The plugin contains or is likely to contain a vulnerability which could be exploited by an end user and which would compromise the site’s confidentiality, integrity or availability',
                  'c' => 'The plugin is written such that its expected, ordinary use could affect the site’s confidentiality, integrity or availability',
                  'd' => 'The plugin has been given this recommendation at the tester\'s discretion',
                ],
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
              ],
              [
                'key' => 'field_51bef6de30000',
                'label' => 'Reason',
                'name' => 'reason',
                'type' => 'wysiwyg',
                'instructions' => 'What\'s the specific reason for the yellow or red recommendation?',
                'conditional_logic' => [
                  'status' => 1,
                  'rules' => [
                    [
                      'field' => 'field_51bef6fc30198',
                      'operator' => '==',
                      'value' => 'yellow',
                    ],
                    [
                      'field' => 'field_51bef6fc30198',
                      'operator' => '==',
                      'value' => 'red',
                    ],
                  ],
                  'allorany' => 'any',
                ],
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
              ],
            ],
            'location' => [
              [
                [
                  'param' => 'post_type',
                  'operator' => '==',
                  'value' => 'plugins',
                  'order_no' => 0,
                  'group_no' => 0,
                ],
              ],
            ],
            'options' => [
              'position' => 'normal',
              'layout' => 'default',
              'hide_on_screen' => [
                0 => 'the_content',
              ],
            ],
            'menu_order' => 0,
          ]);
        }
    }
}
