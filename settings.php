<?php

$settings ->add(new admin_setting_heading('block_tmp_heading',
                                                                get_string('settings_heading', 'block_tmp'),
                                                                get_string('settings_content', 'block_tmp')));

$settings ->add(new admin_setting_configtext('block_tmp/Label',
                                                                get_string('label', 'block_tmp'),
                                                                get_string('label_desc', 'block_tmp'),'', PARAM_TEXT));