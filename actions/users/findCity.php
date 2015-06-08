<?php 
$country = $_GET['cidade'];


$result = cidadesPertencentes($country);

?>
<select name="city">
<option>Select City</option>
<?php foreach($result as $row) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['nome']?></option>
<?php } ?>
</select>