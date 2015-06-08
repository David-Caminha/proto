{include file='common/header.tpl'}
            <section id="line"></section>
        </div>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        
        {if $USERNAME}
        	<div id="right_column" class="column" >
	<form action="{$BASE_URL}pages/products/product.php" method="get">
		<input type="hidden" name="qtd_receiver" value="1"/>
		{foreach $p as $prd}
		<input type="hidden" name="prd_receiver" value="{$prd.id}" />
		{/foreach}
		Quantidade: <select name="qtd" onchange="this.form.qtd_receiver.value=this.value">
			<option value="1" selected>1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<br />
		<button>Adicionar ao Carrinho</button>
	</form>
        {if $fav==0}{foreach $p as $pp}<a href="?idFav={$pp.id}"><button>Adicionar aos Favoritos</button></a>{/foreach}{/if}
	</div>{/if}
                
        <div id="Item" class=" col-xs-12 col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-2">
            {if $USERNAME}
            <div id="votesdiv">
            <form class="classificacao" action="">
                {foreach $p as $pp}
                <input type="hidden" name="idProduct" value="{$pp.id}" />{/foreach}
                {if $hasVoted}
                {include file='products/voted.tpl'}
                {else}
                {include file='products/toVote.tpl'}
                <input type="submit" value="Vote!"/>
                {/if}
            </form>
            </div>
            {/if}
            {foreach $p as $product}
            <section id="Item" class=" col-xs-12  col-sm-6 col-md-6 " >         
                    <img  src="{$BASE_URL}{$product.caminhoimagem}" alt="Imagem produto" class="img-responsive" alt="Responsive image" >
                    <p class=" col-xs-12 col-md-12 "> </p>
                  
            </section>
            <section id="descricao" class="col-sm-6 col-md-6">
                <h3>{$product.nome}</h3>
                
                de: <span id="fornecedor">{$product.f_nome}</span>
		<p id="price">Preço: <span id="price_value">{$product.preco}€</span> </p>
		<p>
		{$product.descricao}
		</p>
            </section>
            
            
      	{/foreach}
        </div>
        <div id="content">
            
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#sugeridos" data-toggle="tab">Sugeridos</a>                 </li>
                <li>
                <a href="#comentarios" data-toggle="tab">Comentarios</a>                 </li>
            </ul>
            
            
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="sugeridos">
                                  <table id="also_bought_container">
		<tr><h3>Quem comprou este produto, também comprou:</h3></tr>
		<tr>
		{foreach $a_bought as $ab}
			<td>		
				<span class="a_b_name">{$ab.nome}</span><br />
                <a href="?idProd={$ab.id}"><img  src="{$BASE_URL}{$ab.caminhoimagem}" alt="{$ab.caminhoimagem}" height="100" width="100"></a>
				<span class="a_b_price">{$ab.preco}€</span>
			</td>
		{/foreach}
		</tr>
	</table>
                </div>
                <div class="tab-pane" id="comentarios">
			{$number=0}
		{foreach $Result as $comment}
		<h3 class="c_username">{$comment.username}</h3>
		<p class="c_text">{$comment.texto}</p>
        {if $tipo == 1}
            <form class="myform">
                <input type="hidden" name="idComentario" value="{$comment.id}" />
                {foreach $p as $prd}
                <input type="hidden" name="idProduto" value="{$prd.id}" />
                {/foreach}
                <input type="submit" value="Remover comentario" />
            </form>
        {/if}
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
	</div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="{$BASE_URL}js/bootstrap.min.js"></script>
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
    <script> 
        $(function () {
            $('.classificacao').on('submit', function (e) {
                $.ajax({
                    type: 'post',
                    url: '{$BASE_URL}actions/products/vote.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        $('#votesdiv').html(data);
                    }
                });
                e.preventDefault();
            });
        }); 
    </script> 
    </body>
{include file='common/footer.tpl'}
