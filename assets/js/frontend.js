; (function ($) {
    const app = {
        init: function () {

            /**
             * Draggable Icon
             */
            const isDraggable = octt_data?.isDraggable;  // Ensure octt_data is used consistently

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
            
            // Function to scroll to the top of the page
            $(window).scroll(function () {
                var scrollProgress = $(window).scrollTop();
                var backToTopBtn = $('#backToTopBtn');
                if (scrollProgress > octt_data.offset) {
                    backToTopBtn.addClass('show');
                } else {
                    backToTopBtn.removeClass('show');
                }
            });

            // Function to scroll to the top of the page
            function scrollToTop() {
                $('html, body').animate({
                    scrollTop: 0
                }, parseInt(octt_data.duration), 'linear');
                return false;
            }

            // Call the scrollToTop function when clicking on the back to top button
            $('#backToTopBtn').click(function () {
                scrollToTop();
            });

            // Progress bar js
            var progressPath = $('#progress-wrap path');
            var pathLength = progressPath[0].getTotalLength();

            progressPath.css({
                'transition': 'none',
                'stroke-dasharray': pathLength + ' ' + pathLength,
                'stroke-dashoffset': pathLength
            });
            progressPath[0].getBoundingClientRect();
            progressPath.css({
                'transition': 'stroke-dashoffset 10ms linear'
            });

            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.css({
                    'stroke-dashoffset': progress
                });
            };

            updateProgress();

            $(window).scroll(updateProgress);

        },

    };

    $(document).ready(app.init);

})(jQuery);