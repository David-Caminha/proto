{include file='common/header.tpl'}

            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
            </section>
        </div>
        <dl id="TopCompras" class=" col-xs-12 col-md-12 ">
            
            {foreach $maisVendidos as $produto}
            
            <dt>
                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                    <img  src="{$produto.photo}" alt="Imagem do produto" height="100" width="100">
                    <img id="Imagem" src="http://uxrepo.com/static/icon-sets/ionicons/svg/ios7-plus-outline.svg" height="40" width="40">
                    <p class=" col-xs-12 col-md-12 "> {$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 "> {$produto.preco}€</p>
                    <button type="button" class=" btn btn-default">Adicionar</button>
                </section>
            </dt> 
            
            {/foreach}
            
        </dl>
        <dl id="ComprasRecentes" class=" col-xs-12 col-md-12 ">
            
            {foreach $recentementeVendidos as $produto}
            
            <dt>
                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                    <img  src="{$produto.photo}" alt="Imagem do produto" height="100" width="100">
                    <img id="Imagem" src="http://uxrepo.com/static/icon-sets/ionicons/svg/ios7-plus-outline.svg" height="40" width="40">
                    <p class=" col-xs-12 col-md-12 ">{$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 ">{$produto.preco}€</p>
                    <button type="button" class=" btn btn-default">Adicionar</button>
                </section>
            </dt>
            
            {/foreach}
            
        </dl>

{include file='common/footer.tpl'}