<?php
  include("../Resources/login_header.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../Resources/css/style.css">
</head>
<body>
<div class="navbar">
<?php
$error = logincheck('..');
if($_SESSION['user'] !== 'admin'){
    header("Location: ../index.php");
}
?>
</div>
<div class="adminbody" style="padding-top: 50px">
    <div class="form">
        <div class="form-section">
            <div class="section-header">
                <p align="center">Users</p>
            </div>
            <div class="section-form">
                <form method="POST" class="Users">
                    <input type="text" placeholder="Username" name="user">
                    <input type="password" placeholder="Password" name="passwd">
                    <button type="submit" name="Create" value="OK">Create User</button>
                    <button type="submit" name="DeleteUser" value="OK">Delete User</button>
                    <button type="submit" name="Modify" value="OK">Modify Password</button>
                    <button type="submit" name="DeleteCart" value="OK">Delete Cart</button>
                    
                </form>
            </div>
            <div class="user-list">
            <?php
            $user_data = unserialize(file_get_contents("../Resources/database/users"));
            foreach ($user_data as $set){
                echo '<p>' . $set['user'] . '</p>';
                //echo"<p>an entry</p>";
            }
            ?>
            </div>
        </div>
        <div class="form-section">
            <div class="section-header">
            <p align="center">Items</p>
            </div>
            <div class="section-form">
                <form method="POST" class="Items">
                    <input type="text" placeholder="Itemname" name="Itemname">
                    <input type="text" placeholder="Catagory" name="Catagory">
                    <input type="text" placeholder="Description" name="Description">
                    <input type="text" placeholder="IMG.SRC" name="imgsrc">
                    <input type="text" placeholder="Price" name="Price">
                    <button type="submit" name="Modify" value="OK">Modify</button>
                    <button type="submit" name="Delete" value="OK">Delete</button>
                    <button type="submit" name="Create" value="OK">Create</button>
                </form>
            </div>
            <div class="Itemlist">
            <!-- I will put a loop in here which iterates over the database and lists all the current objects -->
            </div>
        </div>
        <div class="form-section">
            <div class="section-header">
            <p align="center">Catagories</p>
            </div>
            <div class="section-form">
                <form method="POST" class="Catagory">
                    <input type="text" placeholder="Catagory name" name="Catagory">
                    <button type="submit" name="Create" value="OK">Create</button>
                    <button type="submit" name="Del" value="OK">Delete</button>
                </form>
            </div>
            <div class="Catagorylist">
            <!-- I will put a loop in here which iterates over the database and lists all the current objects -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
        