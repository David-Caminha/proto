<!DOCTYPE HTML>
<html >
    <head>
        <link rel="stylesheet" href="../../css/PaginaDono.css"/>
        <link rel="stylesheet" href="../../css/Pesquisa.css"/>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    <body id="pagina">

        <div id="header" class="col-xs-12 col-md-12 ">
            <section >
               <img  src="Logo.png" alt="Logo" class="img-responsive" alt="Responsive image" >    
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
                <a href="http://www.google.com">ACCOUNT</a>
            </section>
            <section id="line"></section>
        </div>

        <div id="fornecedores" class="table-responsive " >
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Fornecedor</th>
                    <th class="col-sm-3 col-md-3">email</th>
                    <th class="col-sm-3 col-md-3">Contacto</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $fornecedores as $fornecedor}
                <tr>
                    <td >{$fornecedor.nome}</td>
                    <td >{$fornecedor.email}</td>
                    <td >{$fornecedor.telemovel}</td>
                    <td><a href="">remover</a></td>
                </tr>
                {/foreach}
                
            </table>
        </div>
        <br>
        <div id="administradores" class="table-responsive ">
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Administrador</th>
                    <th class="col-sm-3 col-md-3">email</th>
                    <th class="col-sm-3 col-md-3">Histórico acções</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $admins as $admin}
                <tr>
                    <td >{$admin.nome}</td>
                    <td >{$admin.email}</td>
                    <td><a href="">ver histórico</a></td>
                    <td><a href="">remover</a></td>
                </tr>
                {/foreach}
                
            </table>
        </div>
    </body>
</html>