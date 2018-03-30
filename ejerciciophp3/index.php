<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Parking</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/parking.jpg" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Facturaci&oacute;n</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <div class = "row">
        <div class="col-sm-8">
          <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
              <h1 class="mb-0">parking
                <span class="text-primary">Vehiculos</span>
              </h1>
              <br>
              <div class="formulario">
                <h4>Formulario de liquidaci&oacute;n</h4>
                <?php
                  //Esta linea sirve para que php no muestre mensajes de alertas ni cosas que no sean errores
                  error_reporting(E_ERROR | E_PARSE);
                  //De esta forma recupero los datos que vienen en el formulario
                  $TimeIngreso = $_REQUEST['timeIngreso'];
                  $TimeSalida = $_REQUEST['timeSalida'];
                  $descVehi = $_REQUEST['descVehiculo'];
                  //Declaro las variables necesarias quiza algunas de ellas no se usen :v
                  $mFactor = 60;
                  $hFactor = 24;
                  if (!isset($TimeIngreso)) {$TimeIngreso='';}
                  if (!isset($TimeSalida)) {$TimeSalida='';}
                  if (!isset($mIngreso)) {$mIngreso=0;}
                  if (!isset($mSalida)) {$mSalida=0;}
                  if (!isset($pagoTotal)) {$pagoTotal=0;}
                  if (!isset($hl)) {$hl = '';	}
                	if (!isset($ml)) {$ml = '';	}
                  if (isset($err1)) {$err1=' ';}
                  //con la funcion explode separamos la hora de los minutos
                  $ing = explode( ':' , $TimeIngreso);
                	$sal = explode( ':' , $TimeSalida);
                  //esto es una validacion para evitar que la hora de salida sea menor a la hora de ingreso
                  if(($sal[0] == $ing[0]) && ($sal[1] == $ing[1])){
                      $err1 = "La hora de salida debe ser mayor que la hora de ingreso";
                  }
                  //Esta es la operacion basica para sacar las horas a liquidar
                	$hl = ($sal[0] - $ing[0]);
                	$ml = ($sal[1] - $ing[1]);
                  //calcuo de las horas a liquidar si el resultado es negativo
                  if($hl < 0){
                    $hl+=24;
                  }
                  //calcuo de los minutos a liquidar si el resultado es negativo
                	if ($ml < 0) {
                    $ml += 60;
                    $hl-=1;
                  }
                  //Yo decidi usar temporales para guardar los tiempos esto es opcional
                  $tempH = $hl;
                  $tempM = $ml;
                  ### LIQUIDACION MAS DE 6 HORAS....
                  if ($hl >= 6 ) {
                      $hp = $hl;
                      $hp -= 1;
                      //Usamos la hora de ingreso en la variable $hi
                      $hi = $ing[0];
                      //Inicializamos las varibles para guardar horas diurnas y nocturnas por separado
                      $diur = 0;
                      $noct = 0;
                      //El ciclo se va repetir mientras $a <= $h1 y cada ciclo $a va aumentar en 1
                      //$a es una varible cualquiera
                      //$hl son las horas a liquidar
                      while ($a <= $hp) {
                            if ($hi>=24) {
                              //esto se hace porque el dia solo tiene 24 horas
                              $hi = 24 - $hi;
                            }
                            //Si la hora de ingreso es en el dia osea de 6am a 6pm
                            if($hi >= 6 && $hi < 18){
                              $diur += 1;//Se suma una hora diurna
                            }else {//De lo contrario
                              $noct +=1;//Se suma una hora nocturna
                            }
                            $a += 1;//incremento en 1
                            $hi += 1;//incremento en 1
                      }
                      echo "Diurnas ... $diur ...Nocturnas ...$noct";
                      //El anterior ciclo nos devuelve el total de horas diurnas y nocturnas que estuvo el vehiculo
                      //Con round hacemos un redondeo de los valores decimales eje: round(75.8) = 76
                      $prd=round((($diur/($diur+$noct))*100),0) ;
                      $prn = 100 - $prd;
                      //se cobra 12000 pesos por dia jornada diurna
                      if ($noct == 12) {
                        $vlrnoct=12000;
                      }
                      else {
                        $vlrnoct = (12000*$prn)/100;
                      }
                      //se cobra 11000 pesos por dia jornada diurna
                      if ($diur == 12 ) {
                        $vlrdiur = 11000;
                      }
                      else {
                        $vlrdiur = (11000*$prd)/100;
                      }
                      $pagoTotal = $vlrdiur + $vlrnoct;
                  }
                  ###  LIQUIDACION POR HORAS
                  else {
                      //la primera hora se va a	cobrar a 2500 o fraccion
                      if($tempH==1 || ($tempH==0 && $tempM>=1) ){
                          $pagoTotal = ($pagoTotal + 2500);
                          $tempH = $tempH - 1;
                      }
                      //apartir de la fraccion de la segunda hora se cobra 47 pesos minutos
                      if($tempH >= 2 && $tempH < 4){
                        $pagoTotal = $pagoTotal + ((($tempH * 60) + $tempM) * 47);
                      }
                      //apartir de la 4 hora se cobra 44 pesos minuto
                      else if($tempH >=4 && $tempH < 6){
                        $pagoTotal = $pagoTotal + ((($tempH * 60) + $tempM) * 44);
                      }
                  }
                ?>

                <form class="form-horizontal" action="#">

                  <div class="form-group">
                    <label class="control-label col-sm-12" for="hIngreso">Desc. vehiculo:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="descVehiculo" value="Hiunday CPX 249" name="descVehiculo" maxlength="15" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-12" for="hIngreso">Hora de ingreso:</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="TimeIngreso" name = "timeIngreso" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-12" for="hSalida">Hora de salida:</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="TimeSalida" value="<?php $TimeSalida ?>" name = "timeSalida" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                </form>
                <?php
                if($err1 <> ''){
                  echo "<div class='alert alert-danger' role='alert'>$err1</div>";
                }
                ?>
              </div>
            </div>
          </section>
        </div>
        <div class="col-sm-4 factura">
          <table class="table table-hover">
            <tbody>
              <!-- Aplicadas en las filas -->
              <tr class="active">
                  <td>
                    <h4>Factura de venta</h4>
                  </td>
              </tr>

              <!-- Aplicadas en las celdas (<td> o <th>) -->
              <tr>
                <td class="active">
                    <strong>Comprador:</strong>
                </td>
                <td class="success">
                    <p><?php echo $descVehi; ?></p>
                </td>
              </tr>
              <tr>
                <td class="active">
                    <strong>Ingreso:</strong>
                </td>
                <td class="success">
                    <p><?php echo $TimeIngreso; ?></p>
                </td>
              </tr>
              <tr>
                <td class="active">
                    <strong>Salida:</strong>
                </td>
                <td class="success">
                    <p><?php echo $TimeSalida; ?></p>
                </td>
              </tr>
              <tr>
                <td class="active">
                    <strong>Total horas:</strong>
                </td>
                <td class="success">
                    <p><?php echo $hl; ?></p>
                </td>
              </tr>
              <tr>
                <td class="active">
                    <strong>Total minutos:</strong>
                </td>
                <td class="success">
                    <p><?php echo $ml; ?></p>
                </td>
              </tr>
              <tr>
                <td class="active">
                    <h3><strong>Total a pagar:</strong></h3>
                </td>
                <td class="success">
                    <h3><p><span>$</span><?php echo $pagoTotal; ?></p></h3>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php

        /*
        $arrIngreso = explode( ':' , $TimeIngreso);
      	$arrSalida = explode( ':' , $TimeSalida);


        $hTemp = $hSalida - $hIngreso;
        $mTemp = $mSalida - $mIngreso;
        if($hTemp < 0){
            $hTotal = $hTemp + $hFactor;
        }else{
            $hTotal = $hTemp;
        }

        */

      ?>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
