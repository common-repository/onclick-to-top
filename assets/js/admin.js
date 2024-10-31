; (function ($) {
    const app = {
        init: function () {

            /**
             * Draggable Icon
             */
            const isDraggable = octt_data?.isDraggable;

            if (isDraggable == true) {
                const element = $("#backToTopBtn span");

                // Load saved position from localStorage
                const savedPosition = localStorage.getItem('draggablePosition');
                if (savedPosition) {
                    const pos = JSON.parse(savedPosition);
                    if (pos && pos.top !== undefined && pos.left !== undefined) {
                        element.css({ top: pos.top, left: pos.left });
                    }
                }

                // Make the element draggable
                element.draggable({
                    cursor: "move",
                    stop: function (event, ui) {
                        const position = ui.position;
                        localStorage.setItem('draggablePosition', JSON.stringify(position));
                    }
                });
            }

            // Clear the activeTab in localStorage on plugin activation/deactivation
            var pluginSlug = 'onclick-to-top'; // Use your plugin's unique identifier
            var actionUrl = window.location.href;

            if (actionUrl.includes('activate=true') || actionUrl.includes('deactivate=true')) {
                localStorage.removeItem('activeTab');
            }

            // Check if a tab state is saved in localStorage
            if (localStorage.getItem('activeTab')) {
                var activeTab = localStorage.getItem('activeTab');
                // Remove active class from all tabs and tab panes
                $('.octt-tab-menu ul li').removeClass('active');
                $('.octt-tab-pane').removeClass('active');
                // Add active class to the saved tab and tab pane
                $('a[href="' + activeTab + '"]').parent().addClass('active');
                $(activeTab).addClass('active');
            } else {
                // Default to the first tab if no state is saved
                $('.octt-tab-menu ul li:first-child').addClass('active');
                $('.octt-tab-pane:first-child').addClass('active');
            }

            // Handle tab clicks
            $('.octt-tab-menu ul li a').click(function (e) {
                e.preventDefault();
                var target = $(this).attr('href');

                $('.octt-tab-menu ul li').removeClass('active');
                $(this).parent().addClass('active');

                $('.octt-tab-pane').removeClass('active');
                $(target).addClass('active');

                // Save the active tab state in localStorage
                localStorage.setItem('activeTab', target);
            });

            // Save button click handler to maintain the state
            $('.on-click-submit-button input[type="submit"]').on('click', function () {
                // Get the active tab ID
                var activeTab = $('.octt-tab-menu ul li.active a').attr('href');
                // Store the active tab ID in localStorage
                localStorage.setItem('activeTab', activeTab);
            });


            // Initialize color picker start
            $('.octt-color-field').wpColorPicker();
            // Initialize color picker end



            // button size on change function
            $('input[name="octt_icon_width"]').on('change', function (e) {
                $('input[name="octt_icon_width"]').val(this.value);
            });
            //Icon Size on change function
            $('input[name="octt_icon_font_size"]').on('change', function (e) {
                $('input[name="octt_icon_font_size"]').val(this.value);
            });
            //border Size on change function
            $('input[name="octt_icon_border_size"]').on('change', function (e) {
                $('input[name="octt_icon_border_size"]').val(this.value);
            });
            //border radius Size on change function
            $('input[name="octt_icon_border_radius"]').on('change', function (e) {
                $('input[name="octt_icon_border_radius"]').val(this.value);
            });
            //Button Margin right Size on change function
            $('input[name="octt_button_position_right"]').on('change', function (e) {
                $('input[name="octt_button_position_right"]').val(this.value);
            });
            //Button Margin left Size on change function
            $('input[name="octt_button_position_left"]').on('change', function (e) {
                $('input[name="octt_button_position_left"]').val(this.value);
            });

            //Button Margin bottom Size on change function
            $('input[name="octt_icon_bottom"]').on('change', function (e) {
                $('input[name="octt_icon_bottom"]').val(this.value);
            });
            //Button offset on change function
            $('input[name="octt_icon_button_offset"]').on('change', function (e) {
                $('input[name="octt_icon_button_offset"]').val(this.value);
            });

            //Button Scroll duration on change function
            $('input[name="octt_icon_scroll_duration"]').on('change', function (e) {
                $('input[name="octt_icon_scroll_duration"]').val(this.value);
            });

            //Button progress width on change function
            $('input[name="octt_icon_progress_width"]').on('change', function (e) {
                $('input[name="octt_icon_progress_width"]').val(this.value);
            });





            //reset default value function
            //button size reset default value
            $('button[name="octt_icon_width"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_width"]').val(30);
            });
            // Icon Size reset default value
            $('button[name="octt_icon_font_size"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_font_size"]').val(16);
            });
            // border Size reset default value
            $('button[name="octt_icon_border_size"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_border_size"]').val(2);
            });
            // border radius Size reset default value
            $('button[name="octt_icon_border_radius"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_border_radius"]').val(50);
            });
            // Button Margin right Size reset default value
            $('button[name="octt_button_position_right"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_button_position_right"]').val(20);
            });
            // Button Margin left Size reset default value
            $('button[name="octt_button_position_left"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_button_position_left"]').val(20);
            });
            // Button Margin bottom Size reset default value
            $('button[name="octt_icon_bottom"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_bottom"]').val(20);
            });
            // Button offset reset default value
            $('button[name="octt_icon_button_offset"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_button_offset"]').val(50);
            });
            // Button Scroll duration reset default value
            $('button[name="octt_icon_scroll_duration"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_scroll_duration"]').val(500);
            });
            // Button progress width reset default value
            $('button[name="octt_icon_progress_width"]').on('click', function (e) {
                e.preventDefault();
                $('input[name="octt_icon_progress_width"]').val(2);
            });


            // default check & show, hide
            if ($(".checkbox").prop('checked')) {
                $(".setting-option-hide").show();
                // initial button position display
                buttonPositionDisplay();
                buttonSelect();
            } else {
                $(".setting-option-hide").hide();
            }

            // handle on change checkbox
            $(".checkbox").on('change', function () {
                $(".setting-option-hide").toggle();
                if ($(".checkbox").prop('checked')) {
                    $(".setting-option-hide").show();
                } else {
                    $(".setting-option-hide").hide();
                }
            });


            function buttonPositionDisplay() {
                if ($('.checkbox-left').is(':checked')) {
                    $('.setting-option-hide-left').show();
                    $(".setting-option-hide-right").hide();
                } else {
                    $('.setting-option-hide-left').hide();
                    $(".setting-option-hide-right").show();
                }
            }
            // button position display
            $('input[name="octt_button_position"]').change(function () {
                buttonPositionDisplay();
            });


            function buttonSelect() {
                if ($('.checkbox-custom').is(':checked')) {
                    $(".hide-custom-logo").show();
                    $('.hide-default-logo').hide();
                } else {
                    $('.hide-default-logo').show();
                    $(".hide-custom-logo").hide();
                }
            }

            // Initial call to set the correct display
            // buttonSelect();

            // Listen for changes to the radio buttons
            $('input[name="octt_icon_select"]').change(function () {
                buttonSelect();
            });

            function updateBackground(rangeInput) {
                const value = rangeInput.val();
                const min = rangeInput.attr('min');
                const max = rangeInput.attr('max');
                const percentage = ((value - min) / (max - min)) * 100;

                rangeInput.css('background', `linear-gradient(to right, #ed5839 ${percentage}%, #ddd ${percentage}%)`);
            }

            $('.input-group').each(function () {
                const $group = $(this);
                const $rangeInput = $group.find('input[type="range"]');
                const $numberInput = $group.find('input[type="number"]');
                const $resetButton = $group.find('.reset_buttons');

                // Update inputs and background when range input changes
                $rangeInput.on('input', function () {
                    const value = $(this).val();
                    $numberInput.val(value);
                    updateBackground($rangeInput);
                });

                // Update range input and background when number input changes
                $numberInput.on('input', function () {
                    const value = $(this).val();
                    $rangeInput.val(value).trigger('input');
                });

                // Reset inputs to their default values
                $resetButton.on('click', function (e) {
                    e.preventDefault();
                    const defaultRangeValue = $rangeInput.data('default-value');
                    const defaultNumberValue = $numberInput.data('default-value');
                    $rangeInput.val(defaultRangeValue).trigger('input');
                    $numberInput.val(defaultNumberValue);
                    console.log(defaultNumberValue);
                });

                // Initialize background on page load
                updateBackground($rangeInput);
            });

            // custom logo upload js 
            var mediaUploader;
            $('#upload-button').click(function (e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Select or Upload an Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function () {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#image-url').val(attachment.url);
                    $('#image-preview').html('<img src="' + attachment.url + '" alt="Selected Image" style="max-width:100%;"/>');
                });
                mediaUploader.open();
            });
            $('#remove-button').click(function (e) {
                e.preventDefault();
                $('#image-url').val('');
                $('#image-preview').html(`<p class="no-icon">no icon upload</p>`);
            });


        },

    };

    $(document).ready(app.init);

})(jQuery);
