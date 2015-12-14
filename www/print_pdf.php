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
<!-- <META HTTP-EQUIV="refresh" CONTENT="15"> -->
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


</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 " > 
     <div class="table-responsive">
        <table class="table table-striped">
           <?php 
                if(isset($_POST['SubmitButton'])){ //check if form was submitted
                    $field1 = $_POST['field1name']; //get input text 
                    $field2 = $_POST['field2name']; //get input text 
                    // --- MySql and Database Access ---
                    $con = mysqli_connect("localhost","bone","bone","TempDB");
                    $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '$field1 00:00:00' AND '$field2 23:59:59'";
                    echo "$query";
                    // $query = "SELECT * FROM ConducMeasure WHERE MeasureTime BETWEEN '2015-10-23 00:00:00' AND '2015-10-23 23:59:59'";
                    $result = mysqli_query($con,$query);
                    //$num=mysql_numrows($result);
                    mysqli_close($con); 
                    //  --- PDF document creation ---
                    require('fpdf.php');
                    $pdf = new FPDF();
                    $pdf->AddPage();
                    $pdf->SetFont('Arial','B',14);
                    $pdf->Cell(40,10, 'FECHA | PPM'); 
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
                               $pdf->Cell(40,10, '$time | $conductivity');
                        }                                            
                    }

                    ob_end_clean();
                    $pdf->Output('PPM_test.pdf', F);
                    //ob_end_clean();
                    $file = 'PPM_test.pdf';
                    $filename = 'filename.pdf';
                    header('Content-type: application/pdf');
                    header('Content-Disposition: inline; filename="' . $filename . '"');
                    header('Content-Transfer-Encoding: binary');
                    header('Accept-Ranges: bytes');
                    @readfile($file);  
                }
            ?>
        </table>
    </div>


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
