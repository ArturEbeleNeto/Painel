

<h2>Consulta de Pedidos</h2>


<div class="row">
		<div class="col-md-12 column">
                    <table class="table table-striped table-hover" id="tabConsultPedidos" data-height="400">
				<thead>
					<tr>
						<th data-field="NrPedido">
							Nr Pedido
						</th>
						<th data-field="NomeCliente">
							Cliente
						</th>
						<th data-field="NomeCidade">
							Cidade
						</th>
						<th data-field="Estado">
							Estado
						</th>
                                                <th data-field="VlrPedido">
							Valor
						</th>
                                                <th data-field="NomeVendedor">
							Vendedor
						</th>
                                                <th data-field="opcoes" data-formatter="ExibeOpcoes">
							Ações
						</th>
					</tr>
				</thead>
    				<tbody>
                                    
				</tbody>
			</table>
                    
		</div>
	</div>       


        <div class="row">        
            <div class="col-md-12 col-lg-12" id="divBotoesForm">

                    <?php echo anchor('Pedido/Cadastro','
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                      </button>');
                    ?>     
                    
            </div>
        </div>