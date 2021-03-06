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
<!--<META HTTP-EQUIV="refresh" CONTENT="60"> -->
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
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />

<!-- END PAGE LEVEL  STYLES -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!-- Script to update PPM variable -->
<script>
function loadval_ppm() {

    var nIntervId; // variable to point setInterval
    nIntervId = setInterval(getVal_ppm, 1000);
 
    function getVal_ppm() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("update_div").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "output.php", true);
        xmlhttp.send();
    }
    
}
</script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Tiempo', 'PPM'],
<?php
            $con = mysqli_connect("localhost","bone","bone","TempDB");
            if(isset($_POST['GraficarButton'])){                  //check if form was submitted
                $field1 = $_POST['field1name']; //get input text 
                $field2 = $_POST['field2name']; //get input text 
                $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '$field1 00:00:00' AND '$field2 23:59:59'";

            }
            else {
                $query = "SELECT * FROM ConducMeasure WHERE MeasureTime >= DATE_SUB(NOW(), interval 5 hour)";
            }
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
            title: 'PPM (Partes por Millon) de Ecofrut Disueltos',
            vAxis: { title: "Partes por Millon TSD" }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data,options);
    }
</script>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53" onload="loadval_ppm();" >

<!-- MAIN WRAPPER -->
<div id="wrap" >       
    <!-- HEADER SECTION -->
    <div id="top">
        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 5px; padding-bottom: 5px;">
            <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
            </a>
            
            <!-- LOGO SECTION -->
            <header class="navbar-header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="www.quimusa.com" class="navbar-brand">
                <img src="assets/img/QM_logo_oficial_wiki.png" align="middle" alt="logo quimusa" />
                </a>                     
            </header>
            <!-- END LOGO SECTION -->      
            &nbsp;&nbsp;&nbsp;&nbsp; <h1> QM DATALINK CENTER </h1>                    
        </nav>
    </div>
    <!-- END HEADER SECTION -->

    <!-- MENU SECTION -->
    <div id="left" >
        <ul id="menu" class="collapse">                
            <li class="panel active">
            <a href="index.html" > MENU </a>                   
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
                </div>
            </div>
            <hr />
            <!-- Real time Seccions-->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading"> PPM Ecofrut TIEMPO REAL</div>
                        <div class="panel-body">
                           <h3><span id="update_div"></span></h3> 
                            <!--<h3><?php //echo htmlspecialchars($output); ?> ppm</h3>-->                             
                            <h4> *Total Solidos Disueltos </h4>
                        </div>
                        <div class="panel-footer"> Linea 1 VISA</div>
                    </div>   
                </div> <!--end col-lg-4 -->
                <div class="col-lg-7">               
                    <div class="panel panel-primary">
                        <div class="panel-heading">Enviar Datos / Generar Reporte</div>
                        <div class="panel-body">
                            <!-- BEGIN DATE PICKER -->
                            <div class="row">
                               <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Escoja las fechas:</div>
                                        <div>
                                            <form action="" method="post">     
                                              <!--  Fecha Inicio: <input type="date" name="field1name" value=""/></br>
                                                &nbsp;Fecha Final: <input type="date" name="field2name" value=""/></br></br> -->
                                                &nbsp;Fecha Inicio: <input type="date" name="field1name" value="2015-12-01"/></br>
                                                &nbsp;Fecha &nbsp;Final: <input type="date" name="field2name" value="2015-12-02"/></br></br> 
                                                <input class="btn btn-primary btn-round" type="Submit" value="Generar PDF" name="GenerarPDFButton" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="btn btn-primary btn-round" type="Submit" value="Generar Excel" name="GenerarCSVButton" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="btn btn-primary btn-round" type="Submit" value="Graficar" name="GraficarButton" /> </br>
                                            </form>  
                                        </div>                                      
                                    </div>            
                                </div> <!--end col-lg-12-->   
                            </div>
                            <!-- END DATE PICKER -->  

                            <div class="table-responsive">
                                <table class="table table-striped">
