<?php
	include 'config.php';
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
        <div><a href="create.php" class="catalog nav_text">Добавить новый букет</a></div>
        <div><a href="index.php" class="catalog nav_text">Назад на главеую</a></div>
    </div>
    <?php
        $info = $conn->query('SELECT * FROM info');
        if($info->num_rows > 0){
            $result =array();
            while ($row = $info->fetch_assoc()) {
            	$result[] = $row;
            }
        }
    if ($result){ ?>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Изображение</th>
				<th>Название</th>
				<th>Описание</th>
				<th>Цена</th>
				<th width="1"></th>
			</tr>
		</thead>
		<tbody>
		    <?php
		        foreach ($result as $bd) {
		                            $img = '<img class="preview" src="'.$bd['photo'].'">';
                					echo '
                						<tr>
                							<td>'.$bd['id'].'</td>
                							<td>'.$img.'</td>
                							<td class="nowrap"><a href="index.php?id='.$bd['id'].'" target="_blank">'.$bd['name'].'</a></td>
                							<td>'.$bd['description'].'</td>
                							<td class="nowrap">'.$bd['price'].' руб.</td>
                							<td class="nowrap">
                								<a class="btn" href="update.php?id='.$bd['id'].'">Редактировать</a>
                								<a class="btn" href="delete.php?id='.$bd['id'].'">Удалить</a>
                							</td>
                						</tr>
                					';
                				}
                			?>
                		</tbody>
                	</table>
                	<?php } ?>
    <footer class="container6">
        <div><a class="catalog_footer nav_text" href="">Каталог</a></div>
        <div><a class="delivery_and_paid_footer nav_text navv_text" href="">Доставка и оплата</a></div>
        <div><a class="reviews_footer nav_text" href="">Отзывы</a></div>
        <div><a class="special_offers_footer nav_text" href="">Спецпредложения</a></div>
        <div><a class="contacts_footer nav_text" href="">Контакты</a></div>
    </footer>
</body>
</html>