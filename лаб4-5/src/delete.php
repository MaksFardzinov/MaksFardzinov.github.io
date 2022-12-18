<?php
	include 'config.php';
	$r = $_GET['id'];
    $query =$conn->query('SELECT * FROM info WHERE id="'.$r.'"');
    if ($query->num_rows > 0) {
          $r = $query->fetch_assoc();
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>delete</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="list.css">
</head>
<body class="head_container">
    <div class="container1 nav">
        <div><a href="index.php" class="catalog nav_text">Назад на главную</a></div>
    </div>
    <h2>удаление букета</h2>
    <h2>
    <?php
     echo $r["name"];
    ?>
    </h2>
    <form action="" method="post">
    		<div class="form-group text-center">
    			<a class="btn" href="list.php">Отмена</a>
    			<button class="btn" type="submit">Удалить</button>
    		</div>
    		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    		<input type="hidden" name="action" value="delete">
    </form>
    <?php
        if(isset($_POST['action'])) {
            $result = (int) $_POST['id'];
            $conn->query('DELETE FROM info WHERE id="'.$result.'"');
            header('Location: list.php');
        }
        ?>
</body>
</html>