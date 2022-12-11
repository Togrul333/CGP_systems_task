function uploadImage(url, file, callback) {
    let formData = new FormData();
    formData.append('file', file);
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            callback(response);
        },
        error: function(response) {
            callback(response);
        },
        fail: function(response) {
            console.log('Failed...');
            console.log(response);
        }
    }).done(function() {
        console.log('DONE');
    });
}
