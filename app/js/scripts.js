// let headerHeight = $('.header').innerHeight();

// function footerFix() {
// headerHeight = $('.header').innerHeight();
// let footerHeight = $('.footer').innerHeight();
// $('body').css('padding-bottom', footerHeight + 'px');
// }

// $(window).on('load resize', footerFix);

$(document).ready(function () {

  $('form').each(function () {
    const form = $(this);
    const fileLabel = form.find('label[class*="file"]');
    const fileInput = fileLabel.find('input[type="file"]');
    const fileName = fileLabel.find('.name');
    const fileDelete = fileLabel.next('.delete');
    const phone = $(this).find('input[name*="phone"]');
    const privacyLabel = $(this).find('label[class*="privacy"]');
    const privacyInput = privacyLabel.find('input');

    // Для чекбоксов и радио

    privacyLabel.on('click', function () {
      if (privacyInput.attr('type') == 'checkbox') {
        privacyInput.is(':checked')
          ? privacyLabel.addClass('active')
          : privacyLabel.removeClass('active');
      } else if (privacyInput.attr('type') == 'radio') {
        privacyInput.is(':checked')
          ? (privacyLabel.siblings().removeClass('active'), privacyLabel.addClass('active'))
          : privacyLabel.removeClass('active');
      }
    });

    // Для телефонов

    phone.each(function () {
      $(this).inputmask("+7 (999) 999-99-99");
    });

    // Для файла

    function onFileDelete() {
      fileInput.val('');
      fileName.text(fileLabel.data('name'));
      fileDelete.css('display', 'none');
    }

    function onFileChange() {
      const fileVal = $(this).val().replace(/.+[\\\/]/, '');
      if (fileVal !== '') {
        fileName.text(fileVal);
        fileDelete.css('display', 'block');
      } else onFileDelete
    }

    fileName.text(fileLabel.data('name'));
    fileDelete.css('display', 'none');

    fileInput.on('change', onFileChange);
    fileDelete.on('click', onFileDelete);

    // По отправке формы

    form.on('submit', function () {
      privacyLabel.removeClass('active');
      fileDelete.css('display', 'none');
      fileName.text(fileLabel.data('name'));
      $('.order-form__dropdown-current').text('-');
    });
  });

  $(window).on('scroll load', function () {
    $(this).scrollTop() > 600
      ? $('#top').addClass('active')
      : $('#top').removeClass('active');
  });

  $('#top').click(function () {
    $('body, html').animate({ scrollTop: 0 }, 500);
  });

  $(document).on("submit", "#callback-form, #order_equipment-form, #question-form", function () {
    let formData = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/send.php");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          data = xhr.responseText
          if (data) {
            $.magnificPopup.close();
            $.magnificPopup.open({
              items: {
                src: '<div class="modal modal_thanks">' + data + '</div>'
              },
              type: 'inline',
              // removalDelay: 300,
              // mainClass: 'mfp-fade'
            }, 0);
            // setTimeout(function () {
            //   $.magnificPopup.close();
            // }, 3000);
          }
        }
      }
    }
    xhr.send(formData);
    $(this)[0].reset();
    return false;
  });

  $(document).on("submit", "#order-form", function () {
    let formData = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/send2.php");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          data = xhr.responseText
          if (data) {
            $.magnificPopup.close();
            $.magnificPopup.open({
              items: {
                src: '<div class="modal modal_thanks">' + data + '</div>'
              },
              type: 'inline',
              // removalDelay: 300,
              // mainClass: 'mfp-fade'
            }, 0);
            // setTimeout(function () {
            //   $.magnificPopup.close();
            // }, 3000);
          }
        }
      }
    }
    xhr.send(formData);
    $(this)[0].reset();
    return false;
  });

  $('.menu-toggle .icon-toggle').click(function () {
    $(this).toggleClass('active');
    $('.menu > ul').slideToggle();
    return false;
  });

  $('a[href="#callback"], a[href="#order_equipment"]').magnificPopup({
    type: 'inline',
  });

  $(document).on('click', '.modal__close', function() {
    $.magnificPopup.close();
  });

  $('.docs__item a').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true
    }
  });

  $('.inner .portfolio__item-image-part').each(function () {
    $(this).magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  });

  $('.equipment__item-button').on('click', function() {
    let name = $(this).data('name');
    let input = $('.modal_equipment input[name="equipment"]');
    let header = $('.modal_equipment .modal__header');
    input.val(name);
    header.text(name);
  });

  $(document).on('click', '.goto', function (event) {
    event.preventDefault();
    let id = $(this).attr('href');
    let top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 500);
  });

  $(".tabs").each(function () {
    let tabs = $(this);
    let tabsControls = tabs.find('.tabs__control');
    let tabsContents = tabs.find('.tabs__content');
    $(tabsContents).not(tabsContents[0]).css('display', 'none');
    $(tabsControls[0]).addClass('active');
    $(tabsControls).click(function (event) {
      event.preventDefault();
      tabsControls.removeClass('active');
      $(this).addClass('active');
      let index = $(this).index();
      tabsContents.css('display', 'none');
      tabsContents.eq(index).fadeIn(400);
    });
  });

  $('.dropdown').each(function () {
    const dropdownBlock = $(this);
    const dropdownCurrent = dropdownBlock.find('div[class*="-current"]');
    const dropdownItems = dropdownBlock.find('ul');
    const dropdownItem = dropdownBlock.find('li');
    const inputVal = dropdownBlock.find('input');

    dropdownBlock.on('click', function () {
      dropdownItems.slideToggle(200);
      dropdownBlock.toggleClass('active');
    });

    dropdownItem.on('click', function () {
      const html = $(this).html();
      const text = $(this).text();
      dropdownCurrent.html(html);
      inputVal.val(text);
    });
  });

  var servicesSlider = new Swiper('.services .swiper-container', {
    // slidesPerView: 3,
    // spaceBetween: 20,
    slidesPerView: 6,
    spaceBetween: 20,
    centeredSlides: true,
    slidesOffsetBefore: -320,
    navigation: {
      nextEl: '.services-button-next',
      prevEl: '.services-button-prev',
    },
    scrollbar: {
      el: '.services-scrollbar',
      hide: false,
      draggable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        slidesOffsetBefore: 0,
        spaceBetween: 0,
      },
      650: {
        slidesPerView: 2,
        slidesOffsetBefore: 0,
        centeredSlides: false,
        spaceBetween: 0,
      },
      930: {
        slidesPerView: 3,
        slidesOffsetBefore: 0,
        centeredSlides: false,
        spaceBetween: 0,
      },
      1240: {
        slidesPerView: 4,
        slidesOffsetBefore: -290,
        centeredSlides: true,
        spaceBetween: 20,
      },
      1560: {
        slidesPerView: 5,
        centeredSlides: true,
        spaceBetween: 20,
        slidesOffsetBefore: -320,
      },
      1870: {
        slidesPerView: 6,
        spaceBetween: 20,
        centeredSlides: true,
        slidesOffsetBefore: -320,
      }
    }
    // breakpoints: {
    //   320: {
    //     slidesPerView: 1,
    //   },
    //   768: {
    //     slidesPerView: 2,
    //   },
    //   1200: {
    //     slidesPerView: 3,
    //   },
    // }
  });

  var equipmentSlider = new Swiper('.equipment .swiper-container', {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 0,
    centeredSlides: true,
    navigation: {
      nextEl: '.equipment-button-next',
      prevEl: '.equipment-button-prev',
    },
    pagination: {
      el: ".equipment-pagination",
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: false
      },
      1200: {
        slidesPerView: 2,
        spaceBetween: -125,
        centeredSlides: true,
      }
    }
  });

  var docsSlider = new Swiper('.docs .swiper-container', {
    slidesPerView: 3,
    spaceBetween: 20,
    navigation: {
      nextEl: '.docs-button-next',
      prevEl: '.docs-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,

      },
      576: {
        slidesPerView: 3,
      },
    }
  });

  var portfolioSlider = new Swiper('.inner .portfolio .swiper-container', {
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: '.portfolio-button-next',
      prevEl: '.portfolio-button-prev',
    },
    pagination: {
      el: ".portfolio-pagination",
      clickable: true
    },
  });

  let video = $('.intro__video video');
  $('.intro__video-inner').on('click', function () {
    if (video[0].paused) {
      video[0].play();
      $(this).removeClass('paused');
    } else {
      video[0].pause();
      $(this).addClass('paused');
    }
    console.log(video[0])
  });

  // wow = new WOW(
  //   {
  //     boxClass: 'wow',
  //     animateClass: 'animated',
  //     offset: 0,
  //     mobile: true,
  //     live: true
  //   }
  // );
  // wow.init();

});
