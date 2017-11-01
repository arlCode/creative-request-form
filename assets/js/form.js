//Variables
curNumOfItems = 0;

//Increment Inputs

$('.btn-success').click(function() {
    addInput(this);
});

//Decrement Inputs

$('.form-group').on("click", '.btn-danger', function() {
    subtractInput(this);
});

function addInput(inputToIncrement){
    
    if(inputToIncrement.getAttribute("id") === "addHeadline") {
        $('<div class="input-group">' +
            '<input type="text" name="headlines[]" class="form-control" id="' + inputToIncrement.getAttribute("id") + '_' + curNumOfItems + '">' +
            '<span class="input-group-btn">' +
                '<button id="' + inputToIncrement.getAttribute("id") + '_' + curNumOfItems + '_button" class="btn btn-danger added-item" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>' +
            '</span>' +
        '</div>').insertBefore( $(inputToIncrement).parent().parent());
    }
    
    curNumOfItems++;
}

function subtractInput(elementToDelete) {
    $(elementToDelete).parent().parent().remove();
}

// Grab Hidden Data

$('.assign-edit').click(function(event) {
    var hiddenId = $(this).parent().parent().parent().find('.hidden').attr('id');
    $('.creative-id').attr('value', hiddenId);
});

function validateDropDown() {
    var imageType = document.getElementById('image-type').value;

    if(imageType === 'Select Type') {
        alert('Must select an image type.');
        return false;
    }

    var priority = document.getElementById('priority').value;

    if(priority === 'Select Priority') {
        alert('Must select a priority.');
        return false;
    }
}

$('.expand').click(function() { // This needs to be adjusted for the glphyicon rotation

    if($('.glyphicon-chevron-down').hasClass('rotate-up')){
        
        if($('.glyphicon-chevron-down').is('#arrow-' + $(this).attr('id'))){
            $('.glyphicon-chevron-down').removeClass('rotate-up');
        }
        
    } else {

        if($('.glyphicon-chevron-down').is('#arrow-' + $(this).attr('id'))){
            $('.glyphicon-chevron-down').addClass('rotate-up');
        }
    }

});

$(function() {
    $('.in-progress').click(function() {
        return window.confirm('Is this complete?');
    });

    $('.complete .btn-info').attr('disabled', true);

    // $('.complete .assign-edit').hide();

    // $('.complete').hide();
});

$('.in-progress').hover(
    function() {
        var $this = $(this);
        $this.data('In Progress', $this.text());
        $this.text('Complete');
    },
    function() {
        var $this = $(this);
        $this.text($this.data('In Progress'));
});

$('.asset-img').click(function() {
    $('.lightbox').show();
    $('.lightbox img').attr('src', $(this).attr('src')); // Generates image in lightbox depending on the element clicked.
});

$('.asset-thumb').click(function() { // Regenerate the image on every click of the asset thumb.
    $('.lightbox').show();
    $('.lightbox img').attr('src', $(this).attr('src'));
    domToImage(this.id);
});

$('.creative-for-download').click(function() { // Regenerate the image on every click of the asset thumb.
    $('.lightbox').show();
    $('.lightbox img').attr('src', $(this).attr('src'));
    domToImage(this.id);
})


$('.lightbox').click(function() {
    $(this).hide();
})

$('.delete-button').click(function() {
    var is_yes = window.confirm('Are you sure?');
    
    if(is_yes){

        $(this).parent().parent().parent().fadeOut('slow');
        return true;
    } else {
        return false;
    }
});

// Summary: Controls all Form functionalities, error responses, etc.
