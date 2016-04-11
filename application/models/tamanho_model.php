<?php

class Tamanho_model extends CI_Model {
    

    
    public function Inserir($dados = null){   
        if($dados != null){
            $this->db->insert('GradesTam',$dados);                
        }
    }        
        
    public function Atualizar($dados = null){   
        if($dados != null){
            $this->db->where('CodGrade', $dados['CodGrade']); 
            $this->db->where('CodTamanho', $dados['CodTamanho']);
            $this->db->update('GradesTam',$dados);                
            }
    }        
        
    public function Excluir($CodGrade, $CodTamanho){
        $this->db->where('CodGrade', $CodGrade);
        $this->db->where('CodTamanho', $CodTamanho);

        $this->db->delete('GradesTam');
    }
    
    public function Buscar_NrSeqTam($CodGrade){
        $this->db->select('MAX(GradesTam.NrSeqTam) as NrSeqTam');
        $this->db->from('GradesTam');
        
        if ($CodGrade){
            $this->db->where('CodGrade', $CodGrade); 
        }        
                                      
        $query = $this->db->get();   
         
        if ($query->num_rows() > 0){
            $row = $query->row_array();   
            return $row['NrSeqTam']+1;                    
        }else{
            return 1;
        }        
    }                
    
    public function Listar_Tamanhos($CodGrade, $CodTamanho = NULL){   
            
        $this->db->select('GradesTam.*');
        $this->db->from('GradesTam');
        
        if ($CodGrade){
            $this->db->where('CodGrade', $CodGrade); 
        }
        
        if ($CodTamanho){
            $this->db->where('CodTamanho', $CodTamanho); 
        }
            
        $this->db->order_by('CodGrade, NrSeqTam'); 
                                      
        $query = $this->db->get();   
         
        if ($query->num_rows() > 0){
            $row = $query->result_array();   
            return $row;                    
        }else{
            return array();
        }
    } 
        
              
}