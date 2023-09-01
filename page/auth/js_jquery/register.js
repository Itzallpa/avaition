

$(document).ready(function () {

    $("#register").click(function () {
    

        var firstName = $('[name=firstName]').val();
        var lastName = $('[name=lastName]').val();
        var full_name = firstName + " " + lastName;
        var email = $('[name=email]').val();
        var birthdate = $('[name=birthdate]').val();
        var ivaoId = $('[name=ivaoId]').val();
        var vatsimId = $('[name=vatsimId]').val();
        var password = $('[name=password]').val();
        var confirmPassword = $('[name=confirmPassword]').val();
    

        if (firstName == "" || lastName == "" || email == "" || birthdate == "" || password == "" || confirmPassword == "") {

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter all fields!',
            })

            return false;

        }


        if (password != confirmPassword) {
                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password and Confirm Password not match!',
                })
    
                return false;

        }


        $.ajax({
            url: "check_register.php",
            method: "POST",
            data: {
                firstName: firstName,
                lastName: lastName,
                full_name: full_name,
                email: email,
                password: password,
                birthdate: birthdate,
                ivaoId: ivaoId,
                vatsimId: vatsimId
            },
            success: function (data) {
                if (data == true) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Register Success',
                        text: 'Welcome to my website!',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "login";
                        }
                    })
                        

                } else {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Register Failed!',
                    })

                    if(data == "Email already exist"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email already exist!',
                        })
                    }

                }
            }
        });

    });


});