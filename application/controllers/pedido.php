<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

    protected $Errors;
    protected $Retorno;    
    
    public function index(){		
        $this->load->model('pedido_model');
        $Pedidos = $this->pedido_model->Listar_Pedidos();         

        $Dados = array(
            'Pagina' => 'pedidos/ConsultaPedidos_view',
            'Titulo' => 'Pedidos - Painel Administrativo',
            'Modo'   => 'VIS',
            'Pedidos' => $Pedidos
        );
        $this->load->view('layout/layout_view', $Dados);        
    }
        
    
    public function Processar(){            

        $this->Errors = Array();
        $this->Retorno = array();
        $this->Retorno['status'] = 1;

        $this->Gravar();
        
        echo json_encode($this->Retorno);
    }                
    
    public function Gravar(){

        if($this->Validar_Formulario_Pedido(1)){   
            $Nomes = array(
                    'NrPedido' =>       $this->input->post('txtNrPedidoBanco'),                        
                    'CodCliente' =>     $this->input->post('txtCodCliente'),
                    'CodEndereco' =>    $this->input->post('txtCodEndereco'),
                    'CodVendedor' =>    $this->input->post('txtCodVendedor'),
                    'DataEmissao' =>    $this->input->post('txtDataEmissao'),                    
                    'QtdeItens'  =>     $this->input->post('txtQtdeItens'),
                    'SitPedido' =>      $this->input->post('txtSitPedido'),
                    'DataEntrega' =>    $this->input->post('txtDataEntrega'),
                    'VlrFrete' =>       $this->input->post('txtVlrFrete'),                
                    'VlrItens' =>       $this->input->post('txtVlrItens'),                    
                    'VlrComissao' =>    $this->input->post('txtVlrComissao'),
                    'PercComissao' =>   $this->input->post('txtPercComissao'),
                    'VlrOutDespesas'=>  $this->input->post('txtVlrOutDespesas'),
                    'VlrDesconto'=>     $this->input->post('txtVlrDesconto'),
                    'PercDesconto'=>    $this->input->post('txtPercDesconto'),
                    'VlrIpi' =>         0, //$this->input->post('txtVlrIpi'),
                    'VlrIcms' =>        0,//$this->input->post('txtVlrIcms'),
                    'VlrIcmsSt' =>      0,//$this->input->post('txtVlrIcmsSt'),
                    'VlrPedido' => $this->input->post('txtVlrPedido'),                
                    'FormaPagamento' => $this->input->post('txtFormaPagamento'),
                    'Observacao' =>     $this->input->post('txtObservacao')
            );                                              

            $dados = elements(array(
                    'NrPedido','CodCliente','CodEndereco','CodVendedor','DataEmissao','VlrPedido',
                    'QtdeItens', 'SitPedido', 'DataEntrega', 'VlrFrete', 'VlrItens','PercComissao','VlrComissao','VlrOutDespesas',
                    'VlrIpi','VlrIcms','VlrIcmsSt','VlrDesconto','PercDesconto','FormaPagamento', 'Observacao') , $Nomes);

            $this->load->model('pedido_model');            
            if($this->input->post('txtNrPedidoBanco') == ''){
                $this->pedido_model->Inserir($dados);
            }else{
                $this->pedido_model->Atualizar($dados);
            }
            
            $this->Retorno['status'] = '1';
        } 
    }    

    public function Excluir($NrPedido) {
        
        $this->load->model('pedite_model');
        $this->pedite_model->Excluir($NrPedido);

        $this->load->model('pedido_model');
        $this->pedido_model->Excluir($NrPedido);

        redirect('Pedido');
    }
    
    public function ListarPedidosJson(){
        $this->load->model('pedido_model');
        $Pedidos = $this->pedido_model->Listar_Pedidos();

        echo json_encode($Pedidos);
    }
    public function ListarPedidosDetalhado(){
        $this->load->model('pedido_model');
        $Pedidos = $this->pedido_model->Listar_Pedidos_Detalhado();

        echo json_encode($Pedidos);
    }        

    public function Cadastro() {

        $this->load->model('pedido_model');
        $NrPedido = $this->pedido_model->GetNrPedido();                                                          

        $Dados = array(
            'Pagina' => 'pedidos/CadastroPedidos_view',
            'Titulo' => 'Pedidos - Painel Administrativo',
            'Modo'   => 'ADD',
            'Pedido' => array(
                'NrPedido' => $NrPedido,
                'NrPedidoBanco'     => '',
                'CodCliente'        => '',
                'CodEndereco'       => '',
                'CodVendedor'       => '',
                'DataEmissao'       => '',
                'VlrItens'          => 0,
                'VlrFrete'          => 0,
                'VlrComissao'       => 0,
                'PercComissao'      => '',
                'VlrOutDespesas'    => 0,
                'VlrIpi'            => 0,
                'VlrIcms'           => 0,
                'VlrIcmsSt'         => 0,                     
                'VlrPedido'         => 0,
                'QtdeItens'         => 0,
                'VlrDesconto'       => 0,
                'PercDesconto'      => 0,
                'SitPedido'         => 'I',
                'DataEntrega'       => '',                        
                'FormaPagamento'    => '',
                'Observacao'        => ''
                ),                    
            );
        $this->load->view('layout/layout_view', $Dados);
    }

    public function Editar($NrPedido){   

        $this->load->model('pedido_model');
        $Pedido = $this->pedido_model->Listar_Pedidos($NrPedido);  

        $Dados = array(
            'Pagina' => 'pedidos/CadastroPedidos_view',
            'Titulo' => 'Pedidos - Blem Collection',
            'Pedido' => $Pedido[0],
        );

        $this->load->view('layout/layout_view', $Dados);
    }
                
    
    public function Validar_Formulario_Pedido($Modo =1){                                                                                                         

        //$this->form_validation->set_rules('txtNrPedido', 'Nr Pedido', 'numeric|required');        
        $this->form_validation->set_rules('txtNrPedidoBanco', 'Nr Pedido', 'numeric');
        $this->form_validation->set_rules('txtSitPedido', 'Situação', 'required');
        $this->form_validation->set_rules('txtDataEmissao', 'Data de emissão', 'required');
        $this->form_validation->set_rules('txtDataEntrega', 'Data de entrega', 'required');
        $this->form_validation->set_rules('txtCodVendedor', 'Código do vendedor', 'numeric|required');
        $this->form_validation->set_rules('txtCodCliente', 'Código do cliente', 'numeric|required');
        $this->form_validation->set_rules('txtCodEndereco', 'Código do endereço', 'numeric|required');
        $this->form_validation->set_rules('txtFormaPagamento', 'Forma de pagamento', 'required');
        $this->form_validation->set_rules('txtVlrFrete', 'Valor do frete', 'numeric');
        $this->form_validation->set_rules('txtVlrItens', 'Valor dos Itens', 'numeric');
        $this->form_validation->set_rules('txtVlrComissao', 'Valor da comissão', 'numeric');
        $this->form_validation->set_rules('txtVlrDesconto', 'Valor do desconto', 'numeric');
        $this->form_validation->set_rules('txtVlrPedido', 'Valor do pedido', 'numeric');
        $this->form_validation->set_rules('txtVlrOutDespesas', 'Valor de outras despesas', 'numeric');        
        $this->form_validation->set_rules('txtObservacao', 'Observação', 'alphanumeric');

        if ($this->form_validation->run() == FALSE)
        {                                   
           $Dados = array(
                'Pagina' => 'pedido/Cadastropedidos_view',
                'Titulo' => 'Pedidos - Painel de Controle',
                'Produto' => array(
                    'NrPedido'          => set_value('txtNrPedidoBase'),                        
                    'CodCliente'        => set_value('txtCodCliente'),
                    'CodEndereco'       => set_value('txtCodEndereco'),
                    'CodVendedor'       => set_value('txtCodVendedor'),
                    'DataEmissao'       => set_value('txtDataEmissao'),
                    'VlrFrete'          => set_value('txtVlrFrete'),
                    'VlrItens'          => set_value('txtVlrItens'),
                    'VlrComissao'       => set_value('txtVlrComissao'),
                    'VlrDesconto'       => set_value('txtVlrDesconto'),
                    'VlrPedido'         => set_value('txtVlrPedido'),
                    'VlrOutDespesas'    => set_value('txtVlrOutDespesas'),                    
                    'QtdeItensPedido'   => set_value('txtQtdeItensPedido'),
                    'SitPedido'         => set_value('txtSitPedido'),
                    'DataEntrega'       => set_value('txtDataEntrega'),                    
                    'FormaPagamento'    => set_value('txtFormaPagamento'),
                    'Observacao'        => set_value('txtObservacao')
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
        
