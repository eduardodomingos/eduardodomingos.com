module.exports = {
    options: {
        shorthandCompacting: false,
        roundingPrecision: -1
    },
    target: {
        files: {
            'assets/build/css/main.min.css': [
                '../../plugins/contact-form-7/includes/css/styles.css',
                'assets/build/css/main.min.css',
            ]
        }
    }
};
