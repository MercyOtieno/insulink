let mix = require('laravel-mix');
const purgeCss = require('@fullhuman/postcss-purgecss');
let tailwindcss = require('tailwindcss');
const path = require('path');
let directory = path.basename(path.resolve(__dirname));
const { exec } = require("child_process");
const source = 'platform/themes/' + directory;
const dist = 'public/themes/' + directory;

mix.sass(source + "/assets/sass/application.scss", dist + "/css")
    .sass(source + "/assets/sass/theme.scss", dist + "/css")
    .postCss(source + "/assets/sass/tailwind.css", dist + "/css", [
        require("tailwindcss")
    ])
    .postCss(
        source + "/assets/sass/vendor/bootstrap/css/bootstrap.min.css",
        dist + "/vendor/bootstrap/css/bootstrap.min.css"
    )
    .postCss(
        source + "/assets/sass/vendor/uikit/css/uikit.min.css",
        dist + "/vendor/uikit/css/uikit.min.css"
    )
    .postCss(
        source + "/assets/sass/vendor/bootstrap/css/bootstrap-grid.min.css",
        dist + "/vendor/bootstrap/css/bootstrap-grid.min.css"
    )
    .postCss(
        source + "/assets/sass/vendor/bootstrap/css/bootstrap-reboot.min.css",
        dist + "/vendor/bootstrap/css/bootstrap-reboot.min.css"
    )
    .js(source + "/assets/js/custom.js", dist + "/js/custom.js")
    .js([source + "/assets/js/application.js"], dist + "/js/application.js")
    .js([source + "/assets/js/jquery.js"], dist + "/js/jquery.js")
    .js([source + "/assets/js/popper.js"], dist + "/js/popper.js")
    .js(
        [source + "/assets/sass/vendor/uikit/js/uikit.min.js"],
        dist + "/vendor/uikit/js/uikit.min.js"
    )
    .scripts([source + "/assets/js/scripts.js"], dist + "/js/scripts.js")
    .js(
        [source + "/assets/sass/vendor/uikit/js/uikit-icons.min.js"],
        dist + "/vendor/uikit/js/uikit-icons.min.js"
    )
    .js(source + "/assets/js/engine.js", dist + "/js")
    .extend(
        "ziggy",
        new (class {
            register(config = {}) {
                this.watch = config.watch ?? ["routes/**/*.php"];
                this.path = config.path ?? "";
                this.enabled = config.enabled ?? !Mix.inProduction();
            }

            boot() {
                if (!this.enabled) return;

                const command = () =>
                    exec(
                        `php artisan ziggy:generate ${this.path}`,
                        (error, stdout, stderr) => console.log(stdout)
                    );

                command();

                if (Mix.isWatching() && this.watch) {
                    require("chokidar")
                        .watch(this.watch)
                        .on("change", path => {
                            console.log(`${path} changed...`);
                            command();
                        });
                }
            }
        })()
    )
    .ziggy()
    .copyDirectory(dist + "/js", source + "/public/js")
    .copyDirectory(dist + "/vendor", source + "/public/vendor")
    .copyDirectory(dist + "/css", source + "/public/css");