<!DOCTYPE html>
<html>
<head>
<style>
form{
	display: inline;
}
</style>
</head>
<body>

<form method="post">
<input type="submit" name="button" value="clear"/>
</form>

<form method="post">
<input type="text" name="text"/>
</form>

<?php
$arry = explode("\n", $_POST[text]);

$fp = fopen('text', 'a') or die("Unable to open file!");

if($_POST[button] == "clear"){
	ftruncate($fp,0);
}

for($i=0; $i<count($arry); $i++)
	if($arry[$i] != "")fwrite($fp, $arry[$i] . "\n");

$command = escapeshellcmd('python print.py');
$output = shell_exec($command);
$arry = explode("\n", $output);
$arry = array_reverse($arry);
for($i=1; $i<count($arry); $i++)
        echo($arry[$i] . "<br />");
?>

</body>
</html>
