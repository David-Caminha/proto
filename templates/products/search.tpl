{include file='common/header.tpl'}

            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="{$BASE_URL}">HOME</a>
                 > 
                <a href="#">SHOP</a>
            </section>
            <section id="line"></section>
        </div>

        <div id="headerItens">
            <p class="col-xs-6 col-md-4"> Showing 1-7 of 7 results</p>
            
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