<!DOCTYPE html>
<html>
<body>

<form action="index.php" method="post">
<input type="text" name="name"><br>
<input type="submit">
</form>

<?php
$command = escapeshellcmd('python make.py ' . $_POST[name]);
$output = shell_exec($command);
$arry = explode("\n", $output);

$fp = fopen('text', 'a') or die("Unable to open file!");
if($arry[0] == "make"){
	fwrite($fp,"\n");
	for($i=1; $i<count($arry); $i++){
		fwrite($fp, $arry[$i] . " ");
	}
} else if ($arry[0] == "print"){
	$command = escapeshellcmd('python print.py');
	$output = shell_exec($command);
	$arry = explode("\n", $output);
	for($i=1; $i<count($arry); $i++){
                echo($arry[$i]);
        }

} else if ($arry[0] == "clear"){
        ftruncate($fp, 0);
}
?>

</body>
</html>
