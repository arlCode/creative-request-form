var creativeArray = [];

$('.creative-thumb').on('click', function () { // Adding the clicked images to the creative array.

    creativeArray.push($(this).css('background-image'));

    creativeArray.forEach(function (elem) {

        console.log("Items Ready for download: " + elem);

    })
});