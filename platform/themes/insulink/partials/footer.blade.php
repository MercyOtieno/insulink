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
</div>
{!! Theme::footer() !!}

@if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' ||
theme_option('facebook_comment_enabled_in_product', 'yes') == 'yes' || (theme_option('facebook_chat_enabled', 'yes') ==
'yes' && theme_option('facebook_page_id')))
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v9.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
  attribution="setup_tool"
  page_id="273840429661312">
</div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script src="https://kit.fontawesome.com/04ea62f7f6.js" crossorigin="anonymous"></script>
@if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
<div class="fb-customerchat" attribution="install_email" page_id="{{ theme_option('facebook_page_id') }}"
    theme_color="{{ theme_option('primary_color', '#026e94') }}">
</div>
@endif
@endif
@routes
</body>

</html>
