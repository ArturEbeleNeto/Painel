<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tamanho extends CI_Controller {

    protected $Errors;
    protected $Retorno;       
    
    public function Processar(){            

        $this->Errors = Array();
        $this->Retorno = array();
        $this->Retorno['status'] = 1;

        $this->Gravar();
        
        echo json_encode($this->Retorno);
    }                
    
            
    public function BuscarTamanhos($CodGrade = null){
        $this->load->model('tamanho_model');
        $Tamanhos = $this->tamanho_model->Listar_Tamanhos($CodGrade);
        echo json_encode($Tamanhos);
    }

    public function ExibirPopUp($CodGrade, $CodTamanho = NULL){

        if($CodTamanho){
            $Modo = 'Edição';
            $CadastroTam = 0;
            $this->load->model('tamanho_model');                
            $Tamanho = $this->tamanho_model->Listar_Tamanhos($CodGrade, $CodTamanho);                         
            $Tamanho = $Tamanho[0];
        }
        else{
            $Modo = 'Cadastro';
            $CadastroTam = 1;
            $Tamanho = array(
                'CodGrade' => $CodGrade,
                'CodTamanho' => '',
                'NrSeqTam' => 0,
                'DescTamanho' => '',                   
                'Proporcao' => '',                   
            );
        }

        $Dados = array(                                
            'Modo'   => $Modo,
            'CadastroTam' => $CadastroTam,
            'Tamanho' => $Tamanho
        );

        $this->load->view('tamanhos/popCadastroTamanhos_view', $Dados);
    }
            
           
            
    public function Gravar(){
        
        if($this->Validar_Formulario_Tamanho(1)){   
            
            $this->load->model('tamanho_model');
            if ($this->input->get('txtNrSeqTam')){
                $NrSeqTam = $this->input->get('txtNrSeqTam');
            }else{
                $NrSeqTam = $this->tamanho_model->Buscar_NrSeqTam($this->input->get('txtCodGrade'));
            }
            
            $Nomes = array(                                            
                'CodGrade' => $this->input->get('txtCodGrade'),
                'CodTamanho' => $this->input->get('txtCodTamanho'),
                'NrSeqTam' => $NrSeqTam,
                'DescTamanho' => $this->input->get('txtDescTamanho'),
                'Proporcao' => $this->input->get('txtProporcao'),
            );                                              

            $dados = elements(array('CodGrade','CodTamanho','NrSeqTam','DescTamanho','Proporcao'), $Nomes);                                    
            
            if($this->input->get('txtCadastroTam') == '1'){
                $this->tamanho_model->Inserir($dados);        
            }else{
                $this->tamanho_model->Atualizar($dados);        
            }                       
            $this->Retorno['status'] = '1';
        } 
    }
        
    public function Validar_Formulario_Tamanho($Modo =1){ 
        
        if(!$_POST){
            $_POST = $_GET;
        }
        
        $this->form_validation->set_rules('txtCodGrade', 'Código Grade', 'numeric');            
        $this->form_validation->set_rules('txtCodTamanho', 'Código Tamanho', 'required');            
        $this->form_validation->set_rules('txtDescTamanho', 'Descrição', 'required');
        $this->form_validation->set_rules('txtProporcao', 'Proporção', 'numeric');
        
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE){   
            
            $this->Retorno['status'] = '0';
            $this->Retorno['erros'] = validation_errors();           
            
            return false;
        }
        else {
            return true;
        }            
    }
        
    public function Excluir($CodGrade, $CodTamanho) {
        $this->load->model('tamanho_model');
        $this->tamanho_model->Excluir($CodGrade, $CodTamanho);           
    }
     
}