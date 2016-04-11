<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade extends CI_Controller {

    public function index(){		

        $this->load->model('grade_model');
        $Grades = $this->grade_model->Listar_Grades();                         

        $Dados = array(
            'Pagina' => 'grades/ConsultaGrades_view',
            'Titulo' => 'Grades - Painel Administrativo',
            'Modo'   => 'VIS',
            'Grades' => $Grades
            );
        $this->load->view('layout/layout_view', $Dados);

    }   

    public function ListarGrades($CodGrade = NULL){
        $this->load->model('grade_model');
        $Grades = $this->grade_model->Listar_Grades($CodGrade);                         
        echo json_encode($Grades);
    }

    public function Gravar(){
        if($this->Validar_Formulario_Grade(1)){   
            $Nomes = array(                                            
                'DescGrade' => $this->input->post('txtDescGrade'),
                'SitGrade' => $this->input->post('txtSitGrade'),
            );                                              
            $dados = elements(array('DescGrade','SitGrade'), $Nomes);

            $this->load->model('grade_model');
            $this->grade_model->Inserir($dados);                                                          
        } 
    }

    public function Validar_Formulario_Grade(){
        $this->form_validation->set_rules('txtCodGrade', 'Código', 'numeric');            
        $this->form_validation->set_rules('txtDescGrade', 'Descrição', 'required');
        $this->form_validation->set_rules('txtSitGrade', 'Situação', 'required');

        if ($this->form_validation->run() == FALSE){                                   
            return false;
        }
        else {
            return true;
        }            
    }
        
    public function ExibirPopUp($CodGrade = NULL){
        if($CodGrade){
            $Modo = 'Edição';
            $this->load->model('grade_model');                
            $Grade = $this->grade_model->Listar_Grades($CodGrade);                         
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

        $this->load->view('grades/popCadastroGrades_view',$Dados);
    }
        
        
    public function Editar(){   
        if($this->Validar_Formulario_Grade()){
            $Nomes = array(
                'CodGrade'    => $this->input->post('txtCodGrade'),
                'DescGrade'   => $this->input->post('txtDescGrade'),
                'SitGrade'    => $this->input->post('txtSitGrade'),
            );                              

            $dados = elements(array('CodGrade','DescGrade', 'SitGrade'), $Nomes);

            $this->load->model('grade_model');
            $this->grade_model->Atualizar($dados);                                                                     
        } 
    }           
        
    public function Excluir($CodGrade) {
        $this->load->model('grade_model');
        $this->grade_model->Excluir($CodGrade);           
    }        
        
     
}