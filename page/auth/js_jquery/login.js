

$(document).ready(function () {

    //if click login button
    $("#login").click(function () {

        //get attr input email
        var email = $('[name=email]').val();

        //get attr input password
        var password = $('[name=password]').val();

        //check email and password
        if (email == "" || password == "") {

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter email and password!',
            })
            
            return false;

        }


        $.ajax({
            url: "check_login.php",
            method: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (data) {
                if (data == true) {
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Success',
                        text: 'Welcome to my website!',
                    })

                    /*setTimeout(function () {
                        window.location.href = "../../index.php";
                    }, 2000);*/

                    console.log("TRUE" , data);
                } else {
                    console.log("FALSE" , data);
                }
            }
        });

        

    });
    
});