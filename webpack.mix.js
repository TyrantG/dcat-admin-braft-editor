const mix = require('laravel-mix');

const js_path = process.env.NODE_ENV === 'development' ? 'js/braft-editor.min.js' : 'resources/assets/js/braft-editor.min.js'
const public_path = process.env.NODE_ENV === 'development' ? '../../../public/vendor/dcat-admin-extensions/tyrantg/dcat-admin-braft-editor' : 'resources/assets'

mix.js('resources/js/app.js', js_path)
    .vue()
    .setPublicPath(public_path)
    .setResourceRoot('/vendor/dcat-admin-extensions/tyrantg/dcat-admin-braft-editor')
    .version()
    .sourceMaps()
