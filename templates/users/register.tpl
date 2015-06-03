<html >
    <head>
		
        <link rel="stylesheet" href="{$BASE_URL}css/Style.css"/>
        <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" /> 
        
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
    </head>
    <body id="pagina">
	
        <div id="header" class="col-xs-12 col-md-12 ">
            <section >
               <img  src="{$BASE_URL}images/assets/Logo.png" alt="Logo" class="img-responsive" alt="Responsive image" >    
            </section>
            <div id="ferramentas" class=" col-xs-12 col-md-12">
                <section class="row col-xs-6 col-md-4">
                    <a  class=" btn btn-default" href="{$BASE_URL}">Home</a>
                    <form action="{$BASE_URL}pages/products/search.php" method="get">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="pesquisa" placeholder="Pesquisa">
						<input type="hidden" name="method_receiver" />
					</form>
                </section>

            </div>
            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">LOGIN</a>
            </section>
            <section id="line"></section>
        </div>
        {foreach $ERROR_MESSAGES as $error}
      <div class="error">{$error}  {$FORM_VALUES.dataNascimento}<a class="close" href="#">X</a></div>
    {/foreach}
        <section id="forms">
            <div class="col-xs-12 col-sm-4 col-md-4 col-sm-offset-1 col-md-offset-1">
                <form class="signIn-form" action="{$BASE_URL}actions/users/login.php" method="post">
                    <input class="form-control" type="text" name="username" placeholder="Username"> <br>
                    <input class="form-control" type="password" name="password" placeholder="Password"> <br>
                    <input type="checkbox"> <h7>Remember me</h7> <br>
                    <input type="submit" class="btn btn-primary" value="Login">  
                </form>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-offset-2 col-md-offset-2">
                <form class="register-form" action="{$BASE_URL}actions/users/register.php" method="post">
                    <input class="form-control" type="text" name="username" placeholder="Username" value="{$FORM_VALUES.username}"> <br>
                    <input class="form-control" type="email" name="email" placeholder="Email" value="{$FORM_VALUES.email}"><br>
                     <input class="form-control" type="password" name="password" placeholder="Password"> <br>         
                    <input class="form-control" type="password" name="confirmarPassword" placeholder="Confirmar Password"> <br>
                    <h7> Desejo ser</h7>  
                    <label><input type="radio" name="choiceRadio" value="user"> Utilizador</label>
                    <label><input type="radio" name="choiceRadio" value="fornecedor"> Fornecedor</label>
                    <div class="user box">
                         <input class="form-control" type="date" name="dataNascimento" placeholder="Data de Nascimento" value="{$FORM_VALUES.dataNascimento}"> <br>
                        <input class="form-control" type="text" name="nome" placeholder="Nome completo" value="{$FORM_VALUES.nome}"> <br>
                        <input class="form-control" type="text" name="contacto" placeholder="Contacto" value="{$FORM_VALUES.contacto}"> <br>
                        <input class="form-control" type="text" name="morada" placeholder="Morada" value="{$FORM_VALUES.morada}"> <br>
                        <h7 class=" col-xs-3  col-sm-2 col-md-3 ">Codigo Postal</h7>
                         <div class=" col-xs-2  col-sm-2 col-md-3 ">
                        <input class=" form-control" type="text" name="cp1"  value="{$FORM_VALUES.cp1}"> 
                        </div>
                        <h7 class=" col-xs-1  col-sm-1 col-md-1 "> - </h7>
                         <div class="col-xs-2  col-sm-2 col-md-3">
                        <input class=" form-control" type="text" name="cp2"  value="{$FORM_VALUES.cp2}"> <br>
                        </div>
                        <input class="form-control" type="text" name="cidade" placeholder="Cidade" value="{$FORM_VALUES.nome}"> <br> 
                        <input class="form-control" type="text" name="País" placeholder="País" value="{$FORM_VALUES.nomepais}"> <br>
                    </div>
                    <div class="fornecedor box"> 
                        <input class="form-control" type="text" name="nomeResponsavel" placeholder="Nome responsável" value="{$FORM_VALUES.nomeResponsavel}"> <br>
                        <input class="form-control" type="text" name="contactoResponsavel" placeholder="Contacto" value="{$FORM_VALUES.contactoResponsavel}"> 
                    </div>
                    <br>          
                    <input type="checkbox"> <h7> Li e concordo com os</h7> <a href="http://www.google.com">Termos de utilização</a> <br><br>
                    <input type="submit" class="btn btn-primary" value="Registar">
                    <br>
                </form>
            </div>
        </section>
                 </div>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
     
    </body>
</html>