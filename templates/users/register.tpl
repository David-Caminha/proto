<!DOCTYPE HTML>
<html >
    <head>
        <link rel="stylesheet" href="PaginaDono.css"/>
        <link rel="stylesheet" href="Pesquisa.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
                </section>
            </div>
            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">MONITOR</a>
            </section>
            <section id="line"></section>
        </div>
        <section id="forms">
        <div class="col-xs-10 col-sm-4 col-md-4 col-md-offset-1">
            <form class="form-goup" action="{$BASE_URL}actions/users/login.php" method="post">
                <input class="form-control" type="text" name="username" placeholder="Username"> <br>
                <input class="form-control" type="password" name="Password" placeholder="password"> <br>
                <input type="checkbox"> <h7>Remember me</h7> <br>
                 <button type="button" class=" btn btn-primary ">Login</button>      
            </form>
        </div>
        <div class="col-xs-10 col-sm-4 col-md-4 col-md-offset-2">
            <form class="form-goup" action="{$BASE_URL}actions/users/register.php" method="post">
                <input class="form-control" type="text" name="username" placeholder="Username"> <br>
                <input class="form-control" type="text" name="email" placeholder="Email"><br>
                <input class="form-control" type="text" name="contacto" placeholder="Contacto"> <br>
                <input class="form-control" type="text" name="morada" placeholder="Morada"> <br>
                <input type="checkbox"> <h7>Desejo ser Fornecedor</h7> <br>
                <button type="button" class=" btn btn-primary ">Registar</button>            
            </form>
        </div>
        </section>
    </body>
</html>