<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
    $country = $_GET['cidade'];

    $cidades = cidadesPertencentes($country);
    $smarty->assign('cidades', $cidades);
?>

<select name="city">
<option>Select City</option>
<?php foreach($result as $row) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['nome']?></option>
<?php } ?>
</select>