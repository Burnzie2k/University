 <!--
 filename: [Owen Byrne]
 Author: [Owen Byrne]
 created: [20/05/2019]
 last modified: [20/05/2019]
 description: [Assignment]
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8" />
   <meta name="description" content="IT Business positions" />
   <meta name="keywords" content="IT, Business, positions, vacant" />
   <meta name="author" content="102581507" />
   <link href= "Styles/Styles.css" rel="stylesheet"/>
   <script src="scripts/apply.js" ></script>
   <style type="text/css">
   p {
       color: white;
       font-family: arial, Helvetica, sans-serif;
   }
   </style>

   <title>Cloud Computing</title>
 </head>
 <body>
   <h1>CLOUD COMPUTING.CO</h1>
   <p >
     <!--Credit https://www.efect.ro/ for the image -->
     <img src="Images/CloudComputing.png" alt="IT logo" id="image1" >
   </p>

 <?php include 'included/header.inc';?>

 <?php
	function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
 ?>

 <?php
    if (!isset($_POST["jobRef"])) {
        header("location:apply.php");
        exit();
    }
    $err_msg="";

    if (isset ($_POST["jobRef"])) {
        $job_ref = $_POST["jobRef"];
        $job_ref = sanitise_input($job_ref);
        if (strlen($job_ref) > 6) {
            $err_msg .= "<p>The Job reference cannot exceed 5 letters.</p>";
        }
    }


    $job_ref=trim($_POST["jobRef"]);

    if (isset ($_POST["fName"])) {
        $first_name = $_POST["fName"];
        $first_name = sanitise_input($first_name);
        if (strlen($first_name) > 20) {
            $err_msg .= "<p> Your First Name cannot exceed 20 letters.</p>";
        }
        if ($first_name == "") {
            $err_msg .= "<p> You must enter your First name.</p>";
        }
        if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
    	    $err_msg .= "<p> Only alpha letters allowed in your first name.</p>";
    	}
    }

    if (isset ($_POST["lName"])) {
        $last_name = $_POST["lName"];
        $last_name = sanitise_input($last_name);
        if (strlen($last_name) > 20) {
            $err_msg .= "<p> Your Last Name cannot exceed 20 letters.</p>";
        }
        if ($last_name == "") {
            $err_msg .= "<p> You must enter your Last name.</p>";
        }
        if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
    	    $err_msg .= "<p> Only alpha letters allowed in your Last name.</p>";
    	}
    }

    if (isset ($_POST["dateOfBirth"])) {
        $dob = $_POST["dateOfBirth"];
        $dob = sanitise_input($dob);
        if (!preg_match("/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/", $dob)) {
    	    $err_msg .= "<p> Your date of birth must match the dd/mm/yyyy format.</p>";
    	}
        if ($dob == "") {
            $err_msg .= "<p>You must enter your date of birth.</p>";
        }
    }

    if (isset ($_POST["gender"])) {
        $gender = $_POST["gender"];
        $gender = sanitise_input($gender);
    }

    if (!isset ($_POST["gender"])) {
        $err_msg .= "<p>No Gender selected.</p>";
    }

    if (isset ($_POST["streetAddress"])) {
        $street_address = $_POST["streetAddress"];
        $street_address = sanitise_input($street_address);
        if (strlen($street_address) > 40) {
            $err_msg .= "<p> Your Street Address cannot exceed 40 letters.</p>";
        }
    }

    if (isset ($_POST["suburbTown"])) {
        $suburb_town = $_POST["suburbTown"];
        $suburb_town = sanitise_input($suburb_town);
        if (strlen($suburb_town) > 40) {
            $err_msg .= "<p> Your suburb / town cannot exceed 40 letters.</p>";
        }
    }

    if (isset ($_POST["state"])) {
        $state = $_POST["state"];
        $state = sanitise_input($state);
    }

    if (isset ($_POST["postcode"])) {
        $postcode = $_POST["postcode"];
        $postcode = sanitise_input($postcode);
    }

    if (isset ($_POST["email"])) {
        $email_address = $_POST["email"];
        $email_address = sanitise_input($email_address);
        if (!preg_match("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$^", $email_address)) {
    	    $err_msg .= "<p> Your email is in an incorrect format.</p>";
    	}
    }

    if (isset ($_POST["phone"])) {
        $phone = $_POST["phone"];
        $phone = sanitise_input($phone);
        if (strlen($phone) > 12) {
            $err_msg .= "<p>Your Phone number cannot exceed 12 digits.</p>";
        }
    }

    if (isset($_POST["skills"]))
		$skills = $_POST["skills"];
	else
		$err_msg .= "<p>Please select skills.</p>";
    $other_skills=trim($_POST["comments"]);

    if ($err_msg!=""){
    	echo $err_msg;
	}

    else {
    require_once "settings.php";
    $conn = mysqli_connect ($host,$user,$pwd,$sql_db);

    if ($conn) {
        $query = "CREATE TABLE IF NOT EXISTS EOI (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    job_ref VARCHAR(5),
                    first_name VARCHAR(20),
                    last_name VARCHAR(20),
                    street_address VARCHAR(40),
                    suburb_town VARCHAR(40),
                    state VARCHAR(3),
                    postcode VARCHAR(12),
                    email_address VARCHAR(40),
                    phone VARCHAR(12),
                    skills VARCHAR(50),
                    other_skills VARCHAR(200),
                    status VARCHAR(20)
                    );";

        $result = mysqli_query ($conn, $query);
        if ($result) {

            $query = "INSERT INTO EOI (job_ref, first_name, last_name, street_address, suburb_town, state, postcode, email_address, phone, skills, other_skills, status)
VALUES ('$job_ref', '$first_name', '$last_name', '$street_address', '$suburb_town', '$state', '$postcode', '$email_address', '$phone', '" . implode(',', $skills) . "', '$other_skills', 'new');";

            $insert_result = mysqli_query ($conn, $query);

            if ($insert_result) {
                echo "<p>Insert  successful. Your application number is " . mysqli_insert_id($conn) . ".</p>";
            } else {
                echo "<p> Application Unsuccessful.</p>";
            }
        } else {
            echo "<p>Create table operation unsuccessful.</p>";
        }
        mysqli_close ($conn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
    }
  ?>

 <!-- Footer containg the author, email and university -->
 <?php include 'included/footer.inc';?>

 </body>
 </html>
