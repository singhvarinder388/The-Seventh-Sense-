// Ajax call to updateusername.php
$("#updateusernameform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#updateusernamemessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }else{
                location.reload();   
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updateusernamemessage").slideDown();
        },
        error: function(){
            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updateusernamemessage").slideDown();
        }
    
    });

});

// Ajax call to updatepassword.php
$("#updatepasswordform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#updatepasswordmessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }else{
                location.reload();   
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updatepasswordmessage").slideDown();
        },
        error: function(){
            $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updatepasswordmessage").slideDown();
        }   
    });
});



// Ajax call to bankdetails.php
$("#updatebankdetailsform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#updatebankdetailsmessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatebankdetails.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatebankdetailsmessage").html(data);
            }else{
                location.reload();   
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updatebankdetailsmessage").slideDown();
        },
        error: function(){
            $("#updatebankdetailsmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updatebankdetailsmessage").slideDown();
        }  
    });
});

// Ajax call to updateaddress.php
$("#updateaddressform").submit(function(event){
    //show spinner
    $("#spinner").css("display", "block");
    //hide error div
    $("#updateaddressmessage").hide();
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateaddress.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateaddressmessage").html(data);
            }else{
                location.reload();   
            }
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updateaddressmessage").slideDown();
        },
        error: function(){
            $("#updateaddressmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show error div
            $("#updateaddressmessage").slideDown();
        }  
    });
});