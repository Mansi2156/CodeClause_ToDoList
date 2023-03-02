<?php 
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <br><h1 class="top-heading">TO DO LIST APPLICATION</h1><br><br><br>
    <div class="container">
        <form action="handleActions.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox">
                <button type="submit" name="add" id="add">ADD</button>
            </div>
            <ul class="list">
                <?php 
                    $itemList = get_items();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item fade">
                    <p><span><?php echo $row["item"]; ?></span></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i class="fas fa-sharp fa-solid fa-circle-check"></i></button>
                        <button type="submit" name="remove" id="delete" value="<?php echo $row["id"]; ?>"><i class="fas fa-solid fa-trash"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <hr>
            <ul class="list">
                <?php 
                    $itemList = get_items_checked();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item fade">
                    <p class="deleted-text"><span><?php echo $row["item"]; ?></span></p>
                    <div class="icon-container">
                        <button type="submit" name="" id="check"><i class="fas fa-sharp fa-solid fa-circle-check hidden"></i></button>
                        <button type="submit" name="remove" id="delete" value="<?php echo $row["id"]; ?>"><i class="fas fa-solid fa-trash"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/fc9d298e81.js" crossorigin="anonymous"></script>
</body>
</html>