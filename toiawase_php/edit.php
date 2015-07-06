<?php

require_once('config.php');
require_once('functions.php');


$dbh = connectDb();

if (preg_match('/^[1-9][0-9]*$/', $_GET['id'])) {
	$id = (int)$_GET['id'];
} else {
	echo "不正なIDです";
	exit;
}

$stmt = $dbh->prepare("select * from toiawase where id = :id limit 1");
$stmt->execute(array(":id" => $id));
$entry = $stmt->fetch() or die("no one found!");
$name = $entry['name'];
$mail = $entry['mail'];
$naiyo = $entry['naiyo'];

$sql = "update toiawase set
		name = :name,
		mail = :mail,
		naiyo = :naiyo,
		modified = now()
		where id = :id";
$stmt = $dbh->prepare($sql);
$params = array(
	":name" => $name,
	":mail" => $mail,
	":naiyo" => $naiyo,
	":id" => $id
);
$stmt->execute($params);


if(isset($_POST['submit'])) {
header('Location: '.ADMIN_URL);
exit;
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>編集</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<h1>データの編集</h1>
	<form action="" method="post">
    	<table border="1">
        	<tr>
            <th>名前</th>
            <td>
            	<input type="text" name="name" value="<?php echo h($name); ?>">
            </td>
            </tr>
        	<tr>
            <th>メールアドレス</th>
            <td>
            	<input type="mail" name="mail" value="<?php echo h($mail); ?>">
            </td>
            </tr>
        	<tr>
            <th>内容</th>
            <td>
            	<textarea name="naiyo" rows="5" cols="30"><?php echo h($naiyo); ?></textarea>
            </td>
            </tr>
		</table>
        <input type="submit" name="submit" value="更新">
    </form>
<p><a href="<?php echo ADMIN_URL; ?>">戻る</a></p>






</body>
</html>