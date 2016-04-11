<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Endereco extends CI_Controller {
        
    protected $Errors;
    protected $Retorno;
    
    
    public function index(){       
        $this->Cadastro();
    }

    public function ExibirPopUp($CodCliente, $CodEndereco = NULL){

        if($CodEndereco){
            $Modo = 'Edição';
            $this->load->model('endereco_model');                
            $Endereco = $this->endereco_model->Buscar_Endereco_Cliente($CodCliente, $CodEndereco);                         
            $Endereco = $Endereco[0];
        }
        else{
            $Modo = 'Cadastro';
            $Endereco = array(
                'CodEndereco'   =>'',
                'CodCliente'    => $CodCliente,
                'CEP'           =>'',
                'Rua'           =>'',
                'NumResidencia'=>'',
                'Complemento'   =>'',
                'Estado'        =>'',
                'Cidade'        =>'',
                'Bairro'        =>'',
                'Referencia'    =>'',
                'NomeContato'   =>'',
                'TelefoneContato'=>'',                        
            );
        }

        $Dados = array(                                
            'Modo'   => $Modo,
            'Endereco' => $Endereco
            );

        $this->load->view('enderecos/popCadastroEndereco_view',$Dados);
    }
        
    
    public function ProcessarEndereco(){
            
        $this->Errors = Array();
        $this->Retorno = array();

        
           $_POST = $_GET;
        
        
        $this->Gravar();
        
        echo json_encode($this->Retorno);

    }                

    
    public function Gravar(){
        
        if($this->Validar_Formulario_Endereco()){
            $Nomes = array(      
                'CodEndereco'               => $this->input->post('txtCodEnderecoBanco'),
                'CodCliente' 		=> $this->input->post('txtCodCliente'),			
                'CEP' 			=> $this->input->post('txtCEPCliente'),			
                'Rua'			=> $this->input->post('txtRuaCliente'),								
                'NumResidencia'             => $this->input->post('txtNumResidenciaCliente'),								
                'Complemento'		=> $this->input->post('txtComplementoCliente'),										
                'Bairro' 			=> $this->input->post('txtBairroCliente'),							
                'Cidade'			=> $this->input->post('txtCidadeCliente'),										
                'Estado' 			=> $this->input->post('txtEstadoCliente'),												
                'Referencia' 		=> $this->input->post('txtReferenciaCliente'),													
                'NomeContato' 		=> $this->input->post('txtNomeContato'),														
                'SobreNomeContato'          => '', //Vai ser usado apenas o campo nome para o nome completo															
                'TelefoneContato'           => $this->input->post('txtTelefoneContato'),
                'TipoEndereco'		=> $this->input->post('txt')
            );                              

            $dados = elements(array(
                'CodEndereco','CodCliente','CEP','Rua','NumResidencia','Complemento','Bairro','Cidade','Estado',
                'Referencia','NomeContato','SobreNomeContato','TelefoneContato','TipoEndereco'), $Nomes);

            $this->load->model('endereco_model');
            if ($this->input->post('txtCodEnderecoBanco')) {
                $this->endereco_model->Atualizar($dados);                    
            }else{                    
                $this->endereco_model->Inserir($dados);                   
            }
            
            $this->Retorno['status'] = '1';
            
        } 
    }
        
    public function Validar_Formulario_Endereco(){

        $this->form_validation->set_rules('txtCodClienteBanco', 'Codigo cliente', 'numeric');                
        $this->form_validation->set_rules('txtCodEndereco', 'Codigo endereco', 'numeric');                

        $this->form_validation->set_rules('txtCEPCliente', 'CEP', 'required|numeric');                
        $this->form_validation->set_rules('txtRuaCliente', 'Rua', 'required');            
        $this->form_validation->set_rules('txtNumResidenciaCliente', 'Numero Residencial', 'required');            
        $this->form_validation->set_rules('txtComplementoCliente', 'Complemento');            
        $this->form_validation->set_rules('txtEstadoCliente', 'Estado', 'required');            
        $this->form_validation->set_rules('txtCidadeCliente', 'Cidade', 'required');
        $this->form_validation->set_rules('txtBairroCliente', 'Bairro', 'required');
        $this->form_validation->set_rules('txtReferenciaCliente', 'Referência');      
        //$this->form_validation->set_rules('txtNomeContato', 'Nome do contato', 'required');
        //$this->form_validation->set_rules('txtTelefoneContato', 'Telefone do contato', 'required');            

        $this->form_validation->set_error_delimiters('', '');
        
        if ($this->form_validation->run() == FALSE){      

            $Dados = array(
                'Pagina' => 'enderecos/CadastroEndereco_view',
                'Titulo' => 'Endereços - Blem Collection',
                'Endereco' => array(
                    'CodEndereco'     => set_value('txtCodEndereco'),
                    'CodCliente'      => set_value('txtCodCliente'),
                    'CEP'             => set_value('txtCEPCliente'),
                    'Rua'             => set_value('txtRuaCliente'),
                    'NumResidencia'   => set_value('txtNumResidenciaCliente'),
                    'Complemento'     => set_value('txtComplementoCliente'),
                    'Estado'          => set_value('txtEstadoCliente'),
                    'Cidade'          => set_value('txtCidadeCliente'),
                    'Bairro'          => set_value('txtBairroCliente'),
                    'Referencia'      => set_value('txtReferenciaCliente'),
                    'NomeContato'     => set_value('txtNomeContato'),
                    'TelefoneContato' => set_value('txtTelefoneContato'),                        
                ),
            );

            $this->Retorno['status'] = '0';
            $this->Retorno['erros'] = validation_errors();
                        
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

              
    public function Excluir($CodCliente, $CodEndereco = NULL){
        $this->load->model('endereco_model');
        $this->endereco_model->Excluir($CodCliente, $CodEndereco);
        redirect('Cliente/Ficha/'.$CodCliente);

    }

    public function RetornaCidadesJson($CodEstado){
        $this->load->model('endereco_model');
        $Cidades = $this->endereco_model->Buscar_Cidades_Json($CodEstado);
        if($Cidades){
            echo json_encode($Cidades);
        }
        else{
            echo json_encode('');
        }
    }

    public function RetornaEnderecosJson($CodEndereco = null, $CodCliente){
        $this->load->model('endereco_model');
        $Enderecos = $this->endereco_model->Buscar_Enderecos_Json($CodEndereco, $CodCliente);
        if($Enderecos){
            echo json_encode($Enderecos);        
        }else{
            echo json_encode('');
        }
        
    }

    public function RetornaEstadosJson(){
        $this->load->model('endereco_model');
        $Estados = $this->endereco_model->Listar_Estados_JSON();
        echo $Estados;
    }

    public function BuscarCidades($CodEstado, $CodCliente = null, $CodEndereco = null){
        $this->load->model('endereco_model');
        $Cidades = $this->endereco_model->Buscar_Cidades($CodEstado);

        $CidadeSel[0]['Cidade'] = 0;
        
        if($CodCliente){
            $CidadeSel = $this->endereco_model->Buscar_Endereco_Cliente($CodCliente, $CodEndereco);                         
        }
        
        
        foreach ($Cidades as $Cid){
            if($CidadeSel[0]['Cidade'] == $Cid['CodCidade']){
                echo '<option value="'.$Cid['CodCidade'].'" selected>'.$Cid['NomeCidade'].'</option>';
            }else{
                echo '<option value="'.$Cid['CodCidade'].'">'.$Cid['NomeCidade'].'</option>';
            }
        }

    }

    public function BuscarEstados($CodCliente = null, $CodEndereco = null){
        $this->load->model('endereco_model');
        $Estados = $this->endereco_model->Buscar_Estados();
        
        $EstadoSel[0]['Estado'] = '';
        
        if($CodCliente){
            $EstadoSel = $this->endereco_model->Buscar_Endereco_Cliente($CodCliente, $CodEndereco);                         
        }
     
        

        foreach ($Estados as $Est){
            
            if($EstadoSel[0]['Estado'] == $Est['SiglaEstado']){
                echo '<option CodEst="'.$Est['CodEstado'].'" value="'.$Est['SiglaEstado'].'" selected>'.$Est['DescEstado'].'</option>';
            }else{
                echo '<option CodEst="'.$Est['CodEstado'].'" value="'.$Est['SiglaEstado'].'">'.$Est['DescEstado'].'</option>';
            }
            
        }

    }
    
        
}

    






