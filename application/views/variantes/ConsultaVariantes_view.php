

<h2>Consulta de Variantes</h2>


<div class="row">
    
		<div class="col-md-12 column">
			<table class="table table-striped" data-toggle="table" data-height="400">
				<thead>
					<tr>
						<th>
							Código
						</th>
						<th>
							Referência
						</th>
						<th>
							Descrição
						</th>
                                                <th>
							Ações
						</th>
					</tr>
				</thead>
    				<tbody>

<?php                                   

if ($Variantes == NULL)
{

}
else
{    

    foreach ($Variantes as $Var)
    {

    echo '
					<tr>
						<td>
							'.$Var->CodVariante.'
						</td>
						<td>
							'.$Var->RefVariante .'
						</td>
						<td>
							'.$Var->DescVariante.'
						</td>
                                                <td>
							'. anchor('Variante/Editar/'.$Var->CodVariante,'<span class="glyphicon glyphicon-search" aria-hidden="true"></span>').' '.                                                           
                                                           anchor('Variante/Excluir/'.$Var->CodVariante,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').' '                                                           
                                                        .'
						</td>
					</tr>
        ';
    }
}
?>
                                    
                                    
				</tbody>
			</table>
                    <?php echo anchor('Variante/Cadastro','
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Nova
                      </button>');
                    ?>     
                    
		</div>
	</div>       