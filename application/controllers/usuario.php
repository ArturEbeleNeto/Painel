<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

        protected $Errors;
        protected $Retorno;
        
        
        public function index()
	{		
            
                $this->load->model('usuario_model');
                $Usuarios = $this->usuario_model->Listar_Usuarios();         
                        
                $Dados = array(
                    'Pagina' => 'usuarios/ConsultaUsuarios_view',
                    'Titulo' => 'Usuarios - Painel Administrativo',
                    'Modo'   => 'VIS',
                    'Usuarios' => $Usuarios);
                                
                $this->load->view('layout/layout_view', $Dados);
	}

        

        public function Cadastro() {

                $this->load->model('usuario_model');
                $CodUsuario = $this->usuario_model->GetCodUsuario();                                                          
    
                $Dados = array(
                    'Pagina' => 'usuarios/CadastroUsuarios_view',
                    'Titulo' => 'Usuarios - Painel Administrativo',
                    'Modo'   => 'ADD',
                    'Usuario' => array(                           
                            'CodUsuario' => $CodUsuario,
                            'CodUsuarioBanco' => '',
                            'DescUsuario' => '',
                            'NomeUsuario' => '',                            
                            'SenhaUsuario' => '',                            
                            'CodCliente' => '',                                                        
                            'TipoUsuario' => '',                            
                        ),                    
                    );
                $this->load->view('layout/layout_view', $Dados);                        
        }      
       
            
        public function Excluir($CodUsuario) {
                
                $this->load->model('usuario_model');
                $this->usuario_model->Excluir($CodUsuario);
                
                redirect('Usuario');
                
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

            $this->load->model('usuario_model');
            $Row = $this->usuario_model->VerificaCodClienteUnico($CodCliente, $this->input->post('txtCodUsuarioBanco'));            
            
            if ($Row){
                return TRUE;
            }else{
                $this->form_validation->set_message('VerificaCodClienteUnico', 'Código do cliente já cadastrado para outro usuário');
                return FALSE;
            }         
	}  
        
        public function VerificaNomeUsuarioUnico($NomeUsuario){

            $this->load->model('usuario_model');
            $Row = $this->usuario_model->VerificaNomeUsuarioUnico($NomeUsuario, $this->input->post('txtCodUsuarioBanco'));            
            
            if ($Row){
                return TRUE;
            }else{
                $this->form_validation->set_message('VerificaCodClienteUnico', 'Código do cliente já cadastrado para outro usuário');
                return FALSE;
            }         
	}
        
        public function AlterarSenha(){
            
            $Nomes = array(
                'CodUsuario' => $this->input->post('CodUsuario'),
                'SenhaUsuario' => $this->input->post('NovaSenha'),                    
            );                                              

            $dados = elements(array('CodUsuario','SenhaUsuario'), $Nomes);            
            
            $this->load->model('usuario_model');
            $this->usuario_model->Atualizar($dados);                      
        }
        
        public function RealizaLogin($NomeUsuario, $SenhaUsuario){
            $this->load->model('usuario_model');
            $Usuario = $this->usuario_model->RealizaLogin($NomeUsuario, $SenhaUsuario);          
            echo json_encode($Usuario);
        }

        
        public function Validar_Formulario_Usuario($Modo)
        {                                                                                                         
            $this->form_validation->set_rules('txtCodUsuario', 'Codigo', 'numeric');
            $this->form_validation->set_rules('txtCodUsuarioBanco', 'Codigo', 'numeric');
            
            $this->form_validation->set_rules('txtDescUsuario', 'Descrição', 'required');
            $this->form_validation->set_rules('txtSenhaUsuario', 'Senha', 'required');
            
            $this->form_validation->set_rules('txtCodCliente', 'Código de cliente', 'required|numeric|callback_VerificaCodCliente|callback_VerificaCodClienteUnico');
            $this->form_validation->set_rules('txtNomeUsuario', 'Nome de usuário', 'required|callback_VerificaNomeUsuarioUnico');                                        
             
            //$this->form_validation->set_rules('txtTipoUsuario', 'Tipo de Usuário', 'required');
                       
            $this->form_validation->set_message('is_unique', 'Já existe um usuário cadastrado com este %s');
            
            if ($this->form_validation->run() == FALSE)
            {        
                
               $CodUsuario = NULL; 
               if (set_value('txtCodUsuarioBanco')){
                   $CodUsuario = set_value('txtCodUsuarioBanco'); 
               } 
               else {
                   $this->load->model('usuario_model');
                   $CodUsuario = $this->usuario_model->GetCodUsuario();   
               }
                
               $Dados = array(
                    'Pagina' => 'usuarios/CadastroUsuarios_view',
                    'Titulo' => 'Usuarios - Painel de Controle',
                    'Usuario' => array(
                            'CodUsuario' =>         $CodUsuario,
                            'CodUsuarioBanco' =>    set_value('txtCodUsuarioBanco'),
                            'DescUsuario' =>        set_value('txtDescUsuario'),
                            'NomeUsuario' =>        set_value('txtNomeUsuario'),
                            'SenhaUsuario' =>        set_value('txtSenhaUsuario'),                            
                            'CodCliente' =>          set_value('txtCodCliente'),  
                            'TipoUsuario' =>        set_value('txtTipoUsuario') ,
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

        
        public function BuscaUsuario($CodUsuario){
            $this->load->model('usuario_model');
            $Usuario = $this->usuario_model->Buscar_Usuario($CodUsuario);    
            
            if ($Usuario) {
                echo '1';
            }
            else{
                echo '0';
            }
        }
        
        public function ListarUsuariosJson(){
            $this->load->model('usuario_model');
            $Usuarios = $this->usuario_model->Listar_Usuarios();
            echo json_encode($Usuarios);
        }
        
        public function BuscarUsuarioJson($CodUsuario){
            $this->load->model('usuario_model');
            $Usuarios = $this->usuario_model->Listar_Usuarios($CodUsuario);
            echo json_encode($Usuarios);
        }
        
        public function ProcessarUsuario(){
            
            $this->Errors = Array();
            $this->Retorno = array();
                
            if($this->input->post('txtCodUsuarioBanco') == ''){
                $this->Gravar(1); //Incluir
            }
            else{                
                $this->Gravar(2); //Editar                
            }
            
            if ($this->Retorno['status'] <> '0'){
                redirect("Usuario");
            }
            
        }                
        
        public function Gravar($Modo)
	{                       
            if($this->Validar_Formulario_Usuario($Modo))           
            { 
                $Nomes = array(
                    'CodUsuario' => $this->input->post('txtCodUsuarioBanco'),
                    'DescUsuario' => $this->input->post('txtDescUsuario'),
                    'NomeUsuario' => $this->input->post('txtNomeUsuario'),
                    'SenhaUsuario' => $this->input->post('txtSenhaUsuario'),
                    'CodCliente' => $this->input->post('txtCodCliente'),
                    'TipoUsuario' => $this->input->post('txtTipoUsuario'),
                    
                );                                              
                
                $dados = elements(array(
                        'CodUsuario','DescUsuario', 'NomeUsuario','SenhaUsuario', 'TipoUsuario', 'CodCliente'), $Nomes);
                
                $this->load->model('usuario_model');
                
                if($Modo == 1){
                    $this->usuario_model->Inserir($dados);
                }else{                    
                    $this->usuario_model->Atualizar($dados);
                }
                
                $this->Retorno['status'] = '1';
                                 
            } 
        }        
        
        
        public function Editar($CodUsuario, $Salvar = NULL)
	{   
                $this->load->model('usuario_model');
                $Usuario = $this->usuario_model->Buscar_Usuario($CodUsuario);                 
                
                $Dados = array(
                    'Pagina' => 'usuarios/CadastroUsuarios_view',
                    'Titulo' => 'Usuarios - Blem Collection',
                    'Usuario' => $Usuario[0],
                    'FinalizaCompra'    =>'',
                );
            
		$this->load->view('layout/layout_view', $Dados);            
        }
        
                      
}