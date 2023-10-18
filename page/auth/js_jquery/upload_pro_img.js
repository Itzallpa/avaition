$(document).ready(function () {

    
    $("#fileToUpload").change(function () {

        var file = this.files[0];
        var fileType = file["type"];
        var img_url;

        var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if ($.inArray(fileType, ValidImageTypes) < 0) {
            alert('You must select an image file only');
            return false;
        }

        if (file.size > 2000000) {
            alert('You File Size is too big more than 2MB');
            return false;
        }

        var reader = new FileReader();

        //set img size 200x200
        reader.onloadend = function () {
            var tempImg = new Image();
            tempImg.src = reader.result;
            tempImg.onload = function () {
                var MAX_WIDTH = 200;
                var MAX_HEIGHT = 200;
                var tempW = tempImg.width;
                var tempH = tempImg.height;
                if (tempW > tempH) {
                    if (tempW > MAX_WIDTH) {
                        tempH *= MAX_WIDTH / tempW;
                        tempW = MAX_WIDTH;
                    }
                } else {
                    if (tempH > MAX_HEIGHT) {
                        tempW *= MAX_HEIGHT / tempH;
                        tempH = MAX_HEIGHT;
                    }
                }

                var canvas = document.createElement('canvas');
                canvas.width = tempW;
                canvas.height = tempH;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(this, 0, 0, tempW, tempH);
                var dataURL = canvas.toDataURL("image/jpeg");
                $("#pro_img").attr("src", dataURL);
                $("#pro_img_nav").attr("src", dataURL);


                        //upload image to server
        
                $.ajax({
                    url: "../auth/upload_pro_img.php",
                    method: "POST",
                    data:{ 
                        img_url: dataURL
                    },
                    success: function (data) {

                        if (data == true) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Upload Success',
                                text: 'Your profile image has been uploaded',
                                showConfirmButton: false,
                                timer: 1500
                            });

                        } else {

                            console.log(data);
                        }
                    }
                });

            }
        }


        reader.readAsDataURL(file);
        
        
    });


});