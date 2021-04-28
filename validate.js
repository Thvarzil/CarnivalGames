function validate(){
    var error = false;

    const reg_array = {
        "name": /^[a-zA-Z]+$/,
        "email": /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
        "phone": /\d{3}[-]\d{3}[-]\d{4}/
    }

    var error_msg = "";

    var phone = document.getElementById('phone_1').value +"-"+ document.getElementById('phone_2').value +"-"+ document.getElementById('phone_3').value

    if(document.getElementById('fname').value == "" || !document.getElementById('fname').value.match(reg_array.name)){
        error_msg+="Your first name did not pass validation.\n";
    }
    if(document.getElementById('lname').value == "" || !document.getElementById('lname').value.match(reg_array.name)){
        error_msg+="Your last name did not pass validation.\n";
    }
    if (!phone.match(reg_array.phone)){
        error_msg+="Your phone number did not pass validation.\n";
    }
    if (!document.getElementById('email').value.match(reg_array.email)){
        error_msg+="Your email address did not pass validation.";
    }

    if(!(error_msg==="")){
        alert(error_msg);
        error=true;
    }

    return error;
}