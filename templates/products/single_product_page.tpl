{include file='common/header.tpl'}
	<div id="right_column" class="column" >
	<form action="{$BASE_URL}pages/products/product.php" method="get">
		<input type="hidden" name="qtd_receiver" />
		{foreach $p as $prd}
		<input type="hidden" name="prd_receiver" value="{$prd.id}" />
		{/foreach}
		Quantidade: <select name="qtd" onchange="this.form.qtd_receiver.value=this.value">
			<option value="1">1</option>
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
		{if $USERNAME}<button>Adicionar ao Carrinho</button>{/if}
	</form>
	<br />
	<br />
	{if $USERNAME}{if $fav==0}{foreach $p as $p}<a href="?idProd={$p.id}"><button>Adicionar aos Favoritos</button></a>{/foreach}{/if}{/if}
	</div>
	<div id="left_column" class="column" >
		<img src="http://gnomo.fe.up.pt/~lbaw1463/proto/images/produtos/default.png" alt="Imagem do Artigo" width="100" height="100" />
	</div>
	<div id="center_column" class="column" >
	{foreach $p as $product}
		<span id="p_name">{$product.nome}</span>
		<br />
		de: <span id="fornecedor">{$product.f_nome}</span>
		<p id="price">Preço: <span id="price_value">{$product.preco}€</span> </p>
		<p>
		{$product.descricao}
		</p>
	{/foreach}
	</div>
	<div class="separation-line-big">
	</div>
	<table id="also_bought_container">
		<tr><h3>Quem comprou este produto, também comprou:</h3></tr>
		<tr>
		{foreach $a_bought as $ab}
			<td>		
				<span class="a_b_name">{$ab.nome}</span><br />
				<img src="http://gnomo.fe.up.pt/~lbaw1463/proto/images/produtos/default.png" alt="Imagem do Artigo" width="100" height="100" /><br />
				<span class="a_b_price">{$ab.preco}€</span>
			</td>
		{/foreach}
		</tr>
	</table>
	<div class="separation-line-big">
	</div>
	<div id="comments">
		<h3>Comentários</h3>
		{$number=0}
		{foreach $Result as $comment}
		<p class="c_username">{$comment.username}</p>
		<p class="c_text">{$comment.texto}</p>
		<div class="separation-line">
		</div>
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
{include file='common/footer.tpl'}