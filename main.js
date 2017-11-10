$(function() {

//Ajax Call for the sign up form 
//Once the form is submitted
$("#signupform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#signupmessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#signupmessage").slideDown();
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#signupmessage").slideDown();
        }
    });
});


//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event){ 
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#loginmessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                location.reload();
            }else{
                $('#loginmessage').html(data);   
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#loginmessage").slideDown();
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#loginmessage").slideDown();
        }  
    });
});

//Ajax Call for the forgot password form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#forgotpasswordmessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $('#forgotpasswordmessage').html(data);
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#forgotpasswordmessage").slideDown();
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#forgotpasswordmessage").slideDown();
        }
    });
});

//Update picture
var file; var imageType; var imageSize; var wrongType;
// Function to preview image after validation

$("#picture").change(function() {
$("#updatepicturemessage").empty();
file = this.files[0];
imageType = file.type;
imageSize = file.size;
    
    var match= ["image/jpeg","image/png","image/jpg"];
    //Check image type
    if($.inArray(imageType, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong File Format! Only jpeg, png and jpg are accepted.</div>");
        return false;
    }
    //Check image size
    else if(imageSize>3*1024*1024){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Please select an image less than 3MB.</div>");
        return false;
    }
    else{
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }
});

function imageIsLoaded(event) {
    $('#previewing').attr('src', event.target.result);
};

//Ajax call to add product
$("#updatepictureform").submit(function(event) {
    //hide message
    $("#updatepicturemessage").hide();
    //show spinner
    $("#spinner").css("display", "block");
    event.preventDefault();
    if(!file){
        $("#spinner").css("display", "none");
        $("#updatepicturemessage").html('<div class="alert alert-danger">Please upload a picture!</div>');
        $("#updatepicturemessage").slideDown();
        return false;
    }
    
    //Check image type
    var match= ["image/jpeg","image/png","image/jpg"];
    if($.inArray(imageType, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong File Format! Only jpeg, png and jpg are accepted.</div>");
        return false;
    }
    
    //Check image size
    if(imageSize>3*1024*1024){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Please upload an image less than 3MB.</div>");
        return false;
    }
    
    var name=$('#pname').val();
    var price=$('#pprice').val();
    var info=$('#pinfo').val();
    var type=$('#ptype').val();
    var bankdetails=$('#bankdetails').val();
    
    var bankdetails=[{name:"bankdetails",value:bankdetails}];
    //var test = new FormData(this);
    //console.log(test.get("picture"));
    
    $.ajax({
        url: "addproduct.php?name="+name+"&price="+price+"&info="+info+"&type="+type, 
        type: "POST",             
        data: new FormData(this), 
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data){
            if(data){
                $("#updatepicturemessage").html(data);
                
                $.ajax({
                    url: "updatebankdetails.php",
                    type: "POST",
                    data: bankdetails,
                    success: function(data){
                        if(data){
                            $("#updatepicturemessage").html(data);
                        }
                    },
                    error: function(){
                        $("#updatepicturemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>"); 
                    }   
                });
                
                //hide spinner
                 $("#spinner").css("display", "none");
                //show message
                $("#updatepicturemessage").slideDown();
                //update picture in the settings
            }else{
                $("#spinner").css("display", "none");
                location.reload();
            }
            
        },
        error: function(){
            $("#updatepicturemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later. </div>");
            //hide spinner
             $("#spinner").css("display", "none");
            //show message
            $("#signupmessage").slideDown();
        }
    });
                    
});




// Ajax call to updateaddress.php
$("#buyform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#buymessage").hide();
    var pid=$("#pid").val();
    
    var pid=[{name:"pid",value:pid}];
    
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //console.log(datatopost);
    //send them to updateusername.php using AJAX
    var flag=true;
        
    $.ajax({
        url: "updateaddress.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#buymessage").html(data);
        
            }else{
                $.ajax({
                    url: "sold.php",
                    type: "POST",
                    data: pid,
                    success: function(data){
                        if(data){
                            $("#buymessage").html(data);
                        }else{
                            location.reload();   
                        }
                    },
                    error: function(){
                        $("#buymessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                    }   
                });
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#buymessage").slideDown();
        },
        error: function(){
            $("#buymessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
             $("#spinner").css("display", "none");
            //show error div
            $("#buymessage").slideDown();
        }   
    });
                
});

    
});