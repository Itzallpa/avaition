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

//Edit User Zone:
//when click <td> element will alert the value of the cell
$(document).ready(function () {


    $('.edit_user_btn').click(function () {

        //remove class .hide to $('#edit_user_btn')
        $('#edit_user').removeClass('hide');
        $('.wrapper').toggleClass("modal-backdrop");

        
        var email = $(this).closest('tr').find('td').eq(2).text();
        var user_data;
    
        $.get("../auth/getprofile.php", {type: "get_user_data", email: email}, function (data) {

            user_data = JSON.parse(data);

            $('#edit_fullname').val(user_data.full_name);
            $('#edit_email').val(user_data.email);
            $('#edit_ivao_id').val(user_data.user_ivao_id);
            $('#edit_Vatsim_id').val(user_data.user_vatsim_id);
            $('#edit_birthdate').val(user_data.birthdate);
            $('#edit_role').val(user_data.user_role);
            
        });


        $('#submit-edituser').click(function () {

            var edit_fullname = $('#edit_fullname').val();
            var edit_email = $('#edit_email').val();
            var edit_ivao_id = $('#edit_ivao_id').val();
            var edit_vatsim_id = $('#edit_Vatsim_id').val();
            var edit_birthdate = $('#edit_birthdate').val();
            var edit_role = $('#edit_role').val();

            $.ajax({
                url: "../auth/editprofile.php",
                method: "POST",
                data: {
                    type: "edit_user",
                    email: edit_email,
                    edit_fullname: edit_fullname,
                    edit_email: edit_email,
                    edit_ivao_id: edit_ivao_id,
                    edit_vatsim_id: edit_vatsim_id,
                    edit_birthdate: edit_birthdate,
                    edit_role: edit_role
                },
                success: function (data) {
                    if(data)
                    {
                       Swal.fire({
                            icon: 'success',
                            title: 'Update User Success',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        //change value of <td> in table
                        $('#edit_user').addClass('hide');
                        $('.wrapper').toggleClass("modal-backdrop");

                        var new_data = JSON.parse(data);

                        var table = $('#user_table');
                        //find <td> in table
                        var td = table.find('td');

                        //find <td> at value of = edit_email
                        var td_email = td.filter(function () {
                            return $(this).text() == edit_email;
                        });

                       
                        //change value of <td> in table
                        td_email.closest('tr').find('td').eq(1).text(new_data.full_name);
                        td_email.closest('tr').find('td').eq(2).text(new_data.email);
                        td_email.closest('tr').find('td').eq(3).text(new_data.user_role);
                        td_email.closest('tr').find('td').eq(4).text(new_data.birthdate);

                    }
                    else
                    {
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

    $('#closeModalBtn').click(function () {
        
        $('#edit_user').addClass('hide');

        $('.wrapper').toggleClass("modal-backdrop");

    });

    //when click outside if #edit_user is not hide then hide it
    $(document).mouseup(function (e) {
        var container = $("#edit_user");

        //if has class .hide then return
        if (container.hasClass('hide')) {
            return;
        }
        else
        {
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.addClass('hide');
                $('.wrapper').toggleClass("modal-backdrop");
            }
        }

    });

    


});