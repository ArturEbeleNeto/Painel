<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedor extends CI_Controller {

        protected $Errors;
        protected $Retorno;
        
        
        public function index()
	{		
            
                $this->load->model('vendedor_model');
                $Vendedores = $this->vendedor_model->Listar_Vendedores();         
                        
                $Dados = array(
                    'Pagina' => 'vendedores/ConsultaVendedores_view',
                    'Titulo' => 'Vendedores - Painel Administrativo',
                    'Modo'   => 'VIS',
                    'Vendedores' => $Vendedores);
                                
                $this->load->view('layout/layout_view', $Dados);
	}

        

        public function Cadastro() {

                $this->load->model('vendedor_model');
                $CodVendedor = $this->vendedor_model->GetCodVendedor();                                                          
    
                $Dados = array(
                    'Pagina' => 'vendedores/CadastroVendedores_view',
                    'Titulo' => 'Vendedores - Painel Administrativo',
                    'Modo'   => 'ADD',
                    'Vendedor' => array(                           
                            'CodVendedor' => $CodVendedor,
                            'CodVendedorBanco' => '',
                            'NomeVendedor' => '',
                            'TaxaComissao' => '',
                            'CodCliente' => '',                            
                        ),                    
                    );
                $this->load->view('layout/layout_view', $Dados);                        
        }      
       
            
        public function Excluir($CodVendedor) {
                
                $this->load->model('vendedor_model');
                $this->vendedor_model->Excluir($CodVendedor);
                
                redirect('Vendedor');
                
            }

        public function VerificaCodCliente($str){

            $this->load->model('cliente_model');
            $Row = $this->cliente_model->Buscar_Cliente($str);            
            
            if ($Row <> null){
                return TRUE;
            }else{
                $this->form_validation->set_message('VerificaCodCliente', 'Código do cliente não cadastrado');
                return FALSE;
            }
         
	}    
        
        public function VerificaCodClienteUnico($CodCliente){

            $this->load->model('vendedor_model');
            $Row = $this->vendedor_model->VerificaCodClienteUnico($CodCliente, $this->input->post('txtCodVendedor'));            
            
            if ($Row){
                return TRUE;
            }else{
                $this->form_validation->set_message('VerificaCodClienteUnico', 'Código do cliente já cadastrado para outro vendedor');
                return FALSE;
            }         
	}  
        
        public function Validar_Formulario_Vendedor()
        {       

            $CodVendedor = NULL; 
            if (!$this->input->post('txtCodVendedor') && !$this->input->post('txtCodVendedorBanco')){
                $this->load->model('vendedor_model');
                $CodVendedor = $this->vendedor_model->GetCodVendedor();   
                $_POST['txtCodVendedor'] = $CodVendedor;                
            } 
            else {
                $CodVendedor = $this->input->post('txtCodVendedorBanco');
                $_POST['txtCodVendedor'] = $this->input->post('txtCodVendedorBanco');     
            }

            
            $this->form_validation->set_rules('txtCodVendedor', 'Codigo', 'numeric');
            $this->form_validation->set_rules('txtCodVendedorBanco', 'Codigo', 'numeric');
            
            
            $this->form_validation->set_rules('txtNomeVendedor', 'Nome', 'required');
            $this->form_validation->set_rules('txtTaxaComissao', 'Comissão', 'required|numeric');
            $this->form_validation->set_rules('txtCodCliente', 'Código cliente', 'required|numeric|callback_VerificaCodCliente|callback_VerificaCodClienteUnico');

           
            if ($this->form_validation->run() == FALSE)
            {        
                               
               $Dados = array(
                    'Pagina' => 'vendedores/CadastroVendedores_view',
                    'Titulo' => 'Vendedores - Painel de Controle',
                    'Vendedor' => array(
                            'CodVendedor' =>         $CodVendedor,
                            'CodVendedorBanco' =>    set_value('txtCodVendedorBanco'),
                            'NomeVendedor' =>        set_value('txtNomeVendedor'),
                            'TaxaComissao' =>        set_value('txtTaxaComissao') ,
                            'CodCliente' =>          set_value('txtCodCliente'),                       
                        ),                                       
                );
            
               $this->Retorno['status'] = '0';
               $this->Retorno['erros'] = validation_errors();
               
		$this->load->view('layout/layout_view', $Dados);
                return false;
            }
            else 
                {
                return true;
                }            
        }

        
        public function BuscaVendedor($CodVendedor){
            $this->load->model('vendedor_model');
            $Vendedor = $this->vendedor_model->Buscar_Vendedor($CodVendedor);    
            
            if ($Vendedor) {
                echo '1';
            }
            else{
                echo '0';
            }
        }
        
        public function ListarVendedoresJson(){
            $this->load->model('vendedor_model');
            $Vendedores = $this->vendedor_model->Listar_Vendedores();
            echo json_encode($Vendedores);
        }
        
        public function BuscarVendedorJson($CodVendedor){
            $this->load->model('vendedor_model');
            $Vendedores = $this->vendedor_model->Listar_Vendedores($CodVendedor);
            echo json_encode($Vendedores);
        }
        
        public function ProcessarVendedor(){
            
            $this->Errors = Array();
            $this->Retorno = array();
                
            
            $this->Gravar(1);
            
            if ($this->Retorno['status'] == 1){
                redirect("Vendedor");
            }
            
        }                
        
        public function Gravar()
	{                       
            if($this->Validar_Formulario_Vendedor())           
            { 
                $Nomes = array(
                    'CodVendedor' => $this->input->post('txtCodVendedorBanco'),
                    'NomeVendedor' => $this->input->post('txtNomeVendedor'),
                    'TaxaComissao' => $this->input->post('txtTaxaComissao'),
                    'CodCliente' => $this->input->post('txtCodCliente'),
                    
                );                                              
                
                $dados = elements(array(
                        'CodVendedor','NomeVendedor', 'TaxaComissao', 'CodCliente'), $Nomes);
                
                $this->load->model('vendedor_model');
                
                if($this->input->post('txtCodVendedorBanco') == ''){
                    $this->vendedor_model->Inserir($dados);
                }else{        
                    $this->vendedor_model->Atualizar($dados);
                }
                
                $this->Retorno['status'] = '1';
                                 
            } 
        }        
        
        
        public function Editar($CodVendedor, $Salvar = NULL)
	{   
                $this->load->model('vendedor_model');
                $Vendedor = $this->vendedor_model->Buscar_Vendedor($CodVendedor);                 
                
                $Dados = array(
                    'Pagina' => 'vendedores/CadastroVendedores_view',
                    'Titulo' => 'Vendedores - Blem Collection',
                    'Vendedor' => $Vendedor[0],
                    'FinalizaCompra'    =>'',
                );
            
		$this->load->view('layout/layout_view', $Dados);            
        }
        
                      
}