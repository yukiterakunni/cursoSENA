<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Viviendas PHP</title>

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

  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">cotizaciones</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Selecciona tu
            <span class="text-primary">NUEVA VIVIENDA</span>
          </h1>
          <br>
          <div class="row">
            <div class="col-sm-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/tipoA.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Vivienda Tipo A</h5>
                  <p class="card-text">Esta vivienda tiene un valor de $86.000.000 y cuenta con un subsidio de vivienda por valor de $8.000.000. el ingreso mensual permitido para adquirir esta vivienda es entre 1 y 3 salarios minimos, el valor de la cuota inicial tiene que estar entre el 20% y el 30% del valor de la vivienda y el tiempo de plazo para el credito debe ser entre 5 y 20 años. </p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/tipoB.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Vivienda Tipo B</h5>
                  <p class="card-text">Esta vivienda tiene un valor de $110.000.000 y en estos momentos NO cuenta con beneficio de subsidio de vivienda; el ingreso mensual permitido para adquirir esta vivienda es entre 2 y 5 salarios minimos, el valor de la cuota inicial tiene que ser exclusivamente el 30% del valor de la vivienda y el tiempo de plazo para el credito debe ser entre 5 y 15 años. </p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/tipoC.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Vivienda Tipo C</h5>
                  <p class="card-text">Esta vivienda tiene un valor de $141.000.000 y en estos momentos NO cuenta con beneficio de subsidio de vivienda; el ingreso mensual permitido para adquirir esta vivienda debe ser exclusivamente mayor a 3 salarios minimos, el valor de la cuota inicial tiene que estar entre el 25% y el 30% del valor de la vivienda y el tiempo de plazo para el credito debe ser entre 3 y 20 años. </p>
                </div>
              </div>
            </div>
          </div>
          <div class="formulario">
            <h4>Formulario de inscripción</h4>
            <?php
              // Notificar solamente errores de ejecución
              error_reporting(E_ERROR | E_PARSE);
            	##### DEFINICION DE VARIABLES Y CONSTANTES
            	$costotva =  86000000;
            	$costotvb = 110000000;
            	$costotvc = 141000000;
            	$subfamta =   8000000;
            	$sub      =         0;
            	$minimo   =    781000;
            	$cuotafija=         0;
              $pori =             0;
              $tviv = $_REQUEST['tipoViv'];
              echo ($tviv);
            	if (!isset($err01)) {$err01='';}
            	if (!isset($err02)) {$err02='';}
            	if (!isset($err03)) {$err03='';}
            	if (!isset($err04)) {$err04='';}
            	if (!isset($err05)) {$err05='';}
            	if (!isset($err06)) {$err06='';}
            	if (!isset($tviv)) {$tviv='';}
            	if (!isset($ini)) {$ini=0;}
            	if (!isset($tpre)) {$tpre=0;}
            	if (!isset($ingrf)) {$ingrf=0;}
            	if (!isset($costoviv)) {$costoviv=0;}
            	#####
            	extract($_POST);
            	$longvtv=strlen(ltrim($tviv));
            	# NOS PERMITE VERIFICAR QUE NO ESTEMOS TRABAJANDO MAS DE UN CARACTER EN EL TIPO DE VIVIENDA
            	if ($longvtv > 1) {
            		$err01 = "Longitud no Valido";
            	}
            	elseif ($longvtv == 1) {
            		# DEFINIR LOS PORCENTAJES DE INTERES
            		$basecomp = $ingrf / $minimo;
            		if ($basecomp >= 2 and $basecomp<=5) {$pori = 0.012;}
            		if ($basecomp  > 5 and $basecomp<=7) {$pori = 0.013;}
            		if ($basecomp == 1 ) {$pori = 0.009;}
            		# NOS PERMITE TRABAJAR Y VALIDAR EL TIPO DE VIVIENDAD A.
            		if ($tviv == 'a' or $tviv == 'A') {
            			$costoviv = $costotva;
            			$sub = $subfamta;
            			if ($ini < 20 or $ini>30) {$err03="Cuota Inicial por fuera de rango";}
            			if ($tpre < 5 or $tpre>20) {$err04="Tiempo fuera de rango";}
            			if ($basecomp > 3 ) {$err05="Ingresos Fuera de Rango";}
            		}
            		# NOS PERMITE TRABAJAR Y VALIDAR EL TIPO DE VIVIENDAD B.
            		elseif ($tviv == 'b' or $tviv == 'B') {
            			$costoviv = $costotvb;
            		}
            		# NOS PERMITE TRABAJAR Y VALIDAR EL TIPO DE VIVIENDAD C.
            		elseif ($tviv == 'c' or $tviv == 'C') {
            			$costoviv = $costotvc;
            		}
            		else{$err02='Tipo de Vivienda no Valido';}
            	}
            	####CALCULAR EL VALOR DE LA CUOTA INICIAL
            	$vini = (($costoviv * $ini)/100);
            	####CALCULAR EL VALOR DEL PRESTAMO
            	$vpre = ($costoviv - $sub - $vini);
            	####CALCULAR TIEMPO EN MESES
            	$meses = ($tpre*12);
            	####CALCULAR CUOTA FIJA
            	$x = (1+$pori);
            	$xpow = pow($x, $meses);
            	$numerador = $vpre * ( $pori * $xpow);
            	$denominador = ($xpow - 1);
            	$cuotafija = $numerador / abs($denominador);
            	$veinte = ($ingrf * 0.3);
            	if ($cuotafija > $veinte) {$err06="No es Posible Comprador $veinte";}
            	$seguro = ($cuotafija * 0.005);
            	$coutam = ($cuotafija + $seguro);
            	####### FORMATEAR VALORES
            	$mcoutam = number_format($coutam);
            	$mvini = number_format($vini);
            	$msub = number_format($sub);
            	$mcostoviv = number_format($costoviv);
            	$mvpre = number_format($vpre);
            	$mcuotafija = number_format($cuotafija);
            	$mseguro = number_format($seguro);
            	#######
            	/*echo"<form id=presta name=presta method=post action = '#' class='form-horizontal'>";
            		echo"<table border=0>";
            			echo"<td>Tipo de Vivienda</td><td><input type=text size=3 id=tviv name=tviv value='$tviv'></td><td>$err02 $err01 $mcostoviv</td><tr>";
            			echo"<td>Subsidio</td><td></td><td>$msub</td><tr>";
            			echo"<td>Cuota Inicial %</td><td><input type=text size=3 id=ini name=ini value='$ini'></td><td>$err03 $mvini </td><tr>";
            			echo"<td>Valor Prestamo</td><td></td><td> $mvpre</td><tr>";
            			echo"<td>Tiempo prestamo Anios</td><td><input type=text size=3 id=tpre name=tpre value='$tpre'></td><td>$err04 $meses meses</td></tr>";
            			echo"<td>Ingresos Familiares</td><td><input type=text size=10 id=ingrf name=ingrf value='$ingrf'><td><td>$err05</td></tr>";
            			echo"<td>Cuota Fija Mensual</td><td></td><td>$mcuotafija ... $mseguro ... $mcoutam $err06 </td></tr>";
            			echo"<td><input type=submit value='Aceptar'></td>";
            		echo"</table>";
            	echo"</form>";*/
            	##CALCULO DE LA AMORTIZACIÓN
            	echo"<table>";
            	echo"<th>#</th>";
            	echo"</tr>";
            	for ($i=1; $i <=$meses; $i++) {
            		# code...
            		echo"<td>$i.</td>";
            		echo"</tr>";
            	}
            	echo"</table>";

            ?>

            <form id="from_h" class="form-horizontal" action="#">
              <!--<fieldset>
                  <legend>Selecciona el tipo de vivienda</legend>
                  <label>
                      <input type="radio" name="tipoViv" value="a" required> Vivienda Tipo A
                  </label>
                  <br>
                  <label>
                      <input type="radio" name="tipoViv" value="b" required> Vivienda Tipo B
                  </label>
                  <br>
                  <label>
                      <input type="radio" name="tipoViv" value="c" required> Vivienda Tipo C
                  </label>
              </fieldset>-->
              <input type="text" class="form-control" id="tipoViv" placeholder="Digite e tipo de vivienda" value = "<?php $tipoViv ?>"  required>
              <div class="alert alert-info" role="alert"><?php echo "El valor del subsidio familiar es: $ $msub " ?></div>
              <div class="form-group">
              </div>
              <div class="form-group">
                <label class="control-label col-sm-12" for="cuotaIni">Cuota Inicial %:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="cuotaIni" placeholder="Valor cuota inicial" value = "<?php $ini ?>"  required>
                  <div class="alert alert-info" role="alert">
                    <?php echo "El valor de la cuota inicial es: $ $mvini " ?>
                    <br>
                    <?php echo "El valor del prestamo es: $ $mvpre " ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-12" for="pwd">Tiempo de prestamo en años:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="vlr" placeholder="Numero de años del prestamo" required>
                  <div class="alert alert-info" role="alert">
                    <?php echo "El tiempo en meses es: $meses " ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-12" for="pwd">Ingresos familiares:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="vlr" placeholder="Valor de los ingresos familiares" required>
                  <div class="alert alert-success" role="alert">
                    <?php echo "La cuota fija mensual es: $mcuotafija " ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <!--<label><input type="checkbox"> Remember me</label>-->
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" href="#from_h">Submit</button>
                </div>
              </div>
            </form>
            <div class="alert alert-danger" role="alert">...</div>
          </div>
        </div>
      </section>
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
