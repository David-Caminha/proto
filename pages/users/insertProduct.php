<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
	$brands = getBrands();
	
	if($_POST['name'] && $_POST['price'] && $_POST['description'] && $_POST['stock'] && $_POST['technic_details'] && $_POST['brand'] && $_POST['tipo'])
	{
		switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
			$getID = getLastId();
			$id = $getID[0]['id'] + 1;
			$target_file = $BASE_DIR . "images/produtos/". $_FILES["fileToUpload"]["name"];
			
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$target_file2 = $BASE_DIR . "images/produtos/". $id . $imageFileType;
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					echo "<script type='text/javascript'>alert('File is not an image.');</script>";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file2)) {
				echo "<script type='text/javascript'>alert('Sorry, file already exists.');</script>";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "<script type='text/javascript'>alert('Sorry, your file is too large.');</script>";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
				echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.');</script>";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {
					newProduct($_SESSION['fornecedor'],$_POST['name'],$_POST['price'],$_POST['description'],$_POST['stock'],$_POST['technic_details'],$_POST['brand'],$_POST['tipo'], $target_file2);
					echo "<script type='text/javascript'>alert('Uploaded.');</script>";
				} else {
					echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
				}
			}
		 
			break;
		default:
			newProduct($_SESSION['fornecedor'],$_POST['name'],$_POST['price'],$_POST['description'],$_POST['stock'],$_POST['technic_details'],$_POST['brand'],$_POST['tipo'], 'images/produtos/default.png');
		}
	}
	else {
		echo "<script type='text/javascript'>alert('Preencha todos os campos por favor.');</script>";
		
	}
	
	$smarty->assign('brands', $brands);
	$smarty->display('users/insertProduct.tpl');