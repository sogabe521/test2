<?php

$name = $_POST['name'];
$mail = $_POST['mail'];
$naiyo = $_POST['naiyo'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>確認</title>
</head>
<body>
	<form action="send.php" method="post">
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
        <p>入力内容はこちらでよろしいでしょうか？</p>
        <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
        <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
        <input type="hidden" name="naiyo" value="<?php echo $_POST['naiyo']; ?>">
        <input type="submit" name="send" value="送信">
        
        <input type="hidden" name="send" value="$name">
        <input type="hidden" name="send" value="$mail">
        <input type="hidden" name="send" value="$naiyo">
	</form>
    
	<form action="index.php" method="post">
        <input type="submit" name="back" value="戻る">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="mail" value="<?php echo $mail; ?>">
        <input type="hidden" name="naiyo" value="<?php echo $naiyo; ?>">
    </form>
</body>
</html>