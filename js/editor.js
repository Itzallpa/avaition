//edit-train-page
$(document).ready(function () {


    $.get("../auth/server_get.php", {type: "get_docs_pilot"}, function (data) {

        var docs = JSON.parse(data);
        $('#show-editor').html(docs.pilot_train_docs);

        editors.setData(docs.pilot_train_docs); 
        
    });

   
    $('#submit-editer').click(function () {

        var data_post = editors.getData();

        $.ajax({
            url: "../auth/server_post.php",
            method: "POST",
            data: {
                type: "edit_docs_pilot",
                data: data_post
            },
            success: function (data) {
                if (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Edit Docs Success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#show-editor').html(data_post);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Edit Docs Failed!',
                    })
                }
            }
        })


    
    });

});