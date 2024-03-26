<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelGrafik;

class Grafik extends BaseController
{
    protected $grafik;

    public function __construct()
    {
        $this->grafik = new ModelGrafik();
    }

    public function index()
    {
        // Fetch necessary data from the model
        $data = [
            //'t_dep' => $this->grafik->dep(),
            'sexo' => $this->grafik->sexo(),
            'sexo' => $this->grafik->sexodata(),
            //'tinan_akademik' => $this->grafik->tinan_akademik(),
        ];

        // Load the view and pass the data to it
        echo view('layout/v_head');
        echo view('layout/v_header');
        echo view('layout/v_aside');
        echo view('page/grafik', $data); // Pass the data to your view file
        echo view('layout/v_footer'); 
    }
}
