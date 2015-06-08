<select class="form-control" name="cp1">
<option value="">Select City</option>
{foreach $cidades as $cp}
<option value={$cp.id}>{$cp.cp1}</option>
{/foreach}
</select>