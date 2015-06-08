<select class="form-control" name="city">
<option>Select City</option>
{foreach $cidades as $cidade}
<option value={$cidade.id}>{$cidade.nome}</option>
{/foreach}
</select>