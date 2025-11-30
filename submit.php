<?php
function safe($str) { return htmlspecialchars(trim($str)); }

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // If someone navigates via GET, show a simple message (optional)
    http_response_code(405);
    echo "Method Not Allowed. Use POST to submit the form.";
    exit;
}

$name = safe($_POST['name'] ?? '');
$email = safe($_POST['email'] ?? '');
$phone = safe($_POST['phone'] ?? '');
$course = safe($_POST['course'] ?? '');
$gender = safe($_POST['gender'] ?? '');
$dob = safe($_POST['dob'] ?? '');
$address = safe($_POST['address'] ?? '');

// basic validation (server-side)
$errors = [];
if (!$name) $errors[] = 'Name required';
if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required';
if (!$phone) $errors[] = 'Phone required';
if (!$course) $errors[] = 'Course required';
if (!$gender) $errors[] = 'Gender required';
if (!$dob) $errors[] = 'Date of birth required';
if (!$address) $errors[] = 'Address required';

if (!empty($errors)) {
    http_response_code(422);
    // show errors; you can format this nicely in HTML
    echo "<h2>Submission errors:</h2><ul>";
    foreach ($errors as $err) {
        echo "<li>" . htmlspecialchars($err) . "</li>";
    }
    echo "</ul><p><a href='index.html'>Back</a></p>";
    exit;
}
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
