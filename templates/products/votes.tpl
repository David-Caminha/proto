{foreach $votes as $avg}
<form>
    {if $avg.value == 5}
  <input class="star star-5" id="star-5" type="radio" name="star" checked disabled/>
    {else}
  <input class="star star-5" id="star-5" type="radio" name="star" disabled/>
    {/if}
  <label class="star star-5" for="star-5"></label>
    {if $avg.value == 4}
  <input class="star star-4" id="star-4" type="radio" name="star" checked disabled/>
    {else}
  <input class="star star-4" id="star-4" type="radio" name="star" disabled/>
    {/if}
  <label class="star star-4" for="star-4"></label>
    {if $avg.value == 3}
  <input class="star star-3" id="star-3" type="radio" name="star" checked disabled/>
    {else}
  <input class="star star-3" id="star-3" type="radio" name="star" disabled/>
    {/if}
  <label class="star star-3" for="star-3"></label>
    {if $avg.value == 2}
  <input class="star star-2" id="star-2" type="radio" name="star" checked disabled/>
    {else}
  <input class="star star-2" id="star-2" type="radio" name="star" disabled/>
    {/if}
  <label class="star star-2" for="star-2"></label>
    {if $avg.value == 1}
  <input class="star star-1" id="star-1" type="radio" name="star" checked disabled/>
    {else}
  <input class="star star-1" id="star-1" type="radio" name="star" disabled/>
    {/if}
  <label class="star star-1" for="star-1"></label>
</form>
{/foreach}