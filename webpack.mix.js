const mix = require("laravel-mix");

mix
     /* Shared Settings */
    .js("resources/js/app.js", "public/js")
    .vue()

     /* Settings front v1 */
    .sass("resources/sass/app.scss", "public/css")
    .styles(["resources/css/custom.css", "resources/css/app.css", "resources/css/responsive.css",], "public/css/styles.css")

    /* Setting bo v3 */
    .js([
        'resources/assets/v3/vendors/js/vendor.bundle.base.js',
        'resources/assets/v3/vendors/js/js/jquery.cookie.js',
        'resources/assets/v3/vendors/js/js/off-canvas.js',
        'resources/assets/v3/vendors/js/js/hoverable-collapse.js',
        'resources/assets/v3/vendors/js/js/misc.js',
    ], 'public/js/admin_v3.js')
    .js('resources/js/bo/v3/scripts.js', 'public/js/app_v3.js')
    .postCss("resources/css/bo/v3/css/vendor.bundle.base.css", "public/css/bundle_style_v3.css")
    .babel("resources/css/bo/v3/scss/_*.scss", "public/css/sass_style.css")
    .postCss('resources/css/bo/v3/css/style.css', "public/css/style_v3.css")

    /* Compiling files and folders */
    .copyDirectory("resources/assets/images", "public/images")
    .copyDirectory("resources/assets/fonts", "public/fonts")
    .sourceMaps()
    .version();

// mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
