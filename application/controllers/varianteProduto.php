<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VarianteProduto extends CI_Controller {

    
    
        
        public function ListarVariantesProduto($CodProduto, $CodVariante = NULL){
                $this->load->model('variante_model');
                $Variantes = $this->variante_model->Listar_Variantes_Produto($CodProduto, $CodVariante);                         
                echo json_encode($Variantes);

            }

        
        public function Cadastro() {

                $Dados = array(
                    'Pagina' => 'variantes/CadastroVariantesProduto_view',
                    'Titulo' => 'Variantes de Produto - Painel Administrativo',
                    'Modo'   => 'ADD',
                    'Variante' => array(                           
                            'CodVariante' => '',
                            'CodProduto' => '',
                            'RefVariante' => '',
                            'DescVariante' => '',
                            'CodImagemVariante' => '',
                        ),
                    );
                $this->load->view('layout/layout_view', $Dados);
            
            
        }
        
        
        public function GravarProdVariante($CodProduto, $CodVariante)
	{
                $dados = array(
                    'CodVariante' => $CodVariante,
                    'CodProduto' => $CodProduto,
                );                                              
                              
                
                $this->load->model('variante_model');
                $this->variante_model->InserirProdVariante($dados);                                                                                         
            
        }
        

        public function Excluir($CodProduto, $CodVariante) {

            $this->load->model('variante_model');
            $this->variante_model->ExcluirVarianteProduto($CodProduto,$CodVariante);           

        }

        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */