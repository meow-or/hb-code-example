$(document).ready(function () {

    const modelToggleSwiper = new Swiper('.model-toggle-slider', {
        loop: false,
        slidesPerView: 2,
        spaceBetween: 40,
        allowTouchMove: false,
        
        hashNavigation: {
            watchState: true,
        },

        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },

    });

    const swiperColorPicker = new Swiper('.model-color-slider', {
        loop: false,
        slidesPerView: 1,
        allowTouchMove: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },

        hashNavigation: {
            watchState: true,
        },
        
    });

    const swiperColorName = new Swiper('.model-color-name-slider', {
        loop: false,
        slidesPerView: 1,
        allowTouchMove: false,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },

        hashNavigation: {
            watchState: true,
        },
        
    });

    const swiperComplectation = new Swiper('.model-complectations-swiper', {
        loop: false,
        slidesPerView: 4,
        spaceBetween: 25,
        navigation: {
            nextEl: '.js-slider-model-complectations-next',
            prevEl: '.js-slider-model-complectations-prev',
        },

        pagination: {
            el: '.model-complectations-pagination',
            type: 'bullets',
            clickable: true,
        },

        breakpoints: {
            
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            },

            768: {
                slidesPerView: 3,
                spaceBetween: 25,
            },

            576: {
                slidesPerView: 2,
            },

            200: {
                slidesPerView: 1,
            }
            
        }
    })
});