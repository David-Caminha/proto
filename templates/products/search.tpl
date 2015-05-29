{include file='common/header.tpl'}
			<script>
				document.getElementById('search_value').value = document.getElementById('exampleInputEmail1').value
			</script>
            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="{$BASE_URL}">HOME</a>
                 > 
                <a href="#">SHOP</a>
            </section>
            <section id="line"></section>
        </div>

        <div id="headerItens">
            <p class="col-xs-6 col-md-4"> Showing 1-7 of 7 results</p>
            <form id="Filtros" class=" col-xs-6 col-md-4 col-md-offset-4" action="{$BASE_URL}pages/products/search.php" method="get">
                <select name="Filtro">
                    <option value="asc_price"> Preço crescente</option>
                    <option value="desc_price"> Preço decrescente</option>
                    <option value="best_rate"> Maior classificação</option>
                    <option value="recent"> Mais recentes</option>
                </select>
				<input type="hidden" id="search_value" name="pesquisa" value="" />
            </form>
        </div>
        
        <dl id="listaItens" class=" col-xs-12 col-md-12 " >
            
            {foreach $searchResult as $produto}
            
            <dt> 
                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 " >         
                    <img  src="{$BASE_URL}{$produto.photo}" alt="Imagem artigo" height="100" width="100">
                    <img id="Imagem" src="http://uxrepo.com/static/icon-sets/ionicons/svg/ios7-plus-outline.svg"  height="40" width="40">
                    <p class=" col-xs-12 col-md-12 "> {$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 "> {$produto.preco}€</p>
                    {if $USERNAME}<a href="?idP={$produto.id}"><button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button></a>{/if}
                </section>
            </dt>
            
            {/foreach}
        </dl>
        
{include file='common/footer.tpl'}