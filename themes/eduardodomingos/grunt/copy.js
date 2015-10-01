module.exports = {
    // img: {
    //     cwd: "assets/src/img",
    //     src: "**/*",
    //     dest: "assets/build/img",
    //     expand: true
    // },
    sass_vendors: {
        expand: true,
        flatten: true,
        src: [
            'bower_components/inuit-*/**/*.scss',
            'bower_components/suitcss-components-flex-embed/lib/flex-embed.css'
        ],
        dest: 'assets/src/sass/vendors/'
    },
    js_vendors: {
        expand: true,
        flatten: true,
        src: [
            'bower_components/jquery-timeago/jquery.timeago.js',
            'bower_components/lazysizes/lazysizes.js'
        ],
        dest: 'assets/src/js/vendors/'
    }
};
