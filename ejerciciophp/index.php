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
            <form class="form-horizontal" action="proceso.php">
              <fieldset>
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
              </fieldset>

              <div class="form-group">
                <label class="control-label col-sm-12" for="cuotaIni">Cuota Inicial %:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="cuotaIni" placeholder="Valor cuota inicial" value = ""  required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-12" for="pwd">Tiempo de prestamo en años:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="vlr" placeholder="Numero de años del prestamo" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-12" for="pwd">Ingresos familiares:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="vlr" placeholder="Valor de los ingresos familiares" required>
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
                  <button type="submit" class="btn btn-default">Submit</button>
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
