<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Variante extends CI_Controller {

    
    
	public function index()
	{		
            
                $this->load->model('variante_model');
                $Variantes = $this->variante_model->Listar_Variantes();         
                        
                $Dados = array(
                    'Pagina' => 'variantes/ConsultaVariantes_view',
                    'Titulo' => 'Variantes - Painel Administrativo',
                    'Modo'   => 'VIS',
                    'Variantes' => $Variantes);
                                      
                $this->load->view('layout/layout_view', $Dados);
	}
        
        
        public function ListarVariantes()
            {
                $this->load->model('variante_model');
                $Variantes = $this->variante_model->Listar_Variantes();         
                if ($Variantes)
                {
                    echo json_encode($Variantes);
                }
                else
                {
                    echo json_encode('');
                }
            }
        
        
            
        public function ExibirPopUp($CodGrade = NULL)
        {

            
            if($CodGrade){
                $Modo = 'Edição';
                $this->load->model('grade_model');                
                $Grade = $this->grade_model->Listar_Grades_Array($CodGrade);                         
                $Grade = $Grade[0];
            }
            else{
                $Modo = 'Cadastro';
                $Grade = array(
                    'CodGrade' => '',
                    'DescGrade' => '',
                    'SitGrade' => '',
                );
            }

            $Dados = array(                                
                'Modo'   => $Modo,
                'Grade' => $Grade
                );
            
            $this->load->view('variantes/popPesqVariantes_view',$Dados);
        }
        
        
        
        public function Cadastro() {

                $Dados = array(
                    'Pagina' => 'variantes/CadastroVariantes_view',
                    'Titulo' => 'Variantes - Painel Administrativo',
                    'Modo'   => 'ADD',
                    'Variante' => array(                           
                            'CodVariante' => '',
                            'RefVariante' => '',
                            'DescVariante' => '',
                            'HexaDecimal' => '',
                            'CodImagemVariante' => '',
                        ),
                    );
                $this->load->view('layout/layout_view', $Dados);
            
            
        }
        
        
        public function Gravar()
	{
            if($this->Validar_Formulario_Variante(1))           
            {   
                $Nomes = array(
                    'CodVariante' => $this->input->post('txtCodVariante'),
                    'RefVariante' => $this->input->post('txtRefVariante'),
                    'DescVariante' => $this->input->post('txtDescVariante'),
                    'HexaDecimal' => $this->input->post('txtHexaDecimal'),
                );                                              
                
                $dados = elements(array('RefVariante','DescVariante','HexaDecimal'), $Nomes);
                
                $this->load->model('variante_model');
                $this->variante_model->Inserir($dados);                                                          
                
                redirect('variante');
            } 
        }

              
            public function Excluir($CodVariante) {
                
                $this->load->model('variante_model');
                $this->variante_model->Excluir($CodVariante);
                
                redirect('Variante');
                
            }


        
        public function Validar_Formulario_Variante($Modo =1)
        {                                                                                                         
            $this->form_validation->set_rules('txtCodVariante', 'Codigo', 'numeric');
            //$this->form_validation->set_rules('txtRefVariante', 'Referência', 'required');
            $this->form_validation->set_rules('txtDescVariante', 'Descrição', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {                                   
               $Dados = array(
                    'Pagina' => 'produtos/CadastroProdutos_view',
                    'Titulo' => 'Produtos - Painel de Controle',
                    'Produto' => array(
                            'CodVariante' =>     set_value('txtCodVariante'),
                            'RefVariante' =>     set_value('txtRefVariante'),
                            'DescVariante' =>    set_value('txtDescVariante'),
                            'HexaDecimal' =>    set_value('txtHexaDecimal'),
                        ),                                       
                );
            
		$this->load->view('layout/layout_view', $Dados);
                return false;
            }
            else 
                {
                return true;
                }            
        }

        
        public function Editar($CodVariante, $Salvar = NULL)
	{   
            if($Salvar == NULL)
            {
                $this->load->model('variante_model');
                $Variante = $this->variante_model->Buscar_Variante($CodVariante);  
                
                $Dados = array(
                    'Pagina' => 'variantes/CadastroVariantes_view',
                    'Titulo' => 'Variantes - Blem Collection',
                    'Variante' => $Variante[0],
                    'FinalizaCompra'    =>'',
                );
            
		$this->load->view('layout/layout_view', $Dados);
            }
            else
            {
                if($this->Validar_Formulario_Variante(2))           
                {
                    $Nomes = array(
                        'CodVariante'    => $this->input->post('txtCodigoVariante'),
                        'RefVariante'    => $this->input->post('txtRefVariante'),
                        'DescVariante'   => $this->input->post('txtDescVariante'),
                        'HexaDecimal'   => $this->input->post('txtHexaDecimal'),
                    );                              

                    
                $dados = elements(array(
                        'CodVariante','RefVariante', 'DescVariante', 'HexaDecimal'), $Nomes);
                
                $this->load->model('variante_model');
                $this->variante_model->Atualizar($dados);                                                                         
                
                redirect('Variante');
                      
                   
                } 

            }
	}           
        
  
        
        
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */