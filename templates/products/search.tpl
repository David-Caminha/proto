{include file='common/header.tpl'}

            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="{$BASE_URL}">HOME</a>
                 > 
                <a href="#">SHOP</a>
            </section>
            <section id="line"></section>
        </div>
				<select id="search_method" onchange="this.form.method_receiver.value=this.value" class="col-xs-12 col-md-3 col-md-offset-9" >
							<option value="asc_price" selected> Preço crescente</option>
							<option value="desc_price"> Preço decrescente</option>
							<option value="best_rate"> Maior classificação</option>
							<option value="recent"> Mais recentes</option>
						</select>
        <div id="headerItens">
            <p class="col-xs-6 col-md-4"> Showing 1-7 of 7 results</p>
            
        </div>
        
        <dl id="listaItens" class=" col-xs-12 col-md-12 " >
            
            {foreach $searchResult as $produto}
            
            <dt> 
                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 " >         
                    <a href="?idProd={$produto.id}"><img  src="{$BASE_URL}{$produto.caminhoimagem}" alt="Imagem artigo" height="100" width="100"></a>
                    <a href="?idProd={$produto.id}"><img id="Imagem" src="http://uxrepo.com/static/icon-sets/ionicons/svg/ios7-plus-outline.svg"  height="40" width="40"></a>
                    <p class=" col-xs-12 col-md-12 "> {$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 "> {$produto.preco}€</p>
                    {if $USERNAME}<a href="?idP={$produto.id}"><button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button></a>{/if}
                </section>
            </dt>
            
            {/foreach}
        </dl>
     
{include file='common/footer.tpl'}