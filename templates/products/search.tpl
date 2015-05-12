{include file='common/header.tpl'}

            </div>
            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">SHOP</a>
            </section>
            <section id="line"></section>
        </div>

        <div id="headerItens">
            <p  class="col-xs-6 col-md-4"> Showing 1-7 of 7 results</p>
            <form id="Filtros" class=" col-xs-6 col-md-4 col-md-offset-4">
                <select name="Filtro">
                    <option value="Preço crescente"> Preço crescente</option>
                    <option value="Preço decrescente"> Preço decrescente</option>
                    <option value="Melhor classificação"> Maior classificação</option>
                    <option value="Recentes"> Mais recentes</option>
                </select>
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
                    <button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button>
                </section>
            </dt>
            
            {/foreach}
        </dl>
        
{include file='common/footer.tpl'}