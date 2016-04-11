<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PedIte extends CI_Controller {


    protected $Errors;
    protected $Retorno;    
        

    public function ExibirPopUp($NrPedido, $NrSeqIte = NULL){

        if($NrSeqIte){
            $Modo = 'Edição';
            $this->load->model('pedite_model');                
            $Item = $this->pedite_model->Listar_Itens($NrPedido, $NrSeqIte);                         
            $Item = $Item[0];            

        }else{

            $this->load->model('pedite_model'); 
            $NrSeqIte = $this->pedite_model->GetNrSeqIte($NrPedido);

            $Modo = 'Cadastro';
            $Item = array(
                'NrPedido'=> $NrPedido,
                'NrSeqIte' => $NrSeqIte,
                'NrSeqIteBanco' => '',
                'CodProduto' => '',
                'CodVariante' => '',
                'QtdeItem' => '',
                'QtdeItem1' => '',
                'QtdeItem2' => '',
                'QtdeItem3' => '',
                'QtdeItem4' => '',
                'QtdeItem5' => '',
                'QtdeItem6' => '',
                'QtdeItem7' => '',
                'QtdeItem8' => '',
                'QtdeItem9' => '',
                'QtdeItem10' => '',
                'QtdeItem11' => '',
                'QtdeItem12' => '',                                
                'VlrUnitario' => '',
            );
        }

        $Dados = array(                                
            'Modo'   => $Modo,
            'Item' => $Item
            );

        $this->load->view('pedite/popCadastroItens_view',$Dados);
    }
    
    
    public function Processar(){            

        $this->Errors = Array();
        $this->Retorno = array();
        $this->Retorno['status'] = 1;                
        
        if($this->input->get('txtNrSeqIteBanco') == ''){                
            $this->Gravar(1);
        }else{
            $this->Gravar(2);                                                          
        }        
        
        echo json_encode($this->Retorno);
    }                
    

    public function Gravar($Modo){ 

        if($this->Validar_Formulario_Itens()){              
                        
            $this->load->model('pedIte_model');
            
            if($this->input->get('txtNrSeqIteBanco') == ''){
                $_GET['txtNrSeqIteBanco'] = $this->pedIte_model->GetNrSeqIte($this->input->get('txtNrPedido'));                 
            }
            
            $Nomes = array(        
                'NrPedido' => $this->input->get('txtNrPedido'),
                'NrSeqIte' => $this->input->get('txtNrSeqIteBanco'),
                'CodProduto' => $this->input->get('txtCodProduto'),
                'CodVariante' => $this->input->get('txtCodVariante'),
                'QtdeItem' => $this->input->get('txtQtdeItem'),
                'QtdeItem1' => $this->input->get('txtQtdeItem1'),
                'QtdeItem2' => $this->input->get('txtQtdeItem2'),
                'QtdeItem3' => $this->input->get('txtQtdeItem3'),
                'QtdeItem4' => $this->input->get('txtQtdeItem4'),
                'QtdeItem5' => $this->input->get('txtQtdeItem5'),
                'QtdeItem6' => $this->input->get('txtQtdeItem6'),
                'QtdeItem7' => $this->input->get('txtQtdeItem7'),
                'QtdeItem8' => $this->input->get('txtQtdeItem8'),
                'QtdeItem9' => $this->input->get('txtQtdeItem9'),
                'QtdeItem10' => $this->input->get('txtQtdeItem10'),
                'QtdeItem11' => $this->input->get('txtQtdeItem11'),
                'QtdeItem12' => $this->input->get('txtQtdeItem12'),
                'VlrUnitario' => $this->input->get('txtVlrUnitario'),                    
                'VlrItem' => $this->input->get('txtVlrUnitario')*$this->input->get('txtQtdeItem'),                    
                );


            $dados = elements(array('NrPedido', 'NrSeqIte','CodProduto','CodVariante','QtdeItem',
                                    'QtdeItem1','QtdeItem2','QtdeItem3','QtdeItem4','QtdeItem5','QtdeItem6','QtdeItem7','QtdeItem8','QtdeItem9','QtdeItem10','QtdeItem11','QtdeItem12',
                                    'VlrUnitario','VlrItem'), $Nomes);

            

            if($Modo == 1){                
                $this->pedIte_model->Inserir($dados);                                                          
            }else{
                $this->pedIte_model->Atualizar($dados);                                                          
            }
            
            $this->Retorno['status'] = '1';
            
        }
        
    }  
           
        
    public function BuscarItens($NrPedido, $NrSeqIte = null){
        $this->load->model('pedIte_model');
        $Itens = $this->pedIte_model->Listar_Itens($NrPedido, $NrSeqIte);

        if ($Itens){
            echo json_encode($Itens);
        }else{
            echo json_encode('');
        }
    }
        
    public function VerificaCodProduto($CodProduto){

        $this->load->model('produto_model');
        $Row = $this->produto_model->Listar_Produtos($CodProduto);            

        if ($Row <> null){
            return TRUE;
        }else{
            $this->form_validation->set_message('VerificaCodProduto', 'Código do produto não cadastrado');
            return FALSE;
        }

    }    

    public function VerificaCodVariante($CodVariante){

        $CodProduto = $this->input->get('txtCodProduto');
        
        $this->load->model('variante_model');
        $Row = $this->variante_model->Listar_Variantes_Produto($CodProduto,$CodVariante);

        if ($Row <> null){
            return TRUE;
        }else{
            $this->form_validation->set_message('VerificaCodVariante', 'Código dvariante não cadastrada para este produto');
            return FALSE;
        }

    }    
    
    public function VerificaQtdeGrade(){
        $QtdePedIte = $this->input->get('txtQtdeItem');
        $TotalGrade = 0;
        for($x = 1; $x <= 12; $x++){
            $TotalGrade += $this->input->get('txtQtdeItem'.$x);
        }
        if($QtdePedIte != $TotalGrade){
            $this->form_validation->set_message('VerificaQtdeGrade', 'Quantidade da grade não bate com a quantidade do item'.$TotalGrade);
            return FALSE;
        }else{
            return TRUE;
        }
        
    }            
    
    
    public function Validar_Formulario_Itens(){   

        if (!$_POST){
            $_POST = $_GET;
        }

        
        $this->form_validation->set_rules('txtNrPedido', 'Pedido', 'numeric');            
        $this->form_validation->set_rules('txtNrSeqIte', 'Sequencia', 'numeric');
        $this->form_validation->set_rules('txtCodProduto', 'Produto', 'required|callback_VerificaCodProduto');
        
        if($this->input->get('txtCodVariante') != 0){
            $this->form_validation->set_rules('txtCodVariante', 'Variante', 'callback_VerificaCodVariante');
        }
        
       
        $this->form_validation->set_rules('txtQtdeItem', 'Quantidade', 'required|callback_VerificaQtdeGrade');
        $this->form_validation->set_rules('txtVlrUnitario', 'Valor Unitário', 'required');

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

    public function Excluir($NrPedido, $NrSeqIte = null) {
        $this->load->model('pedite_model');
        $this->pedite_model->Excluir($NrPedido, $NrSeqIte);           
    }        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */