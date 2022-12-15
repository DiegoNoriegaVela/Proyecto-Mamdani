<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Detector Riesgo de Cancer de Mama</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">

  <!-- style -->
  <link rel="stylesheet" href="assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/styles/app.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/styles/font.css" type="text/css" />
</head>
<body>
  <header>
      <nav class="navbar navbar-toggleable-sm navbar-md fixed-top purple-A100">
        <div class="container">
          <a data-toggle="collapse" data-target="#navbar-1" class="navbar-item pull-right hidden-md-up m-a-0 m-l">
            <i class="fa fa-bars"></i>
          </a>

          <!-- brand -->
          <a class="navbar-brand md" href="#home" ui-scroll-to="home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
              <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add" />
              <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)" />
              <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa" />
            </svg>

            <span class="hidden-folded inline">UNMSM</span>
          </a>
          <!-- / brand -->

          <!-- navbar collapse -->
          <div class="collapse navbar-collapse text-center purple-A100" id="navbar-1">
            <!-- link and dropdown -->
            <ul class="nav navbar-nav nav-active-border bottom b-primary ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="https://proyectosistintg5.ml:8083/login" >
                  <span class="nav-text">Vesta Panel</span>
                </a>
              </li>
            </ul>
            <!-- / link and dropdown -->
          </div>
          <!-- / navbar collapse -->
        </div>
      </nav>
  </header>
  <div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30" style="position:fixed; z-index:0; left:50%; top: 20%" class="animated fadeInDownBig">
        <path d="M 48 0 L 24 48 L 0 0 Z" fill="rgba(0,0,0,0.05)" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="10" height="10" style="position:fixed; z-index:0; left:49%; top: 15%" class="animated fadeInDown">
        <path d="M 48 0 L 24 48 L 0 0 Z" fill="#a88add" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="5" height="5" style="position:fixed; z-index:0; left:30%; top: 0%" class="animated fadeInDown">
        <path d="M 48 0 L 24 48 L 0 0 Z" fill="#a88add" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="20" height="20" style="position:fixed; z-index:0; right:5%; top: 30%" class="animated fadeInDown">
        <path d="M 48 0 L 24 48 L 0 0 Z" fill="#0cc2aa" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="15" height="15" style="position:fixed; z-index:0; left:34.5%; top: 55%" class="animated fadeIn">
        <path d="M 0 48 L 24 0 L 48 48 Z" fill="#fcc100" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="200" height="200" style="position:fixed; z-index:0; right:20%; top: 70%" class="animated fadeInUp">
        <path d="M 0 48 L 24 0 L 48 48 Z" fill="rgba(252,193,0,0.1)" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="120" height="120" style="position:fixed; z-index:0; left:0%; top: 30%" class="animated fadeInLeftBig">
        <path d="M 0 48 L 48 24 L 0 0 Z" fill="rgba(0,0,0,0.03)" />
      </svg>
  </div>

  <div class="page-content" id="home">

    <div class="purple-A100 row-col">
      <div class="container p-y-lg pos-rlt">
        <h1 class="display-3 _700 l-s-n-3x m-t-lg m-b-md">Diagnóstico de cáncer de mama</h1>
        <h5 class="text m-b-lg">Herramienta de pre-diagnóstico de cáncer de mama utilizando <span class="label accent">lógica difusa</span> </h5>
      </div>
    </div>

    <!--FORMULARIO-->
    <div class="p-y-lg light row-col">
      <div class="row m-t-lg m-b-md">
        <div class="box col-md-6 offset-md-3 lt m-b">

          <div class="box-header purple accent">
            <h3>Parámetros</h3>
            <small>Por favor ingrese los siguientes parámetros para el diagnóstico.</small>
          </div>

          <div class="box-body">
            <form role="form" class="ng-pristine ng-valid" method="post" action="">
              <div class="form-group row">
                <label for="area" class="col-sm-3 form-control-label">Área [185-4255]</label>
                <div class="col-sm-8">
                    <input name="area" type="number" class="form-control" id="area" placeholder="Ingrese Área">
                </div>
              </div>

              <div class="form-group row">
                <label for="perimetro" class="col-sm-3 form-control-label">Perímetro [50-252]</label>
                <div class="col-sm-8">
                    <input name="perimetro" type="number" class="form-control" id="perimetro" placeholder="Ingrese Perímetro">
                </div>
              </div>

              <div class="form-group row">
                <label for="uniformidad" class="col-sm-3 form-control-label">Uniformidad [0-12]</label>
                <div class="col-sm-8">
                    <input name="uniformidad" type="number" class="form-control" id="uniformidad" placeholder="Ingrese Uniformidad">
                </div>
              </div>

              <div class="form-group row">
                <label for="homogeneidad" class="col-sm-3 form-control-label">Homogeneidad [0.01-0.45]</label>
                <div class="col-sm-8">
                    <input name="homogeneidad" class="form-control" id="homogeneidad" placeholder="Ingrese Homogeneidad">
                </div>
              </div>
                  
              <footer class="p-a dker text-right">
                <button name="enviado" type="submit" id="enviado" class="btn m-b-sm purple">Realizar Consulta</button>
              </footer>
            </form>
          </div>

        </div>
      </div>
    </div>

  <!--EJECUTAR PYTHON-->
    <?php
    

    if(isset($_POST['enviado'])){
      unlink('/home/admin/web/proyectosistintg5.ml/public_html/conjdif.jpg');
      unlink('/home/admin/web/proyectosistintg5.ml/public_html/intersec.jpg');
      unlink('/home/admin/web/proyectosistintg5.ml/public_html/resultado.jpg');

      $area=$_POST['area'];
      $perimetro=$_POST['perimetro'];
      $uniformidad=$_POST['uniformidad'];
      $homogeneidad=$_POST['homogeneidad'];

      $data = $area.','.$perimetro.','.$uniformidad.','.$homogeneidad;
      $output = shell_exec('/usr/bin/python3 /home/admin/web/proyectosistintg5.ml/public_html/diagnosticocancermama.py 2>&1 '.$data); 

      $resultados = explode(" ", $output);

      //Separando resultados
      $prediag_defuzzified = substr($resultados[0],0,4);
      $pert_prediag_benigno = $resultados[1]*100;
      $pert_prediag_indefinido = $resultados[2]*100;
      $pert_prediag_maligno = $resultados[3]*100;
    }
  ?>

  <!--MOSTRAR RESULTADOS-->
  <?php
    if(isset($_POST['enviado'])){
  ?>
  <div class="p-y-lg deep-purple-50 row-col">
    <div class="container p-y-lg text-primary-hover">
      <h2 class=" _700 l-s-n-1x m-b-md">Resultados</h2>

      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="container p-y-lg pos-rlt">

            <?php
              if($pert_prediag_benigno>0){
            ?>
            <div class="alert ng-isolate-scope" style="background-color:#fa39c3;color:white;background-color:#fa39c3;color:white">
              <div ng-transclude=""><span class="ng-scope">El tumor tiene riesgo de ser Benigno</span></div>
            </div>
            <?php
            }else if($pert_prediag_indefinido>0){
            ?>
            <div class="alert ng-isolate-scope" style="background-color:#fa39c3;color:white;background-color:#fa39c3;color:white">
              <div ng-transclude=""><span class="ng-scope">El tumor no puede definirse</span></div>
            </div>
            <?php
            }else{
            ?>
            <div class="alert ng-isolate-scope" style="background-color:#fa39c3;color:white;background-color:#fa39c3;color:white">
              <div ng-transclude=""><span class="ng-scope">El tumor tiene riesgo de ser Maligno</span></div>
            </div>
            <?php
            }
            ?>

          </div>
        </div>
      </div>

      <h2 class=" _700 l-s-n-1x m-b-md">Detalles</h2>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="container p-y-lg pos-rlt">
            <div class="progress mb-4">
              <div class="progress-bar progress-bar-striped progress-bar-animated purple" style="width: <?=$pert_prediag_benigno?>%"><?=$pert_prediag_benigno?>%</div>
            </div>
            <h5 class="text-muted m-b-lg">Pertenencia al conjunto Benigno <span class="label accent"><?=$pert_prediag_benigno?>%</span></h5>
          </div>
          <div class="container p-y-lg pos-rlt">
            <div class="progress mb-4">
              <div class="progress-bar progress-bar-striped progress-bar-animated purple" style="width: <?=$pert_prediag_indefinido?>%"><?=$pert_prediag_indefinido?>%</div>
            </div>
            <h5 class="text-muted m-b-lg">Pertenencia al conjunto Indefinido <span class="label accent"><?=$pert_prediag_indefinido?>%</span></h5>
          </div>
          <div class="container p-y-lg pos-rlt">
            <div class="progress mb-4">
              <div class="progress-bar progress-bar-striped progress-bar-animated purple" style="width: <?=$pert_prediag_maligno?>%"><?=$pert_prediag_maligno?>%</div>
            </div>
            <h5 class="text-muted m-b-lg">Pertenencia al conjunto Maligno <span class="label accent"><?=$pert_prediag_maligno?>%</span></h5>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="offset-md-1">
          <div class="container p-y-lg pos-rlt">
            <h5 class="text-muted m-b-lg">Conjuntos Difusos</h5>
            <img src="conjdif.jpg">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="offset-md-1">
          <div class="container p-y-lg pos-rlt">
            <h5 class="text-muted m-b-lg">Gráfica de intersección con conjuntos difusos</h5>
            <img src="intersec.jpg">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="offset-md-1">
          <div class="container p-y-lg pos-rlt">
            <h5 class="text-muted m-b-lg">Resultados Defuzzificación: <?=$prediag_defuzzified?></h5>
            <img src="resultado.jpg">
          </div>
        </div>
      </div>

    </div>
  </div>


  <!--INTEGRANTES-->
  <div class="p-y-lg light row-col">
    <div class="container p-y-lg text-primary-hover">
      <h2 class=" _700 l-s-n-1x m-b-md">Integrantes <span class="text-primary">Grupo 5</span></h2>
      <h5 class="m-y-lg text-muted text-center">Noriega Vela, Diego</h5>
      <h5 class="m-y-lg text-muted text-center">Ramos Cosinga, Christopher Alexander </h5>
      <h5 class="m-y-lg text-muted text-center">Poquioma Esquivel, Juan Heriberto</h5>
      <h5 class="m-y-lg text-muted text-center">Gonzales Ruiz, Diego Alberto</h5>
      <h5 class="m-y-lg text-muted text-center">Rivera Obregón, Manuel Jonathan Omar </h5>
      <h5 class="m-y-lg text-muted text-center">Sifuentes Marcelo, Roberto </h5>
    </div>
  </div>

  <?php
    }
  ?>

  </div>

<!--PIE DE PÁGINA-->
  <footer class="purple-A100 pos-rlt">
    <div class="footer dk">
      <div class="b b-b"></div>
      <div class="p-a-md">
        <div class="row footer-bottom">
          <div class="col-sm-8">
            <small class="text-muted">Proyecto <strong>Sistemas Inteligentes</strong> by Grupo 5</small>
          </div>
          <div class="col-sm-4">
            <div class="text-sm-right text-xs-left">
              <strong>UNMSM</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="libs/jquery/jquery/dist/jquery.js"></script>
  <script src="libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
  <script src="html/scripts/ui-scroll-to.js"></script>
</body>
</html>
