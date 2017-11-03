$(window).on('load', function() {

    var viewSelection = window.location.hash.substr(1);

    if(viewSelection == "submitARequest" || viewSelection == undefined || viewSelection == '') {

        $('#generateAssets a').removeClass('current');
        $('#submitARequest a').addClass('current');
        
        $('#home').show();
        $('#asset-gen').hide();
        $('.sidebar-button').hide();
    }

    if(viewSelection == "generateAssets") {
        $('#submitARequest a').removeClass('current');
        $('#generateAssets a').addClass('current');

        $('#home').hide();
        $('#asset-gen').show();
        $('.sidebar-button').show();
    }

});

$(window).on('hashchange', function() { // Controls the views based on clicks in the navbar.

    if(location.hash === "#submitARequest") {
        $('#generateAssets a').removeClass('current');
        $('#submitARequest a').addClass('current');
        
        $('#home').show();
        $('#asset-gen').hide();
        $('.sidebar-button').hide();
    }

    if(location.hash === "#generateAssets") {

        $('#submitARequest a').removeClass('current');
        $('#generateAssets a').addClass('current');
        
        $('#home').hide();
        $('#asset-gen').show();
        $('.sidebar-button').show();
    }

});

if(location.hash === "#generateAssets") {

        $('#submitARequest a').removeClass('current');
        $('#generateAssets a').addClass('current');

        $('#asset-gen').show();
}

function displayCanvases(data) { //Controls the amount of characters being displayed.

    $('#headline-modal').modal('hide');
    $('#asset-gen').show();
    $('sub').text(data.subheadline.substring(0, 68));

    if(data.headline.length > 43) {
        $('.asset-headline .bottom h1').text(data.headline.substring(0, 43) + '...');
    } else {
        $('.asset-headline h1').text(data.headline);
    }

    if(data.subheadline.length > 37) {
        $('.shortened').text(data.subheadline.substring(0, 37) + '...');
    }

    if(data.headline.length > 43) {
        $('.asset-headline .inner-sidebar h1').text(data.headline.substring(0, 43) + '...');
    } else {
        $('.asset-headline h1').text(data.headline);
    }
}

$('.sidebar-button').on('click', function() {
    $('.sidebar-wrapper').animate({
        left: "0"
    }, {duration: 750});
});

$('.sidebar-close').on('click', function() {
    $('.sidebar-wrapper').animate({
        left: "-370px"
    }, {duration: 750});
});

var typingTimer;                
var doneTypingInterval = 500;


$('#headline-asset, #subheadline-asset').on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});


$('#headline-asset, #subheadline-asset').on('keydown', function () {
  clearTimeout(typingTimer);
  clearImages($(".creative-thumb img"));
  console.log("Deleting Images.");
});


function doneTyping () {
    $('.creative-thumb').each(function() {
        domToImage(this.id);
    })
}



// Summary: Controls which view is being shown.
