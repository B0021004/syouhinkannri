<!DOCTYPE html>
<html>
<head>
    <title></title>
    
    <style>
    body {
        background-color:#808080;
    }
    </style>
    
    <meta charset="utf-8">
</head>
<body>
    <p>ようこそ！</p>
    <p><?php echo $UserName; ?>さん</p>
    <br></br>
    <?php
        foreach($result2 as $row){
            echo '<p>';
            echo $row["ProductName"];
            echo '  \\';
            echo $row["price"];
            echo '</p>';
        }
    ?>

    <table>
    <tr>
    <!-- Productsを5件ずつ戻す -->
    <form action="Select.php" method="get">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
        <input type="hidden" name="start" value="
    <?php
        if ($start <= 0){
            $next = 0;
        }
        else{
            $next = $start - 5;
        }
        echo $next;
    ?>
">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <input type="submit" name="submitBtn" value="前へ">
    </form>

    <!-- Productsを5件ずつ出す -->
    <form action="Select.php" method="get">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
        <input type="hidden" name="start" value="<?php echo $start + 5; ?>">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <input type="submit" name="submitBtn" value="次へ">
    </form>

    <!-- 新しくProductsに追加する -->
    <form action="Select.php" method="get">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
        <input type="hidden" name="start" value="<?php echo $start + 5; ?>">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <input type="submit" name="submitBtn" value="新規">
    </form>

    <!-- Productsを変更する -->
    <form action="Select.php" method="get">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
        <input type="hidden" name="start" value="<?php echo $start + 5; ?>">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <input type="submit" name="submitBtn" value="変更">
    </form>

    <!-- Productsを削除する -->
    <form action="Select.php" method="get">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">
        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
        <input type="hidden" name="start" value="<?php echo $start + 5; ?>">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <input type="submit" name="submitBtn" value="削除">
    </form>
    </table>
    </tr>

</body>
</html>