<?php 
                                if(isset($_POST['GenerarPDFButton'])){ //check if form was submitted
                                    $field1 = $_POST['field1name']; //get input text 
                                    $field2 = $_POST['field2name']; //get input text 
                                    $count = 0;
                                    // --- MySql and Database Access ---
                                    $con = mysqli_connect("localhost","bone","bone","TempDB");
                                    $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '$field1 00:00:00' AND '$field2 23:59:59'";
                                   
                                    // $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '2015-10-23 00:00:00' AND '2015-10-23 23:59:59'";
                                    $result = mysqli_query($con,$query);
                                    //$num=mysql_numrows($result);
                                    mysqli_close($con); 
                                    //  --- PDF document creation ---
                                    require('fpdf.php');
                                    $pdf = new FPDF();
                                    $pdf->AddPage();
                                    $pdf->Image('assets/img/QM_logo_oficial_wiki.png',10,6,30);
                                    $pdf->Image('assets/img/Ecofrut_logo_oficial_web.png',70,15,30);
                                    $pdf->Ln(20);
                                    $pdf->SetFont('Arial','B',14);
                                    $pdf->Cell(50,10,'FECHA',1); 
                                    $pdf->Cell(38,10,'PPM Ecofrut',1); 
                                    $pdf->Cell(50,10,'FECHA',1); 
                                    $pdf->Cell(38,10,'PPM Ecofrut',1); 
                                    $pdf->Ln();
                                    // While loop begin
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $time = $row['MeasureTime'];
                                        $conductivity = $row['Conductivity'];
                                        if(0) {
                                        echo "<tr> 
                                                <td>
                                                    <font face=\"Arial, Helvetica, sans-serif\">";
                                            echo "$time"; 
                                            echo "</font> 
                                                </td>
                                                <td>
                                                    <font face=\"Arial, Helvetica, sans-serif\">";
                                            echo "$conductivity"; 
                                            echo "</font>
                                                </td>
                                                </tr>";
                                        }
                                        else { 
                                               $pdf->Cell(50,10, $time ,1);
                                               $pdf->Cell(38,10, $conductivity ,1);
                                               $temp = $count%2;
                                               if ($temp != 0) {
                                                   $pdf->Ln();
                                               }
                                               $count++;  
                                        }                       
                                    }

                                    ob_end_clean();
                                    date_default_timezone_set('America/Costa_Rica');
                                    $date = date('m/d/Y h:i:s a', time());                                    
                                    $pdf->Ln(20);
                                    $pdf->Cell(60,10, 'Archivo Autogenerado:',1); 
                                    $pdf->Cell(65,10, $date,1); 
                                    $pdf->Ln();
                                    $pdf->Cell(125,10, 'Quimicas Mundiales S.A  -  2016',1);                                  
                                    $pdf->Output('PPM_mediciones_Ecofrut.pdf', F);
                                    ob_end_clean();
                                    echo "</br>";
                                    echo "<a href=PPM_mediciones_Ecofrut.pdf>Bajar Archivo PDF</a>";
                                } elseif(isset($_POST['GenerarCSVButton'])){ //check if form was submitted
                                    $field1 = $_POST['field1name']; //get input text 
                                    $field2 = $_POST['field2name']; //get input text 
                                    $count = 0;
                                    // --- MySql and Database Access ---
                                    $con = mysqli_connect("localhost","bone","bone","TempDB");
                                    //$query1 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='TempDB' AND TABLE_NAME='ConducMeasure'";
                                    $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '$field1 00:00:00' AND '$field2 23:59:59'";
                                    
                                    // $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '2015-10-23 00:00:00' AND '2015-10-23 23:59:59'";
                                    //$result1 = mysqli_query($con,$query1);
                                    $result = mysqli_query($con,$query);

                                    //$num=mysql_numrows($result);
                                    mysqli_close($con); 
                                    //  --- PDF document creation ---                                
                                    $file = fopen("PPM_mediciones_Ecofrut.csv","w");
                                    
                                   // $pdf->Image('assets/img/QM_logo_oficial_wiki.png',10,6,30);
                                   // $pdf->Image('assets/img/Ecofrut_logo_oficial_web.png',70,15,30);
                                                                
                                    // While loop begin
                                    // while($row = mysqli_fetch_array($result1))
                                    // {
                                    //     $header[] = $row[0];                                   
                                    // }
                                    //header('Content-type: application/csv');
                                    //header('Content-Disposition: attachment; filename='.$filename);
                                    //fputcsv($file, $header);

                                    // While loop begin
                                    //$num_column = count($header);
                                    $list = array
                                        ("FECHA", "PPM Ecofrut");
                                    fputcsv($file, $list);

                                    while($row = mysqli_fetch_array($result))
                                    {
                                        //fputcsv($file, $row);
                                        $time = $row['MeasureTime'];
                                        $conductivity = $row['Conductivity'];
                                        $list = array
                                        ($time, $conductivity);
                                        fputcsv($file, $list);
                                    }

                                    $list = array
                                        (" ", " ");
                                    fputcsv($file, $list);
                                    date_default_timezone_set('America/Costa_Rica');
                                    $date = date('m/d/Y h:i:s a', time());      
                                    $list = array
                                        ("Archivo Autogenerado:", $date);
                                    fputcsv($file, $list);
                                    $list = array
                                        ("Quimicas Mundiales S.A", "2016");
                                        fputcsv($file, $list);
                                    fclose($file);
                                    ob_end_clean();
                                    echo "</br>";
                                    echo "<a href=PPM_mediciones_Ecofrut.csv>Bajar Archivo Excel</a>";
                                   
                                } //end elseif
?>
                                </table>
                            </div> 

                        </div>
                        <div class="panel-footer">Reporte en Formato PDF/CSV</div>
                    </div>             
                </div> <!--end col-lg-7 --> 
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">GRAFICO ULTIMAS 5 HORAS DE APLICACION</div>
                        <div class="demo-container">
                            <div id ="chart_div" class="demo-placeholder"></div>
                            <!--<div id ="chart_div" style="width: 900px; height: 500px;"></div> -->
                            <!-- <div id="placeholderRT" class="demo-placeholder"></div> -->
                        </div>                                      
                    </div>            
                </div> <!--end col-lg-12-->                     
            </div> <!-- end row -->

            <!--- seccion pruebas -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">INFORMACION</div>
                        <!-- para pruebas -->
                        </div>                                      
                    </div>            
                </div> <!--end col-lg-12-->                     
            </div> <!--end row --> 

        </div>  <!--END inner -->
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

<!-- new insertions !-->
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
<script src="assets/js/formsInit.js"></script>
<script>
    $(function () { formInit(); });
</script>
<!-- Previous-->    
<script src="assets/plugins/flot/jquery.flot.js"></script>
<script src="assets/plugins/flot/jquery.flot.resize.js"></script>
<script src="assets/plugins/flot/jquery.flot.time.js"></script>
<script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
<script src="assets/js/for_index.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

</body>

<!-- END BODY -->
</html>