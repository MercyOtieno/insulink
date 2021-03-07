let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

const resourcePath = "platform/core";
const publicPath = "public/vendor/core";
mix.sass(
    resourcePath + "/base/resources/assets/sass/base/tailwind.scss",
    publicPath + "/css"
)
    .postCss(
        resourcePath + "/base/resources/assets/sass/base/uikit/css/uikit.min.css",
        publicPath + "/common/uikit/css/uikit.min.css"
    )
    .js(resourcePath + "/base/resources/assets/sass/base/uikit/js/uikit.min.js",
        publicPath + "/common/uikit/js/uikit.min.js"
    )
    .js(resourcePath + "/base/resources/assets/sass/base/uikit/js/uikit-icons.min.js",
        publicPath + "/common/uikit/js/uikit-icons.min.js"
    )
    .options({
        processCssUrls: false,
        postCss: [tailwindcss("./tailwind.config.js")]
    });