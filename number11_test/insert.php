<?php
require_once('conn.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $substrng = substr($phone, -11,2);

    if($name == "" || $email == "" || $dob  == "" || $age  == "" || $gender  == "" 
        || !validate_email($email) || $phone == "" 
        || !(validate_phone($phone)) || strlen($phone) != 11 || $substrng != "09"){     

        if($name == ""){
            echo "Full name is required.\n";
        }
        if($email  == ""){
            echo "Email address is required.\n";
        }else if(!validate_email($email)){
            echo $email . " is a invalid email.\n";
        }
        if($phone  == ""){
            echo "Phone number is required.\n";
        }else if(!(validate_phone($phone)) || strlen($phone) != 11 || $substrng != "09") {
            echo($phone. " is a invalid phone number.\n");
        }
        if($dob  == ""){
            echo "Date of birth is required.\n";
        }
        if($age  == ""){
            echo "Age is required.\n";
        }
        if($gender  == ""){
            echo "Gender is required.\n";
        }
    }else{
        try {
            $sql = 'INSERT INTO profile(name, email, phone_no, bday, address,age, gender)
            VALUES ("'.$name.'","'.$email.'","'.$phone.'","'.$dob.'",NULL,"'.$age.'","'.$gender.'")';
            
            $conn->exec($sql);
            
            echo "New record created successfully";
        
        }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    function validate_email($email){
        return preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/", $email);
    }
    function validate_phone($phone){
        return preg_match("/^[0-9]*$/", $phone);
    }
?>