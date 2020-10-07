// $(function(){$(".dropdown-toggle").dropdown();new Swiper(".entry-swiper-container",{fadeEffect:{crossFade:!0},virtualTranslate:!0,slideToClickedSlide:!0,mousewheelControl:!0,autoplayDisableOnInteraction:!0,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:3e3,disableOnInteraction:!1},speed:1e3,slidersPerView:1,effect:"fade"});var e=new Swiper(".gallery-thumbs",{slidesPerView:13,freeMode:!0,watchSlidesVisibility:!0,watchSlidesProgress:!0});new Swiper(".gallery-top",{spaceBetween:10,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},thumbs:{swiper:e}}),new Swiper(".la-mcard__container",{slidesPerView:"auto",spaceBetween:30,pagination:{el:".swiper-pagination",clickable:!0}}),new Swiper(".la-choose__slider",{slidesPerView:"auto",spaceBetween:30,pagination:{el:".swiper-pagination",clickable:!0}}),new Swiper(".la-price__slider",{direction:"vertical",slidesPerView:1,spaceBetween:30,mousewheel:!0,pagination:{el:".swiper-pagination",clickable:!0}})}),$('[data-toggle="popover"]').popover();

$(function () {
    $(".dropdown-toggle").dropdown();
    new Swiper(".entry-swiper-container", {
        fadeEffect: { crossFade: !0 },
        virtualTranslate: !0,
        slideToClickedSlide: !0,
        mousewheelControl: !0,
        autoplayDisableOnInteraction: !0,
        pagination: { el: ".swiper-pagination", clickable: !0 },
        autoplay: { delay: 3e3, disableOnInteraction: !1 },
        speed: 1e3,
        slidersPerView: 1,
        effect: "fade",
    });
    var e = new Swiper(".gallery-thumbs", { slidesPerView: 13, freeMode: !0, watchSlidesVisibility: !0, watchSlidesProgress: !0 });
    new Swiper(".gallery-top", { spaceBetween: 10, navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }, thumbs: { swiper: e } }),
        new Swiper(".la-mcard__container", { slidesPerView: "auto", spaceBetween: 30, pagination: { el: ".swiper-pagination", clickable: !0 } }),
        new Swiper(".la-choose__slider", { slidesPerView: "auto", spaceBetween: 30, pagination: { el: ".swiper-pagination", clickable: !0 } }),
        new Swiper(".la-price__slider", { direction: "vertical", slidesPerView: 1, spaceBetween: 30, mousewheel: !0, pagination: { el: ".swiper-pagination", clickable: !0 } });

        // Rating star - course page
        $("#rateYo").rateYo({
            starWidth: "15px",
            rating: 3.6,
            readOnly: true,
            normalFill: "#D5D5D5",
            ratedFill: "#FFC516"
        });
}),
    $('[data-toggle="popover"]').popover();