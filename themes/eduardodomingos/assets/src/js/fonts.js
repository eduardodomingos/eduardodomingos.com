(function( w ){
    // if the class is already set, we're good.
    if( w.document.documentElement.className.indexOf( "fonts-loaded" ) > -1 ){
        return;
    }
    var openSans400 = new w.FontFaceObserver( "Open Sans", {
        weight: 400
    });
    var openSans400Italic = new w.FontFaceObserver( "Open Sans", {
        weight: 400,
        style: 'italic'
    });
    var openSans700 = new w.FontFaceObserver( "Open Sans", {
        weight: 700
    });
    var merriweather400 = new w.FontFaceObserver( "Merriweather", {
        weight: 400
    });
    w.Promise
        .all([
            openSans400.check(),
            openSans400Italic.check(),
            openSans700.check(),
            merriweather400.check()
        ])
        .then(function(){
            w.document.documentElement.className += "fonts-loaded";
        }, function() {
            console.info('Web fonts could not be loaded in time. Falling back to system fonts.');
        });
}( this ));
