<?php

$name = $_POST['name'];
$mail = $_POST['mail'];
$naiyo = $_POST['naiyo'];



require_once('config.php');
require_once('functions.php');


if (isset($_POST["name"])) {
	
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$naiyo = $_POST['naiyo'];

        //DBに格納
		$dbh = connectDb();
		
		$sql = "insert into toiawase
		        (name, mail, naiyo, created, modified)
				values
		        (:name, :mail, :naiyo, now(), now())";
		$stmt = $dbh->prepare($sql);
		$params = array(
		    ":name" => $name,
			":mail" => $mail,
			":naiyo" => $naiyo
		);
		$stmt->execute($params);
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>完了</title>
</head>
<body>
		<table border="1">
        	<tr>
            <th>名前</th>
            <td>
            	<?php echo $name; ?>
            </td>
            </tr>
        	<tr>
            <th>メールアドレス</th>
            <td>
            	<?php echo $mail; ?>
            </td>
            </tr>
        	<tr>
            <th>内容</th>
            <td>
            	<?php echo $naiyo ?>
            </td>
            </tr>
		</table>
	<p>送信しました</p>
    <p><a href="index.php">戻る</a></p>
</body>
</html>