<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $Titulo ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
       
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    
    <link href="<?php echo base_url('css/bootstrap-modal-bs3patch.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/bootstrap-modal.css') ?>" rel="stylesheet">
    
    <link href="<?php echo base_url('css/pick-a-color-1.2.3.min.css') ?>" rel="stylesheet">
        
    <link href="<?php echo base_url('css/estilo.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/'.$Pagina.'.css') ?>" rel="stylesheet">    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      <div class="container-fluid">
      
	<div class="row divMenu">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo base_url() ?>">Artur</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li> <!--class="active"-->
                                                    <?php echo anchor('produto','Produtos') ?>
						</li>
						<li>
                                                    <?php echo anchor('cliente','Clientes') ?>
						</li>
                                                <li>
                                                    <?php echo anchor('pedido','Pedidos') ?>
						</li>
                                                <!--
                                                <li>
							<a href="#">Fornecedores</a>
						</li>
                                                -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<?php echo anchor('variante','Variantes') ?>
								</li>
                                                                
								<li>
									<?php echo anchor('grade','Grades') ?>
								</li>
								<li>
									<?php echo anchor('vendedor','Vendedor') ?>
								</li>       
								<li>
									<?php echo anchor('usuario','Usuario') ?>
								</li>                                                                  
                                                                <!--
								<li>
                                                                    
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
                                                                -->
							</ul>                                                         
						</li>
                                                <!--
                                                <li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>
                                                -->
					</ul>
                                    
                                    
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" />
						</div> <button type="submit" class="btn btn-default">Submit</button>
					</form>
                                    
                                        <!--
					<ul class="nav navbar-nav navbar-right">                                            
						<li>
							<a href="#">Link</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
							</ul>
						</li>
					</ul>
                                        -->
                                    
                                    
				</div>
				
			</nav>
		</div>
	</div>      