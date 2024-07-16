const projectsSection = document.querySelector('.projects');

    if ($('.projects').length > 0) {
        $('.projects').appear(function(event, element){
            const projectsSlider = new Swiper(".js-slider-projects", {
                loop: false,
                slidesPerView: 4,
                spaceBetween: 40,
                navigation: {
                    nextEl: ".js-slider-projects-next",
                    prevEl: ".js-slider-projects-prev"
                },

                scrollbar: {
                    el: ".swiper-scrollbar",
                },

                breakpoints: {
                    200: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    },

                    600: {
                        slidesPerView: 2,
                        spaceBetween: 25
                    },

                    768 : {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },

                    960: {
                        slidesPerView: 3,
                        spaceBetween: 25
                    },

                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },

                    1400: {
                        slidesPerView: 3,
                        spaceBetween: 35
                    },

                    1700: {
                        slidesPerView: 4,
                        spaceBetween: 35
                    },

                    1920: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    },
                },
            });

            const projectTemplate = projectsSection.querySelector('#project-slide').content.querySelector('.projects-slide');
            const listOfSlidesFragment = document.createDocumentFragment();
            const slidesContainer = projectsSection.querySelector('.projects-wrapper');

            async function getSlidesData() {
                try {
                    const response = await fetch('https://oniks.info/api/rss.php');
                    const slides = await response.json();

                    return slides;

                } catch (error) {
                    console.log(error);
                }
            };

            function fillSlideData (card) {
                const slideMarkup = projectTemplate.cloneNode(true);

                slideMarkup.querySelector('.projects-slide-img').src = card.PICTURE;
                slideMarkup.querySelector('.projects-slide-img').alt = card.NAME;
                slideMarkup.querySelector('.projects-slide-name').textContent = card.NAME;
                slideMarkup.querySelector('.projects-slide-address').textContent = card.ADDRESS;
                slideMarkup.querySelector('.projects-slide-link').href = card.LINK || card.OBJECT;
                slideMarkup.querySelector('.projects-slide-status').textContent = card.STATUS.VALUE;

                listOfSlidesFragment.appendChild(slideMarkup);
            };

            function renderSlides (cards) {
                cards.forEach(card => fillSlideData(card));
                slidesContainer.appendChild(listOfSlidesFragment);
            };

            function removePreloader () {
                const preloader = projectsSection.querySelector('.projects-preloader');
                const projectsContainer = projectsSection.querySelector('.projects .container');

                setTimeout(function() {
                    if(!preloader.classList.contains('projects-preloader-done')) {
                        preloader.classList.add('projects-preloader-done');
                    }

                    if(!projectsContainer.classList.contains('projects-container-loaded')) {
                        projectsContainer.classList.add('projects-container-loaded');
                    }
                }, 1000)
            };

            getSlidesData()
                .then((slides) => renderSlides(slides))
                .catch((error) => console.error(error))
                .finally(() => removePreloader());
        });  
    }