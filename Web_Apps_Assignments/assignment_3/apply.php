<!--
filename: [Owen Byrne]
Author: [Owen Byrne]
created: [21/03/2019]
last modified: [3/04/2019]
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

  <title>Cloud Computing</title>
</head>
<body id="applypage">
  <h1>CLOUD COMPUTING.CO</h1>
  <p >
    <!--Credit https://www.efect.ro/ for the image -->
    <img src="Images/CloudComputing.png" alt="IT logo" id="image1" >
  </p>

<?php include 'included/header.inc';?>

</header>
<h2>Application page for Cloud Computing.co</h2>
<br />
<form id="applyForm" method="post" action="processEOI.php" novalidate="novalidate">
-  <fieldset>
    <legend>Reference Number</legend>
    <p><label for ="jobRef">Reference number:</label>
      <input type="text" name="jobRef" id="jobRef" size ="5" readonly/></p>
  </fieldset>
  <br />
  <fieldset>
    <legend>Applicant Details</legend>
    <p><label for="fName">First Name: </label>
      <input type="text" name="fName" id="fName" pattern="(^[a-zA-Z]+$)" required="required" size="20"/><span id="fNameErrMsg"></span><span id="warn"></span></p>

    <p><label for = "lName">Last Name: </label>
  	  <input type="text" name= "lName" id="lName" pattern="(^[a-zA-Z]+$)" required="required" size="20"/><span id="lNameErrMsg"></span></p>

    <p><label for="dateOfBirth">Date of Birth:</label>
      <input type="text" name="dateOfBirth" id="dateOfBirth" placeholder="dd/mm/yyyy" required="required" size="7"/><span id="dateOfBirthErrMsg"></span><span id="dateOfBirthErrMsgAge"></span></p>

    <p><label for="streetAddress">Street Address:</label>
      <input type="text" name="streetAddress" id="streetAddress" required="required" size="40"/><span id="streetAddressErrMsg"></span></p>

    <p><label for="suburbTown">Suburb / Town:</label>
        <input type="text" name="suburbTown" id="suburbTown" required="required" size="40"/><span id="suburbTownErrMsg"></span></p>

    <p><label for="state">State:</label>
        <select name="state" id="state">
            <option value="none">Please Select</option>
            <option value="vic">VIC</option>
            <option value="nsw">NSW</option>
            <option value="qld">QLD</option>
            <option value="nt">NT</option>
            <option value="wa">WA</option>
            <option value="sa">SA</option>
            <option value="tas">TAS</option>
            <option value="act">ACT</option>
        </select><span id="stateErrMsg"></span></p>
        <span id="wrongStatePost"></span>
    <p><label for="postcode">Postcode:</label>
      <input type="text" name="postcode" id="postcode" required="required" size="4"/><span id="postcodeErrMsg"></span></p>
  </fieldset>
  <br />
  <fieldset id="gender">
    <legend>Gender</legend>
      <label for="male">Male </label>
      <input type="radio" name="gender[]" id="male" value="Male" />
      <label for="female">Female </label>
      <input type="radio" name="gender[]" id="female" value="Female" />
      <label for="other">Other </label>
      <input type="radio" name="gender[]" id="other" value="Other" />
  </fieldset>
<br />
  <fieldset>
    <legend>Contact Information</legend>
      <p><label for="email">Email:</label>
        <input type="text" name="email" id="email" required="required"
         maxLength="40" size="40"
         pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/></p>
      <p><label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" required="required"
         maxlength="12" size="12"
         pattern="\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{1}( |-){0,1}[0-9]{3}$"/></p>
  </fieldset>
  <br />
  <fieldset>
    <legend>Skills</legend>
      <label for="aws">AWS</label>
      <input type="checkbox" name="skills[]" id="aws" value="aws" />
      <label for="azure">Azure</label>
      <input type="checkbox" name="skills[]" id="azure" value="azure" />
      <label for="salesforce">Salesforce</label>
      <input type="checkbox" name="skills[]" id="salesforce" value="salesforce" />
      <label for="ec2">EC2</label>
      <input type="checkbox" name="skills[]" id="ec2" value="ec2" />
      <label for="s3">S3</label>
      <input type="checkbox" name="skills[]" id="s3" value="s3" />
      <label for="otherskills">Other Skills</label>
      <input type="checkbox" name="skills[]" id="otherskills" value="otherskills" /><span id="skillErrMsg"></span><br />
    <label><br />
      <textarea name="comments" id="comments"
      rows="10" cols="65">Write any other skills you deem important for us to consider...</textarea><span id="commentErrMsg"></span>
    </label>
  </fieldset>
  <br />
  <p><input type="submit" value="Apply" class="submited"/>
  <input type="reset" value="Reset"/></p>
</form>
<!-- Footer containg the author, email and university -->
<?php include 'included/footer.inc';?>

</body>
</html>
