
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conformation page</title>
    <link rel="stylesheet" href="style2.css" !important>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
</head>
<body>
    <h1 class="id-heading">Download your ID CARD</h1>
    <?php
$show=true;
if($_SERVER['REQUEST_METHOD']=="POST"){
include 'partials/_dbconnect.php';
$user_name = $_POST['sname'];
$user_phn_no =$_POST['snumber'];
$sql="SELECT * FROM `users` WHERE user_phn_no='$user_phn_no' and `user_name` ='$user_name'";
$result=mysqli_query($conn,$sql);
$numExitsRow=mysqli_num_rows($result);
if($numExitsRow){
    $show=false;
    $row=mysqli_fetch_assoc($result);
    $name=$row['user_name'];
    $phone=$row['user_phn_no'];
    $image=$row['image_path'];
    $institute=$row['user_institute'];
    $class=$row['user_qualification'];
    $user_father_name=$row['user_father_name'];
    $user_mother_name=$row['user_mother_name'];
    $user_gender=$row['user_gender'];
    $user_state=$row['user_state'];
    $user_qualification=$row['user_qualification'];
    $user_institute=$row['user_institute'];
    $user_session=$row['user_session'];
    // $user_country=$row['country'];
    $date_of_birth=$row['date_of_birth'];
    $user_email=$row['user_email'];
    $user_address=$row['user_address'];
    echo '<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 col-lg4">
            <div class="card mb-4">
                <div class="text-center">
                    <div class="pp">
                        <h4 class="inst-name">
                           '.$user_institute.'
                        </h4>
                        <!-- <img class="inst-logo" src="Logo.png" alt=""> -->
                        <h3 class="student-headline">Student ID CARD</h3>
                        <img class="student-pic" src="'.$image.'" alt="">
                        <p class="name">NAME: '.$name.'</p>
                        <p class="m-no">Mobile Number: '.$phone.'</p>
                        <p class="e-adress">Email id:'. $user_email.'</p>
                        <p class="course-name">'.$user_qualification.'</p>
                        <p class="session">('.$user_session.')</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-6 col-lg4">
            <div class="card mb-4">
                <div class="text-center">
                    <div class="pp">
                    <h4 class="inst-name">
                    '.$user_institute.'
                 </h4>
                        <img class="qr-code" src="qr.png" alt="">
                        <p class="f-name">Father\'s Name: '. $user_father_name.'</p>
                        <p class="m-name">Mother\'s Name: '.$user_mother_name.'</p>
                        <p class="gender">Gender: '.$user_gender.'</p>
                        <p class="dob">D.O.B: '.$date_of_birth.'</p>
                        <p class="state">State: '.$user_state.'</p>
                        <p class="address">Address: '.$user_address.' </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



  <div class="btn-link"><a  href="view.php">Search Another</a></div>';
}else{
    echo "Invalid Entries";
}
// while($row=mysqli_fetch_assoc($result))
// {
//     echo $row['user_name'];
//     echo '<img src="'.$row["image_path"].'" height="100px" width="100px">';
    
// }
}


if($show)
{
echo '
<div class="forms"><form  action="view.php" method="post">
<label for="sname">Candidate\'s Name</label>
    <input type="text" name="sname" id="sname">
    
    <label for="snumber">Phone Number</label>
    <input type="number" name="snumber" id="snumber">
<button class="submit" type="submit">Submit</button>
</form>
</div>
</body>
</html>';
}
?>