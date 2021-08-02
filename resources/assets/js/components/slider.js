import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

const sliderRoundedPagination = new Swiper('.slider-one-content-rounded-pagination', {  
    pagination: {
      el: '.swiper-pagination',
      bulletClass: 'swiper-pagination__bullet',
      bulletActiveClass: 'swiper-pagination__bullet--active',
      clickable: true
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
});

const sliderNumberPagination = new Swiper('.slider-number-pagination', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        bulletClass: 'swiper-pagination__number',
        bulletActiveClass: 'swiper-pagination__number--active',
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    }
})

const sliderNumberPaginationFifthSlide = new Swiper('.slider-fifth-content', {
    slidesPerView: 5,
    slidesPerGroup: 5,
    speed: 500,
    spaceBetween: 0,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        bulletClass: 'swiper-pagination__bullet',
        bulletActiveClass: 'swiper-pagination__bullet--active',
        clickable: true
    },
})

const sliderNumberPaginationThreeSlide = new Swiper('.slider-number-pagination-three-slide', {
    slidesPerView: 3,
    slidesPerGroup: 3,
    speed: 500,
    spaceBetween: 40,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        bulletClass: 'swiper-pagination__number',
        bulletActiveClass: 'swiper-pagination__number--active',
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    }
})

const sliderThreeContentArrowPagination = document.querySelectorAll('.slider-arrow-pagination-three-slide');

sliderThreeContentArrowPagination.forEach((slider, i) => {
    const sliderId = '#' + slider.id;
    
    const sliderArrowPaginationThreeSlide = new Swiper(sliderId, {
            slidesPerView: 3,
            slidesPerGroup: 3,
            speed: 500,
            spaceBetween: 150,
            navigation: {
                nextEl: sliderId + ' .swiper-button-next',
                prevEl: sliderId + ' .swiper-button-prev',
            },
            pagination: {
                el: sliderId + " .swiper-pagination",
                clickable: true,
                bulletClass: 'swiper-pagination__arrow',
                bulletActiveClass: 'swiper-pagination__arrow--active',
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            }
        }
    )
})