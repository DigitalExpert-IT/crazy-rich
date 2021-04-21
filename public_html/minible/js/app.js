!(function (e) {
    "use strict";
    function t() {
        for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, n = e.length; t < n; t++)
            "nav-item dropdown active" === e[t].parentElement.getAttribute("class") && (e[t].parentElement.classList.remove("active"), e[t].nextElementSibling.classList.remove("show"));
    }
    // function n(t) {
    //     1 == e("#light-mode-switch").prop("checked") && "light-mode-switch" === t
    //         ? (e("html").removeAttr("dir"),
    //           e("#dark-mode-switch").prop("checked", !1),
    //           e("#rtl-mode-switch").prop("checked", !1),
    //           e("#bootstrap-style").attr("href", "../minible/css/bootstrap.min.css"),
    //           e("#app-style").attr("href", "../minible/css/app.min.css"),
    //           sessionStorage.setItem("is_visited", "light-mode-switch"))
    //         : 1 == e("#dark-mode-switch").prop("checked") && "dark-mode-switch" === t
    //         ? (e("html").removeAttr("dir"),
    //           e("#light-mode-switch").prop("checked", !1),
    //           e("#rtl-mode-switch").prop("checked", !1),
    //           e("#bootstrap-style").attr("href", "../minible/css/bootstrap-dark.min.css"),
    //           e("#app-style").attr("href", "../minible/css/app-dark.min.css"),
    //           sessionStorage.setItem("is_visited", "dark-mode-switch"))
    //         : 1 == e("#rtl-mode-switch").prop("checked") &&
    //           "rtl-mode-switch" === t &&
    //           (e("#light-mode-switch").prop("checked", !1),
    //           e("#dark-mode-switch").prop("checked", !1),
    //           e("#bootstrap-style").attr("href", "../minible/css/bootstrap-rtl.min.css"),
    //           e("#app-style").attr("href", "../minible/css/app-rtl.min.css"),
    //           e("html").attr("dir", "rtl"),
    //           sessionStorage.setItem("is_visited", "rtl-mode-switch"));
    // }
    function a() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || (console.log("pressed"), e("body").removeClass("fullscreen-enable"));
    }
    var s;
    e("#side-menu").metisMenu(),
        e(".vertical-menu-btn").on("click", function (t) {
            t.preventDefault(), e("body").toggleClass("sidebar-enable"), 992 <= e(window).width() ? e("body").toggleClass("vertical-collpsed") : e("body").removeClass("vertical-collpsed");
        }),
        e("#sidebar-menu a").each(function () {
            var t = window.location.href.split(/[?#]/)[0];
            this.href == t &&
                (e(this).addClass("active"),
                e(this).parent().addClass("mm-active"),
                e(this).parent().parent().addClass("mm-show"),
                e(this).parent().parent().prev().addClass("mm-active"),
                e(this).parent().parent().parent().addClass("mm-active"),
                e(this).parent().parent().parent().parent().addClass("mm-show"),
                e(this).parent().parent().parent().parent().parent().addClass("mm-active"));
        }),
        e(document).ready(function () {
            var t;
            0 < e("#sidebar-menu").length && 300 < (t = e("#sidebar-menu .mm-active .active").offset().top) && ((t -= 300), e(".vertical-menu .simplebar-content-wrapper").animate({ scrollTop: t }, "slow"));
        }),
        e('[data-bs-toggle="fullscreen"]').on("click", function (t) {
            t.preventDefault(),
                e("body").toggleClass("fullscreen-enable"),
                document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement
                    ? document.cancelFullScreen
                        ? document.cancelFullScreen()
                        : document.mozCancelFullScreen
                        ? document.mozCancelFullScreen()
                        : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
                    : document.documentElement.requestFullscreen
                    ? document.documentElement.requestFullscreen()
                    : document.documentElement.mozRequestFullScreen
                    ? document.documentElement.mozRequestFullScreen()
                    : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }),
        document.addEventListener("fullscreenchange", a),
        document.addEventListener("webkitfullscreenchange", a),
        document.addEventListener("mozfullscreenchange", a),
        e(".navbar-nav a").each(function () {
            var t = window.location.href.split(/[?#]/)[0];
            this.href == t &&
                (e(this).addClass("active"),
                e(this).parent().addClass("active"),
                e(this).parent().parent().addClass("active"),
                e(this).parent().parent().parent().addClass("active"),
                e(this).parent().parent().parent().parent().addClass("active"),
                e(this).parent().parent().parent().parent().parent().addClass("active"));
        }),
        e(".right-bar-toggle").on("click", function (t) {
            e("body").toggleClass("right-bar-enabled");
        }),
        e(document).on("click", "body", function (t) {
            0 < e(t.target).closest(".right-bar-toggle, .right-bar").length || e("body").removeClass("right-bar-enabled");
        }),
        (function () {
            if (document.getElementById("topnav-menu-content")) {
                for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), n = 0, a = e.length; n < a; n++)
                    e[n].onclick = function (e) {
                        "#" === e.target.getAttribute("href") && (e.target.parentElement.classList.toggle("active"), e.target.nextElementSibling.classList.toggle("show"));
                    };
                window.addEventListener("resize", t);
            }
        })(),
        (function () {
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
                return new bootstrap.Tooltip(e);
            }),
                [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (e) {
                    return new bootstrap.Popover(e);
                });
            var t = e(this).attr("data-delay") ? e(this).attr("data-delay") : 100,
                n = e(this).attr("data-time") ? e(this).attr("data-time") : 1200;
            e('[data-plugin="counterup"]').each(function (a, s) {
                e(this).counterUp({ delay: t, time: n });
            });
        })(),
        sessionStorage.setItem("is_visited", "dark-mode-switch"),
        Waves.init();
})(jQuery);
