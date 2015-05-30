<!DOCTYPE HTML>
<html >
    <head>
        <link rel="stylesheet" href="{$BASE_URL}css/Style.css"/>
        <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    <body id="pagina" onload="method_load">
	<script>
	$(function method_load(){
		//this first line loads the pre-selected value into the text box
		$('#method_receiver').val($('#search_method option:selected').val());
		//still want to bind the change event
		$('#search_method').bind('change', function(){
        $('#method_receiver').val($('#search_method option:selected').text());
		});
	});
</script>
        <div id="header" class="col-xs-12 col-md-12 ">
            <section >
               <img  src="{$BASE_URL}images/assets/Logo.png" alt="Logo" class="img-responsive" alt="Responsive image" >    
            </section>
            <div id="ferramentas" class=" col-xs-12 col-md-12">
                <section class="row col-xs-6 col-md-4">
                    <a  class=" btn btn-default" href="{$BASE_URL}">Home</a>
                    <form action="{$BASE_URL}pages/products/search.php" method="get">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="pesquisa" placeholder="Pesquisa">
						<input type="text" name="Filtro" id="method_receiver" value="" />
					</form>
                </section>
                <section class="col-xs-6 col-md-4 col-md-offset-4" id="UserMenu">
                    {if $USERNAME}
                        {include file='common/menu_logged_in.tpl'}
                    {else}
                        {include file='common/menu_logged_out.tpl'}
                    {/if}
                </section>
            </div>