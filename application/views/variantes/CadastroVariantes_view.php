

<h2>Cadastro de Variantes</h2>


<div class="row row-CadastroVariantes">
    
    <div class="col-md-12 column">

        <?php
               echo validation_errors();

               if($Variante['CodVariante'])
               {
                   echo '<form id="frmCadastroVariante" name="frmCadastroVariante" method="post" action="'.base_url('index.php/Variante/Editar/'.$Variante['CodVariante'].'/Salvar').'">';         
               }
               else
               {                                                                                       
                   echo '<form id="frmCadastroVariante" name="frmCadastroVariante" method="post" action="'.base_url('index.php/Variante/Gravar').'">';         
               }


        ?>        
        
                    <input name="txtCodigoVariante" type="hidden" value="<?php echo $Variante['CodVariante'] ?>" class="form-control" id="txtCodVariante">      

                                                                                                   
                    <div class="form-group">
                        <label for="txtRefVariante">Referência:</label>
                        <input name="txtRefVariante" type="text" value="<?php echo $Variante['RefVariante'] ?>" class="form-control" id="txtRefVariante" placeholder="Ex: Az002">
                    </div>
        
                    
                    <div class="form-group">
                        <label for="txtDescVariante">Descrição:</label>
                        <input name="txtDescVariante" type="text" value="<?php echo $Variante['DescVariante'] ?>" class="form-control" id="txtDescVariante" placeholder="Ex: Azul">
                    </div>                    

                    <div class="form-group row col-lg-8">
                        <label for="txtHexaDecimal">Cor:</label>
                        <input name="txtHexaDecimal" type="text" value="<?php if($Variante['HexaDecimal']){echo $Variante['HexaDecimal'];}else{echo '000';} ?>" class="pick-a-color form-control" id="txtHexadecimal">
                    </div>     
                    

                    
                    <div class="row col-md-12">            
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    </div>
                    
        </form>


    </div>
</div>       