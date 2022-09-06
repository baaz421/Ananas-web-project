<?php 
if(!empty($_POST['path'])){
	if(unlink($_POST['path'])){
		echo "image deleted";
	}
}

?>