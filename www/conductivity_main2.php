<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Quimicas Mundiales S.A | Solid Con I DataLink </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<META HTTP-EQUIV="refresh" CONTENT="20"> 
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php
	$output = shell_exec( "/www/cgi-bin/condMeasure" );
		
	if(isset($_GET['led']) && isset($_GET['onOff']))
	{
		$led = $_GET['led'];
		$onOff = $_GET['onOff'];
		
		
	}

?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			   ['Time', 'Conductivity'],
			   <?php
				$con = mysqli_connect("localhost","bone","bone","TempDB");
				
				$query = "SELECT * FROM ConducMeasure";
				$result = mysqli_query($con,$query);
				
				mysqli_close($con);
			
				while($row = mysqli_fetch_array($result))
				{
					$time = $row['MeasureTime'];
					$conductivity = $row['Conductivity'];
					echo "['$time', $conductivity],";
				}
			   ?>
			]);

		var options = {
			title: 'Conductividad Medida',
			vAxis: { title: "Partes por Millon TSD" }
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		chart.draw(data,options);
	}
</script>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >        
        <!-- HEADER SECTION -->
        <div id="top">
            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 5px; padding-bottom: 5px;">
               
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <a href="www.quimusa.com" class="navbar-brand">
                    <img src="assets/img/QM_logo_oficial_wiki.png" alt="logo quimusa" />
                        </a>                     
                </header>
                <!-- END LOGO SECTION -->      
                &nbsp;&nbsp;&nbsp;&nbsp; <h2> &nbsp;&nbsp;&nbsp;QM DATALINK CENTER </h2>                    
            </nav>
        </div>
        <!-- END HEADER SECTION -->

        <!-- MENU SECTION -->
       <div id="left" >
             <ul id="menu" class="collapse">                
                <li class="panel active">
                    <a href="index.html" >
                         MENU                       
                    </a>                   
                </li>                                           
                <li><a href="gallery.html"><i class="icon-file-text"></i> Generar Reporte </a></li>
                <li><a href="tables.html"><i class="icon-reorder"></i> Procedimiento Aplicacion </a></li>
                <li><a href="maps.html"><i class="icon-star"></i> Ecofrut C </a></li>
                   <li><a href="maps.html"><i class="icon-share-alt"></i> www.quimusa.com </a></li>
                <li><a href="grid.html"><i class="icon-signin"></i> Contacto </a></li>               
            </ul>
        </div>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height: 700px;">
                
                <div class="row">
                    <div class="col-lg-12">
                    </br> &nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="assets/img/titulo_solid_con_I.png" alt="logo solid con" />
                                                </a> 

                    </div>
                </div>
                <hr />
                  
            <!-- Real time Seccions-->
                 <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PPM Ecofrut TIEMPO REAL
                            </div>
                            <div class="panel-body">
                               <h3><?php echo htmlspecialchars($output); ?></h3>
                               <h3> ppm </h3>
                               <h4> *Total Solidos Disueltos </h4>
                            </div>
                            <div class="panel-footer">
                                Linea 1 VISA
                            </div>
                        </div>   
                    </div> <!--end col-lg-4 -->
                    
                    <div class="col-lg-7">               
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Enviar Datos / Generar Reporte
                                </div>
                                <div class="panel-body">
                                    <p>Aqui Va: </p>
                                    <p>FECHA INICIO::: (ESCOGER FECHAS)</p>
                                    <p>FECHA FINAL::: (ESCOGER FECHAS)</p>
                                    <p>BOTON GENERAR REPORTE:::BOTON GRAFICAR</p>
                                </div>
                                <div class="panel-footer">
                                    Reporte en Formato PDF
                                </div>
                            </div>             
                    </div> <!--end col-lg-7 --> 

                </div> <!-- end row -->

                 <div class="row">
                     <div class="col-lg-8">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                                GRAFICO ULTIMA HORA APLICACION
                             </div>

                             <div class="demo-container">
                             	<div id ="chart_div" style="width: 900px; height: 500px;"></div>
                                <!-- <div id="placeholderRT" class="demo-placeholder"></div> -->
                             </div>                                      
                        </div>            
                    </div> <!--end col-lg-78-->                     
                </div> <!-- end row -->

            </div>
        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
       <!-- <div id="right">
          RIGHT PANEL EMPTY!!! 
        </div>-->
         <!-- END RIGHT STRIP  SECTION -->
   
    </div>
    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Quimicas Mundiales S.A  &nbsp;2016 &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
