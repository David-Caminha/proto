<!DOCTYPE HTML>
<html >
    <head>
        <link rel="stylesheet" href="../../css/Style.css"/>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                if($(this).attr("value")=="user"){
                    $(".box").hide();
                    $(".user").show();
                }
                if($(this).attr("value")=="fornecedor"){
                    $(".box").hide();
                    $(".fornecedor").show();
                }
            });
        });
    </script>
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
                </section>
            </div>
            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">LOGIN</a>
            </section>
            <section id="line"></section>
        </div>
        <section id="forms">
            <div class="col-xs-10 col-sm-4 col-md-4 col-md-offset-1">
                <form class="signIn-form" action="{$BASE_URL}actions/users/login.php" method="post">
                    <input class="form-control" type="text" name="username" placeholder="Username"> <br>
                    <input class="form-control" type="password" name="Password" placeholder="Password"> <br>
                    <input type="checkbox"> <h7>Remember me</h7> <br>
                     <button type="button" class=" btn btn-primary ">Login</button>      
                </form>
            </div>
            <div class="col-xs-10 col-sm-4 col-md-4 col-md-offset-2">
                <form class="register-form" action="{$BASE_URL}actions/users/register.php" method="post">
                    <input class="form-control" type="text" name="username" placeholder="Username"> <br>
                    <input class="form-control" type="text" name="email" placeholder="Email"><br>
                     <input class="form-control" type="password" name="password" placeholder="Password"> <br>         
                    <input class="form-control" type="password" name="confirmarpassword" placeholder="Confirmar Password"> <br>
                    <h7> Desejo ser</h7>  
                    <label><input type="radio" name="colorRadio" value="user" > Utilizador</label>
                    <label><input type="radio" name="colorRadio" value="fornecedor"> Fornecedor</label>
                    <div class="user box">
                         <input class="form-control" type="date" name="dataNascimento" placeholder="Data de Nascimento"> <br>
                        <input class="form-control" type="text" name="nome" placeholder="Nome completo"> <br>
                        <input class="form-control" type="text" name="contacto" placeholder="Contacto"> <br>
                        <input class="form-control" type="text" name="morada" placeholder="Morada"> 
                    </div>
                    <div class="fornecedor box"> 
                        <input class="form-control" type="text" name="nome" placeholder="Nome responsável"> <br>
                        <input class="form-control" type="text" name="contacto" placeholder="Contacto"> 
                    </div>
                    <br>          
                    <input type="checkbox"> <h7> Li e concordo com os</h7> <a href="http://www.google.com">Termos de utilização</a> <br><br>
                    <input type="submit" class=" btn btn-primary " value="Registar">   
                    <br>
                </form>
            </div>
        </section>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    </body>
</html>