

<h2>Cadastro de Variantes do produto</h2>


<div class="row row-CadastroVariantesProduto">
    
    <div class="col-md-12 column">

        <?php
               echo validation_errors();

               if($Variante['CodVariante'] && $Variante['CodProduto'])
               {
                   echo '<form id="frmCadastroVarianteProduto" name="frmCadastroVarianteProduto" method="post" action="'.base_url('index.php/VarianteProduto/Editar/'.$Variante['CodVariante'].'/'.$Variante['CodProduto'].'/Salvar').'">';         
               }
               else
               {                                                                                       
                   echo '<form class"" id="frmCadastroVarianteProduto" name="frmCadastroVarianteProduto" method="post" action="'.base_url('index.php/VarianteProduto/Gravar').'">';         
               }


        ?>        
        
                    <input name="txtCodigoVariante" type="hidden" value="<?php echo $Variante['CodVariante'] ?>" class="form-control" id="txtCodVariante">      
                    <input name="txtCodigoProduto" type="hidden" value="<?php echo $Variante['CodProduto'] ?>" class="form-control" id="txtCodProduto">      

                                   
                    
                    <?php                    
                    $this->load->view('variantes/selVariantes_view');                    
                    ?>
                    <div class="row col-lg-12" id="rowBtnSelVariante">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-plus" style=""> </span>  Selecionar Variante padrão</button> 
                    </div>
                 
                    <div class="row col-lg-12" id="rowDadosVariantePadrao">
                        
                        <div class="form-group row col-lg-4">
                            <label for="txtRefVariante">Referência:</label>
                            <input name="txtRefVariante" type="text" value="<?php echo $Variante['RefVariante'] ?>" class="form-control" id="txtRefVariante" placeholder="Ex: Az002">
                        </div>
                    
                    
                        <div class="form-group col-lg-4">
                            <label for="txtDescVariante">Descrição:</label>
                            <input name="txtDescVariante" type="text" value="<?php echo $Variante['DescVariante'] ?>" class="form-control" id="txtDescVariante" placeholder="Ex: Azul">
                        </div>                    
                        
                        <div class="form-group row col-lg-4">
                            <label for="txtHexadecimal">Cor:</label>
                            <input name="txtHexadecimal" type="text" class="pick-a-color form-control" id="txtHexadecimal">
                            <!-- value="<?php if($Variante['HexaDecimal']){echo $Variante['HexaDecimal'];}else{echo '000';} ?>" -->
                        </div>  

                    </div>
                    
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    
        </form>


    </div>
</div>       