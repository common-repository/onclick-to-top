<?php
if (!defined('ABSPATH')) exit;
// Register settings
function octt_custom_settings_init() {
    $hex_args = array(
        'type'              =>  'string',
        'sanitize_callback' =>  'sanitize_hex_color',
        'default'           =>  NULL,
    );
    $number_args = array(
        'type'              => 'integer',
        'sanitize_callback' => 'intval',
        'default'           =>  NULL,
    );

    register_setting(
        'octt-custom-settings-group',
        'octt_icon_enable_button',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_enable_button_admin',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_enable_button_draggable',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_enable_progressbar',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_width',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_font_size',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_border_size',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_border_radius',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_border_color',
        $hex_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_select',
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_select_defualt',
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_custom_icon',
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_border_style',
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_color',
        $hex_args,
    );

    register_setting(
        'octt-custom-settings-group',
        'octt_button_position',
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_button_position_right',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_button_position_left',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_bottom',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_button_offset',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_background_color',
        $hex_args,
    );

    register_setting(
        'octt-custom-settings-group',
        'octt_icon_hover_color',
        $hex_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_progress_color',
        $hex_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_progress_width',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_hide_on_mobile',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_hide_on_tablet',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_hide_on_desktop',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_icon_scroll_duration',
        $number_args,
    );
    register_setting(
        'octt-custom-settings-group',
        'octt_custom_css',
    );
}
add_action('admin_init', 'octt_custom_settings_init');



