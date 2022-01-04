import Swiper, { Navigation, Pagination } from 'swiper'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

import mixitup from 'mixitup'

import { Fancybox } from '@fancyapps/ui'
;(function ($) {
    'use strict'

    // configure Swiper to use modules
    Swiper.use([Navigation, Pagination])

    var swiper = new Swiper('.swiperSlideHome', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    })

    var carousel = new Swiper('.swiperCarouselArquitetos', {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            450: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    })

    // MixItUp
    var containerEl = document.querySelector('.mix-projetos')

    if (containerEl) {
        var mixer = mixitup(containerEl, {
            selectors: {
                target: '.item'
            },
            animation: {
                duration: 400,
                effects:
                    'stagger(34ms) rotateX(20deg) scale(0.01) translateZ(1000px) fade',
                easing: 'ease-in-out'
            }
        })
    }

})(jQuery, window, document)
