// swiper carousel gallery
$(document).ready(function () {
  // Assign some jquery elements we'll need
  var $swiper = $(".gallery-container");
  var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
  // into a fixed position for animation purposes
  var $bottomSlideContent = null; // Slide content that gets passed between the
  // panning slide stack and the position 'behind'
  // the stack, needed for correct animation style

  var mySwiper = new Swiper(".gallery-container", {
    spaceBetween: 30,
    slidesPerView: 4,
    centeredSlides: true,
    initialSlide: 2,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    autoplay: false,
    roundLengths: true,
    loop: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 1.25,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 20
      }
    }
  });
});

// slick carousel gallery end

// fancy box
Fancybox.bind("[data-fancybox]", {});
// fancy box end

// swiper carousel our videos
$(document).ready(function () {
  // Assign some jquery elements we'll need
  var $swiper = $(".swiper-container");
  var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
  // into a fixed position for animation purposes
  var $bottomSlideContent = null; // Slide content that gets passed between the
  // panning slide stack and the position 'behind'
  // the stack, needed for correct animation style

  var mySwiper = new Swiper(".swiper-container", {
    spaceBetween: 30,
    slidesPerView: 3,
    centeredSlides: true,
    roundLengths: true,
    initialSlide: 1,
    loop: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 1.25,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 20
      }
    }
  });
});
// swiper carousel our videos end
