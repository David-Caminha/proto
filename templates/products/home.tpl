{include file='common/header.tpl'}

<!-- Important Owl stylesheet -->
            <link rel="stylesheet" href="owl-carousel/owl.carousel.css">

<!-- Default Theme -->
            <link rel="stylesheet" href="owl-carousel/owl.theme.css">


            <script>
                $(document).ready(function() 
                {
                    $("#owl-example").owlCarousel();
                });
            </script>

            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">LOGIN</a>
            </section>
            <section id="line"></section>
        </div>
           <br>

        <h7 id="Tab"> Top Compras</h7>
        <dl id="TopCompras" class=" col-xs-12 col-md-12 ">
            <div id="owl-example" class="owl-carousel">
                <div>
            {foreach $maisVendidos as $produto}

                    <dt>
                        <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                            <img  src="{$BASE_URL}{$produto.caminhoimagem}" alt="{$produto.photo}" height="100" width="100">
                            <span id="Imagem" class="glyphicon glyphicon-zoom-in"></span>
                            <p class=" col-xs-12 col-md-12 "> {$produto.nome}</p>
                            <p class=" col-xs-12 col-md-12 "> {$produto.preco}€</p>
                            <button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button>
                        </section>
                    </dt> 

                    {/foreach}
                </div>
            </div>
        </dl>

        <h7 id="Tab"> Compras Recentes</h7>
        <dl id="ComprasRecentes" class=" col-xs-12 col-md-12 ">

            {foreach $recentementeVendidos as $produto}

            <dt>
                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                    <img  src="{$BASE_URL}{$produto.caminhoimagem}" alt="Imagem do produto" height="100" width="100">
                    <img id="Imagem" src="http://uxrepo.com/static/icon-sets/ionicons/svg/ios7-plus-outline.svg" height="40" width="40">
                    <p class=" col-xs-12 col-md-12 ">{$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 ">{$produto.preco}€</p>
                    <button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button>
                </section>
            </dt>

            {/foreach}

        </dl>


<!--  jQuery 1.7+  -->
<script src="jquery-1.9.1.min.js"></script>

<!-- Include js plugin -->
<script src="../../javascript/owl.carousel.min.js"></script>
{include file='common/footer.tpl'}