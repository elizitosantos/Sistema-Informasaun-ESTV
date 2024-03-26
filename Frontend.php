<?php

namespace App\Controllers;
use App\Models\ModelGrafik;
use App\Models\ModelAkademik;
use App\Models\ModelEstudante1;
use App\Models\ModelMestre1;
use App\Models\ModelValor2;
use App\Models\ModelHorariu;
use App\Controllers\BaseController;


class Frontend extends BaseController
{
    protected $request;
    
    protected $table = 't_obs1';   
	private $db;
    protected $helper =['custom'];
    public function __construct()
       {
        $this->grafik=new ModelGrafik();
        //usuario request
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];

       }
    public function index()
    {
        $data['page_title'] = "Home";
         $data =[
                  //'t_obs1' =>$this->grafik->dep(),
                  'sexo'  =>$this->grafik->sexo(),
                  'sexProf' =>$this->grafik->sexProf(),
                  //'sexo'  =>$this->grafik->sexodata(),
                 // 'clase'  =>$this->grafik->clase(),
                  //   'tinan_akademik'  =>$this->grafik->tinan_akademik(),
         ];
        
        $this->data['page_title']="Home ";
        $this->data['page_info']="Ita Boot nudar gerente Ba Sistema Informasaun ESTV-LIKISA";
       // $data['count'] = $this->db->table($this->table)->countAllResults();//(nia halo count ba tabela)
        echo view('frontend/v_head', $this->data);
        echo view('frontend/v_header',$this->data);
        echo view('frontend/v_aside',$this->data);
        echo view('v_frontend',$data);         
        echo view('frontend/v_footer'); 
    }

    // ida neview estudante
    protected $session;
     
    protected $data;
     
    protected $model_estudante1;

    public function relatorio_estudante()
    {
        
        $model = new ModelEstudante1();
        // $data['estudante']=$model->getEstudante()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        // $data['t_classe'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data ['v_estudante']= $model->findAll(); 
        $data['page_title'] = "RelatorioEstudante";
        echo view('frontend/v_head', $data);
        echo view('frontend/v_header',$this->data);
        echo view('frontend/v_aside',$this->data);
        echo view('g_estudante1/v_relatorio/view_relatorio_estudante.php',$data);
        echo view('frontend/v_footer');
    }

    // ida neview professor
    protected $model_mestre1;

    public function relatorio_mestre()
    {
        
        $model = new ModelMestre1();
        // $data['estudante']=$model->getEstudante()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        // $data['t_classe'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data ['v_prof']= $model->findAll(); 
        $data['page_title'] = "RelatorioMestre";
        echo view('frontend/v_head', $data);
        echo view('frontend/v_header',$this->data);
        echo view('frontend/v_aside',$this->data);
        echo view('g_mestre/relatorio/view_relatorio_mestre',$data);
        echo view('frontend/v_footer');
    }

    // ida neview valor
    protected $modelvalor2;

    public function relatoriovalor()
    {
        
        $model = new ModelValor2();
        // $data['estudante']=$model->getEstudante()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        // $data['t_classe'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data ['v_valor_liulaliu1']= $model->findAll(); 
        $data['page_title'] = "RelatorioMestre";
        echo view('frontend/v_head', $data);
        echo view('frontend/v_header',$this->data);
        echo view('frontend/v_aside',$this->data);
        echo view('g_valor/relatorio/view_relatorio_valor',$data);
        echo view('frontend/v_footer');
    }


    // ida ne'e view relatoriu orariu
    protected $modelhorariu;

    public function relatoriohorario()
    {
        
        $model = new ModelHorariu();
        // $data['estudante']=$model->getEstudante()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        // $data['t_classe'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data ['v_orariu']= $model->findAll(); 
        $data['page_title'] = "RelatorioMestre";
        echo view('frontend/v_head', $data);
        echo view('frontend/v_header',$this->data);
        echo view('frontend/v_aside',$this->data);
        echo view('g_horariu/relatorio/view_relatorio_horariu',$data);
        echo view('frontend/v_footer');
    }


}