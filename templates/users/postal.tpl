<select class="form-control" name="cp1">
<option value="">Select City</option>
{foreach $cidade as $cp}
<option value={$cp.id}>{$cp.cp1}</option>
{/foreach}
</select>