function octt_callback() {
?>
    <div class="wrap">

        <div class="octt-vertical-tabs">
            <div class="octt-tab-menu">
                <h2 class="on-click-title-header"><img class="img-fluid on-click-plugin-icon" src="<?php echo esc_url(OCTT_ASSETS . '/images/icon.png') ?>" alt="icon"><?php esc_html_e('On Click to Top', 'onclick-to-top'); ?></h2>
                <ul>
                    <li class="active">
                        <a href="#general-settings">
                            <!-- <span class="dashicons dashicons-admin-generic"></span> -->
                            <img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/general.svg') ?>" alt="general">
                            <span><?php esc_html_e('General', 'onclick-to-top'); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="#appearance-settings">
                            <img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/appearance.svg') ?>" alt="appearance">
                            <span><?php esc_html_e('Appearance', 'onclick-to-top'); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="#progress-settings">
                            <img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/progressbar.svg') ?>" alt="progress">
                            <span><?php esc_html_e('Progress Bar', 'onclick-to-top'); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="#custom-css-settings">
                            <img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/custom-css.svg') ?>" alt="custom-css">
                            <span><?php esc_html_e('Custom CSS', 'onclick-to-top'); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="octt-tab-content">
                <form method="post" action="options.php">
                    <?php settings_fields('octt-custom-settings-group'); ?>
                    <?php do_settings_sections('my-custom-submenu'); ?>
                    <!-- Enable back to top button Feild -->
                    <div id="general-settings" class="octt-tab-pane active">
                        <div class="on-click-settings-hedding">
                            <div class="on-click-item">
                                <h3 class="on-click-sub-title"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/general.svg') ?>" alt="progress"> <?php esc_html_e('General', 'onclick-to-top'); ?></h3>
                                <div class="on-click-submit-button">
                                    <?php submit_button(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-table-content">
                            <table class="form-table">
                                <!-- enable / disable settings fields go here -->
                                <tr class=" content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Enable Button', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <input type="checkbox" id="toggle" class="checkbox" name="octt_icon_enable_button" value="1" <?php checked(get_option('octt_icon_enable_button', true), 1, true); ?> />
                                        <label for="toggle" class="switch"></label><br><br>
                                        <label><?php esc_html_e('Enable back to top button?', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>
                                <!-- Enable back to top button on admin panel settings fields go here -->
                                <tr class=" setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Enable Button Admin Panel', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <input type="checkbox" id="toggle-admin" class="checkbox-admin" name="octt_icon_enable_button_admin" value="1" <?php checked(get_option('octt_icon_enable_button_admin', false), 1, true); ?> />
                                        <div class="tooltip">
                                            <span class="tooltiptext">PRO</span>
                                            <label for="toggle-admin" class="switch is-pro "></label><br><br>
                                        </div>
                                        <label><?php esc_html_e('Enable back to top button on admin panel?', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>
                                <!-- Enable back to top button on Draggable settings fields go here -->
                                <tr class=" setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Enable Draggable Button', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <input type="checkbox" id="toggle-draggable" class="checkbox-draggable" name="octt_icon_enable_button_draggable" value="1" <?php checked(get_option('octt_icon_enable_button_draggable', false), 1, true); ?> />
                                        <div class="tooltip">
                                            <span class="tooltiptext">PRO</span>
                                            <label for="toggle-draggable" class="switch is-pro "></label><br><br>
                                        </div>
                                        <label><?php esc_html_e('Enable back to top button on Draggable?', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>
                                <!-- Display on settings fields go here -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Display on', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <div class="hide-buttons-group">
                                            <div class="hide-buttons">
                                                <input type="checkbox" id="octt_hide_on_mobile" name="octt_hide_on_mobile" value="1" <?php echo (!empty(get_option('octt_hide_on_mobile', 1))) ? 'checked' : ''; ?> />
                                                <label class="display-on" for="octt_hide_on_mobile"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/mobile-icon.svg') ?>" alt="mobile-icon"> <span><?php esc_html_e('Mobile', 'onclick-to-top') ?></span></label>
                                            </div>
                                            <div class="hide-buttons">
                                                <input type="checkbox" id="octt_hide_on_tablet" name="octt_hide_on_tablet" value="1" <?php echo (!empty(get_option('octt_hide_on_tablet', 1))) ? 'checked' : ''; ?> />
                                                <label class="display-on" for="octt_hide_on_tablet"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/tablet-icon.svg') ?>" alt="tablet-icon"> <span><?php esc_html_e('Tablet', 'onclick-to-top') ?></span></label>
                                            </div>
                                            <div class="hide-buttons">
                                                <input type="checkbox" id="octt_hide_on_desktop" name="octt_hide_on_desktop" value="1" <?php echo (!empty(get_option('octt_hide_on_desktop', 1))) ? 'checked' : ''; ?> />
                                                <label class="display-on" for="octt_hide_on_desktop"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/desktop-icon.svg') ?>" alt="desktop-icon"> <span><?php esc_html_e('Desktop', 'onclick-to-top') ?></span></label>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Button Settings Feild -->
                    <div id="appearance-settings" class="octt-tab-pane">
                        <div class="on-click-settings-hedding">
                            <div class="on-click-item">
                                <h3 class="on-click-sub-title"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/appearance.svg') ?>" alt="progress"> <?php esc_html_e('Appearance', 'onclick-to-top'); ?></h3>
                                <div class="on-click-submit-button">
                                    <?php submit_button(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-table-content">
                            <table class="form-table">
                                <div class="headding">
                                    <h3><?php esc_html_e('General Settings', 'onclick-to-top'); ?></h3>
                                </div>
                                <!-- Button Size settings fields go here -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Button Size', 'onclick-to-top'); ?>:</th>
                                    <td>

                                        <div class="input-group">
                                            <input type="range" min="0" max="100" name="octt_icon_width" value="<?php echo esc_attr(get_option('octt_icon_width', '30')); ?>" class="range-slider" data-default-value="30" />

                                            <input type="number" min="0" max="100" name="octt_icon_width" class="octt_number_input" id="octt_icon_width_val" value="<?php echo esc_attr(get_option('octt_icon_width', '30')); ?>" data-default-value="30">

                                            <button class="reset_buttons" name="octt_icon_width">
                                                <?php echo esc_html__('Reset', 'onclick-to-top'); ?>
                                            </button>
                                        </div>


                                        <br><br>
                                        <label><?php esc_html_e('Button size provided in pixels. ex: 30', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>

                                <!-- Icon Field settings fields go here -->
                                <tr class="setting-option-hide content-item" valign="top">
                                    <th scope="row"><?php esc_html_e('Icon Type', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="octt-button-position">
                                            <div class="octt-radio-button">
                                                <input type="radio" class="checkbox-default" name="octt_icon_select" id="octt_icon_select_default" value="default_icon" <?php checked(get_option('octt_icon_select', 'default_icon'), 'default_icon', true); ?> />
                                                <label for="octt_icon_select_default"><?php esc_html_e('Default Icon', 'onclick-to-top'); ?></label>
                                            </div>
                                            <div class="tooltip">
                                            <span class="tooltiptext">PRO</span>
                                            <div class="octt-radio-button is-pro ">
                                                <input type="radio" class="checkbox-custom" name="octt_icon_select" id="octt_icon_select_custom" value="custom_icon" <?php checked(get_option('octt_icon_select'), 'custom_icon', true); ?> />
                                                <label for="octt_icon_select_custom"><?php esc_html_e('Custom Logo', 'onclick-to-top'); ?></label>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Default Icon Field -->
                                <tr class="setting-option-hide content-item hide-default-logo" valign="top" id="default-icon-settings">
                                    <th scope="row"><?php esc_html_e('Default Icon', 'onclick-to-top'); ?>:</th>
                                    <td class="icon_border_style">
                                        <?php
                                        $icons = array(
                                            'dashicons-arrow-up-alt' => 'f342',
                                            'dashicons-arrow-up-alt2' => 'f343',
                                            'dashicons-arrow-up' => 'f142',
                                        );
                                        $option = get_option('octt_icon_select_defualt', 'f342');
                                        ?>

                                        <?php foreach ($icons as $icon => $value) : ?>
                                            <div class="octt-radio-button">
                                                <input type="radio" id="octt_icon_select_defualt_<?php echo esc_html($icon); ?>" name="octt_icon_select_defualt" value="<?php echo esc_html($value); ?>" <?php checked($option, $value); ?>>
                                                <label for="octt_icon_select_defualt_<?php echo esc_html($icon); ?>">
                                                    <span class="dashicons <?php echo esc_attr($icon); ?>"></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>

                                <!-- Upload your custom Logo Field -->
                                <tr class="setting-option-hide content-item hide-custom-logo" valign="top" id="custom-icon-settings">
                                    <th scope="row"><?php esc_html_e('Upload your custom Logo', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="ciu-image-preview" id="image-preview">
                                            <?php $custom_icon_url = get_option('octt_custom_icon', ''); ?>
                                            <?php if ($custom_icon_url) : ?>
                                                <img src="<?php echo esc_attr($custom_icon_url); ?>" alt="Selected Image" style="max-width:100%; width:60px; height:60px; " />
                                            <?php else : ?>
                                                <p class="no-icon"><?php esc_html_e('upload your custom icon or logo', 'onclick-to-top'); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" id="image-url" name="octt_custom_icon" value="<?php echo esc_attr($custom_icon_url); ?>" />
                                        <input type="button" id="upload-button" class="button" value="Upload Image" />
                                        <input type="button" id="remove-button" class="button" value="Remove Image" />
                                    </td>
                                </tr>

                                <!-- Icon Size Feild -->
                                <tr class="setting-option-hide content-item hide-default-logo" valign="top">
                                    <th scope="row"><?php esc_html_e('Icon Size', 'onclick-to-top') ?>:</th>
                                    <td>

                                        <div class="input-group">
                                            <input type="range" min="0" max="50" name="octt_icon_font_size" value="<?php echo esc_attr(get_option('octt_icon_font_size', '16')); ?>" class="range-slider" data-default-value="16" />

                                            <input type="number" min="0" max="50" name="octt_icon_font_size" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_font_size', '16')); ?>" data-default-value="16" />

                                            <button class="reset_buttons" name="octt_icon_font_size"><?php echo esc_html__('Reset', 'onclick-to-top'); ?></button>
                                        </div>

                                        </br>
                                        </br>
                                        <label for=""><?php esc_html_e('Icon size provide in pixels. ex: 16', 'onclick-to-top') ?></label>
                                    </td>
                                </tr>

                                <!-- Icon Color Feild -->
                                <tr class="setting-option-hide content-item hide-default-logo" valign="top">
                                    <th scope="row"><?php esc_html_e('Icon Color', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <input type="text" name="octt_icon_color" value="<?php echo esc_attr(get_option('octt_icon_color')); ?>" class="octt-color-field" data-default-color="#fff" />
                                    </td>
                                </tr>
                                <!-- Background Color Feild -->
                                <tr class="setting-option-hide content-item hide-default-logo" valign="top">
                                    <th scope="row"><?php esc_html_e('Background Color', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <input type="text" name="octt_icon_background_color" value="<?php echo esc_attr(get_option('octt_icon_background_color')); ?>" class="octt-color-field" data-default-color="#ed5839" />
                                    </td>
                                </tr>

                                <!-- icon Hover Color Feild -->
                                <tr class="setting-option-hide content-item hide-default-logo" valign="top">
                                    <th scope="row"><?php esc_html_e('Icon Hover Color', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <input type="text" name="octt_icon_hover_color" value="<?php echo esc_attr(get_option('octt_icon_hover_color')); ?>" class="octt-color-field" data-default-color="#000" />
                                    </td>
                                </tr>
                            </table>

                            <table class="form-table">
                                <div class="headding">
                                    <h3><?php esc_html_e('Border Settings', 'onclick-to-top') ?></h3>
                                </div>

                                <!-- Border Style Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Border Style', 'onclick-to-top') ?>:</th>
                                    <td class="icon_border_style">
                                        <!-- <input type="text" name="octt_icon_border_style" value="<?php echo esc_attr(get_option('octt_icon_border_style')); ?>" /> -->

                                        <?php
                                        $option = get_option('octt_icon_border_style', 'none');
                                        $border_styles = array(
                                            'none',
                                            'solid',
                                            'dotted',
                                            'dashed',
                                        );
                                        $counter = 0;
                                        foreach ($border_styles as $border_style) {
                                            $counter++;
                                            echo sprintf('<div class="octt-radio-button"><input type="radio" class="radio-button" id="octt_icon_border_style_%s" name="octt_icon_border_style" value="%s" %s>   <label for="octt_icon_border_style_%s">%s</label></div>', esc_attr($counter), esc_html($border_style), checked($option, esc_html($border_style), false), esc_attr($counter), esc_html($border_style));
                                        };
                                        ?>

                                    </td>
                                </tr>

                                <!-- Border Size Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Border Size', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="10" name="octt_icon_border_size" value="<?php echo esc_attr(get_option('octt_icon_border_size', '2')); ?>" data-default-value="2" />
                                            <input type="number" min="0" max="10" name="octt_icon_border_size" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_border_size', '2')) ?>" data-default-value="2" />
                                            <button class="reset_buttons" name="octt_icon_border_size"><?php echo esc_html__('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        </br>
                                        <label for=""><?php esc_html_e('Border size provide in pixels. ex: 2', 'onclick-to-top') ?></label>
                                    </td>
                                </tr>
                                <!-- Border radius Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Border Radius', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="50" name="octt_icon_border_radius" value="<?php echo esc_attr(get_option('octt_icon_border_radius', '50')); ?>" data-default-value="50" />

                                            <input type="number" min="0" max="50" name="octt_icon_border_radius" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_border_radius', '50')) ?>" data-default-value="50" />

                                            <button class="reset_buttons" name="octt_icon_border_radius"><?php echo esc_html__('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        </br>
                                        <label for=""><?php esc_html_e('Border radius provide in pixels. ex: 50', 'onclick-to-top') ?></label>
                                    </td>
                                </tr>
                                <!-- Border Color Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Border Color', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <input type="text" name="octt_icon_border_color" value="<?php echo esc_attr(get_option('octt_icon_border_color')); ?>" class="octt-color-field" data-default-color="#000" />
                                    </td>
                                </tr>
                            </table>

                            <table class="form-table">
                                <div class="headding">
                                    <h3><?php esc_html_e('Button Position Settings', 'onclick-to-top'); ?></h3>
                                </div>
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Button Position', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="octt-button-position">
                                            <div class="octt-radio-button">
                                                <input type="radio" class="checkbox-left" name="octt_button_position" id="octt_button_position_left" value="left" <?php checked(get_option('octt_button_position'), 'left', true); ?> />
                                                <label for="octt_button_position_left"><?php esc_html_e('Left', 'onclick-to-top'); ?></label>
                                            </div>
                                            <div class="octt-radio-button">
                                                <input type="radio" class="checkbox-right" name="octt_button_position" id="octt_button_position_right" value="right" <?php checked(get_option('octt_button_position', 'right'), 'right', true); ?> />
                                                <label for="octt_button_position_right"><?php esc_html_e('Right', 'onclick-to-top'); ?></label>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <!-- Left -->
                                <tr class="setting-option-hide content-item  setting-option-hide-left" valign="top">
                                    <th scope="row"><?php esc_html_e('Left', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="200" name="octt_button_position_left" value="<?php echo esc_attr(get_option('octt_button_position_left', '20')); ?>" data-default-value="20" />

                                            <input type="number" min="0" max="200" name="octt_button_position_left" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_button_position_left', '20')) ?>" data-default-value="20" />

                                            <button class="reset_buttons" name="octt_button_position_left"><?php echo esc_html__('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        <label for=""><?php esc_html_e('in pixels. It affects on button left position', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>
                                <!-- Right -->
                                <tr class="setting-option-hide content-item  setting-option-hide-right" valign="top">
                                    <th scope="row"><?php esc_html_e('Right', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="200" name="octt_button_position_right" value="<?php echo esc_attr(get_option('octt_button_position_right', '20')); ?>" data-default-value="20" />

                                            <input type="number" min="0" max="200" name="octt_button_position_right" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_button_position_right', '20')) ?>" data-default-value="20" />

                                            <button class="reset_buttons" name="octt_button_position_right"><?php echo esc_html__('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        <label for=""><?php esc_html_e('in pixels. It affects on button right position', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>


                                <!-- Button Margin bottom  Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Button Margin Bottom', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="100" name="octt_icon_bottom" value="<?php echo esc_attr(get_option('octt_icon_bottom', '20')); ?>" data-default-value="20" />

                                            <input type="number" min="0" max="100" name="octt_icon_bottom" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_bottom', '20')) ?>" data-default-value="20" />

                                            <button class="reset_buttons" name="octt_icon_bottom"><?php echo esc_html__('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        <label for=""><?php esc_html_e('in pixels. It affects on button bottom', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>
                            </table>

                            <table class="form-table">

                                <div class="headding">
                                    <h3><?php esc_html_e('Behavior Settings', 'onclick-to-top'); ?></h3>
                                </div>

                                <!-- Behavior settings fields go here -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Scroll duration', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="5000" name="octt_icon_scroll_duration" value="<?php echo esc_attr(get_option('octt_icon_scroll_duration', '500')); ?>" data-default-value="500" />

                                            <input type="number" min="0" max="5000" name="octt_icon_scroll_duration" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_scroll_duration', '500')); ?>" data-default-value="500" />

                                            <button class="reset_buttons" name="octt_icon_scroll_duration"><?php echo esc_html__('Reset', 'onclick-to-top'); ?></button>
                                        </div>
                                        <br>
                                        <label><?php esc_html_e('In milliseconds', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>
                                <!-- Button Offset  Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Button Offset', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="400" name="octt_icon_button_offset" value="<?php echo esc_attr(get_option('octt_icon_button_offset', '50')); ?>" data-default-value="50" />

                                            <input type="number" min="0" max="400" name="octt_icon_button_offset" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_button_offset', '50')) ?>" data-default-value="50" />

                                            <button class="reset_buttons" name="octt_icon_button_offset"><?php echo esc_html__('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        <label for=""><?php esc_html_e('Distance from top in pixels before showing the button.', 'onclick-to-top'); ?></label>
                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <!-- Enable Scroll Progress Feild -->
                    <div id="progress-settings" class="octt-tab-pane">
                        <div class="on-click-settings-hedding">
                            <div class="on-click-item">
                                <h3 class="on-click-sub-title"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/progressbar.svg') ?>" alt="progress"> <?php esc_html_e('Progress Bar', 'onclick-to-top'); ?></h3>
                                <div class="on-click-submit-button">
                                    <?php submit_button(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-table-content">
                            <table class="form-table">
                                <!-- Progress settings fields go here -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Enable Scroll Progress', 'onclick-to-top') ?>:</th>
                                    <td>

                                        <input type="checkbox" id="toggl" class="checkbo" name="octt_icon_enable_progressbar" value="1" <?php checked(get_option('octt_icon_enable_progressbar', true), 1, true) ?>; />
                                        <label for="toggl" class="switch"></label></br></br>
                                        <label><?php esc_html_e('Enable scroll progress indicator?', 'onclick-to-top') ?></label>
                                    </td>
                                </tr>
                                <!-- progress width Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Progress Width', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <div class="input-group">
                                            <input type="range" min="0" max="20" name="octt_icon_progress_width" value="<?php echo esc_attr(get_option('octt_icon_progress_width', '2')); ?>" data-default-value="2" />

                                            <input type="number" min="0" max="20" name="octt_icon_progress_width" class="octt_number_input" value="<?php echo esc_attr(get_option('octt_icon_progress_width', '2')) ?>" data-default-value="2" />

                                            <button class="reset_buttons" name="octt_icon_progress_width"><?php echo esc_html_e('Reset', 'onclick-to-top') ?></button>
                                        </div>
                                        </br>
                                        </br>
                                        <label for=""><?php esc_html_e('Progress Width provide in pixels. ex: 2', 'onclick-to-top') ?></label>
                                    </td>
                                </tr>

                                <!-- Progress Color Feild -->
                                <tr class="setting-option-hide content-item " valign="top">
                                    <th scope="row"><?php esc_html_e('Progress Color', 'onclick-to-top') ?>:</th>
                                    <td>
                                        <input type="text" name="octt_icon_progress_color" value="<?php echo esc_attr(get_option('octt_icon_progress_color')); ?>" class="octt-color-field" data-default-color="#000" />
                                    </td>
                                </tr>
                                <!-- Add other Progress settings fields here -->
                            </table>
                        </div>
                    </div>

                    <!-- Custom css Feild -->
                    <div id="custom-css-settings" class="octt-tab-pane">
                        <div class="on-click-settings-hedding">
                            <div class="on-click-item">
                                <h3 class="on-click-sub-title"><img class="img-fluid" src="<?php echo esc_url(OCTT_ASSETS . '/images/custom-css.svg') ?>" alt="progress"> <?php esc_html_e('Custom CSS', 'onclick-to-top'); ?></h3>
                                <div class="on-click-submit-button">
                                    <?php submit_button(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-table-content">
                            <table class="form-table">
                                <tr valign="top" class="setting-option-hide content-item ">
                                    <th scope="row"><?php esc_html_e('Custom CSS', 'onclick-to-top'); ?>:</th>
                                    <td>
                                        <textarea rows="15" cols="80" name="octt_custom_css" aria-label="With textarea" placeholder="Enter your custom CSS here..."><?php echo esc_textarea(get_option('octt_custom_css')); ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
<?php
}


// Sanitization callback function
