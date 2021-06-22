<html>
<head>
<title>TEST 11</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body style="margin-left:5%; margin-top:5%">    
    <form id="myForm" method="post" action="" >
        <label>Full Name</label>
        <input type="text" id="full_name" required>
        <span id="name_alert"></span>
        <br> 
        <label>Email Address</label>
        <input type="email" id="email" required>    
        <span id="email_alert"></span>
        <br>
        <label>Phone Number</label>
        <input type="text" id="phone_number" maxlength="11" required>
        <span id="phone_num_alert"></span>
        <br>
        <label>Date of Birth</label>
        <input type="date" id="date_of_birth" required >
        <span id="dob_alert"></span>
        <br>
        <label>Age</label>
        <input type="num" id="age" read-only disabled>
        <span id="age_alert"></span>
        <br>
        <label>Gender</label>
        <select id="gender" required><br>
            <option value="">- select -</option>
            <option value="1">male</option>
            <option value="2">female</option>
        </select>    
        <span id="gender_alert"></span>
        <br>
        <br>
        <button type="submit" name="submit" id="submit">SAVE</button> 
    </form> 
</body>
</html>

<script>

    $('#full_name').keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s,.]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            e.preventDefault();
            return false;
        }
    });
        
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validate_fields(){
        var name = $("#full_name").val();
        var email = $("#email").val();
        var phone = $('#phone_number').val();
        var dob = $("#date_of_birth").val();
        var age = $("#age").val();
        var gender = $("#gender").val();

        var name_validate = $("#name_alert");
        var email_validate = $("#email_alert");
        var phone_num_validate = $("#phone_num_alert");
        var dob_validate = $("#dob_alert");
        var age_validate = $("#age_alert");
        var gender_validate = $("#gender_alert");
        var val = phone.substr(0,2);
        
        name_validate.text("");
        email_validate.text("");
        phone_num_validate.text("");
        dob_validate.text("");
        age_validate.text("");
        gender_validate.text("");

        if(name == "" || email == "" || phone == "" || dob == "" || age == "" || gender == "" || !validateEmail(email) || !(phone.length == 11 && val == 09)){
        
            if(name == ""){
                name_validate.text("Full name is required.");
                name_validate.css("color", "red");
            }else{
                name_validate.text("");
            }
            if(email == ""){
                email_validate.text("Email address is required.");
                email_validate.css("color", "red");
            }else if (validateEmail(email)){
                email_validate.text("");
            }else{
                email_validate.text(email + " is invalid email address");
                email_validate.css("color", "red");
            }
            if(phone == ""){            
                phone_num_validate.text("Phone number is required.");
                phone_num_validate.css("color", "red");
            }else if(!(phone.length == 11 && val == 09)){
                phone_num_validate.text("Please enter a valid phone number.");
                phone_num_validate.css("color", "red");
            }else{
                phone_num_validate.text("");
            }
            if(dob == ""){
                dob_validate.text("Date of birth is required.");
                dob_validate.css("color", "red");
            }else{
                dob_validate.text("");
            }
            if(age == ""){
                age_validate.text("Age is required.");
                age_validate.css("color", "red");
            }else{
                age_validate.text("");
            }
            if(gender == ""){
                gender_validate.text("Gender is required.");
                gender_validate.css("color", "red");
            }else{
                gender_validate.text("");
            }
        }else{
            $.ajax({
                url: "insert.php",
                type: "POST",
                data: {
                    'name':name,
                    'email':email,
                    'phone':phone,
                    'dob':dob,
                    'age':age,
                    'gender':gender,
                },
                success: function( response )
                {
                    // if(response.includes("successfully") == true){
                        alert(response);
                    // }else{
                    //     alert(response)
                    // }
                },
                error: function(xhr,status,error){
                    console.log(error);
                }
            });
        }
        return false;
    }

    $('#date_of_birth').on('change', function() {
        const dis = this.value;
        const bdate = new Date(dis);
        const strDate = Date.now() - bdate.getTime(); 
        const ageDate = new Date(strDate); 
        const calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
     
        $('#age').val(calculatedAge);
    });

    
    $("#submit").on("click", validate_fields);
    
</script>
