<?php
  include_once("../Resources/login_header.php");
  include_once("../Resources/login_action.php");
  include_once("../Resources/cart_add.php");
  include_once("../Resources/catagory_add.php");
  include_once("../Resources/item_add.php");
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
                <?php
                    if ($_POST['Create'] == 'OK' && $_POST['user'] && $_POST['passwd']) {
                        ft_register($_POST['user'], $_POST['passwd'], '..');
                        $_SESSION['user'] = 'admin'; //since register logs on too this undoes that :P
                    }
                    else if ($_POST['DeleteUser'] == 'OK' && $_POST['user'] != 'admin') {
                        ft_delete_user($_POST['user'], '..');
                        remove_cart($_POST['user']);
                    }
                    else if ($_POST['Modify'] == 'OK' && $_POST['user'] && $_POST['passwd']) {
                        ft_delete_user($_POST['user'], '..');
                        ft_register($_POST['user'], $_POST['passwd'], '..');
                        $_SESSION['user'] = 'admin'; //since register logs on too this undoes that :P
                    }
                    else if ($_POST['DeleteCart'] == 'OK' && $_POST['user'])
                        remove_cart($_POST['user']);
                ?>
            </div>
            <div class="user-list">
            <?php
            $user_data = unserialize(file_get_contents("../Resources/database/users"));
            foreach ($user_data as $set){
                echo '<p>' . $set['user'] . '</p><hr style="margin-bottom: 0px; margin-top: 0px">';
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
                <?php
                    if ($_POST['Modify'] == 'OK' && $_POST['Itemname']) {
                        mod_item($_POST['Itemname'], $_POST['Catagory'], $_POST['Description'], $_POST['imgsrc'], $_POST['Price']);
                    }    
                    else if ($_POST['Delete'] == 'OK' && $_POST['Itemname']) {
                        remove_item($_POST['Itemname']);
                    }
                    else if ($_POST['Create'] == 'OK' && $_POST['Itemname'] && $_POST['Catagory']
                    && $_POST['Description'] && $_POST['imgsrc'] && $_POST['Price']) {
                        add_item($_POST['Itemname'], $_POST['Catagory'], $_POST['Description'], $_POST['imgsrc'], $_POST['Price']);
                    }
                ?>
            </div>
            <div class="itemlist">
            <?php
            $user_data = unserialize(file_get_contents("../Resources/database/items"));
            foreach ($user_data['item'] as $set){
                printf("%s / %s / %s / %s <br/>Catagories: ", $set['name'], $set['desc'], $set['img'], $set['price']);
                foreach($set['cata'] as $cats)
                    echo $cats . " ";
                echo '<br/>';
            }
            ?>
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
                <?php
                if ($_POST['Create'] == 'OK' && $_POST['Catagory']) {
                        add_catagory($_POST['Catagory']);
                    }    
                    else if ($_POST['Del'] == 'OK' && $_POST['Catagory']) {
                        rm_catagory($_POST['Catagory']);
                    }
                ?>
            </div>
            <div class="catagorylist">
            <?php
            $user_data = unserialize(file_get_contents("../Resources/database/items"));
            list_catagory();
            ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
        