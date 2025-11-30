<?php
function safe($str) { return htmlspecialchars(trim($str)); }
$name = safe($_POST['name'] ?? '');
$email = safe($_POST['email'] ?? '');
$phone = safe($_POST['phone'] ?? '');
$course = safe($_POST['course'] ?? '');
$gender = safe($_POST['gender'] ?? '');
$dob = safe($_POST['dob'] ?? '');
$address = safe($_POST['address'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submitted Details</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="result-output">
    <h1>Application Submitted Successfully!</h1>
    <table>
      <tr><th>Name</th><td><?= $name ?></td></tr>
      <tr><th>Email</th><td><?= $email ?></td></tr>
      <tr><th>Phone</th><td><?= $phone ?></td></tr>
      <tr><th>Course</th><td><?= $course ?></td></tr>
      <tr><th>Gender</th><td><?= $gender ?></td></tr>
      <tr><th>Date of Birth</th><td><?= $dob ?></td></tr>
      <tr><th>Address</th><td><?= nl2br($address) ?></td></tr>
    </table>
    <div style="text-align:center; margin-top:22px;">
      <a href="index.html"><button>Submit Another Response</button></a>
    </div>
  </div>
</body>
</html>
