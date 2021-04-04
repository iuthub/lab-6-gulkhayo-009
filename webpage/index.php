<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>
<?php
$name = "";
$email ="";
$username = "";
$password = "";
$confPassword= "";
$birthDate = "";
$gender = "";
$maritalStatus = "";
$address = "";
$city= "";
$postalCode = "";
$homePhone = "";
$mobilePhone = "";
$creditCardNum = "";
$creditCardExpiry= "";
$monthlySalary = "";
$webUrl = "";
$overallGPA = "";

$is_name = true;
$is_email = true;
$is_username = true;
$is_password = true;
$is_confPassword = true;
$is_birthDate = true;
$is_gender = true;
$is_maritalStatus = true;
$is_address = true;
$is_city = true;
$is_postalCode = true;
$is_homePhone = true;
$is_mobilePhone = true;
$is_creditCardNum = true;
$is_creditCardExpiry = true;
$is_monthlySalary = true;
$is_webUrl = true;
$is_overallGPA = true;

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $confPassword = $_REQUEST['confPassword'];
    $birthDate = $_REQUEST['birthDate'];
    $gender = $_REQUEST['gender'];
    $maritalStatus = $_REQUEST['maritalStatus'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $postalCode = $_REQUEST['postalCode'];
    $homePhone = $_REQUEST['homePhone'];
    $mobilePhone = $_REQUEST['mobilePhone'];
    $creditCardNum = $_REQUEST['creditCardNum'];
    $creditCardExpiry = $_REQUEST['creditCardExpiry'];
    $monthlySalary = $_REQUEST['monthlySalary'];
    $webUrl = $_REQUEST['webUrl'];
    $overallGPA = $_REQUEST['overallGPA'];


    $is_name = preg_match('/^([a-zA-Z][a-z \-]*[a-z]){2,}$/', $name);
    $is_email = preg_match("/(.*)(@)(.*)[.](.*)/", $email);
    $is_username = preg_match('/^([a-z][a-z \-]*[a-z]){5,}$/', $username);
    $is_password = preg_match('/^([a-z][a-z \-]*[a-z]){8,}$/', $password);
    $is_confPassword = $password == $confPassword;
    $is_birthDate = preg_match('/[0-3][0-9][.][0-1][1-9][.][0-9][0-9][0-9][0-9]/', $birthDate);
    $is_gender = $gender == 'Male' or $gender == 'Female';
    $is_maritalStatus = $maritalStatus == 'Single' or $maritalStatus == 'Married' or $maritalStatus == 'Divorced' or $maritalStatus == 'Widowed';
    $is_address = preg_match('/[0-9a-zA-Z \-\,\.](.*)/', $address);
    $is_city = preg_match('/[a-zA-Z \-](.*)/', $city);
    $is_postalCode = preg_match('/([0-9]){8,}/', $postalCode);
    $is_homePhone = preg_match('/([0-9 ]){9,}/', $homePhone);
    $is_mobilePhone = preg_match('/([0-9 ]){9,}/', $mobilePhone);
    $is_creditCardNum = preg_match('/([0-9 ]){16,}/', $creditCardNum);
    $is_creditCardExpiry = preg_match('/[0-3][0-9][.][0-1][1-9][.][0-9][0-9][0-9][0-9]/', $creditCardExpiry);
    $is_monthlySalary = preg_match('/(UZS )[0-9]*[,][0-9]{3} *[.][0-9]{2,}/', $monthlySalary);
    $is_webUrl = preg_match('/^http:\/\/[a-z0-9]*\.[a-z]{2,3}$/', $webUrl);
    $is_overallGPA = preg_match('/[0-4]*[.][0-9]/', $overallGPA);

    $isValid = $is_name and $is_email and $is_username and $is_password and $is_confPassword and $is_birthDate and $is_gender and $is_maritalStatus and $is_address and $is_city and $is_postalCode and $is_homePhone and $is_mobilePhone and $is_creditCardNum and $is_creditCardExpiry and $is_monthlySalary and $is_webUrl and $is_overallGPA;
    if ($isValid) {
        header("Location: Thanks.html", TRUE, 500);
    }
}
?>
		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
        <form action="index.php" method="POST">
		<dl>
			<dt>Name</dt>
			<dd>
                <input type="text" name="name" value="<?= $name ?>">
			</dd>
            <dd class="<?= $is_name ? '' : 'not' ?>valid">
                This field is required. It has to contain at least 2 chars. It should not contain any number.
            </dd>

            <dt>Email</dt>
            <dd>
                <input type="text" name="email" value="<?= $email ?>">
            </dd>
            <dd class="<?= $is_email ? '' : 'not' ?>valid">
                This field is required. It should correspond to email format.
            </dd>

            <dt>Username</dt>
            <dd>
                <input type="text" name="username" value="<?= $username ?>">
            </dd>
            <dd class="<?= $is_username ? '' : 'not' ?>valid">
                This field is required. It has to contain at least 5 chars.
            </dd>

            <dt>Password</dt>
            <dd>
                <input type="password" name="password" value="<?= $password ?>">
            </dd>
            <dd class="<?= $is_password ? '' : 'not' ?>valid">
                This field is required. It has to contain at least 8 chars.
            </dd>

            <dt>Confirm Password</dt>
            <dd>
                <input type="password" name="confPassword" value="<?= $confPassword ?>">
            </dd>
            <dd class="<?= $is_password ? '' : 'not' ?>valid">
                This field is required. It has to be equal to Password field.
            </dd>

            <dt>Date of Birth</dt>
            <dd>
                <input type="text" name="birthDate" value="<?= $birthDate ?>">
            </dd>
            <dd class="<?= $is_birthDate ? '' : 'not' ?>valid">
                Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
            </dd>

            <dt>Gender</dt>
            <dd>
                <input type="text" name="gender" value="<?= $gender ?>">
            </dd>
            <dd class="<?= $is_gender ? '' : 'not' ?>valid">
                Only 2 options accepted: Male, Female.
            </dd>

            <dt>Marital Status</dt>
            <dd>
                <input type="text" name="maritalStatus" value="<?= $maritalStatus ?>">
            </dd>
            <dd class="<?= $is_maritalStatus ? '' : 'not' ?>valid">
                Only 4 options accepted: Single, Married, Divorced, Widowed.
            </dd>

            <dt>Address</dt>
            <dd>
                <input type="text" name="address" value="<?= $address ?>">
            </dd>
            <dd class="<?= $is_address ? '' : 'not' ?>valid">
                This is required field.
            </dd>

            <dt>City</dt>
            <dd>
                <input type="text" name="city" value="<?= $city ?>">
            </dd>
            <dd class="<?= $is_city ? '' : 'not' ?>valid">
                This is required field.
            </dd>

            <dt>Postal Code</dt>
            <dd>
                <input type="text" name="postalCode" value="<?= $postalCode ?>">
            </dd>
            <dd class="<?= $is_postalCode ? '' : 'not' ?>valid">
                This is required field. It should follow 6 digit format. For ex, 100011
            </dd>

            <dt>Home Phone</dt>
            <dd>
                <input type="text" name="homePhone" value="<?= $homePhone ?>">
            </dd>
            <dd class="<?= $is_homePhone ? '' : 'not' ?>valid">
                This is required field. It should follow 9 digit format. For ex, 97 1234567
            </dd>

            <dt>Mobile Phone</dt>
            <dd>
                <input type="text" name="mobilePhone" value="<?= $mobilePhone ?>">
            </dd>
            <dd class="<?= $is_mobilePhone ? '' : 'not' ?>valid">
                This is required field. It should follow 9 digit format. For ex, 97 1234567
            </dd>

            <dt>Credit Card Number</dt>
            <dd>
                <input type="text" name="creditCardNum" value="<?= $creditCardNum ?>">
            </dd>
            <dd class="<?= $is_creditCardNum ? '' : 'not' ?>valid">
                This is required field. It should follow 16 digit format. For ex, 1234 1234 1234 1234
            </dd>

            <dt>Credit Card Expiry Date</dt>
            <dd>
                <input type="text" name="creditCardExpiry" value="<?= $creditCardExpiry ?>">
            </dd>
            <dd class="<?= $is_creditCardExpiry ? '' : 'not' ?>valid">
                This is required field. Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
            </dd>

            <dt>Monthly Salary</dt>
            <dd>
                <input type="text" name="monthlySalary" value="<?= $monthlySalary ?>">
            </dd>
            <dd class="<?= $is_monthlySalary ? '' : 'not' ?>valid">
                This is required field. It should be written in following format UZS 200,000.00
            </dd>

            <dt>Web Site URL</dt>
            <dd>
                <input type="text" name="webUrl" value="<?= $webUrl ?>">
            </dd>
            <dd class="<?= $is_webUrl ? '' : 'not' ?>valid">
                This is required field. It should match URL format. For ex, http://github.com
            </dd>

            <dt>Overall GPA</dt>
            <dd>
                <input type="text" name="overallGPA" value="<?= $overallGPA ?>">
            </dd>
            <dd class="<?= $is_overallGPA ? '' : 'not' ?>valid">
                This is required field. It should be a floating point number less than 4.5
            </dd>

		</dl>
		
		<div>
			<input type="submit" value="Register">
		</div>
	</body>
</html>
