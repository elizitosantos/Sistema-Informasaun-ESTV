<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Model_Grafikclasse;

class Grafikclasse extends BaseController
{
    public function __construct()
       {
        $this->grafikclasse=new Model_Grafikclasse();
       }
    public function index()
    {
        $data =[
         
            'clase'  =>$this->grafikclasse->clase(),
        ];
        $this->grafikclasse=new Model_Grafikclasse();
        echo view('layout/v_head');
        echo view('layout/v_header');
        echo view('layout/v_aside');
        echo view('page/v_grafik_classe', $data); 
        echo view('layout/v_footer'); 
    }
}
