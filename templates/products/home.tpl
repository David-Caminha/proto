{include file='common/header.tpl'}

            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">LOGIN</a>
            </section>
            <section id="line"></section>
        </div>
           <br>

{$maisVendidos|@print_r}

        <h7 id="Tab" > Top Compras</h7>
        <div id="TopCompras" class=" col-xs-12 col-md-12 ">
            {foreach $maisVendidos as $produto}
                        <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                            <a href="?idProd={$produto.id}"><img  src="{$BASE_URL}{$produto.caminhoimagem}" alt="{$produto.caminhoimagem}" height="100" width="100"></a>
                            <a href="?idProd={$produto.id}"><span id="Imagem" class="glyphicon glyphicon-zoom-in"></span></a>
                            <p class=" col-xs-12 col-md-12 "> {$produto.nome}</p>
                            <p class=" col-xs-12 col-md-12 "> {$produto.preco}€</p>
                            {if $USERNAME}<a href="?idP={$produto.id}"><button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button></a>{/if}
                        </section>
            {/foreach}
             
        </div>
<br>
<br>

        <h7 id="Tab"> Compras Recentes</h7>
        <div id="ComprasRecentes" class=" col-xs-12 col-md-12 ">

            {foreach $recentementeVendidos as $produto}

                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                    <a href="?idProd={$produto.id}"><img  src="{$BASE_URL}{$produto.caminhoimagem}" alt="Imagem do produto" height="100" width="100"></a>
                    <a href="?idProd={$produto.id}"><img id="Imagem" src="http://uxrepo.com/static/icon-sets/ionicons/svg/ios7-plus-outline.svg" height="40" width="40"></a>
                    <p class=" col-xs-12 col-md-12 ">{$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 ">{$produto.preco}€</p>
                    {if $USERNAME}<a href="?idP={$produto.id}"><button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button></a>{/if}
                </section>

            {/foreach}

        </div>

{include file='common/footer.tpl'}