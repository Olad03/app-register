<?php
require('db.php'); // Include the database connection file

if (isset($_POST['username'])) {

    $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
    $email    = mysqli_real_escape_string($con, stripslashes($_POST['email']));
    $phone    = mysqli_real_escape_string($con, stripslashes($_POST['phone']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));

    $trn_date = date("Y-m-d H:i:s");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, phone, password, trn_date)
              VALUES ('$username', '$email', '$phone', '$hashed_password', '$trn_date')";

    $result = mysqli_query($con, $query);

    if ($result) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Registration Successful</title>
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
            <style>
                body {
                    margin: 0;
                    min-height: 100vh;
                    background: linear-gradient(135deg, #0c1445, #2b0b3f);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: 'Inter', sans-serif;
                }
                .success-box {
                    background: #0b1d4a;
                    padding: 50px;
                    border-radius: 14px;
                    color: #fff;
                    width: 100%;
                    max-width: 600px;
                    box-shadow: 0 40px 100px rgba(0,0,0,.55);
                }
                h2 {
                    text-align: center;
                    margin-bottom: 30px;
                }
                .detail {
                    margin-bottom: 15px;
                    font-size: 15px;
                }
                .detail span {
                    opacity: .75;
                }
                a {
                    display: block;
                    margin-top: 30px;
                    text-align: center;
                    color: #9fa8ff;
                    text-decoration: none;
                    font-weight: 600;
                }
            </style>
        </head>
        <body>

        <div class="success-box">
            <h2>Registration Successful 🎉</h2>

            <div class="detail"><span>Name:</span> <?php echo htmlspecialchars($username); ?></div>
            <div class="detail"><span>Email:</span> <?php echo htmlspecialchars($email); ?></div>
            <div class="detail"><span>Phone:</span> <?php echo htmlspecialchars($phone); ?></div>
            <div class="detail"><span>Registered On:</span> <?php echo $trn_date; ?></div>

            <a href="login.php">Proceed to Login</a>
        </div>

        </body>
        </html>
        <?php
        exit;
    } else {
        echo "<div style='color:#fff;text-align:center;font-family:Inter'>
                <h2>Error registering user.</h2>
                <p><a href='register.php' style='color:#ff9f9f'>Try again</a></p>
              </div>";
    }

} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BluDive Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #0c1445, #2b0b3f);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Inter', sans-serif;
}

.form-shell {
    width: 100%;
    max-width: 920px;
    background: #0b1d4a;
    border-radius: 14px;
    padding: 60px;
    color: #ffffff;
    box-shadow: 0 40px 100px rgba(0,0,0,.55);
}

/* (rest of your existing CSS unchanged) */
</style>
</head>

<body>

<div class="form-shell">

    <h1>BluDive Registration Application</h1>
    <p class="subtitle">Sample Registration App – Version 1.2</p>

    <form method="POST">

        <label>Your Name <span>*</span></label>
        <input type="text" name="username" required>

        <label>Email Address <span>*</span></label>
        <input type="email" name="email" required>

        <label>Phone Number <span>*</span></label>
        <div class="phone-row">
            <select disabled>
                <option selected>+234</option>
            </select>
            <input type="tel" name="phone" required>
        </div>

        <label>Password <span>*</span></label>
        <input type="password" name="password" required>

        <button type="submit" class="submit">Submit Registration</button>

    </form>

</div>

</body>
</html>

<?php } ?>

