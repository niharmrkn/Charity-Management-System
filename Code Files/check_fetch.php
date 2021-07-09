<?php
	// Include the database configuration file
	$files1=scandir("uploaded_photos");
	$file2="C:\\xampp\\htdocs\\charity management system\\uploaded_photos\\";
	$file3="https://web.whatsapp.com/";
	
	for($a=2;$a<count($files1);$a++){
		echo($file2.$files1[$a]."</br>");
		?>
		<p>
			<a download="uploaded_photos/<?php echo $files1[$a] ?>" href="uploaded_photos/<?php echo $files1[$a] ?>"><?php echo $files1[$a] ?></a>
		</p>
		<?php	
	}