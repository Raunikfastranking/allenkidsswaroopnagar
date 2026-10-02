const swiper1 = new Swiper('.carousel1', {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.carousel1 .swiper-button-next',
        prevEl: '.carousel1 .swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
        1320: {
            slidesPerView: 3
        },
        1520: {
            slidesPerView: 4
        }
    }
});
const swiper2 = new Swiper('.carousel2', {
    loop: true,
    spaceBetween: 25,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        450: {
            slidesPerView: 3-1.8
        },
        600: {
            slidesPerView: 2
        },
        767: {
            slidesPerView: 4-1.9
        },
        1050: {
            slidesPerView: 3
        },
    }
});

const overValue = new Swiper('.our-value-carousel', {
    loop: true,
    spaceBetween: 50,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        450: {
            slidesPerView: 1
        },
        600: {
            slidesPerView: 3 - 1.5
        },
        767: {
            slidesPerView: 2
        },
        1050: {
            slidesPerView: 3
        },
        1250: {
            slidesPerView: 3
        },
        1350: {
            slidesPerView: 4
        },
        1450: {
            slidesPerView: 4
        },
    }
});

const swiper3 = new Swiper('.carousel3', {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.carousel3 .swiper-button-next',
        prevEl: '.carousel3 .swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        600: {
            slidesPerView: 2
        },
        850: {
            slidesPerView: 4
        },
        1050: {
            slidesPerView: 4
        },
        1200: {
            slidesPerView: 4
        },

        1400: {
            slidesPerView: 4
        },
        1600: {
            slidesPerView: 4
        }
    }
});
const parentcarousel = new Swiper('.parent-carousel', {
    loop: true,
    spaceBetween: 50,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 3 - 1.5
        },
        1024: {
            slidesPerView: 2
        },
       
    }
});
const carousel4 = new Swiper('.carousel4', {
    loop: true,
    spaceBetween: 50,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        }
    }
});
const groupinstitution = new Swiper('.group-institution', {
    loop: true,
    spaceBetween: 25,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 3-1.8
        },
         420: {
            slidesPerView: 3-1.2
        },
        768: {
            slidesPerView: 4 - 1.5
        },
        1024: {
            slidesPerView: 4 - 1.5
        },
        1200: {
            slidesPerView: 5 - 1.5
        }
    }
});

const eventCarousel = new Swiper('.events-carousel', {
    loop: true,
    spaceBetween: 50,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        600: {
            slidesPerView: 2
        },
        850: {
            slidesPerView: 2
        },
        1050: {
            slidesPerView: 3
        },
        1200: {
            slidesPerView: 3
        },

        1400: {
            slidesPerView: 4
        },
        1600: {
            slidesPerView: 4
        }
    }
});

const event2Carousel = new Swiper('.events-carousel2', {
    loop: true,
    spaceBetween: 50,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            document.getElementById("scroll").style.display = "flex";
        } else {
            document.getElementById("scroll").style.display = "none";
        }
    });

    document.getElementById("scroll").addEventListener("click", function () {
        setTimeout(function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }, 500); // 500ms delay
    });
});