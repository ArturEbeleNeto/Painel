

<h2>Consulta de Clientes</h2>


<div class="row">
		<div class="col-md-12 column">
			<table class="table table-striped table-hover" data-toggle="table" data-height="400">
				<thead>
					<tr>
						<th>
							Código
						</th>
						<th>
							Nome
						</th>
						<th>
							Sobre Nome
						</th>
						<th>
							Email
						</th>
                                                <th>
							Telefone
						</th>
                                                <th>
							Celular
						</th>
                                                <th>
							Ações
						</th>
					</tr>
				</thead>
    				<tbody>

<?php                                   

if ($Clientes == NULL)
{
}
else
{    

    foreach ($Clientes as $Cli)
    {

    echo '
					<tr>
						<td>
							'.$Cli->CodCliente.'
						</td>
						<td>
							'. $Cli->NomeCliente .'
						</td>
						<td>
							'.$Cli->SobreNomeCliente.'
						</td>
						<td>
							'.$Cli->EmailCliente.'
						</td>
                                                <td>
							'.$Cli->TelefoneCliente.'
						</td>
                                                <td>
							'.$Cli->CelularCliente.'
						</td>
                                                <td>
							'. anchor('Cliente/Editar/'.$Cli->CodCliente,'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>').' '.                                                           
                                                           anchor('Cliente/Excluir/'.$Cli->CodCliente,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').' '                                                           
                                                        .'
						</td>
					</tr>
        ';
    }
}
?>
                                    
                                    
				</tbody>
			</table>
                    

		</div>       
    
	</div>       

        <div class="row">        
            <div class="col-md-12 col-lg-12" id="divBotoesForm">

                    <?php echo anchor('Cliente/Cadastro','
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                      </button>');
                    ?>     
                    
            </div>
        </div>