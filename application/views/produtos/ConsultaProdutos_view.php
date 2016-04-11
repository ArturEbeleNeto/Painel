

<h2>Consulta de Produtos</h2>


<div class="row">
		<div class="col-md-12 column">
                    <table class="table table-striped table-hover" id="tabConsultaProdutos" data-height="400">
				<thead>
					<tr>
						<th data-field="CodProduto">
							Código
						</th>
						<th data-field="DescProduto">
							Descrição
						</th>
						<th data-field="UniProduto">
							Unidade
						</th>
						<th data-field="VlrCustoProduto">
							Vlr Custo
						</th>
                                                <th data-field="VlrVendaProduto">
							Vlr Venda
						</th>
                                                <th data-field="SeAtivo">
							Situação
						</th>
                                                <th data-formatter="ExibeOpcoes">
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
                    <?php echo anchor('Produto/Cadastro','
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                      </button>');
                    ?>                     
            </div>
        </div>