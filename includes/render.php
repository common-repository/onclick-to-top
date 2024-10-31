<?php
if (!defined('ABSPATH')) exit;
/**
 * Display scroll top button on frontend
 * @since 1.0.1
 */
function octt_to_top_button() {

    if (get_option('octt_icon_enable_button', 1)) {
        $view_box = (-2 / 2) . ' ' . (-2 / 2) . ' ' . (100 + 2) . ' ' . (100 + 2);
        $ott_icon = get_option('octt_icon_select_defualt', 'f342');
        $custom_icon_url = get_option('octt_custom_icon', '');
        $icon_class = $custom_icon_url ? '' : 'dashicons ' . esc_html($ott_icon);
        $icon_select_type = get_option('octt_icon_select');
        $icon_width = esc_attr(get_option('octt_icon_width', 30)) . 'px';
        $icon_height = esc_attr(get_option('octt_icon_width', 30)) . 'px';


        if ('custom_icon' == $icon_select_type) {
            $ott_icon = 'background-image: url(' . esc_url($custom_icon_url) . '); background-size: 95% 95%; background-repeat: no-repeat; background-position: center; display: inline-block; overflow: hidden; border-radius: 50%; width: ' . $icon_width . '; height: ' . $icon_height . ';content:"";';
        } else {
            $ott_icon = 'content: "\\' . esc_attr($ott_icon) . '" !important;';
        }
?>
        <div class="onclick-footer-text">
            <div id="backToTopBtn">
                <span id="progress-wrap" class="to-top">
                    <svg class="progress-circle" width="100%" height="100%" viewBox="<?php echo esc_html($view_box); ?>">
                        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                    </svg>
                </span>
            </div>
        </div>


        <style>
            #progress-wrap svg path {
                stroke: <?php echo esc_attr(get_option('octt_icon_progress_color', '#fff')); ?>;
                stroke-width: <?php echo esc_attr(get_option('octt_icon_progress_width', 2)); ?>px;

            }

            #progress-wrap svg {
                fill: <?php echo esc_attr(get_option('octt_icon_progress_color', '#ed5839')); ?>;
            }

            /* custom width & height */
            .onclick-footer-text {
                position: relative;
                z-index: 99999;
            }

            .onclick-footer-text span {

                width: <?php echo esc_attr(get_option('octt_icon_width', 30)); ?>px;
                height: <?php echo esc_attr(get_option('octt_icon_width', 30)); ?>px;
                /* line-height: <?php //echo esc_attr(get_option('octt_icon_width',30)); 
                                ?>px; */
                font-size: <?php echo esc_attr(get_option('octt_icon_font_size', 16)); ?>px;
                border: <?php echo esc_attr(get_option('octt_icon_border_size', 2)); ?>px;
                border-radius: <?php echo esc_attr(get_option('octt_icon_border_radius', 50)); ?>%;
                border-style: <?php echo esc_attr(get_option('octt_icon_border_style', 'none')); ?>;
                border-color: <?php echo esc_attr(get_option('octt_icon_border_color', '#000')); ?>;
                background-color: <?php echo esc_attr(get_option('octt_icon_background_color', '#ed5839')); ?>;
                color: <?php echo esc_attr(get_option('octt_icon_color', '#fff')); ?>;

                bottom: <?php echo esc_attr(get_option('octt_icon_bottom', 20)); ?>px;

                <?php
                if (!empty(get_option('octt_button_position_right')) && ('right' == get_option('octt_button_position', 'right'))) { ?>right: <?php echo esc_attr(get_option('octt_button_position_right', 20)); ?>px;
                <?php } ?><?php
                            if (!empty(get_option('octt_button_position_left')) && ('left' == get_option('octt_button_position'))) { ?>left: <?php echo esc_attr(get_option('octt_button_position_left', 20)); ?>px;
                <?php } ?>
            }

            #progress-wrap::after {

                <?php echo $ott_icon; ?>color: <?php echo esc_attr(get_option('octt_icon_color', '#fff')); ?>;
                width: <?php echo esc_attr(get_option('octt_icon_width', 30)); ?>px;
                height: <?php echo esc_attr(get_option('octt_icon_width', 30)); ?>px;
                line-height: <?php echo esc_attr(get_option('octt_icon_width', 30)); ?>px;
                font-size: <?php echo esc_attr(get_option('octt_icon_font_size', 16)); ?>px;

            }

            #progress-wrap:hover::after {
                color: <?php echo esc_attr(get_option('octt_icon_hover_color', '#000')); ?>;
            }

            .dashicons-arrow-up-alt:before {
                /* line-height: <?php echo esc_attr(get_option('octt_icon_width', 30)); ?>px; */
                font-size: <?php echo esc_attr(get_option('octt_icon_font_size', 16)); ?>px;
            }

            <?php if (get_option('octt_button_position_right')) { ?>.onclick-footer-text {
                right: 10px;
            }

            <?php } ?><?php if (get_option('octt_button_position_left')) { ?>.onclick-footer-text {
                left: 10px;
            }

            <?php } ?>

            /*progressbar css*/
            <?php if (get_option('octt_icon_enable_progressbar')) { ?>#progress-wrap svg path {
                display: block !important;
            }

            <?php } else { ?>#progress-wrap svg path {
                display: none !important;
            }

            <?php } ?>.onclick-footer-text {
                display: none;
            }

            /* hide on desktop layout */
            <?php if (1 == get_option('octt_hide_on_desktop')) { ?>@media (min-width: 992px) {
                .onclick-footer-text {
                    display: block !important;
                }
            }

            <?php } ?>
            /* hide on tablate layout */
            <?php if (1 == get_option('octt_hide_on_tablet')) { ?>@media (min-width: 768px) and (max-width: 991.98px) {
                .onclick-footer-text {
                    display: block !important;
                }
            }

            <?php } ?>
            /* hide on mobile layout */
            <?php if (1 == get_option('octt_hide_on_mobile')) { ?>@media (max-width: 767.98px) {
                .onclick-footer-text {
                    display: block !important;
                }
            }

            <?php } ?>
        </style>
<?php }
}
add_action('wp_footer', 'octt_to_top_button');


// Output custom CSS in the head section
function octt_output_custom_css() {
    $custom_css = get_option('octt_custom_css');
    if (!empty($custom_css)) {
        echo '<style type="text/css">' . wp_strip_all_tags($custom_css) . '</style>';
    }
}
add_action('wp_footer', 'octt_output_custom_css');

/**
 * Display "Back to Top" button in the admin panel
 */
global $pagenow;

if ($pagenow === 'options-general.php' && isset($_GET['page']) && $_GET['page'] === 'on-click-to-top') {
    if (get_option('octt_icon_enable_button_admin', 0)) {
        add_action('admin_footer', 'octt_to_top_button');
    }
}


/**
 * Display "Back to Top" button in the customizer preview
 */
function octt_customizer_preview() {
    if (is_customize_preview() || is_admin()) {
        octt_to_top_button();
    }
}
// add_action('customize_preview_init', 'octt_customizer_preview');