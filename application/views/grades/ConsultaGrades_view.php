

<h2>Consulta de Grades</h2>


<div class="row" >
    <div class="col-md-10 table-responsive">
        <table class="table table-striped table-hover select-table" id="tabGrades" status="teste" data-height="250">
            <thead>
                <tr>
                    <th data-field="GradeSel" data-radio="true">
                    </th>

                    <th data-field="CodGrade">
                            Código
                    </th>
                    <th data-field="DescGrade">
                            Descrição
                    </th>                                        
                </tr>
            </thead>
            <tbody>
                                    
                           
            </tbody>
	</table>                    
    </div>
    <div class="col-md-2" id="divOpcoesGrade">                            
        
        <button class="btn btn-default btn-block" id="btnPopCadastroGrades">
            <span class="glyphicon glyphicon-plus" style=""></span> Adicionar 
        </button>
        <button class="btn btn-default btn-block" id="btnPopEdicaoGrades">
            <span class="glyphicon glyphicon-pencil" style=""></span> Editar
        </button>        
        <button class="btn btn-default btn-block" id="btnExcluirGrade">
            <span class="glyphicon glyphicon-minus" style=""></span> Excluir
        </button>
        <!--
        <button class="btn btn-default btn-block" id="testet">
            <span class="glyphicon glyphicon-random" style=""></span> Duplicar
        </button>                        
        -->
    </div>
</div>

    

<div id="divPopCadastroGrades" class="modal fade" tabindex="-1" data-focus-on="input:nth-child(2)" style="display: none;">

</div>
 




<div id="divPopCadastroTamanhos" class="modal fade" tabindex="-1" data-focus-on="input:text:eq(1):visible" style="display: none;">
</div>
 




<div class="row rowTamanhosGrade">
    <div class="col-md-10 table-responsive">
        <table class="table table-striped table-hover select-table" id="tabTamanhos" data-height="250">
            <thead>
                <tr>
                    <th data-field="TamanhoSel" data-checkbox="true">                            
                    </th>
                    <th data-field="NrSeqTam">
                            Seq.    
                    </th>                    
                    <th data-field="CodTamanho">
                            Código
                    </th>
                    <th data-field="DescTamanho">
                            Descrição
                    </th>
                    <th data-field="Proporcao">
                            Proporção
                    </th>
                    
                </tr>
            </thead>
            <tbody>                                  
                
            </tbody>
	</table>                    
    </div>
    <div class="col-md-2" id="divOpcoesGradeTam">        
        
        <button class="btn btn-default btn-block" id="btnPopCadastroTamanhos">
            <span class="glyphicon glyphicon-plus text-left" style=""></span> Adicionar 
        </button>
        <button class="btn btn-default btn-block" id="btnPopEditarTamanhos">
            <span class="glyphicon glyphicon-pencil" style=""></span> Editar
        </button>
        <button class="btn btn-default btn-block" id="btnPopExcluirTamanho">
            <span class="glyphicon glyphicon-minus" style=""></span> Excluir
        </button>
        
    </div>
</div>

