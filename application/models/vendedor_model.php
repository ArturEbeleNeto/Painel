<?php

class Vendedor_model extends CI_Model {
    
  
    
    public function GetCodVendedor(){
        $query = $this->db->query('SHOW TABLE STATUS LIKE "Vendedores"');

        $row = $query->row_array();            
        $CodVendedor= $row['Auto_increment'];            
        //$this->StartTransaction();
        return $CodVendedor;
    }
        
    public function VerificaCodClienteUnico($CodCliente, $CodVendedor){
        $this->db->select('Vendedores.*');
        $this->db->from('Vendedores');
                   
        $this->db->where('CodVendedor <> '. $CodVendedor); 
        $this->db->where('CodCliente', $CodCliente); 
                                                              
        $query = $this->db->get();   
                          
        if ($query->num_rows() > 0){
            return false;                 
        }else{
            return true;
        }
    }           
    
           
    public function Listar_Vendedores($CodVendedor = NULL){   
            
        $this->db->select('Vendedores.*');
        $this->db->from('Vendedores');
        
        if ($CodVendedor) {
            $this->db->where('CodVendedor', $CodVendedor); 
        }                        
                                      
        $query = $this->db->get();   
     
        if ($query->num_rows() > 0){
            $row = $query->result();                
            return $row;                    
        }      
    } 
        
        
        
    public function Excluir($CodVendedor){
        $this->db->where('CodVendedor', $CodVendedor);
        $this->db->delete('Vendedores');
    }
        

    public function Buscar_Vendedor($CodVendedor = NULL){   

        $this->db->select('Vendedores.*,Vendedores.CodVendedor as CodVendedor , Vendedores.CodVendedor as CodVendedorBanco');
        $this->db->from('Vendedores');

        if ($CodVendedor){
            $this->db->where('CodVendedor', $CodVendedor); 
        }        

        $query = $this->db->get();   



        if ($query->num_rows() > 0){
            $row = $query->result_array();                
            return $row;                    
        }else{
            return NULL;
        }

    } 
        
    public function Inserir($dados = null){  

        if($dados != null){                
            $this->db->insert('Vendedores',$dados);                
        }            
    }
              
    public function Atualizar($dados = null){               
        if($dados != null){
            $this->db->where('CodVendedor', $dados['CodVendedor']); 
            $this->db->update('Vendedores',$dados);                
        }
       // $this->Commit($dados['CodProduto']);
    }        
        
}