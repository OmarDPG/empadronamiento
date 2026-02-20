<?php
$session = session();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<style>
    #responsive-canvas {
        width: 100%;
    }
</style>
<style>
    .order-card {
        color: #fff;
    }

    .bg-c-red {
        background: rgb(105, 28, 50);
    }

    .bg-c-green {
        background: #43695b;
    }

    .bg-c-blue {
        background: #225f78;
    }

    .bg-c-beige {
        background: rgb(194, 186, 152);
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row pt-3">
                <div class="col-md-6 col-xl-4 col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card bg-c-red order-card">
                        <div class="card-block d-flex">
                            <h5 class="col-md-6">Certificados emitidos en los últimos 7 días:</h5>
                            <div class="d-flex col-md-6" style="align-items: center;">
                                <h1 class="col-md-12 text-right float-end" style="text-align-last: right;"><span><i class="fa-solid fa-certificate float-end px-3"></i></span></h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p class="text-white"><?php echo $cuenta; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card bg-c-green order-card">
                        <div class="card-block d-flex">
                            <h5 class="col-md-6">Certificados emitidos en el semestre actual:</h5>
                            <div class="d-flex col-md-6" style="align-items: center;">
                                <h1 class="col-md-12 text-right float-end" style="text-align-last: right;"><span><i class="fa-solid fa-certificate float-end px-3"></i></span></h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p class="text-white"><?php echo $cuentaS; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-4 mb-3 d-flex align-items-stretch" style="display: none !important;">
                    <div class="card bg-c-green order-card">
                        <div class="card-block d-flex">
                            <h5 class="col-md-6">Certificados emitidos en el año en curso:</h5>
                            <div class="d-flex col-md-6" style="align-items: center;">
                                <h1 class="col-md-12 text-right float-end" style="text-align-last: right;"><span><i class="fa-solid fa-certificate float-end px-3"></i></span></h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p class="text-white"><?php echo $cuentaA; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card bg-c-beige order-card">
                        <div class="card-block d-flex">
                            <h5 class="col-md-6">Certificados emitidos en el año en curso:</h5>
                            <div class="d-flex col-md-6" style="align-items: center;">
                                <h1 class="col-md-12 text-right float-end" style="text-align-last: right;"><span><i class="fa-solid fa-certificate float-end px-3"></i></span></h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <p class="text-white"><?php echo $cuentaA; ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- EL FORMULARIO QUE ROMPE -->


            <div class="row">
                <h4 class="mt-3" style="display: none;">Registros</h4>
                <form action="">
                    <div class="row mt-1 justify-content-md-center" style="display: none;">
                        <div class="col">
                            <label for="nombre_entidad">Entidad</label>
                            <select class="form-select" name="nombre_entidad" id="nombre_entidad">
                                <option value="Todos">Todos</option>
                                <?php foreach ($resultados as $dato) { ?>
                                    <option value="<?php echo $dato->nombre_entidad; ?>"><?php echo $dato->nombre_entidad; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col">
                            <label for="edad">Edad</label>
                            <select class="form-select" name="edad" id="edad">
                                <option value="Todos">Todos</option>
                                <?php foreach ($resultados as $dato) { ?>
                                    <option value="<?php echo $dato->edad; ?>"><?php echo $dato->edad; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mt-1 justify-content-md-center" style="display: none;">
                        <div class="col">
                            <label for="vacunado">Vacunado</label>
                            <select class="form-select" name="vacunado" id="vacunado">
                                <option value="Todos">Todos</option>
                                <?php foreach ($resultados as $dato) { ?>
                                    <option value="<?php echo $dato->vacunado; ?>"><?php echo $dato->vacunado; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col">
                            <label for="esterilizado">Esterilizado</label>
                            <select class="form-select" name="esterilizado" id="esterilizado">
                                <option value="Todos">Todos</option>
                                <?php foreach ($resultados as $dato) { ?>
                                    <option value="<?php echo $dato->esterilizado; ?>"><?php echo $dato->esterilizado; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col">
                            <label for="especie">Especie</label>
                            <select class="form-select" name="especie" id="t_pase">
                                <option value="Todos">Todos</option>
                                <?php foreach ($resultados as $dato) { ?>
                                    <option value="<?php echo $dato->especie; ?>"><?php echo $dato->especie; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3" style="display: none;">
                        <div class="col-md-12">
                            <a class="btn btn-primary" onclick='genFile(nombre_entidad.value, especie.value, sexo.value, vacunado.value, esterilizado.value)'><i class="fas fa-file-excel"></i> Descargar Registro</a>
                        </div>
                    </div>
                </form>
            </div>


            <div class="d-flex justify-content-center">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </main>
    <script>
        let canvas = document.getElementById('myPieChart');
        let heightRatio = 0.3;
        canvas.height = canvas.width * heightRatio;
    </script>
    <!-- <script>
        function chartdd(estado, fecha_prod, t_pase, fecha_alta_min, fecha_alta_max) {
            $.ajax({
                url: "<?//php echo base_url(); ?>/admin/getAll/" + estado + "/" + fecha_prod + "/" + t_pase + "/" + fecha_alta_min + "/" + fecha_alta_max,
                method: "POST",
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    let etiquetas = [];
                    let datos = [];
                    let colors = [];
                    for (let i in data.etiquetas) {
                        etiquetas.push(data.etiquetas[i]);
                        datos.push(data.datos[i]);
                        colors.push(data.colors[i]);
                    }
                    let meta = myPieChart && myPieChart.data && myPieChart.data.datasets[0]._meta;
                    for (let i in meta) {
                        if (meta[i].controller) meta[i].controller.chart.destroy();
                    }
                    let ctx = document.getElementById("myPieChart");
                    myPieChart = new Chart(ctx, {
                        type: 'pie',
                        options: {
                            title: {
                                display: true,
                                text: 'Total: ' + data.count
                            }
                        },
                        data: {
                            labels: etiquetas,
                            datasets: [{
                                data: datos,
                                backgroundColor: colors,
                            }],
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function genFile(nombre_entidad, sexo, especie, esterilizado, vacunado) {
            $.ajax({
                url: "<?php echo base_url(); ?>/admin/getAllFilt/" + estado + "/" + fecha_prod + "/" + t_pase + "/" + fecha_alta_min + "/" + fecha_alta_max,
                method: "POST",
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    let etiquetas = [];
                    let datos = [];
                    JSONToCSVConvertor(data, "PaseTuristicoDB", true);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
            //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
            var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

            var CSV = '';
            //Set Report title in first row or line

            // CSV += ReportTitle + '\r\n\n';

            //This condition will generate the Label/Header
            if (ShowLabel) {
                var row = "";

                //This loop will extract the label from 1st index of on array
                for (var index in arrData[0]) {

                    //Now convert each value to string and comma-seprated
                    row += index + ',';
                }

                row = row.slice(0, -1);

                //append Label row with line break
                CSV += row + '\r\n';
            }

            //1st loop is to extract each row
            for (var i = 0; i < arrData.length; i++) {
                var row = "";

                //2nd loop will extract each column and convert it in string comma-seprated
                for (var index in arrData[i]) {
                    row += '"' + arrData[i][index] + '",';
                }

                row.slice(0, row.length - 1);

                //add a line break after each row
                CSV += row + '\r\n';
            }

            if (CSV == '') {
                alert("Invalid data");
                return;
            }

            //Generate a file name
            var fileName = "";
            //this will remove the blank-spaces from the title and replace it with an underscore
            fileName += ReportTitle.replace(/ /g, "_");

            //Initialize file format you want csv or xls
            var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

            // Now the little tricky part.
            // you can use either>> window.open(uri);
            // but this will not work in some browsers
            // or you will not get the correct file extension    

            //this trick will generate a temp <a /> tag
            var link = document.createElement("a");
            link.href = uri;

            //set the visibility hidden so it will not effect on your web-layout
            link.style = "visibility:hidden";
            link.download = fileName + ".csv";

            //this part will append the anchor tag and remove it after automatic click
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>