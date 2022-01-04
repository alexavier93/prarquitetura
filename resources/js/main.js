;(function ($) {
    'use strict'

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })


    /* ===================================
  Side Menu
  ====================================== */
    if ($('#sidemenu_toggle').length) {
        $('#sidemenu_toggle').on('click', function () {
            $('.pushwrap').toggleClass('active')
            $('.side-menu').addClass('side-menu-active'),
                $('#close_side_menu').fadeIn(700)
        }),
            $('#close_side_menu').on('click', function () {
                $('.side-menu').removeClass('side-menu-active'),
                    $(this).fadeOut(200),
                    $('.pushwrap').removeClass('active')
            }),
            $('.side-nav .navbar-nav').on('click', function () {
                $('.side-menu').removeClass('side-menu-active'),
                    $('#close_side_menu').fadeOut(200),
                    $('.pushwrap').removeClass('active')
            }),
            $('#btn_sideNavClose').on('click', function () {
                $('.side-menu').removeClass('side-menu-active'),
                    $('#close_side_menu').fadeOut(200),
                    $('.pushwrap').removeClass('active')
            })
    }

    // Navbar Scroll Function
    var $window = $(window)
    $window.scroll(function () {
        var $scroll = $window.scrollTop()
        var $navbar = $('.header-nav')
        if (!$navbar.hasClass('sticky-bottom')) {
            if ($scroll > 250) {
                $navbar.addClass('fixed-menu')
            } else {
                $navbar.removeClass('fixed-menu')
            }
        }
    })

    var fixTop = $('.fixed-content')

    if (fixTop.length) {
        var fixmeTop = fixTop.offset().top

        $(window).scroll(function () {
            // assign scroll event listener

            var currentScroll = $(window).scrollTop() // get current position

            if (currentScroll >= fixmeTop) {
                // apply position: fixed if you
                $('.fixed-content').css({
                    // scroll to that element or below it
                    top: '80px',
                    position: 'sticky'
                })
            } else {
                // apply position: static
                $('.fixed-content').css({
                    // if you scroll above it
                    position: 'static'
                })
            }
        })
    }

    $('a.nav-link').on('click', function (e) {
        $('a.nav-link').removeClass('active')
        $(this).addClass('active')

        let target = $(this).attr('href')
        let divSize = parseFloat($('nav').height())
        let targetId = target.substring(target.indexOf('#'), target.length)
        let targetIsInTheSamePage = $('body').find(targetId).length

        if (target && targetIsInTheSamePage) {
            target = target.substring(target.indexOf('#'), target.length)

            $('html, body').animate(
                {
                    scrollTop: $(target).position().top - divSize
                },
                350
            )
        }
    })

    $('#contato form').submit(function (e) {
        e.preventDefault()

        let dados = $(this).serialize()
        let url = this.url.value

        $.ajax({
            type: 'POST',
            url: url,
            data: dados,
            dataType: 'json',
            success: function (response) {
                $('#contato .alert').html(response.success)
                $('#contato .alert')
                    .addClass('alert-green')
                    .fadeIn('slow')

                setTimeout(function () {
                    $('#contato form').each(function () {
                        this.reset()
                    })
                }, 500)
            },
            error: function (response) {
                $('#contato .alert').html(response.erro)
                $('#contato .alert')
                    .addClass('alert-danger')
                    .fadeOut('slow')
            }
        })

        return false
    })

})(jQuery, window, document)
