<?php
	function open_db()
	{
		$db = new SQLiteDatabase("labels.db");
		$q = $db->query('PRAGMA table_info(product)');
		if ($q->numRows() == 0) {
		   $db->query('create table product(
				   id integer primary key,
				   title varchar(255),
				   subtitle varchar(255),
				   url varchar(255),
				   sku varchar(32))');
		}
		return $db;
	}

$db = open_db();
$id = $_GET['id'];
if ($id == '') {
    $id = -1;
} else {
    $q = $db->query('select title,subtitle,url,sku from product where id='.$id);
    if ($q->numRows() != 0) {
        $title = $q->column('title');
        $subtitle = $q->column('subtitle');
        $url = $q->column('url');
        $sku = $q->column('sku');
    }

}
?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>LabelMaker</title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
		<meta http-equiv="Content-Script-Type" content="text/javascript" >
		<meta http-equiv="Content-Style-Type" content="text/css" >
		<link rel="stylesheet" type="text/css" href="css/ops.css" >
	</head>
	<body>
	        <div id="formblock">
		  <form method="GET" action="labels.php">
		    <select name="id" id="id">
<?php
$q = $db->query('select id,title from product');
$n = $q->numRows();
print $n;
while($n > 0) {
  print $n;
  print '<option value="'.$q->column('id').'">'.$q->column('title').'</option>';
  $q->next();
  $n = $n-1;
}

?>
		    </select>
		  <input type="submit" name="button" value="Load fields"/>
		  </form>
		</div>
		<div id="formblock">
		<form method="POST" action="labelmaker.php">
			<input type="hidden" name="id" id="id" value="<?= $id ?>"/>
			<label for="title">Title of product:</label>
			<input type="text" name="title" id="title" value="<?= $title ?>"></input><br/>
			<label for="subtitle">Subtitle of product:</label>
			<input type="text" name="subtitle" id="subtitle" value="<?= $subtitle ?>"></input><br/>
			<label for="url">Short URL of instructions:</label>
			<input type="text" name="url" id="url" value="<?= $url ?>"></input><br/>
			<label for="sku">SKU:</small>include "MB" for our products</small></label>
			<input type="text" name="sku" id="sku" value="<?= $sku ?>"></input><br/>
			<label for="debug">Generate debug label:</label><input type="checkbox" name="debug" id="debug" value="true"></input><br/>

			<input type="submit" name="button" value="Generate label"/>
		</form>
		</div>
	</body>
</html>
