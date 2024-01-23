<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>hello</p>

    <?php
    if (isset($_POST['email']) && $_POST['email'] !== ''){
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email = $_POST['email'];
            } else {
                $errors[] = "Email address is invalid.";
            }
        } else {
            $errors[] = "Email address is missing!";
        }
    ?>

    <?php
    if (isset($_POST['email']) && $_POST['email'] !== '') {
        $sanitizedEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
            $email = $sanitizedEmail;
        } else {
            $errors[] = "Email address is invalid.";
        }
    } else {
        $errors[] = "Email address is missing!";
    }
    ?>

</body>
</html>