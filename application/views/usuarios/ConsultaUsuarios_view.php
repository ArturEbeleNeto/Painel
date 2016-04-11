

<h2>Consulta de Usuarios</h2>


<div class="row">
		<div class="col-md-12 column">
                    <table class="table table-striped table-hover" data-toggle="table" data-height="400">
				<thead>
					<tr>
						<th>
							Código
						</th>
						<th>
							Descrição
						</th>
						<th>
							Nome do Usuário
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

 if($Usuarios) {
    foreach ($Usuarios as $Usu)
    {

    echo '
					<tr>
						<td>
							'.$Usu->CodUsuario.'
						</td>
						<td>
							'. $Usu->DescUsuario .'
						</td>
						<td>
							'.$Usu->NomeUsuario.'
						</td>
						<td>
							'.$Usu->CodCliente.'
						</td>
                                                <td>
							'. anchor('Usuario/Editar/'.$Usu->CodUsuario,'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>').' '.                                                           
                                                           anchor('Usuario/Excluir/'.$Usu->CodUsuario,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').' '                                                           
                                                        .'
						</td>
					</tr>
        ';
    }
   }
?>
                                    
                                    
				</tbody>
			</table>
                    <?php echo anchor('Usuario/Cadastro','
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                      </button>');
                    ?>     
                    
		</div>
	</div>       