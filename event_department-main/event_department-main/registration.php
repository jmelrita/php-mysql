<?php
include ("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body style="text-align: center;">
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $role = $_POST['role'];

        $sql = "SELECT * FROM regis WHERE username='$username'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "User already exist.";
        } else {
            if ($password == $confirmPassword) {
                $sql = "INSERT INTO regis (`userName`, `password`, `confirmPassword`, `role`) VALUES ($username,'" . $password . "','" . $confirmPassword . "', '" . $role . "') ";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header("location: login.php");
                    //echo "Register Success";
                } else {
                    echo "Register Failed";
                }
            } else {
                echo "Password do not match.";
            }
        }
    }
    ?>
    </br>
    <a href="login.php">BACK</a>
    <h1>Registration</h1>
    <form method="POST" action="registration.php">
        <label>Username:</label>
        </br>
        <input type="number" name="username" />
        </br></br>
        <label>Password:</label>
        </br>
        <input type="password" name="password" />
        </br></br>
        <label>Confirm Password:</label>
        </br>
        <input type="password" name="confirmPassword" />
        </br></br>
        <label>Role:</label>
        </br>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="student">Student</option>
            <option value="tournamentManager">Tournament Manager</option>
            <option value="coach">Coach</option>
            <option value="dean">Dean</option>
        </select>
        </br></br>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
</body>

</html>