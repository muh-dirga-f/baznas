(function ($) {
    "use strict";

    //form bayar-zakat
    $("#nama_rek_bank").on("change", function () {
        let nama_rek_bank = $(this).val();
        let no_rek = '';
        switch (nama_rek_bank) {
            case "sulselbar":
                no_rek = "050-202-0000002735-2";
                break;
            case "sulselbarsyariah":
                no_rek = "538-261-000000003-2";
                break;
            case "bsi":
                no_rek = "1024715643";
                break;
        }
        $('#no_rek_bank').val(no_rek);
    });
    $("#zis").on("change", function () {
        let zis = $(this).val();
        let array_option = [];
        let opt = "";
        switch (zis) {
            case "zakat":
                array_option.push([
                    "zakat_penghasilan",
                    "zakat_maal",
                    "zakat_fitrah",
                ]);
                break;
            case "kurban":
                array_option.push([
                    "kurban_kambing",
                    "kurban_sapi",
                    "1/7_kurban_sapi",
                ]);
                break;
            case "infaq":
                array_option.push([
                    "infak_sedekah",
                    "infak_operasional",
                    "dompet_bencana_kemanusiaan",
                    "dompet_pendidikan",
                    "dompet_kesehatan",
                    "dompet_solidaritas_dunia_islam",
                    "dompet_palestina",
                    "dompet_peduli_mustahik",
                    "dompet_yatim",
                    "dompet_pemberdayaan_ekonomi",
                    "dompet_bantuan_hukum",
                    "dompet_sekolah_jeddah",
                ]);
                break;
            case "sedekah":
                array_option.push(["sedekah_baznas"]);
                break;
            case "fadiyah":
                array_option.push(["fadiyah"]);
                break;
        }

        array_option[0].forEach((v, i) => {
            opt += `<option value="${v}">${v}</option>`;
        });
        console.log(zis, array_option, opt);

        $('#jenis_zis').html(opt)
    });

    // Window Resize Mobile Menu Fix
    mobileNav();

    // Scroll animation init
    window.sr = new scrollReveal();

    // Menu Dropdown Toggle
    if ($(".menu-trigger").length) {
        $(".menu-trigger").on("click", function () {
            $(this).toggleClass("active");
            $(".header-area .nav").slideToggle(200);
        });
    }

    // Menu elevator animation
    $("a[href*=\\#]:not([href=\\#])").on("click", function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                var width = $(window).width();
                if (width < 991) {
                    $(".menu-trigger").removeClass("active");
                    $(".header-area .nav").slideUp(200);
                }
                $("html,body").animate(
                    {
                        scrollTop: target.offset().top - 130,
                    },
                    700
                );
                return false;
            }
        }
    });

    $(document).ready(function () {
        // $(document).on("scroll", onScroll);
        //smoothscroll
        // $('a[href^="#"]').on('click', function (e) {
        //     e.preventDefault();
        //     $(document).off("scroll");
        //     $('a').each(function () {
        //         $(this).removeClass('active');
        //     })
        //     $(this).addClass('active');
        //     var target = this.hash,
        //     menu = target;
        //    	var target = $(this.hash);
        //     $('html, body').stop().animate({
        //         scrollTop: (target.offset().top) - 130
        //     }, 500, 'swing', function () {
        //         window.location.hash = target;
        //         $(document).on("scroll", onScroll);
        //     });
        // });
    });

    // function onScroll(event){
    //     var scrollPos = $(document).scrollTop();
    //     $('.nav a').each(function () {
    //         var currLink = $(this);
    //         var refElement = $(currLink.attr("href"));
    //         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
    //             $('.nav ul li a').removeClass("active");
    //             currLink.addClass("active");
    //         }
    //         else{
    //             currLink.removeClass("active");
    //         }
    //     });
    // }

    // Home seperator
    if ($(".home-seperator").length) {
        $(".home-seperator .left-item, .home-seperator .right-item").imgfix();
    }

    // Home number counterup
    if ($(".count-item").length) {
        $(".count-item strong").counterUp({
            delay: 10,
            time: 1000,
        });
    }

    // Page loading animation
    $(window).on("load", function () {
        if ($(".cover").length) {
            $(".cover").parallax({
                imageSrc: $(".cover").data("image"),
                zIndex: "1",
            });
        }

        $("#preloader").animate(
            {
                opacity: "0",
            },
            600,
            function () {
                setTimeout(function () {
                    $("#preloader").css("visibility", "hidden").fadeOut();
                }, 300);
            }
        );
    });

    // Window Resize Mobile Menu Fix
    $(window).on("resize", function () {
        mobileNav();
    });

    // Window Resize Mobile Menu Fix
    function mobileNav() {
        var width = $(window).width();
        $(".submenu").on("click", function () {
            if (width < 992) {
                $(".submenu ul").removeClass("active");
                $(this).find("ul").toggleClass("active");
            }
        });
    }
})(window.jQuery);
