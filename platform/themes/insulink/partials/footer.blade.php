<section id="bottom-top">
    <div class="container">
        {!! dynamic_sidebar('bottom-cta') !!}
    </div>
</section>
<footer id="dsc__footer">
    <section class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    {!! dynamic_sidebar('footer_a') !!}
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    {!! dynamic_sidebar('footer_b') !!}
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    {!! dynamic_sidebar('footer_c') !!}
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    {!! dynamic_sidebar('footer_d') !!}
                </div>

            </div>
        </div>
    </section>
    <section id="dsc__copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright"><small class="text-gray-200 text-uppercase">{{ theme_option('copyright') }}</small></div>
                </div>
            </div>
        </div>
    </section>
</footer>
</div>


<a href="#" class="scrollup" style="display: none;">
    <svg width="24" height="24" class="text-white inline-flex pt-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
</a>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"
    integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous" defer></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous" defer></script>
{!! Theme::footer() !!}

@if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' || theme_option('facebook_comment_enabled_in_product', 'yes') == 'yes' || (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id')))


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script src="https://kit.fontawesome.com/04ea62f7f6.js" crossorigin="anonymous" defer></script>
@if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
<div class="fb-customerchat" attribution="install_email" page_id="{{ theme_option('facebook_page_id') }}"
    theme_color="{{ theme_option('primary_color', '#026e94') }}">
</div>
@endif
@endif
@routes
<!--Start of Tawk.to Script-->
<script type="text/javascript" defer>
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60475e8a385de407571e27c0/1f0bcik1a';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
