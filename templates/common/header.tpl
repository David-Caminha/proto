<!DOCTYPE HTML>
<html >
    <head>
		
        <link rel="stylesheet" href="{$BASE_URL}css/Style.css"/>
        <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">
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
						<select id="search_method" onchange="this.form.method_receiver.value=this.value">
							<option value="asc_price" selected> Preço crescente</option>
							<option value="desc_price"> Preço decrescente</option>
							<option value="best_rate"> Maior classificação</option>
							<option value="recent"> Mais recentes</option>
						</select>
					</form>
                </section>
          
                    {if $USERNAME}
                        {include file='common/menu_logged_in.tpl'}
                    {else}
						<section class="col-xs-6 col-md-4 col-md-offset-4" id="UserMenu">
							{include file='common/menu_logged_out.tpl'}
						</section>
                    {/if}
             
            </div>
			