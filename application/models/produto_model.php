<?php

class Produto_model extends CI_Model {

        

    public function Inserir($dados = null){  
        if($dados != null){                
            $this->db->insert('Produtos',$dados);                
        }            
    }    
    
    public function Atualizar($dados = null){   

        if($dados != null){
            $this->db->where('CodProduto', $dados['CodProduto']); 
            $this->db->update('Produtos',$dados);                
        }

    }       
          
    public function Excluir($CodProduto){
        $this->db->where('CodProduto', $CodProduto);

        $this->db->delete('Produtos');
    }
                          
    public function GetCodProduto(){
        $query = $this->db->query('SHOW TABLE STATUS LIKE "Produtos"');

        $row = $query->row_array();            
        $CodProduto = $row['Auto_increment'];            

        return $CodProduto;
    }

           
    public function Listar_Produtos($CodProduto = NULL){   
            
        $this->db->select('Produtos.*, Produtos.CodProduto as CodProdutoBanco');
        $this->db->from('Produtos');
        
        if ($CodProduto){
            $this->db->where('CodProduto', $CodProduto); 
        }                        
                                      
        $query = $this->db->get();   

        if ($query->num_rows() > 0){
               $row = $query->result_array();                
               return $row;                    
        }else{
            return array();
        }       
    } 
        
     
        
}