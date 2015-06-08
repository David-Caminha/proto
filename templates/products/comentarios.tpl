{$number=0}
{foreach $Result as $comment}
<h3 class="c_username">{$comment.username}</h3>
<p class="c_text">{$comment.texto}</p>
<form id="my-form">
    <input type="hidden" name="idComentario" value="{$comment.id}" />
    <input type="hidden" name="idProduto" value="{$comment.idProduto}" />
    <button type="submit">Remover comentario</button>
</form>
{$number=$number+1}
{/foreach}
{if $USERNAME}
<div id="write_comment">
    <form method="post" action="{$BASE_URL}pages/products/product.php" >
        {foreach $p as $prd}
        <input type="hidden" name="idProd_comment" value="{$prd.id}" />
        {/foreach}
        {if $number==0}
        <span>Seja o Primeiro a comentar:</span>
        <br />
        {else}
        <span>Escreva um Comentário:</span>
        <br />
        {/if}
        <textarea rows="10" cols="120" name="text_comment" placeholder="Escreva aqui o seu comentário..."></textarea>
        <br />
        <button type="submit">Submeter</button>
        <button type="reset">Limpar</button>
    </form>
</div>
{/if}