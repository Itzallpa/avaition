$(document).ready(function () {

    $('[name=ivao_id]').change(function () {

        var ivao_id = $('[name=ivao_id]').val();
        var email = $('[name=email]').val();

        $.ajax({
            url: "../auth/editprofile.php",
            method: "POST",
            data: {
                type: "edit_ivao_id",
                email: email,
                ivao_id: ivao_id
            },
            success: function (data) {
                if (data == true) {
                } else {
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        })


    });


    $('[name=vatsim_id]').change(function () {

        var vatsim_id = $('[name=vatsim_id]').val();
        var email = $('[name=email]').val();

        $.ajax({
            url: "../auth/editprofile.php",
            method: "POST",
            data: {
                type: "edit_vatsim_id",
                email: email,
                vatsim_id: vatsim_id
            },
            success: function (data) {
                if (data == true) {
                } else {
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        })

    });

});