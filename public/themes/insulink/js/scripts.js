$(document).ready((function(){$(window).on("load",(function(){setTimeout((function(){$(".preloader").delay(700).fadeOut(700).addClass("loaded")}),800)})),$(".background_bg").each((function(){var a=$(this).attr("data-img-src");void 0!==a&&!1!==a&&$(this).css("background-image","url("+a+")")})),$((function(){function a(a,e){a.each((function(){var a=$(this),o=a.attr("data-animation"),s=a.attr("data-animation-delay");a.css({"-webkit-animation-delay":s,"-moz-animation-delay":s,"animation-delay":s,opacity:0}),(e||a).waypoint((function(){a.addClass("animated").css("opacity","1"),a.addClass("animated").addClass(o)}),{triggerOnce:!0,offset:"90%"})}))}a($(".animation")),a($(".staggered-animation"),$(".staggered-animation-wrap"))})),$(window).on("scroll",(function(){$(window).scrollTop()>=150?$("header.fixed-top").addClass("nav-fixed"):$("header.fixed-top").removeClass("nav-fixed")})),$(document).on("ready",(function(){$(".dropdown-menu a.dropdown-toggler").on("click",(function(){return $(this).next().hasClass("show")||$(this).parents(".dropdown-menu").first().find(".show").removeClass("show"),$(this).next(".dropdown-menu").toggleClass("show"),$(this).parent("li").toggleClass("show"),$(this).parents("li.nav-item.dropdown.show").on("hidden.bs.dropdown",(function(){$(".dropdown-menu .show").removeClass("show")})),!1}))}));var a=$(".header_wrap"),e=a.find(".navbar-collapse ul li a.page-scroll");$.each(e,(function(){$(this).on("click",(function(){a.find(".navbar-collapse").collapse("hide"),$("header").removeClass("active")}))})),$(".navbar-toggler").on("click",(function(){$("header").toggleClass("active"),$(".search-overlay").hasClass("open")&&($(".search-overlay").removeClass("open"),$(".search_trigger").removeClass("open"))})),$(document).on("ready",(function(){!$(".header_wrap").hasClass("fixed-top")||$(".header_wrap").hasClass("transparent_header")||$(".header_wrap").hasClass("no-sticky")||$(".header_wrap").before('<div class="header_sticky_bar d-none"></div>')})),$(window).on("scroll",(function(){$(window).scrollTop()>=150?($(".header_sticky_bar").removeClass("d-none"),$("header.no-sticky").removeClass("nav-fixed")):$(".header_sticky_bar").addClass("d-none")}));var o=function(){var a=$(".header_wrap").height();$(".header_sticky_bar").css({height:a})};$(window).on("load",(function(){o()})),$(window).on("resize",(function(){o()})),$(".sidetoggle").on("click",(function(){$(this).addClass("open"),$("body").addClass("sidetoggle_active"),$(".sidebar_menu").addClass("active"),$("body").append('<div id="header-overlay" class="header-overlay"></div>')})),$(document).on("click","#header-overlay, .sidemenu_close",(function(){return $(".sidetoggle").removeClass("open"),$("body").removeClass("sidetoggle_active"),$(".sidebar_menu").removeClass("active"),$("#header-overlay").fadeOut("3000",(function(){$("#header-overlay").remove()})),!1})),$(".categories_btn").on("click",(function(){$(".side_navbar_toggler").attr("aria-expanded","false"),$("#navbarSidetoggle").removeClass("show")})),$(".side_navbar_toggler").on("click",(function(){$(".categories_btn").attr("aria-expanded","false"),$("#navCatContent").removeClass("show")})),$(".pr_search_trigger").on("click",(function(){$(this).toggleClass("show"),$(".product_search_form").toggleClass("show")}));var s=!0;$("html").on("click",(function(){s&&($(".categories_btn").addClass("collapsed"),$(".categories_btn,.side_navbar_toggler").attr("aria-expanded","false"),$("#navCatContent,#navbarSidetoggle").removeClass("show")),s=!0})),$(".categories_btn,#navCatContent,#navbarSidetoggle .navbar-nav,.side_navbar_toggler").on("click",(function(){s=!1}));var n=$(".top-header").innerHeight(),t=$(".header_wrap").innerHeight()-n-20;$('a.page-scroll[href*="#"]:not([href="#"])').on("click",(function(){if($("a.page-scroll.active").removeClass("active"),$(this).closest(".page-scroll").addClass("active"),location.pathname.replace(/^\//,"")===this.pathname.replace(/^\//,"")&&location.hostname===this.hostname){var a=$(this.hash),e=$(this).data("speed")||800;(a=a.length?a:$("[name="+this.hash.slice(1)+"]")).length&&(event.preventDefault(),$("html, body").animate({scrollTop:a.offset().top-t},e))}})),$(window).on("scroll",(function(){var a,e=$(".header_wrap").find("a.page-scroll"),o=$(".header_wrap").innerHeight()+20,s=e.map((function(){var a=$($(this).attr("href"));if(a.length)return a})),n=$(this).scrollTop()+o,t=s.map((function(){if($(this).offset().top<n)return this})),r=(t=t[t.length-1])&&t.length?t[0].id:"";a!==r&&(a=r,e.closest(".page-scroll").removeClass("active").end().filter("[href='#"+r+"']").closest(".page-scroll").addClass("active"))})),$(".more_slide_open").slideUp(),$(".more_categories").on("click",(function(){$(this).toggleClass("show"),$(".more_slide_open").slideToggle()})),$(".close-search").on("click",(function(){$(".search_wrap,.search_overlay").removeClass("open"),$("body").removeClass("search_open")}));var r=!0;$(".search_wrap").after('<div class="search_overlay"></div>'),$(".search_trigger").on("click",(function(){$(".search_wrap,.search_overlay").toggleClass("open"),$("body").toggleClass("search_open"),r=!1,$(".navbar-collapse").hasClass("show")&&($(".navbar-collapse").removeClass("show"),$(".navbar-toggler").addClass("collapsed"),$(".navbar-toggler").attr("aria-expanded",!1))})),$(".search_wrap form").on("click",(function(){r=!1})),$("html").on("click",(function(){r&&($("body").removeClass("open"),$(".search_wrap,.search_overlay").removeClass("open"),$("body").removeClass("search_open")),r=!0})),$(window).on("scroll",(function(){$(this).scrollTop()>150?$(".scrollup").fadeIn():$(".scrollup").fadeOut()})),$(".scrollup").on("click",(function(a){return a.preventDefault(),$("html, body").animate({scrollTop:0},600),!1})),$("select").length&&$.each($("select"),(function(a,e){var o=$(e);""===o.val()&&o.addClass("first_null"),o.val()||o.addClass("not_chosen"),o.on("change",(function(){o.val()?o.removeClass("not_chosen"):o.addClass("not_chosen")}))})),$(".fit-videos").length>0&&$(".fit-videos").fitVids({customSelector:"iframe[src^='https://w.soundcloud.com']"}),$(".custome_select").length>0&&$(document).on("ready",(function(){$(".custome_select").msDropdown()})),$(".countdown_time").each((function(){var a=$(this).data("time");$(this).countdown(a,(function(a){$(this).html(a.strftime('<div class="countdown_box"><div class="countdown-wrap"><span class="countdown days">%D </span><span class="cd_text">Days</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown hours">%H</span><span class="cd_text">Hours</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown minutes">%M</span><span class="cd_text">Minutes</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown seconds">%S</span><span class="cd_text">Seconds</span></div></div>'))}))})),$((function(){$('[data-toggle="tooltip"]').tooltip({trigger:"hover"})})),$(document).ready((function(){$(".star_rating span").on("click",(function(){for(var a=parseFloat($(this).data("value"),10),e=$(this).parent().children(".star_rating span"),o=0;o<e.length;o++)$(e[o]).removeClass("selected");for(o=0;o<a;o++)$(e[o]).addClass("selected");$(this).closest("form").find("input[name=star]").val(a)}))}))}));
