(function($) {
    "use strict";
    var cggowlCarInfo = function($scope, $) {
      $('.owlswiper-container').each(function(index, element) {
        var cggowlCarInfoCont = $scope.find(this);
        var cggowlSettings = $(this).data('settings');
        var cggowlCenteredSlides = cggowlSettings['centeredSlides'];
        var cggowlSlidesOffsetBefore = cggowlSettings['slidesOffsetBefore'];
        var cggowlSlidesOffsetAfter = cggowlSettings['slidesOffsetAfter'];
        var cggowlGrabCursor = cggowlSettings['grabCursor'];
        var cggowlDirection = cggowlSettings['direction'];
        var cggowlLoop = cggowlSettings['loop'];
        var cggowlSpeed = cggowlSettings['speed'];
        var cggowlEffect = cggowlSettings['effect'];
        var cggowlPreloadImages = cggowlSettings['preloadImages'];
        var cggowlLazy = cggowlSettings['lazy'];
        var cggowlDesktopSlidesPerVeiw = cggowlSettings['desktop_slides_per_veiw'];
        var cggowlTabletSlidesPerVeiw = cggowlSettings['tablet_slides_per_veiw'];
        var cggowlMobileSlidesPerVeiw = cggowlSettings['mobile_slides_per_veiw'];
        var cggowlPaginationType = cggowlSettings['pagination_type'];
        var cggowlClickable = cggowlSettings['clickable'];
        var cggowlDragable = cggowlSettings['dragable'];
        var cggowlEnableKeyboard = cggowlSettings['enable_keyboard'];
        var cggowlEnableAutoplay = cggowlSettings['enable_autoplay'];
        var cggowlDelay = cggowlSettings['delay'];
        var cggowlStopOnLastSlide = cggowlSettings['stopOnLastSlide'];
        var cggowlDisableOnInteraction = cggowlSettings['disableOnInteraction'];
        var cggowlReverseDirection = cggowlSettings['reverseDirection'];
        var cggowlEnableMouseWheelScroll = cggowlSettings['enable_mouse_wheel_scroll'];
        var cggowlMouseReverseDirection = cggowlSettings['mouse_reverse_direction'];
        $(this).addClass('s'+index);

        var swiperElement = '.s'+index;
        var swiperConfig = {
            handleElementorBreakpoints: false,
            centeredSlides: cggowlCenteredSlides,
            slidesOffsetBefore: cggowlSlidesOffsetBefore,
            slidesOffsetAfter: cggowlSlidesOffsetAfter,
            grabCursor: cggowlGrabCursor,
            direction: cggowlDirection, //Could be 'horizontal' or 'vertical' (for vertical slider).
            loop: cggowlLoop, //Duration of transition between slides (in ms)
            effect: cggowlEffect, // -CONFLICTING - Tranisition effect. Could be "slide", "fade", "cube", "coverflow" or "flip"
            preloadImages: cggowlPreloadImages,
            lazy: cggowlLazy,
            watchSlidesVisibility: true,
            breakpoints: {
                400: {
                    slidesPerView: cggowlMobileSlidesPerVeiw,
                },
                768: {
                    slidesPerView: cggowlTabletSlidesPerVeiw,
                },
                1025: {
                    slidesPerView: cggowlDesktopSlidesPerVeiw,
                },
            },

            pagination: {
                el: '.swiper-pagination',
                type: cggowlPaginationType, //String with type of pagination. Can be "bullets", "fraction", "progressbar" or "custom"
                clickable: cggowlClickable,
            },
            navigation: {
                nextEl: '.cggowl-button-next',
                prevEl: '.cggowl-button-prev',
              //  disabledClass : '',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                dragable: cggowlDragable,
            },
            keyboard: {
                enabled: cggowlEnableKeyboard,
            },
            autoplay: {
                enabled: cggowlEnableAutoplay,
                delay: cggowlDelay,
                stopOnLastSlide: cggowlStopOnLastSlide,
                disableOnInteraction: cggowlDisableOnInteraction,
                reverseDirection: cggowlReverseDirection,
            },
            mousewheel: {
                enabled: cggowlEnableMouseWheelScroll,
                invert: cggowlMouseReverseDirection,
            },
        }


        if ( 'undefined' === typeof Swiper ) {
            const asyncSwiper = elementorFrontend.utils.swiper;
            new asyncSwiper( swiperElement, swiperConfig ).then( ( newSwiperInstance ) => {    
               var cggoSwiper = newSwiperInstance;
              } );
        }else{
             var cggoSwiper = new Swiper( swiperElement, swiperConfig );
        }
       
      });

    }; // the variable cggowl_jav_info ends
    /***********************************/


    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/cggowl_post_carousel.default', cggowlCarInfo);
    });

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/cggowl_post_carousel2.default', cggowlCarInfo);
    });
    /***********************************/
})(jQuery);
