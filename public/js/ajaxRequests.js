$("#redirect-publish").click(function () {

    $.ajax({
        url: 'createPublish',
        type: 'GET',
        success: function(response) {
            window.location = ("createPublish");
            return response;
        }
    });
});

$("#redirect-book").click(function () {

    $.ajax({
        url: 'createBook',
        type: 'GET',
        success: function(response) {
            window.location = ("createBook");
            return response;
        }
    });
});

$("#redirect-author").click(function () {

    $.ajax({
        url: 'createAuthor',
        type: 'GET',
        success: function(response) {
            window.location = ("createAuthor");
            return response;
        }
    });
});

