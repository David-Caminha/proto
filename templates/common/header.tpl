<!DOCTYPE HTML>
<html >
    <head>
        <link rel="stylesheet" href="../../css/Pesquisa.css"/>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    <body id="pagina">

        <div id="header" class="col-xs-12 col-md-12 ">
            <section >
               <img  src="{$BASE_URL}/images/assets/Logo.png" alt="Logo" class="img-responsive" alt="Responsive image" >    
            </section>
            <div id="ferramentas" class=" col-xs-12 col-md-12">
                <section class="row col-xs-6 col-md-4">
                    <a  class=" btn btn-default" href="http://www.google.com">Home</a>
                    <form action="{$BASE_URL}pages/products/search.php" method="get">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pesquisa">
                    </form>
                </section>
                <section class="col-xs-6 col-md-4 col-md-offset-4" id="UserMenu">
                    <a  class=" btn btn-default" href="http://www.google.com">Logout</a>
                    <a  class=" btn btn-default" href="http://www.google.com">Acount</a>
                    <a  class="btn btn-default" href="http://www.google.com">1 Items</a>
                    <a  class="btn btn-default" href="http://www.google.com">Checkout</a>
                </section>