function domToImage(id) { // Takes screenshot of DOM Element, identified by DIV ID.

    var node = document.getElementById(id);

    domtoimage.toJpeg(node) // Change the creative to a jpg
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;

            $(node).html("<img src=" + img.src + ">"); // Generate Image
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });
}

function extractText(string) { // Regex anything in between quotes.
    var testedString = "";

    if (/"/.test(string)) {
        testedString = string.match(/"(.*?)"/)[1];
    } else {
        testedString = string;
    }

    return testedString;
}

function changeImageToSidebarImage(elem) { //This pretty little event is where the magic happens.

    var backgroundUrl = $(elem).css("background-image"); 
    
    $('.creative-thumb').css('background-image', backgroundUrl); //Strip the URL() from the background images and input them as an image source.
    $('.blur-wrapper .blur').css('background-image', backgroundUrl);

}

function magicTrick(elem) {

    $('.creative-thumb').html("<img src=" + extractText(backgroundUrl) + ">");
    
}

$('.asset-sidebar-img').on('click', function () { 

    changeImageToSidebarImage($(this));
    
})






