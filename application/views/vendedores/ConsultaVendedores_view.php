

<h2>Consulta de Vendedores</h2>


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
							Taxa Comissão
						</th>
						<th>
							Código Cliente
						</th>
                                                <th>
							Ações
						</th>
					</tr>
				</thead>
    				<tbody>

<?php              

 if($Vendedores) {
    foreach ($Vendedores as $Ven)
    {

    echo '
					<tr>
						<td>
							'.$Ven->CodVendedor.'
						</td>
						<td>
							'. $Ven->NomeVendedor .'
						</td>
						<td>
							'.$Ven->TaxaComissao.'
						</td>
						<td>
							'.$Ven->CodCliente.'
						</td>
                                                <td>
							'. anchor('Vendedor/Editar/'.$Ven->CodVendedor,'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>').' '.                                                           
                                                           anchor('Vendedor/Excluir/'.$Ven->CodVendedor,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').' '                                                           
                                                        .'
						</td>
					</tr>
        ';
    }
   }
?>
                                    
                                    
				</tbody>
			</table>
                    <?php echo anchor('Vendedor/Cadastro','
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                      </button>');
                    ?>     
                    
		</div>
	</div>       