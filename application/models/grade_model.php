<?php

class Grade_model extends CI_Model {
    
      
    public function Inserir($dados = null){               
        if($dados != null){                
            $this->db->insert('Grades',$dados);                
        }
    }        
                
    public function Excluir($CodGrade){
        $this->db->where('CodGrade', $CodGrade);                        
        $this->db->delete('Grades');

        $this->db->where('CodGrade', $CodGrade);
        $this->db->delete('GradesTam');
    }

    public function Listar_Grades($CodGrade = NULL){   

        $this->db->select('Grades.CodGrade, Grades.DescGrade, Grades.SitGrade');
        $this->db->from('Grades');

        if ($CodGrade){
            $this->db->where('CodGrade', $CodGrade); 
        }                        

        $query = $this->db->get();   

        if ($query->num_rows() > 0){
               $row = $query->result_array();                
               return $row;                    
            }
        else{
            return array();
        }
    } 

       
    public function Atualizar($dados = null){               
        if($dados != null){             
            $this->db->where('CodGrade', $dados['CodGrade']); 
            $this->db->update('Grades',$dados);                
        }
    }        

}