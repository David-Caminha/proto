<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
    $country = $_GET['cidade'];

    $cidades = cidadesPertencentes($country);
    $smarty->assign('cidades', $cidades);
?>

<select name="city">
<option>Select City</option>
{foreach $cidades as $cidade}
<option value="{$cidade.id}">{$cidade.nome}</option>
<?php } ?>
</select>