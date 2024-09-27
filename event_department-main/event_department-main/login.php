<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body style="text-align:center;">
    <?php
    include ("dbcon.php");

    if (isset($_SESSION['currentUser'])) {
        header("location: menu.php");
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $sql = "SELECT * FROM regis WHERE userName='$username' AND role='$role'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) > 0) {

            if ($row['userName'] == $username && $password == $row["password"]) {
                $_SESSION['currentUser'] = $username;
                $_SESSION['role'] = $role;
                header("location: menu.php");
                //echo "login successfuly";
            } else {
                echo "Invalid Username or Password.";
            }


        } else {
            echo "Account does'nt exist or Role does'nt match.";
        }

    }
    ?>
    <h1>LOGIN</h1>
    <form method="POST" action="login.php">
        <label>Username:</label>
        </br>
        <input type="text" name="username" />
        </br></br>
        <label>Password:</label>
        </br>
        <input type="password" name="password" />
        </br></br>
        <label>Role:</label>
        </br>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="student">Student</option>
            <option value="coach">Coach</option>
            <option value="tournamentManager">Tournament Manager</option>
            <option value="dean">Dean</option>
        </select>
        </br></br>
        <button type="submit" name="login">LOGIN</button>
    </form>
    <p>Don't have an account yet? <a href="registration.php">Sign Up</a></p>
</body>

</html>