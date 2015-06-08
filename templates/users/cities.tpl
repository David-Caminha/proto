<select class="form-control" name="cidade" onChange="getCps(this.value)">
<option value="">Select City</option>
{foreach $cidades as $cidade}
<option value="{$cidade.nome}">{$cidade.nome}</option>
{/foreach}
</select>