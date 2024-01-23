<?php
    session_start();
    $email = '';
    $comments = '';
    $maxSize = ini_get('upload_max_filesize');
    $errors = [];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $user = filter_input(INPUT_POST, 'username');
        $_SESSION['username'] = $user;

        $rememberMe = filter_input(INPUT_POST, 'remember');
        if ($rememberMe) {
            setcookie('username', $user, time() + 604800, '/');
        }

    }  elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Ensure the email is not empty
        if (isset($_POST['email']) && $_POST['email'] !== ''){
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email = $_POST['email'];
            } else {
                $errors[] = "Email address is invalid.";
            }
        } else {
            $errors[] = "Email address is missing!";
        }

        // Validate Comments
        $inputComments = filter_input(INPUT_POST, 'comments');
        if (isset($inputComments) && $inputComments !==''){
            $comments = $inputComments;
        } else {
            $errors[] = 'Comments are missing.';
        }

    if (isset($_FILES['uploadedFile']) && is_uploaded_file($_FILES['uploadedFile']['tmp_name'])) {
        $uploadedFile = $_FILES['uploadedFile']['tmp_name'];

        // Validate file type
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($fileInfo, $uploadedFile);
        $allowedTypes = ['image/png', 'image/jpeg', 'image/gif'];
        if (!in_array($mimeType, $allowedTypes)){
            $errors[]= 'The file you uploaded is not an accepted type (accepted: PNG, JPG, GIF).';
        }
        // Validate file size
        if ($_FILES['uploadedFile']['size'] > 2097152){
            $errors[] = "The file you uploaded is too big. Max size: $maxSize";
        }

        if(count($errors)===0){
            $uploadFolder = 'uploads/';
            $uniqueId = time() . uniqid(rand());
            $origName = pathinfo($_FILES['uploadedFile']['name'])['filename'];
            $ext = pathinfo($_FILES['uploadedFile']['name'])['extension'];
            $destFile = $uploadFolder . $origName . "_$uniqueId." . $ext;
            if (move_uploaded_file($uploadedFile, $destFile)){
                echo"<p>File Uploaded Successfully.</p>";
            } else {
                echo "<p>There was an error uploaded the file.</p>";
            }
        }
    }
    if (count($errors) === 0){
    printf('<p>Received email %s and comments %s</p>', $email, $comments);
    }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Forms</title>

    <style>
        .validation_message {
            font-size: small;
            font-style: italic;
            color: red;
            margin:0;
            display:none;
        }
        .validation_invalid {
            outline:1px solid red;
        }
    </style>

</head>
<body>
    <?php if(count($errors) > 0) {?>
        <div id="error_alert"
        style="display: block; background-color:#e3767d; border-radius: 5px; max-width: 500px; padding: 5px;">
        <?php
        foreach($errors as $error) {
            echo "<li>$error</li>";
        }
        ?>
        </div>
        <?php } ?>

    <h3>Contact us!</h3>
    <form enctype="multipart/form-data" id="contactForm" name="contact_form" method="POST" action="index.php">
        <label for="email" style="display: inline-block; width:100px;">Email</label>
        <Input type="email" id="email" name="email" value="<?=$email?>"><br><br>
        <p class="validation_message">Please enter a valid email address.</p>

        <label for="comments" style="display: inline-block; width:100px;">Comments</label>
        <textarea id="comments" name="comments"><?= $comments ?></textarea><br>
        <p class="validation_message">Please enter your query.</p>

        <label for="uploadedFile" style="display: inline-block; width:100px;">Attachment</label>
        <input type="file" name="uploadedFile" accept="image.png, image/jpeg, image/gif"> (Max Size: <?= $maxSize ?>)<br><br>
        <label style="display: inline-block; width:100px;"></label>
        <input type="submit" value="Send">
    </form>

        <?php
    if (isset($_SESSION['username'])) {
        printf('<h3>Welcome back, %s', $_SESSION['username']);
    } elseif (isset($_COOKIE['username'])){
        $_SESSION['username'] = $_COOKIE['username'];
        printf('<h3>Welcome back, %s', $_SESSION['username']);
    } else {
    ?>
    <form name="welcomeForm" method="post" action="index.php" style="margin-top: 20px;">
    <label for="username" style="display: inline-block; width: 100px;">Username</label>
    <input type="text" id="username" name="username" required>

    <label style="display:inline-block; width:100px;"></label>  
    <input type="checkbox" name="remember" value="remember">Remember me<br><br>
    <label style="display: inline-block; width: 100px;"></label>

    <input type="hidden" name="action" id="action" value="saveUser">
    <input type="submit" value="Save">
    </form>
    <?php } ?>


    <script>
 document.getElementById('contactForm').addEventListener('submit', validateForm);
 function validateForm(evt) {
 let contains_errors = false;
 // Reset validation
 messages = document.getElementsByClassName('validation_message');
 Array.from(messages).forEach((el) => {
 el.style.display = 'none';
 });
 invalid = document.getElementsByClassName('validation_invalid');
 Array.from(invalid).forEach((el) => {
 el.classList.remove('validation_invalid');
 });
 // Email
 const re = GET_FROM_GIST;
 const email = document.getElementById('email');
 if (email.value === '' || !re.test(email.value.toLowerCase())) {
 contains_errors = true;
 email.classList.add('validation_invalid');
 getNextSibling(email, '.validation_message').style.display = 'block';
 }
 // Query Type
 const selected = document.querySelectorAll('#reason option:checked');
 const values = Array.from(selected).map(el => el.value);
 if (values.length === 0) {
 contains_errors = true;
 const reason = document.getElementById('reason');
 reason.classList.add('validation_invalid');
 getNextSibling(reason, '.validation_message').style.display = 'block';
 }
 // Contact Method
 const checkboxes = document.querySelectorAll('input[type="checkbox"]');
 const checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
 if (!checkedOne) {
 contains_errors = true;
 for (checkbox of checkboxes) {
 checkbox.classList.add('validation_invalid');
 }
 getNextSibling(checkboxes[0], '.validation_message').style.display = 'block';
 }
 // Comments
 const comments = document.getElementById('comments');
 if (comments.value === '') {
 contains_errors = true;
 comments.classList.add('validation_invalid');
 getNextSibling(comments, '.validation_message').style.display = 'block';
 }
 if (contains_errors) {
 evt.preventDefault();
 }
 }
 const getNextSibling = function (elem, selector) {
 // Get the next sibling element
 var sibling = elem.nextElementSibling;
 // If there's no selector, return the first sibling
 if (!selector) return sibling;
 // If the sibling matches our selector, use it
 // If not, jump to the next sibling and continue the loop
 while (sibling) {
 if (sibling.matches(selector)) return sibling;
 sibling = sibling.nextElementSibling
 }
 };
</script>

</body>
</html>