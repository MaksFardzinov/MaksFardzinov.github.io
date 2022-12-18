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
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="list.css">
    <title>list</title>
</head>
<body class="head_container">
    <div class="container1 nav">
        <div><a href="index.php" class="catalog nav_text">Назад на главную</a></div>
    </div>
    <h2>Редактирование</h2>
    <form action="" method="post" enctype="multipart/form-data">
    		<div class="forms">
    			<label>Название</label>
    			<input type="text" name="name" value="<?php echo $r['name'];?>">
    		</div>
    		<div class="forms">
    			<label>Описание</label>
    			<textarea name="description" rows="7"><?php echo $r['description'];?></textarea>
    		</div>
    		<div class="forms">
    			<label>Цена</label>
    			<input type="text" name="price" value="<?php echo $r['price'];?>">
    		</div>
    		<div class="forms">
    			<label>Фото</label>
    			<input type="file" name="photo">
    		</div>
    		<div class="forms text-center">
    			<a class="btn" href="list.php">Отмена</a>
    			<button class="btn" type="submit">изменить</button>
    			<input type="hidden" name="action" value="update">
    		</div>
    	</form>
    	<?php
    	    if(isset($_POST['action'])) {
    	        $id = $r['id'];
                $namef=$_POST['name'];
                $descriptionf=$_POST['description'];
                $photo='';
                $name = $conn->real_escape_string($namef);
                $description = $conn->real_escape_string($descriptionf);
                $price = (int) $_POST['price'];
                if (array_key_exists('photo',$_FILES) && $_FILES['photo']['error'] == 0) {
                            $photo = $_FILES['photo']['name'];
                            move_uploaded_file($_FILES['photo']['tmp_name'],$_FILES['photo']['name']);
                        }
                $conn->query('UPDATE info SET name="'.$name.'", description="'.$description.'", price="'.$price.'", photo="'.$photo.'" WHERE id="'.$id.'"');
                header('Location: list.php');
            }
            ?>

    	<footer class="container6">
            <div><a class="catalog_footer nav_text" href="">Каталог</a></div>
            <div><a class="delivery_and_paid_footer nav_text navv_text" href="">Доставка и оплата</a></div>
            <div><a class="reviews_footer nav_text" href="">Отзывы</a></div>
            <div><a class="special_offers_footer nav_text" href="">Спецпредложения</a></div>
            <div><a class="contacts_footer nav_text" href="">Контакты</a></div>
        </footer>
<body>

</body>
</html>