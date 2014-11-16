<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content=10; URL=.>
<link rel="stylesheet" type="text/css" href="basic.css">
</head>
<body>
<div id="page">
	<h1>
		SnapText
	</h1>
	<h5>
		What is on your mind?
		You also have the power of clearing everyone's messages.
	</h5>
	<div id="fillin">
		<form method="post">
			<input type="submit" name="button" value="clear"/>
		</form>
		<form method="post">
			<input type="text" name="text"autofocus/>
		</form>
	</div>
	<div id="replys">
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
			
			for($i=2; $i<count($arry); $i++){
				if($i%2 == 1) $comment = "comment1";
				else $comment = "comment2";
        			echo('<div class="' . $comment .'">' . $arry[$i] . "<br/></div>");
			}
		?>
	</div>
</div>
</body>
</html>
