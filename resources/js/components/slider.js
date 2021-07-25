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