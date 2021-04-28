function validate(){
    var valid = true;

    const reg_array = {
        "name": /^[a-zA-Z]+$/,
        "email": /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
        "phone": /\d{3}[-]\d{3}[-]\d{4}/
    }

    var error_msg = "";

    var phone = document.getElementById('phone_1').value +"-"+ document.getElementById('phone_2').value +"-"+ document.getElementById('phone_3').value

    if(document.getElementById('fname').value === "" || !document.getElementById('fname').value.match(reg_array.name)){
        error_msg+="Your first name is invalid.\n";
        console.log(error_msg);
    }
    if(document.getElementById('lname').value === "" || !document.getElementById('lname').value.match(reg_array.name)){
        error_msg+="Your last name is invalid.\n";
    }
    if (!phone.match(reg_array.phone)){
        error_msg+="Your phone number is invalid.\n";
    }
    if (!document.getElementById('email').value.match(reg_array.email)){
        error_msg+="Your email address is invalid.";
    }

    if(document.getElementById('new').value === 'new'){
        if(document.getElementById('city').value === "" || document.getElementById('zip').value === ""
        || document.getElementById('bday_1').value=== "" || document.getElementById('bday_2').value== ""
        || document.getElementById('bday_3') === ""){
        error_msg+="New users can't leave any fields blank.";
    }

    }

    if(!(error_msg==="")){

        alert(error_msg);
        valid=false;
    }

    return valid;
}