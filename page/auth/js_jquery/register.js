

$(document).ready(function () {

    $("#register").click(function () {
    

        var firstName = $('[name=firstName]').val();
        var lastName = $('[name=lastName]').val();
        var full_name = firstName + " " + lastName;
        var email = $('[name=email]').val();
        var birthdate = $('[name=birthdate]').val();
        var ivaoId = $('[name=ivaoId]').val();
        var vatsimId = $('[name=vatsimId]').val();

    

        if (firstName == "" || lastName == "" || email == "" || birthdate == "") {

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter all fields!',
            })

            return false;

        }


        //check birthdate
        var today = new Date();
        var birthDate = new Date(birthdate);
        var age = today.getFullYear() - birthDate.getFullYear();

        //check age < 10
        if (age < 10) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You are too young!',
            })
        }


        //genarate password 10 character
        var password = Math.random().toString(36).slice(-10);


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

                            $.ajax({
                                url: "mail/send_pass_reg.php",
                                method: "POST",
                                data: {
                                    email: email,
                                    password: password,
                                    full_name: full_name
                                },
                                success: function (data) {
                                    if (data == true) {
                                        window.location.href = "login";
                                    } else {
                                        console.log("FALSE:" + data);
                                    }
                                }
                            });
                        }
                    })
                        

                } else {

                    if(data == "Email already exist"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email already exist!',
                        })
                    }
                    else 
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })

                        console.log("FALSE:" + data);
                    }


                }
            }
        });

    });


});