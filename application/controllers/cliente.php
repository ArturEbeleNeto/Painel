<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

    protected $Errors;
    protected $Retorno;

    
    public function index()
	{		
            
                $this->load->model('cliente_model');
                $Clientes = $this->cliente_model->Listar_Clientes_Endereco();         
                        
                $Dados = array(
                    'Pagina' => 'clientes/ConsultaClientes_view',
                    'Titulo' => 'Clientes - Painel Administrativo',
                    'Modo'   => 'VIS',
                    'Clientes' => $Clientes);
                $this->load->view('layout/layout_view', $Dados);
	}
        
        public function ListarClientesJson($CodCliente = null){
            $this->load->model('cliente_model');
            $Clientes = $this->cliente_model->Listar_Clientes_Endereco($CodCliente);
            echo json_encode($Clientes);
        }
  
        
        public function ProcessarCliente(){            
                
            $this->Errors = Array();
            $this->Retorno = array();
            $this->Retorno['status'] = 1;
            
            if($this->input->post('txtCodClienteBanco') == ''){
                $this->Gravar(1);
            }
            else{
                $this->Gravar(2);                
            }           
            
            echo json_encode($this->Retorno);
        }                

        public function Gravar($Modo = NULL)
	{
            if($this->Validar_Formulario_Cliente(1))           
            {
                $Nomes = array(
                    'CodCliente'        => $this->input->post('txtCodClienteBanco'),
                    'NomeCliente'       => $this->input->post('txtNomeCliente'),
                    'SobreNomeCliente'  => $this->input->post('txtSobreNomeCliente'),
                    'EmailCliente'      => $this->input->post('txtEmailCliente'),
                    'TelefoneCliente'   => $this->input->post('txtTelefoneCliente'),
                    'CelularCliente'    => $this->input->post('txtCelularCliente'),
                    'SexoCliente'       => $this->input->post('rdoSexoCliente'),
                    'CPFCliente'        => $this->input->post('txtCPFCliente'),
                    'RGCliente'         => $this->input->post('txtRGCliente'),
                    'DataNasCliente'    => $this->input->post('txtDataNasCliente'),
                    'SenhaCliente'      => md5($this->input->post('txtSenhaCliente')),
                    'DataCadastro'      => date('Y-m-d')
                );                                              
                $dados = elements(array(
                    'CodCliente','NomeCliente','SobreNomeCliente','EmailCliente',
                    'TelefoneCliente','CelularCliente','SexoCliente','CPFCliente',
                    'RGCliente','DataNasCliente','SenhaCliente','DataCadastro'), $Nomes);
                
                $this->load->model('cliente_model');
                
                if($this->input->post('txtCodClienteBanco') == ''){
                   $this->cliente_model->Inserir($dados);                    
                }
                else{                    
                   $this->cliente_model->Atualizar($dados);                                        
                }
                
                $this->Retorno['status'] = '1';
            } 
        }


        
        public function Editar($CodCliente)
	{   

            $this->load->model('cliente_model');
            $Cliente = $this->cliente_model->Buscar_Cliente($CodCliente);  

            $Dados = array(
                'Pagina' => 'clientes/CadastroClientes_view',
                'Titulo' => 'Clientes - Blem Collection',
                'Cliente' => $Cliente[0],
                'FinalizaCompra'    =>'',
            );

            $this->load->view('layout/layout_view', $Dados);
        }
            
        public function Cadastro() {

            $this->load->model('cliente_model');                        
            $CodCliente = $this->cliente_model->GetCodCliente();
            
            $Dados = array(
                'Pagina' => 'clientes/CadastroClientes_view',
                'Titulo' => 'Clientes - Painel Administrativo',
                'Modo'   => 'ADD',
                'Cliente' => array(
                        'CodCliente' => $CodCliente,
                        'CodClienteBanco' => '',
                        'NomeCliente' => '',
                        'SobreNomeCliente' => '',
                        'EmailCliente' => '',
                        'TelefoneCliente' => '',
                        'CelularCliente' => '',
                        'SexoCliente' => '',
                        'CPFCliente' => '',
                        'RGCliente' => '',
                        'DataNasCliente' => '',

                    ),
                );
            $this->load->view('layout/layout_view', $Dados);
            
            
        }
      
  
        public function Ficha($CodCliente)
            {                                        
                $this->load->model('cliente_model');
                $Cliente = $this->cliente_model->Buscar_Cliente($CodCliente);                         
            
                $this->load->model('endereco_model');
                $Enderecos = $this->endereco_model->Buscar_Endereco_Cliente($CodCliente);                                        
                
                $Dados = array(
                    'Pagina' => 'clientes/FichaClientes_view',
                    'Titulo' => 'Clientes - Painel Administrativo',
                    'Modo'   => 'VIS',
                                                           
                    'Cliente' => $Cliente,
                    
                    'Enderecos' => $Enderecos,
                    
                    );
                $this->load->view('layout/layout_view', $Dados);

            }
            
            
            public function Excluir($CodCliente) {
                
                $this->load->model('endereco_model');
                $this->endereco_model->Excluir($CodCliente);

                $this->load->model('cliente_model');
                $this->cliente_model->Excluir($CodCliente);
                
              
                redirect('Cliente');
                
                
            }


        
        public function Validar_Formulario_Cliente($Modo =1)
        {
            
      
            //Remove os caracteres não numericos pois
            //Esses campos vem com a mascara do formulario
            $_POST['txtTelefoneCliente'] = preg_replace('/[^0-9]/', '', $_POST['txtTelefoneCliente']);
            $_POST['txtCelularCliente'] = preg_replace('/[^0-9]/', '', $_POST['txtCelularCliente']);;
            $_POST['txtCPFCliente'] = preg_replace('/[^0-9]/', '', $_POST['txtCPFCliente']);
            
            $this->form_validation->set_rules('txtCodigoCliente', 'Codigo', 'numeric');
            $this->form_validation->set_rules('txtCodigoClienteBanco', 'Codigo', 'numeric');
            $this->form_validation->set_rules('txtNomeCliente', 'Nome', 'required');
            $this->form_validation->set_rules('txtSobreNomeCliente', 'Sobre nome', 'required');   
            
            if($Modo == 1){//Inserção
                $this->form_validation->set_rules('txtEmailCliente', 'Email', 'required|valid_email');            
            }
            else { //2 - atualização
                $this->form_validation->set_rules('txtEmailCliente', 'Email', 'required|valid_email');            
            }
            
            $this->form_validation->set_rules('txtTelefoneCliente', 'Telefone', 'required|numeric');            
            $this->form_validation->set_rules('txtCelularCliente', 'Celular', 'numeric');
            $this->form_validation->set_rules('rdoSexoCliente', 'Sexo', 'required');
            $this->form_validation->set_rules('txtCPFCliente', 'CPF', 'required|numeric|exact_length[11]');
            $this->form_validation->set_rules('txtRGCliente', 'RG', 'max_length[20]');            
            $this->form_validation->set_rules('txtDataNasCliente', 'Data de nascimento', 'required');                                    
            //$this->form_validation->set_rules('txtSenhaCliente', 'Senha', 'required');
            //$this->form_validation->set_rules('txtConfirmaSenha', 'Confirmação de senha', 'required|matches[txtSenhaCliente]');
            
                                  
            if ($this->form_validation->run() == FALSE)
            {     
                
                
               $CodCliente = NULL; 
               if (set_value('txtCodClienteBanco')){
                   $CodCliente = set_value('txtCodClienteBanco'); 
               } 
               else {
                   $this->load->model('cliente_model');
                   $CodCliente = $this->cliente_model->GetCodCliente();   
               }
                
                
               $Dados = array(
                    'Pagina' => 'clientes/CadastroClientes_view',
                    'Titulo' => 'Clientes - Painel de Controle',
                    'Cliente' => array(
                        'CodCliente'        => $CodCliente,
                        'CodClienteBanco'   => set_value('txtCodigoCliente'),
                        'NomeCliente'       => set_value('txtNomeCliente'),
                        'SobreNomeCliente'  => set_value('txtSobreNomeCliente'),
                        'EmailCliente'      => set_value('txtEmailCliente'),
                        'TelefoneCliente'   => set_value('txtTelefoneCliente'),
                        'CelularCliente'    => set_value('txtCelularCliente'),
                        'SexoCliente'       => set_value('rdoSexoCliente'),
                        'CPFCliente'        => set_value('txtCPFCliente'),
                        'RGCliente'         => set_value('txtRGCliente'),
                        'DataNasCliente'    => set_value('txtDataNasCliente'),
                        'SenhaCliente'      => set_value('txtSenhaCliente'),
                        'DataCadastro'      => '',                        
                        ),                   
                    
                );
           
                $this->Retorno['status'] = '0';
                $this->Retorno['erros'] = validation_errors();

                return false;
            }else{
                return true;
            }
            
        }

}

