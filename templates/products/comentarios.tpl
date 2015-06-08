{$number=0}
{foreach $Result as $comment}
<h3 class="c_username">{$comment.username}</h3>
<p class="c_text">{$comment.texto}</p>
<form class="myform">
    <input type="hidden" name="idComentario" value="{$comment.id}" />
    <input type="hidden" name="idProduto" value="{$idProd}" />
    <button type="submit" class="btn btn-default">Remove</button>
</form>
{$number=$number+1}
{/foreach}
{if $USERNAME}
<div id="write_comment">
    <form method="post" action="{$BASE_URL}pages/products/product.php" >
        {foreach $p as $prd}
        <input type="hidden" name="idProd_comment" value="{$idProd}" />
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
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Erase</button>
    </form>
</div>
{/if}

<script> 
        $(function () {
            $('.myform').on('submit', function (e) {
                $.ajax({
                    type: 'post',
                    url: '{$BASE_URL}actions/products/removeComment.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        $('#comentarios').html(data);
                    }
                });
                e.preventDefault();
            });
        }); 
    </script>