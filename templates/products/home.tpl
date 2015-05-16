<!DOCTYPE HTML>
<html >
    <head>
        <link rel="stylesheet" href="../../css/Style.css"/>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    <body id="pagina">

        <div id="header" class="col-xs-12 col-md-12 ">
            <section >
               <img  src="../../images/assets/Logo.png" alt="Logo" class="img-responsive" alt="Responsive image" >    
            </section>
            <div id="ferramentas" class=" col-xs-12 col-md-12">
                <section class="row col-xs-6 col-md-4">
                    <a  class=" btn btn-default" href="http://www.google.com">Home</a>
                    <form >
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Pesquisa">
                    </form>
                </section>
                 <section class="col-xs-6 col-md-4 col-md-offset-4" id="UserMenu">
                    <a  class=" btn btn-default" href="http://www.google.com">Logout</a>
                    <a  class=" btn btn-default" href="http://www.google.com">Acount</a>
                    <a  class="btn btn-default" href="http://www.google.com">1 Items</a>
                    <a  class="btn btn-default" href="http://www.google.com">Checkout</a>
                </section>
            </div>
            
            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">LOGIN</a>
            </section>
            <section id="line"></section>
        </div>
           
      <h7 id="Tab"> Top Compras</h7>
        <dl id="TopCompras" class=" col-xs-12 col-md-12 ">
            {foreach $maisVendidos as $produto}
            
            <dt>
                <section id="Item" class=" col-xs-12  col-sm-4 col-md-3 ">
                    <img  src="{$BASE_URL}{$produto.caminhoimagem}" alt="{$produto.photo}" height="100" width="100">
                    <span id="Imagem" class="glyphicon glyphicon-zoom-in">
                    <p class=" col-xs-12 col-md-12 "> {$produto.nome}</p>
                    <p class=" col-xs-12 col-md-12 "> {$produto.preco}€</p>
                    <button type="button" class=" btn btn-default col-xs-6  col-sm-6 col-md-6 ">Adicionar</button>
                </section>
            </dt> 
            
            {/foreach}

        </dl>
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

{include file='common/footer.tpl'}