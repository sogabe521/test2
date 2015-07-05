<?php

require_once('config.php');
require_once('functions.php');

	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$naiyo = $_POST['naiyo'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>入力</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<h1>掲示板</h1>
	<form action="check.php" method="post">
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
        <input type="submit" name="send" value="送信">
    </form>
    
<hr>

<h2>投稿一覧</h2>

<hr>

<?php


$dbh = connectDb();

$toiawaseH = array();

$sql = "select * from toiawase where status = 'active' order by created desc";

foreach ($dbh->query($sql) as $row) {
	array_push($toiawaseH, $row);
}

?>


<?php foreach ($toiawaseH as $toiawase1) : ?>
<p id="entry_<?php echo h($toiawase1['id']); ?>">
名前 : <?php echo h($toiawase1['name']); ?><br>
メール : <?php echo h($toiawase1['mail']); ?><br><br>
<?php echo h($toiawase1['naiyo']); ?><br><br>
<a href="edit.php?id=<?php echo h($toiawase1['id']); ?>">[編集]</a>
<span class="deleteLink" data-id="<?php echo h($toiawase1['id']); ?>">[削除]</span>
</p>
<hr>
<?php endforeach; ?>



<style>
.deleteLink {
	color: blue;
	cursor: pointer;
}
</style>

<script>
$(function() {
	$('.deleteLink').click(function() {
			if (confirm("削除してもよろしいですか？")) {
				$.post('delete.php', {
					id: $(this).data('id')
				}, function(rs) {
					$('#entry_' + rs).fadeOut(800);
					});
				}
		});
});
</script>

</body>
</html>