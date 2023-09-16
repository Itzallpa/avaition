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
            var edit_password = $('#edit_password').val();



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
                    edit_role: edit_role,
                    edit_password: edit_password
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


//ADD AIRPORT
$(document).ready(function () {

    $('#submit-add-airport').click(function () {

        var airport_name = $('[name=airport_name]').val();
        var icao_name = $('[name=icao_name]').val();

        //check if airport_name or icao_name is empty
        if (airport_name == "" || icao_name == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
            return;
        }

        //check data on #airport_table
        var table = $('#airport_table').DataTable();
        var data = table.rows().data();

        for (var i = 0; i < data.length; i++) {
            console.log(data[i][1]);
        }

        //check if airport_name or icao_name is exist
        var check = false;
        for (var i = 0; i < data.length; i++) {
            if (data[i][1] == airport_name || data[i][2] == icao_name) {
                check = true;
                break;
            }
        }

        if (check == true) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Airport Name or ICAO Name is exist!',
            })
        } else {

            table.row.add([data.length+1, airport_name, icao_name, "<td><button class='btn btn-primary'>Edit</button></td>"]).draw();

            $.ajax({
                url: "../auth/airport_system.php",
                method: "POST",
                data: {
                    type: "add_airport",
                    airport_name: airport_name,
                    icao_name: icao_name
                },
                success: function (data) {
                    if (data == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Add Airport Success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Add Airport Failed!',
                        })
                    }
                }
            })

        }











    });


});


//EDIT AIRPORT
$(document).ready(function () {



    //when click <td>
    $('#airport_table').on('click', 'td', function () {
        
        //get value of <td>
        var table = $('#airport_table').DataTable();
        var data = table.rows().data();
        //check that the mouse click has information in <td>




        var airport_name = $(this).closest('tr').find('td').eq(1).text();
        var icao_name = $(this).closest('tr').find('td').eq(2).text();
        

        //check column of <td> that click
        var column = $(this).closest('tr').find('td').index($(this));

        if(column == 1)
        {
            Swal.fire({
                title: 'Edit Airport Name',
                input: 'text',
                inputValue: airport_name,
                showConfirmButton: true,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    }
                }
            }).then((result) => {
                
                if(result.isConfirmed)
                {
                    var new_airport_name = result.value;
                    
                    $.ajax({
                        url: "../auth/airport_system.php",
                        method: "POST",
                        data: {
                            type: "edit_airport_name",
                            airport_name: airport_name,
                            new_airport_name: new_airport_name
                        },
                        success: function (data) {
                            if (data == true) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Edit Airport Name Success',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                

                                var table = $('#airport_table');
                                var td = table.find('td');
                                var airport  = td.filter(function () {
                                    return $(this).text() == airport_name;
                                });

                                airport.closest('tr').find('td').eq(1).text(new_airport_name);
                                
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong! Edit Airport Name Failed!',
                                })
                            }
                        }
                    })
                    

                    
                }

            });  
        }
        else if(column == 2)
        {
            Swal.fire({
                title: 'Edit ICAO Name',
                input: 'text',
                inputValue: icao_name,
                showConfirmButton: true,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    }
                }
            }).then((result) => {
                
                if(result.isConfirmed)
                {
                    var new_icao_name = result.value;


                    if(new_icao_name.length != 4)
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'ICAO Name must be 4 characters!',
                        })
                        return;
                    }
                    
                    $.ajax({
                        url: "../auth/airport_system.php",
                        method: "POST",
                        data: {
                            type: "edit_icao_name",
                            icao_name: icao_name,
                            new_icao_name: new_icao_name
                        },
                        success: function (data) {
                            if (data == true) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Edit ICAO Name Success',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                

                                var table = $('#airport_table');
                                var td = table.find('td');
                                var airport  = td.filter(function () {
                                    return $(this).text() == icao_name;
                                });

                                airport.closest('tr').find('td').eq(2).text(new_icao_name);

                                console.log(data);
                                
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong! Edit ICAO Name Failed!',
                                })
                                console.log(data);
                            }
                        }
                    })
                }

            });
        }
    });


});

//Add Flight Operation
$(document).ready(function () {
    
        var dep_icao = $('#dep_icao').val();
        var arr_icao = $('#arr_icao').val();
        
        //when dep_icao and arr_icao change
        $('#dep_icao, #arr_icao').change(function () {
            
            //get time UTC\
            var date = new Date();
            var time = date.toUTCString();
            //get time UTC Only no date
            var time_utc = time.slice(17, 22);

            $("#dep_time").val(time_utc);

            //+ UTC TIME 1 hour H:M
            var time_utc_plus = parseInt(time_utc.slice(0, 2)) + 1;
            time_utc_plus = time_utc_plus + time_utc.slice(2, 5);
            $("#arr_time").val(time_utc_plus); 


            

        });


        $('#submit-add-flight').click(function () {

            dep_icao = $('#dep_icao').val();
            arr_icao = $('#arr_icao').val();

            var callsign = $('[name=callsign]').val();
            var aircraft = $('[name=aircraft]').val();
            var remarks = $('[name=Remark]').val();

            if(dep_icao == "" || arr_icao == "" || callsign == "" || aircraft == "")
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
                return;
            }




            if(dep_icao == arr_icao)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Departure Airport and Arrival Airport must not be the same!',
                })
                return;
            }

            var table = $('#Flight-Operation').DataTable();
            var data = table.rows().data();

            var check = false;

            for(var i = 0; i < data.length; i++)
            {
                if(data[i][2] == dep_icao && data[i][4] == arr_icao)
                {
                    check = true;
                    break;
                }
                else if(data[i][1] == callsign)
                {
                    check = true;
                    break;
                }
                

            }

            if(check == true)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Callsign or Flight Route is exist!',
                })
                return;
            }


            
            

            var dep_time = $('#dep_time').val();
            var arr_time = $('#arr_time').val();
        

            

            $.ajax({
                url: "../auth/flight_system.php",
                method: "POST",
                data: {
                    type: "add_flight",
                    callsign: callsign,
                    aircraft: aircraft,
                    dep_icao: dep_icao,
                    arr_icao: arr_icao,
                    dep_time: dep_time,
                    arr_time: arr_time,
                    remarks: remarks
                },
                success: function (data) {

                    if (data == true) {

                        console.log(data);
                        Swal.fire({
                            icon: 'success',
                            title: 'Add Flight Success',
                            showConfirmButton: true
                        })

                    } else {
                        
                        if(data == "Departure ICAO not found")
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Departure ICAO not found!',
                            })
                        }

                        else if(data == "Arrival ICAO not found")
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Arrival ICAO not found!',
                            })
                        }

                        else if(data == "Callsign already exists")
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Callsign already exists!',
                            })
                        }

                        else if(data == "Aircraft not found")
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Aircraft not found!',
                            })
                        }

                        else
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })

                            console.log(data);
                        }

                    }
                }
            })
            

        });


});

//Edit Flight Operation
$(document).ready(function () {

    $('#Flight-Operation').on('click', 'td', function () {

        var table = $('#Flight-Operation').DataTable();
        var data = table.rows().data();


        var row = $(this).closest('tr').find('td').eq(0).text();

       
        
            

    });
});