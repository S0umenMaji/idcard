<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'partials/_dbconnect.php';
    $user_name=$_POST['cname'];
    $user_father_name=$_POST['fname'];
    $user_mother_name=$_POST['mname'];
    $user_gender=$_POST['gender'];
    $user_phn_no=$_POST['phnno'];
    $user_state=$_POST['state'];
    $user_qualification=$_POST['quali'];
    $user_institute=$_POST['inst'];
    $user_session=$_POST['session'];
    $user_country=$_POST['country'];
    $date_of_birth=$_POST['dob'];
    $user_email=$_POST['email'];
    $user_address=$_POST['address'];
    $FILES=$_FILES['myFile'];
    $file_name=$user_phn_no.$FILES['name'];
   $file_error=$FILES['error'];
   $file_temp=$FILES['tmp_name'];
// echo $file_temp;
    $file_ext=explode('.',$file_name);
    $file_check =strtolower(end($file_ext));
    $file_ext_stored= array('png','jpg','jpeg');

    $esql="SELECT * FROM `users` WHERE user_phn_no='$user_phn_no'";
    $resultSql=mysqli_query($conn,$esql);
    $numExitsRow=mysqli_num_rows($resultSql);
    if($numExitsRow>0){
    echo "phnone number already exists";
    }
    else{

  


    if(in_array($file_check,$file_ext_stored))
    {
        $destinatiom_file='images/'.$file_name;
        // echo $destinatiom_file;
        move_uploaded_file($file_temp,$destinatiom_file);
    $sql="INSERT INTO `users` ( `user_name`, `user_father_name`, `user_mother_name`, `date_of_birth`, `user_gender`, `user_phn_no`, `user_state`,`user_country`,`user_qualification`,`user_institute`,`user_session`, `user_email`, `user_address`, `time`,`image_path`) VALUES ('$user_name', '$user_father_name', '$user_mother_name', '$date_of_birth', '$user_gender', '$user_phn_no', '$user_state','$user_country','$user_qualification','$user_institute','$user_session', '$user_email', '$user_address', current_timestamp(),'$destinatiom_file');";
    $result=mysqli_query($conn,$sql);
    header('Location: view.php');
} 


}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--   
    <nav>

        <div class="nav">
            <ul>
                <a href="index.php">Home</a>
                <a href="#">Form</a>

                <div class="right-nav">
                    <a href="#">Search</a>
                    <a href="#">Exit</a>
                </div>
        </div>
    </nav> -->



    </div>

    <div class="container">
        <h1 class="form-heading">Student Information Collection Form</h1>


        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="per-details">
                <h3 class="in-heading">Personal Details</h3>

                <div class="form-group">

                    <label for="cname">Candidate's Name</label>
                    <input name="cname" type="text" id="cname" required>
                </div>
                <div class="form-group">

                    <label for="fname">Father's Name</label>
                    <input name="fname" type="text" id="fname" required>
                </div>
                <div class="form-group">

                    <label for="mname">Mother's Name</label>
                    <input name="mname" type="text" id="mname" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div id="gender">
                        <input type="radio" id="male" name="gender" value="male" required>
                          <label class="label" for="male">Male</label>

                        <input type="radio" id="female" name="gender" value="female" required>
                          <label class="label" for="female">Female</label>

                        <input type="radio" id="other" name="gender" value="other" required>
                          <label class="label" for="female">Other</label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" name="dob" id="date" required>
                </div>

            </div>
            <div class="cont-details">
                <h3 class="in-heading">Contact Details</h3>
                <div class="form-group">
                    <label for="phnno">Phone Number</label>
                    <input type="number" name="phnno" id="phnno" max-length="10" required>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" class="form-control" id="country" required>
                        <option value="india">India</option>
                    </select>
                </div>
                <label for="state">State:</label>
                <div class="form-group">

                    <select name="state" id="state" class="form-control" required>
                        <option value="">Select Your State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="" rows="1" required></textarea>
                </div>
                <div class="form-group"></div>
            </div>


            <div class="edu-details">
                <h3 class="in-heading">Educational Details</h3>
                <div class="form-group">
                    <label for="quali">CLass</label>
                    <input type="text" name="quali" id="quali">
                </div>
                <div class="form-group">
                    <label for="inst">Institute Name</label>
                    <input type="text" name="inst" id="inst">
                </div>
                <div class="form-group">
                    <label for="session">Session</label>
                    <input type="text" name="session" id="session">
                </div>
            </div>
            <div class="up-details">

                <h3 class="in-heading">Upload</h3>

                <div class="form-group">
                    <label for="myFile">Upload Your photo</label>
                    <input type="file" name="myFile" id="myFile" name="filename" required>
                    <!-- <input type="image" src="/images/" alt=""> -->
                </div>
            </div>
            <div class="submit">

                <button type="submit">Submit</button>
            </div>
        </form>
       <div class="id-btn">
           <p>Already Resitered?</p>
           <p><a class="id-link" href="view.php">Click Here</a> to Download Your ID card </p>
       </div>
    </div>

</body>

</html>