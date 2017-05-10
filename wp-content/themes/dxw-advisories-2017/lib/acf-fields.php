<?php

if(function_exists("register_field_group")) {

  // Advisories

  register_field_group(array (
    'id' => 'acf_advisories',
    'title' => 'Advisory Details',
    'fields' => array (
      array (
        'layout' => 'vertical',
        'choices' => array (
          'yes' => 'Yes',
          'no' => 'No',
        ),
        'default_value' => '',
        'key' => 'field_11bef6fc3019a',
        'label' => 'Is it a WordPress plugin?',
        'name' => 'is_plugin',
        'type' => 'radio',
      ),

      array (
        'default_value' => '',
        'formatting' => 'text',
        'key' => 'field_51beddd730196',
        'label' => 'Link',
        'instructions' => 'Use the directory link if it\'s a plugin',
        'name' => 'codex_link',
        'required' => true,
        'type' => 'text',
        /*          'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_11bef6fc3019a',
              'operator' => '==',
              'value' => 'yes',
            ),
            'allorany' => 'all',
          ),
        ),
        */
      ),

      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_e9f7a6e31b782',
        'label' => 'Version',
        'name' => 'version',
        'type' => 'text',
      ),

      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_51bef80d01ef3',
        'label' => 'Component name',
        'name' => 'component',
        'type' => 'text',
      ),
      array (
        'default_value' => '',
        'formatting' => 'text',
        'key' => 'field_51bef52901ef3',
        'label' => 'CVE',
        'name' => 'cve',
        'type' => 'text',
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_51bef81601ef4',
        'label' => 'Description of issue',
        'name' => 'issue',
        'type' => 'wysiwyg',
        'instructions' => 'What\'s the problems?',
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_51bef8aa01ef4',
        'label' => 'Proof of concept',
        'name' => 'proof',
        'type' => 'wysiwyg',
        'instructions' => 'What are the steps to reproduce this issue?'
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_51befaaa01ef4',
        'label' => 'Mitigations/Recommended action',
        'name' => 'mitigations',
        'type' => 'wysiwyg',
        'instructions' => 'What should people do to stay safe?'
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_51befaaa01ff4',
        'label' => 'Timeline',
        'name' => 'timeline',
        'type' => 'wysiwyg',
        'instructions' => 'What happened when (reported, fix released, disclosed, etc)?'
      ),
      array (
        'multiple' => 0,
        'allow_null' => 0,
        'choices' => array (
          '0.395' => 'Local',
          '0.646' => 'Adjacent network',
          '1.0' => 'Network',
        ),
        'default_value' => '',
        'key' => 'field_51c89590ecd69',
        'label' => 'Access Vector',
        'name' => 'access_vector',
        'type' => 'select',
        'instructions' => '<p><b>The access vector (AV) shows how a vulnerability may be exploited.</b></p>
        <p>Local: The attacker must either have physical access to the vulnerable system (e.g. firewire attacks) or a local account (e.g. a privilege escalation attack).<br>
        Adjacent Network: The attacker must have access to the broadcast or collision domain of the vulnerable system.<br>
        Network: The vulnerable interface is remotely exploitable.</p>',
      ),
      array (
        'multiple' => 0,
        'allow_null' => 0,
        'choices' => array (
          '0.35' => 'High',
          '0.61' => 'Medium',
          '0.71' => 'Low',
        ),
        'default_value' => '',
        'key' => 'field_51c896b023544',
        'label' => 'Access Complexity',
        'name' => 'access_complexity',
        'type' => 'select',
        'instructions' => '<p><b>The access complexity metric describes how easy or difficult it is to exploit the discovered vulnerability.</b></p>
        <p>High: Specialised conditions exist, such as a race condition with a narrow window, or a requirement for social engineering methods that would be readily noticed by knowledgeable people.<br>
        Medium: There are some additional requirements for access, such as a limit on the origin of the attacks, or a requirement for the vulnerable system to be running with an uncommon, non-default configuration.<br>
        Low: There are no special conditions for access to the vulnerability, such as when the system is available to large numbers of users, or the vulnerable configuration is ubiquitous.</p>',
      ),
      array (
        'multiple' => 0,
        'allow_null' => 0,
        'choices' => array (
          '0.45' => 'Multiple',
          '0.56' => 'Single',
          '0.704' => 'None',
        ),
        'default_value' => '',
        'key' => 'field_51c8972523545',
        'label' => 'Authentication',
        'name' => 'authentication',
        'type' => 'select',
        'instructions' => '<p><b>The authentication metric describes the number of times that an attacker must authenticate to a target in order to be able to exploit it.</b></p>
        <p>Multiple: Exploitation of the vulnerability requires that the attacker authenticate two or more times, even if the same credentials are used each time.<br>
        Single: The attacker must authenticate once in order to exploit the vulnerability.<br>
        None: There is no requirement for the attacker to authenticate.</p>',
      ),
      array (
        'multiple' => 0,
        'allow_null' => 0,
        'choices' => array (
          '0.0' => 'None',
          '0.275' => 'Partial',
          '0.66' => 'Complete',
        ),
        'default_value' => '',
        'key' => 'field_51c8977823546',
        'label' => 'Confidentiality',
        'name' => 'confidentiality',
        'type' => 'select',
        'instructions' => '<p><b>The confidentiality metric describes the impact on the confidentiality of data on or processed by the system.</b><p>
        <p>None: There is no impact on the confidentiality of the system.<br>
        Partial: There is considerable disclosure of information, but the scope of the loss is constrained such that not all of the data is available.<br>
        Complete: There is total information disclosure, providing access to any / all data on the system.</p>',
      ),
      array (
        'multiple' => 0,
        'allow_null' => 0,
        'choices' => array (
          '0.0' => 'None',
          '0.275' => 'Partial',
          '0.66' => 'Complete',
        ),
        'default_value' => '',
        'key' => 'field_51c897ef23547',
        'label' => 'Integrity',
        'name' => 'integrity',
        'type' => 'select',
        'instructions' => '<p><b>The Integrity metric describes the impact on the integrity of the exploited system.</b></p>
        <p>None: There is no impact on the integrity of the system.<br>
        Partial: Modification of some data or system files is possible, but the scope of the modification is limited.<br>
        Complete: There is total loss of integrity; the attacker can modify any files or information on the target system.</p>',
      ),
      array (
        'multiple' => 0,
        'allow_null' => 0,
        'choices' => array (
          '0.0' => 'None',
          '0.275' => 'Partial',
          '0.66' => 'Complete',
        ),
        'default_value' => '',
        'key' => 'field_51c898776db2e',
        'label' => 'Availability',
        'name' => 'availability',
        'type' => 'select',
        'instructions' => '<p><b>The availability metric describes the impact on the availability of the target system. Attacks that consume network bandwidth, processor cycles, memory or any other resources will affect the availability of a system.</b></p>

        <p>None: There is no impact on the availability of the system.	<br>
        Partial: There is reduced performance or loss of some functionality.<br>
        Complete: There is total loss of availability of the attacked resource.</p>',
      ),

      array (
        'layout' => 'horizontal',
        'choices' => array (
          'identified' => 'Identified',
          'reported' => 'Reported',
          'fixed' => 'Fixed',
        ),
        'default_value' => '',
        'key' => 'field_51baaaa30199',
        'label' => 'Workflow state',
        'name' => 'workflow_state',
        'type' => 'radio',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'advisories',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));

  // Plugins

  register_field_group(array (
    'id' => 'acf_plugins',
    'title' => 'Plugin Results',
    'fields' => array (
      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_51bef6c730196',
        'type' => 'text',
        'label' => 'Plugin link',
        'instructions' => 'Use the directory link if possible',
        'name' => 'codex_link',
        'required' => true,
      ),
      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_51bef3cd30191',
        'label' => 'Name of plugin',
        'required' => true,
        'name' => 'name_of_plugin',
        'type' => 'text',
      ),
      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_585bbf7cc7f03',
        'label' => 'Plugin slug',
        'required' => true,
        'name' => 'slug',
        'type' => 'text',
        'instructions' => 'For plugins in dxw\'s repo this should match the repo name.
For directory plugins this usually matches the last part of the URL',
      ),
      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_51bef66430192',
        'required' => true,
        'label' => 'Versions of plugin checked',
        'name' => 'version_of_plugin',
        'instructions' => 'Comma separated list, no spaces, eg: 1.0,1.1,1.6',
        'type' => 'text',
      ),
      array (
        'default_value' => '',
        'formatting' => 'html',
        'key' => 'field_51bef6ae30195',
        'label' => 'Author',
        'name' => 'author',
        'type' => 'text',
      ),
      array (
        'media_upload' => 'no',
        'default_value' => '',
        'key' => 'field_51bef69830194',
        'label' => 'Plugin description',
        'name' => 'description',
        'type' => 'text',
      ),
      array (
        'layout' => 'horizontal',
        'choices' => array (
          'inspected' => 'Inspected',
          'codereviewed' => 'Code Reviewed',
        ),
        'default_value' => '',
        'key' => 'field_51bef74030199',
        'label' => 'Assurance level',
        'name' => 'assurance_level',
        'type' => 'radio',
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'no',
        'default_value' => '',
        'key' => 'field_51beccc830194',
        'label' => 'Pluginscan output',
        'name' => 'pluginscan_output',
        'type' => 'textarea',
      ),
      array (
        'default_value' => '',
        'key' => 'field_51bef7de30000',
        'label' => 'Private notes',
        'name' => 'private_notes',
        'type' => 'textarea',
        'instructions' => 'Notes for yourself, or other testers. Will not be published.',
      ),
      array (
        'layout' => 'vertical',
        'choices' => array (
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
        ),
        'default_value' => '',
        'key' => 'field_51bef6fc3019a',
        'label' => 'Matched criteria',
        'name' => 'matched_criteria',
        'type' => 'checkbox',
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_51bef6de30197',
        'label' => 'Findings',
        'name' => 'findings',
        'type' => 'wysiwyg',
      ),
      array (
        'key' => 'field_51bef6fc30198',
        'label' => 'Recommendation',
        'name' => 'recommendation',
        'type' => 'radio',
        'choices' => array (
          'green' => 'No issues found',
          'yellow' => 'Use with caution',
          'red' => 'Potentially unsafe',
        ),
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => '',
        'layout' => 'vertical',
      ),
      array (
        'key' => 'field_51bef6de30022',
        'label' => 'Recommendation criterion',
        'name' => 'recommendation_criterion_yellow',
        'type' => 'radio',
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_51bef6fc30198',
              'operator' => '==',
              'value' => 'yellow',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array (
          'e' => 'The plugin contains or is likely to contain a vulnerability which could be exploited by a privileged user to affect the site’s confidentiality, integrity or availability in a manner exceeding their privileges',
          'a' => 'The plugin appears not to be vulnerable, but could interact with another component in such a way as to become vulnerable',
          'b' => 'The plugin meets a large number of failure criteria and is of poor quality, leading the tester to fear that subsequent versions of the plugin are likely to introduce vulnerabilities',
          'c' => 'The plugin is written such that its expected, ordinary use is likely to harm the site’s performance',
          'd' => 'The plugin has been given this recommendation at the tester\'s discretion',
        ),
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => '',
        'layout' => 'vertical',
      ),
      array (
        'key' => 'field_51bef6de30011',
        'label' => 'Recommendation criterion',
        'name' => 'recommendation_criterion_red',
        'type' => 'radio',
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_51bef6fc30198',
              'operator' => '==',
              'value' => 'red',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array (
          'a' => 'The plugin contains or is likely to contain a vulnerability which could be exploited by an end user and which would compromise the site’s confidentiality, integrity or availability',
          'c' => 'The plugin is written such that its expected, ordinary use could affect the site’s confidentiality, integrity or availability',
          'd' => 'The plugin has been given this recommendation at the tester\'s discretion',
        ),
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => '',
        'layout' => 'vertical',
      ),
      array (
        'key' => 'field_51bef6de30000',
        'label' => 'Reason',
        'name' => 'reason',
        'type' => 'wysiwyg',
        'instructions' => 'What\'s the specific reason for the yellow or red recommendation?',
        'conditional_logic' => array (
          'status' => 1,
          'rules' => array (
            array (
              'field' => 'field_51bef6fc30198',
              'operator' => '==',
              'value' => 'yellow',
            ),
            array (
              'field' => 'field_51bef6fc30198',
              'operator' => '==',
              'value' => 'red',
            ),
          ),
          'allorany' => 'any',
        ),
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'plugins',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));

  // Notices

  register_field_group(array (
    'id' => 'acf_notices',
    'title' => 'Notices',
    'fields' => array (
      array (
        'default_value' => '',
        'formatting' => 'text',
        'key' => 'field_51bef80d90ef3',
        'label' => 'Client organisation',
        'name' => 'client',
        'type' => 'text',
      ),
      array (
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
        'key' => 'field_451bef85c01ef6',
        'label' => 'Start date',
        'name' => 'start_date',
        'type' => 'date_picker',
      ),
      array (
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
        'key' => 'field_351bef85c01ef6',
        'label' => 'End date (if applicable)',
        'name' => 'end_date',
        'type' => 'date_picker',
      ),
      array (
        'layout' => 'horizontal',
        'choices' => array (
          'concerted' => 'Concerted targeted attack',
          'targeted' => 'Targeted attack',
          'non-targeted' => 'Non-targeted attack',
          'other' => 'Other (Please explain below)',
        ),
        'default_value' => '',
        'key' => 'field_51babfa30199',
        'label' => 'Incident type',
        'name' => 'incident_type',
        'type' => 'radio',
      ),
      array (
        'default_value' => '',
        'formatting' => 'text',
        'key' => 'field_51bef80ad9ef3',
        'label' => 'Summary',
        'name' => 'summary',
        'type' => 'text',
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_55bef81601ef4',
        'label' => 'Description',
        'name' => 'description',
        'type' => 'wysiwyg',
      ),
      array (
        'toolbar' => 'full',
        'media_upload' => 'yes',
        'default_value' => '',
        'key' => 'field_55bef81901ef4',
        'label' => 'Action taken',
        'name' => 'action',
        'type' => 'wysiwyg',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'notices',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
}
