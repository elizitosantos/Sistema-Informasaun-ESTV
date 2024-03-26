<?php
                     function countData($table)
                        {
                            $db = \Config\Database::connect();
                             return $db->table($table)->countAllResults();
                         }
                      ?>    
                      
                      <div class="container-fluid">
                        <div class="col-md-12">
                            <!--begin::Alert-->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong> Bemvindo!</strong> Sr. <?= $session->get('login_name') ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <!--end::Alert-->
                        </div>
                      </div>


                      
                    <div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
                            
							<div id="kt_content_container" class="container-fluid">
                            <div id="kt_content_container" class="container-fluid">
                               
								<div class="card card-xxl-stretch mb-5 mb-xl-12">
									<div class="card-body py-3">
										<div class="tab-content">
												<div class="row g-6">
														<div class="col-md-3 bg-light-primary px-6 py-8 rounded-2 me-7">
															<a href="#" class="btn btn-flex btn-info px-6">
																<i class="fas fa-graduation-cap fs-3x me-1"></i>
																<span class="d-flex flex-column align-items-start ms-2">
																	<span class="fs-3 fw-bolder">Dadus Estudante</span>
                                                                      <span class="fs-2">Total: <?= countData('estudante')?>
                                                                                    
                                                           <!-- </?= $count ?> ne echo count manual hussi controller home -->
                                                               
                                                              
                                                                    </span>
																
																</span>
															</a>
														</div>

                                                        
														<div class="col-md-3 bg-light-primary px-6 py-8 rounded-2 me-7">
															<a href="#" class="btn btn-flex btn-warning px-6">
																<i class="fas fa-users fs-3x me-1"></i>
																<span class="d-flex flex-column align-items-start ms-2">
																<span class="fs-3 fw-bolder">Dadus Professor </span>
																	<span class="fs-2">Total :<?= countData('t_prof')?> </span>
																	
																</span>
															</a>
														</div>
														<div class="col-md-3 bg-light-primary px-6 py-8 rounded-2 me-7">
															<a href="#" class="btn btn-flex btn-primary px-6">
																<i class="fas fa-angle-double-up fs-3x me-1"></i>
																<span class="d-flex flex-column align-items-start ms-2">
																<span class="fs-3 fw-bolder">Dadus Estatuto funcional</span>
																	<span class="fs-4">Total:<?= countData('t_estatutu')?> </span>
																	<span class="fs-7"></span>
																</span>
															</a>
														</div>


                                                        <div class="col-md-2 bg-light-primary px-6 py-8 rounded-2 me-7">
															<a href="#" class="btn btn-flex btn-success px-6">
																<i class="fas fa-angle-double-up fs-3x me-1"></i>
																<span class="d-flex flex-column align-items-start ms-2">
																<span class="fs-3 fw-bolder">Dadus Materia</span>
																	<span class="fs-2">Total:<?= countData('t_materia')?> </span>
																	<span class="fs-7"></span>
																</span>
															</a>
														</div>
												</div>
											</div>
									</div>
								</div>
								
								<div class="container-fluid">
										<h2 class="text-center mt-3 mb-4">Grafiku ESCAJOR</h2>
										<div class="row">
											<!-- Area Chart -->
											<div class="col-xl-4 col-lg-7">
												<div class="card shadow mb-4" id="grap">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Grafiku Programa Studo </h6>
													</div>
													<!-- Card Body -->
													<div class="card-body">
														<div class="chart-area">
															<canvas id="myPieChartpg"></canvas>
														</div>
													</div>
													<div class="card-footer"></div>
												</div>
											</div>



											<div class="col-xl-4 col-lg-7">
												<div class="card shadow mb-4" id="grap">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Grafiku Geral Estudante </h6>
													</div>
													<!-- Card Body -->
													<div class="card-body">
														<div class="chart-area">
															<canvas id="myPieChart"></canvas>
														</div>
													</div>
													<div class="card-footer"></div>
												</div>
											</div>									


											<div class="col-xl-4 col-lg-7">
												<div class="card shadow mb-4" id="grap">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Grafiku Classe</h6>
													</div>
													<!-- Card Body -->
													<div class="card-body">
														<div class="chart-area">   

														<canvas id="myBarChartturma" class="mh-400px"></canvas>
														</div>
													</div>
													<div class="card-footer"></div>
												</div>
											</div>

                                               
                                            
                                           </div>
                                          

										</div> 
                                        
                                        
								</div>

               

      <script src="<?= base_url()?>/assets/chart.js/Chart.min.js"></script>
    <script>
        
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';
        // Bar Chart Programa Estudo
        var ctx = document.getElementById("myPieChartpg");  // Selector yang akan digunakan untuk menampilkan pie

    var myPieChart = new Chart(ctx, {
    type: 'pie',  // Tipe grafik yang akan ditampikan
    data: {
        labels: ["Informatika", "Contabilidade","Turismo","Hotelaria"],
        datasets: [{
            data: [<?php foreach ($t_dep as $key => $dp) {
                                echo "'" . $dp['calculo'] . "',";
                    } ?>],
            backgroundColor: [
         'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ],
    borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ],
        }],
    },
    options: {
scales: {
    y: {
        beginAtZero: true
    }
}
}
    
});


        // Pie Chart Mane Feto
        var ctx = document.getElementById("myPieChart");  // Selector yang akan digunakan untuk menampilkan pie

        var myPieChart = new Chart(ctx, {
            type: 'pie',  // Tipe grafik yang akan ditampikan
            data: {
                labels: ["Mane", "Feto"],
                datasets: [{
                    data: [<?php foreach ($sexo as $key => $sexo) {
                                echo "'" . $sexo['calculo'] . "',";
                            } ?>],
                    backgroundColor: [
                 'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
                }],
            },
            options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
            }
                    
                });


        // Bar Chart Classe
             var ctx = document.getElementById("myBarChartturma");
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:                
                        ["11 ano", "12 ano", "10 ano"],
                        
                        
                        datasets: [{
                            
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                            data:  [<?php foreach ($classe as $key => $classe) {
                                        echo "'" . $classe['calculo'] . "',";
                                    } ?>],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{

                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    maxTicksLimit: 100
                                },
                                maxBarThickness: 100,
                                ///ukuran Bar grafik
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 1,
                                    maxTicksLimit: 10,
                                    padding: 5,

                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }],
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#FF0000",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                    }
                });

            </script>



                <script>

                     var ctx = document.getElementById("myBarCharttinan");
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:                
                        ["2019", "2020", "2021"],
                        
                        
                        datasets: [{
                            
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                            data:  [<?php foreach ($tinan_akademik as $key => $aka) {
                                        echo "'" . $aka['calculo'] . "',";
                                    } ?>],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{

                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    maxTicksLimit: 100
                                },
                                maxBarThickness: 100,
                                ///ukuran Bar grafik
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 1,
                                    maxTicksLimit: 10,
                                    padding: 5,

                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }],
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#FF0000",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                    }
                });

                </script>

        </div>  
</div>
