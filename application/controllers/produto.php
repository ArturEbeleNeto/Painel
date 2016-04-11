<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto extends CI_Controller {

    protected $Errors;
    protected $Retorno;

    public function index(){		
        $this->load->model('produto_model');
        $Produtos = $this->produto_model->Listar_Produtos();         

        $Dados = array(
            'Pagina' => 'produtos/Consultaprodutos_view',
            'Titulo' => 'Produtos - Painel Administrativo',
            'Modo'   => 'VIS',
            'Produtos' => $Produtos);

        $this->load->view('layout/layout_view', $Dados);
    }


    public function Cadastro() {

        $this->load->model('produto_model');
        $CodProduto = $this->produto_model->GetCodProduto();                                                          

        $Dados = array(
            'Pagina' => 'produtos/CadastroProdutos_view',
            'Titulo' => 'Produtos - Painel Administrativo',
            'Modo'   => 'ADD',
            'Produto' => array(                           
                    'CodProduto' => $CodProduto,
                    'CodProdutoBanco' => '',
                    'CodLinha' => '',
                    'CodCategoria' => '',
                    'CodColecao' => '',
                    'CodGrade' => '',
                    'GeneroProduto' => '',
                    'RefProduto' => '',
                    'DescProduto' => '',
                    'CompProduto' => '',
                    'DescReduzida' => '',
                    'SeAtivo' => '',
                    'SeProdutoSite' => '',
                    'UniProduto' => '',
                    'VlrCustoProduto' => '',
                    'PercLucroProduto'=> '',
                    'VlrVendaProduto' => '',

                ),                    
            );
        $this->load->view('layout/layout_view', $Dados);                        
    }



    public function Excluir($CodProduto) {

        $this->load->model('produto_model');
        $this->produto_model->Excluir($CodProduto);

        redirect('Produto');

    }



    public function Validar_Formulario_Produto(){                                                                                                         

        $this->form_validation->set_rules('txtCodProduto', 'Codigo', 'numeric');
        $this->form_validation->set_rules('txtCodProdutoBanco', 'Codigo', 'numeric');

        $this->form_validation->set_rules('txtCodProdutoH', 'Codigo', 'numeric');
        $this->form_validation->set_rules('txtRefProduto', 'Referência', 'required');
        $this->form_validation->set_rules('txtDescProduto', 'Descrição', 'required');
        $this->form_validation->set_rules('txtDescReduzida', 'Descrição Reduzida', 'alphanumeric');
        $this->form_validation->set_rules('txtUniProduto', 'Unidade', 'required|exact_length[2]');
        $this->form_validation->set_rules('txtCompProduto', 'Composição', 'required');
        $this->form_validation->set_rules('txtCodLinha', 'Linha', 'required');
        $this->form_validation->set_rules('txtCodCategoria', 'Categoria', 'required');
        $this->form_validation->set_rules('txtCodColecao', 'Coleção', 'required');
        $this->form_validation->set_rules('txtCodGrade', 'Grade', 'required');
        $this->form_validation->set_rules('rdoGeneroProduto', 'Gênero', 'required');
        $this->form_validation->set_rules('rdoSeAtivo', 'Situação', 'required');
        $this->form_validation->set_rules('rdoSeProdutoSite', 'Produto do Site', 'required');

        $this->form_validation->set_rules('txtVlrCustoProduto', 'Valor de Custo', 'numeric');
        $this->form_validation->set_rules('txtPercLucroProduto', 'Percentual de Lucro', 'numeric');
        $this->form_validation->set_rules('txtVlrVendaProduto', 'Valor de Venda', 'numeric|required');

        if ($this->form_validation->run() == FALSE){        

           $CodProduto = NULL; 
           if (set_value('txtCodProdutoBanco')){
               $CodProduto = set_value('txtCodProdutoBanco'); 
           } 
           else {
               $this->load->model('produto_model');
               $CodProduto = $this->produto_model->GetCodProduto();   
           }

           $Dados = array(
                'Pagina' => 'produtos/CadastroProdutos_view',
                'Titulo' => 'Produtos - Painel de Controle',
                'Produto' => array(
                        'CodProduto' =>         $CodProduto,
                        'CodProdutoBanco' =>    set_value('txtCodProdutoBanco'),
                        'CodLinha' =>           set_value('txtCodLinha'),
                        'CodCategoria' =>       set_value('txtCodCategoria') ,
                        'CodColecao' =>         set_value('txtCodColecao'),
                        'CodGrade' =>           set_value('txtCodGrade'),
                        'GeneroProduto' =>      set_value('rdoGeneroProduto'),
                        'RefProduto' =>         set_value('txtRefProduto'),
                        'DescProduto' =>        set_value('txtDescProduto'),
                        'CompProduto' =>        set_value('txtCompProduto'),
                        'DescReduzida' =>       set_value('txtDescReduzida'),
                        'SeAtivo' =>            set_value('rdoSeAtivo'),
                        'SeProdutoSite' =>      set_value('rdoSeProdutoSite'),
                        'UniProduto' =>         set_value('txtUniProduto'),
                        'VlrCustoProduto' =>    set_value('txtVlrCustoProduto'),
                        'PercLucroProduto' =>   set_value('txtPercLucroProduto'),
                        'VlrVendaProduto' =>    set_value('txtVlrVendaProduto'),
                    ),                                       
            );

           $this->Retorno['status'] = '0';
           $this->Retorno['erros'] = validation_errors();

            return false;
        }
        else {
            return true;
        }            
    }

        
    public function BuscaProduto($CodProduto){
        $this->load->model('produto_model');
        $Produto = $this->produto_model->Listar_Produtos($CodProduto);    

        if ($Produto) {
            echo '1';
        }
        else{
            echo '0';
        }
    }
        
    public function ListarProdutos(){
        $this->load->model('produto_model');
        $Produtos = $this->produto_model->Listar_Produtos();
        echo json_encode($Produtos);
    }
        
    public function BuscarProdutoJson($CodProduto){
        $this->load->model('produto_model');
        $Produtos = $this->produto_model->Listar_Produtos($CodProduto);
        echo json_encode($Produtos);
    }
        
    public function ProcessarProduto(){

        $this->Errors = Array();
        $this->Retorno = array();

        if($this->input->post('txtCodProdutoBanco') == ''){
            $this->Gravar(1);
        }
        else{                                
            $this->Gravar(2);                
        }

        echo json_encode($this->Retorno);

    }                
        
    public function Gravar($Modo){              
        
        if($this->Validar_Formulario_Produto()){
            $Nomes = array(
                'CodProduto' => $this->input->post('txtCodProdutoBanco'),
                'CodLinha' => $this->input->post('txtCodLinha'),
                'CodCategoria' => $this->input->post('txtCodCategoria'),
                'CodColecao' => $this->input->post('txtCodColecao'),
                'CodGrade' => $this->input->post('txtCodGrade'),
                'GeneroProduto' => $this->input->post('rdoGeneroProduto'),
                'RefProduto' => $this->input->post('txtRefProduto'),
                'DescProduto' => $this->input->post('txtDescProduto'),
                'CompProduto' => $this->input->post('txtCompProduto'),
                'DescReduzida' => $this->input->post('txtDescReduzida'),
                'SeAtivo' => $this->input->post('rdoSeAtivo'),
                'SeProdutoSite' => $this->input->post('rdoSeProdutoSite'),
                'UniProduto' => $this->input->post('txtUniProduto'),
                'VlrCustoProduto'   => $this->input->post('txtVlrCustoProduto'),
                'PercLucroProduto'  => $this->input->post('txtPercLucroProduto'),
                'VlrVendaProduto'   => $this->input->post('txtVlrVendaProduto'),

            );                                              

            $dados = elements(array(
                    'CodProduto','RefProduto', 'DescProduto', 'DescReduzida', 'UniProduto', 
                    'CompProduto', 'CodLinha', 'CodCategoria', 
                    'CodColecao', 'CodGrade', 'GeneroProduto', 'SeAtivo',
                    'SeProdutoSite', 'VlrCustoProduto', 'PercLucroProduto', 'VlrVendaProduto'), $Nomes);

            $this->load->model('produto_model');

            if($Modo == 1){
                $this->produto_model->Inserir($dados);
            }else{                    
                $this->produto_model->Atualizar($dados);
            }

            $this->Retorno['status'] = '1';
        } 
    }        


    public function Editar($CodProduto, $Salvar = NULL){   
            $this->load->model('produto_model');
            $Produto = $this->produto_model->Listar_Produtos($CodProduto);                 

            $Dados = array(
                'Pagina' => 'produtos/CadastroProdutos_view',
                'Titulo' => 'Produtos - Blem Collection',
                'Produto' => $Produto[0],
                'FinalizaCompra'    =>'',
            );

            $this->load->view('layout/layout_view', $Dados);            
    }                             
}