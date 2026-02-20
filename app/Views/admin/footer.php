<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> &copy; Secretaría de Medio Ambiente, Desarrollo Sustentable y Ordenamiento Territorial</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/js/scriptsAdm.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready( function () {
                $('#example').DataTable({
                    processing: true,
                    serverSide: true,
                    //dom: 'Blfrtip',
                    /*buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],*/
                    ajax: '<?php echo base_url(); ?>/admin/getVehiculos',
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoPostFix": "",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "searchPlaceholder": "Término de búsqueda",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "aria": {
                            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        //only works for built-in buttons, not for custom buttons
                        "buttons": {
                            "create": "Nuevo",
                            "edit": "Cambiar",
                            "remove": "Borrar",
                            "copy": "Copiar",
                            "csv": "fichero CSV",
                            "excel": "tabla Excel",
                            "pdf": "documento PDF",
                            "print": "Imprimir",
                            "colvis": "Visibilidad columnas",
                            "collection": "Colección",
                            "upload": "Seleccione fichero...."
                        },
                        "select": {
                            "rows": {
                                _: '%d filas seleccionadas',
                                0: 'clic fila para seleccionar',
                                1: 'una fila seleccionada'
                            }
                        }
                    }
                });
            } );
        </script>
        <script>
            $(document).ready( function () {
                $('#example1').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo base_url(); ?>/admin/getPases',
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoPostFix": "",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "searchPlaceholder": "Término de búsqueda",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "aria": {
                            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        //only works for built-in buttons, not for custom buttons
                        "buttons": {
                            "create": "Nuevo",
                            "edit": "Cambiar",
                            "remove": "Borrar",
                            "copy": "Copiar",
                            "csv": "fichero CSV",
                            "excel": "tabla Excel",
                            "pdf": "documento PDF",
                            "print": "Imprimir",
                            "colvis": "Visibilidad columnas",
                            "collection": "Colección",
                            "upload": "Seleccione fichero...."
                        },
                        "select": {
                            "rows": {
                                _: '%d filas seleccionadas',
                                0: 'clic fila para seleccionar',
                                1: 'una fila seleccionada'
                            }
                        }
                    }
                });
            } );
        </script>
        <script>
            $(document).ready( function () {
                $('#example2').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: 'Blfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    ajax: '<?php echo base_url(); ?>/admin/getLogs',
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoPostFix": "",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "searchPlaceholder": "Término de búsqueda",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "aria": {
                            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        //only works for built-in buttons, not for custom buttons
                        "buttons": {
                            "create": "Nuevo",
                            "edit": "Cambiar",
                            "remove": "Borrar",
                            "copy": "Copiar",
                            "csv": "fichero CSV",
                            "excel": "tabla Excel",
                            "pdf": "documento PDF",
                            "print": "Imprimir",
                            "colvis": "Visibilidad columnas",
                            "collection": "Colección",
                            "upload": "Seleccione fichero...."
                        },
                        "select": {
                            "rows": {
                                _: '%d filas seleccionadas',
                                0: 'clic fila para seleccionar',
                                1: 'una fila seleccionada'
                            }
                        }
                    }
                });
            } );
        </script>
        <script>
            $(document).ready( function () {
                $('#datatablesSimple').DataTable({
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoPostFix": "",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "loadingRecords": "Cargando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "searchPlaceholder": "Término de búsqueda",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "aria": {
                        "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    //only works for built-in buttons, not for custom buttons
                    "buttons": {
                        "create": "Nuevo",
                        "edit": "Cambiar",
                        "remove": "Borrar",
                        "copy": "Copiar",
                        "csv": "fichero CSV",
                        "excel": "tabla Excel",
                        "pdf": "documento PDF",
                        "print": "Imprimir",
                        "colvis": "Visibilidad columnas",
                        "collection": "Colección",
                        "upload": "Seleccione fichero...."
                    },
                    "select": {
                        "rows": {
                            _: '%d filas seleccionadas',
                            0: 'clic fila para seleccionar',
                            1: 'una fila seleccionada'
                        }
                    }
                },      
                order: [[0, 'asc']],
                });
            } );
        </script>
        <script>
            $(document).ready(function(){
                $('input[type="checkbox"]').click(function(){
                    var inputValue = $(this).attr("value");
                    $("." + inputValue).toggle();
                });
            });
        </script>
        <script>
            $("#form-regis").submit(function(event) {
                event.preventDefault();
                const dateIni = document.getElementById('fecha_alta_min').value;
                const dateFin = document.getElementById('fecha_alta_max').value;
                const check = document.getElementById('fecha_altaban').checked;
                if(check==true){
                    if(dateIni>dateFin){
                        alert("Rango de fechas no válido");
                        return;
                    }
                }                
                this.submit();                
            });
        </script>
        <script>
            if(checkbox = document.getElementById('t_paseban')){
                const checkbox = document.getElementById('t_paseban');
                checkbox.addEventListener('change', (event) => {
                    if (event.currentTarget.checked) {
                        document.getElementById("t_paseban").required = true;
                        $("#fecha_altaban").removeAttr("required");
                        document.getElementById("t_pase").required = true;
                    } else {
                        $("#t_paseban").removeAttr("required");
                        document.getElementById("fecha_altaban").required = true;
                        $("#t_pase").removeAttr("required");
                    }
                })
            }
            if(checkbox = document.getElementById('fecha_altaban')){
                const checkbox = document.getElementById('fecha_altaban')
                checkbox.addEventListener('change', (event) => {
                    if (event.currentTarget.checked) {
                        document.getElementById("fecha_altaban").required = true;
                        $("#t_paseban").removeAttr("required");
                        document.getElementById("fecha_alta_min").required = true;
                        document.getElementById("fecha_alta_max").required = true;

                    } else {
                        document.getElementById("t_paseban").required = true;
                        $("#fecha_altaban").removeAttr("required");
                        $("#fecha_alta_min").removeAttr("required");
                        $("#fecha_alta_max").removeAttr("required");
                    }
                })
            }
        </script>
        <script>
            if(checkbox = document.getElementById('estado_emisorban')){
                const checkbox = document.getElementById('estado_emisorban');
                checkbox.addEventListener('change', (event) => {
                    if (event.currentTarget.checked) {
                        document.getElementById("estado_emisorban").required = true;
                        $("#fecha_prodban").removeAttr("required");
                        document.getElementById("estado_emisor").required = true;
                    } else {
                        $("#estado_emisorban").removeAttr("required");
                        document.getElementById("fecha_prodban").required = true;
                        $("#estado_emisor").removeAttr("required");
                    }
                })
            }
            if(checkbox = document.getElementById('fecha_prodban')){
                const checkbox = document.getElementById('fecha_prodban')
                checkbox.addEventListener('change', (event) => {
                    if (event.currentTarget.checked) {
                        document.getElementById("fecha_prodban").required = true;
                        $("#estado_emisorban").removeAttr("required");
                        document.getElementById("fecha_prod").required = true;
                        
                    } else {
                        document.getElementById("estado_emisorban").required = true;
                        $("#fecha_prodban").removeAttr("required");
                        $("#fecha_prod").removeAttr("required");
                    }
                })
            }
        </script>
        <script>
            $(document).ready( function () {
                $('#chatbot').DataTable({
                    processing: true,
                    serverSide: true,
                    /*dom: 'Blfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],*/
                    ajax: '<?php echo base_url(); ?>/admin/getRespuestas',
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoPostFix": "",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "searchPlaceholder": "Término de búsqueda",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "aria": {
                            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        //only works for built-in buttons, not for custom buttons
                        "buttons": {
                            "create": "Nuevo",
                            "edit": "Cambiar",
                            "remove": "Borrar",
                            "copy": "Copiar",
                            "csv": "fichero CSV",
                            "excel": "tabla Excel",
                            "pdf": "documento PDF",
                            "print": "Imprimir",
                            "colvis": "Visibilidad columnas",
                            "collection": "Colección",
                            "upload": "Seleccione fichero...."
                        },
                        "select": {
                            "rows": {
                                _: '%d filas seleccionadas',
                                0: 'clic fila para seleccionar',
                                1: 'una fila seleccionada'
                            }
                        }
                    }
                });
            } );
        </script>
        <script>
            $(document).ready(function(){
                $('#keyword-list .kw-item').find('.rem-item').click(function(){
                    if($('#keyword-list .kw-item').length > 1){
                        $(this).closest('.kw-item').remove()
                    }else{
                        $(this).closest('.kw-item').find('[name="keyword[]"]').val('').focus()
                    }
                })
                $('#suggestion-list .sg-item').find('.rem-item').click(function(){
                    if($('#suggestion-list .sg-item').length > 1){
                        $(this).closest('.sg-item').remove()
                    }else{
                        $(this).closest('.sg-item').find('[name="suggestion[]"]').val('').focus()
                    }
                })
                $('#add_kw_item').click(function(){
                    var item = $('#keyword-list .kw-item:nth-child(1)').clone()
                    item.find('[name="keyword[]"]').val('').removeClass('border-danger')
                    $('#keyword-list').append(item)
                    item.find('[name="keyword[]"]').focus()
                    item.find('.rem-item').click(function(){
                        if($('#keyword-list .kw-item').length > 1){
                            item.remove()
                        }else{
                            item.find('[name="keyword[]"]').val('').focus()
                        }
                    })
                })
                $('#add_suggestion_item').click(function(){
                    var item = $('#suggestion-list .sg-item:nth-child(1)').clone()
                    item.find('[name="suggestion[]"]').val('').removeClass('border-danger')
                    $('#suggestion-list').append(item)
                    item.find('[name="suggestion[]"]').focus()
                    item.find('.rem-item').click(function(){
                        if($('#suggestion-list .sg-item').length > 1){
                            item.remove()
                        }else{
                            item.find('[name="suggestion[]"]').val('').focus()
                        }
                    })
                })
                $('#response-form').submit(function(e){
                    e.preventDefault();
                    var _this = $(this)
                        $('.err-msg').remove();
                        $('.border-danger').removeClass('border-danger')
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg")
                            el.hide()
                            console.log(new FormData($(this)[0]))
                    //start_loader();
                    $.ajax({
                        url:'<?php echo base_url(); ?>/admin/salvaRespuesta',
                        data: new FormData($(this)[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: 'POST',
                        type: 'POST',
                        dataType: 'json',
                        error:err=>{
                            console.log(err)
                            alert("An error occured",'error');
                            //end_loader();
                        },
                        success:function(resp){
                            if(typeof resp =='object' && resp.status == 'success'){
                                location.href = './?page=responses/view_response&id='+resp.rid
                            }else if(resp.status == 'failed' && !!resp.msg){
                                if('kw_index' in resp){
                                    $('[name="keyword[]"]').eq(resp.kw_index).addClass('border-danger').focus()
                                    $('[name="keyword[]"]').eq(resp.kw_index)[0].setCustomValidity(resp.msg)
                                    $('[name="keyword[]"]').eq(resp.kw_index)[0].reportValidity()
                                    $('[name="keyword[]"]').eq(resp.kw_index).on('input', function(){
                                        $(this).removeClass('border-danger')
                                        $(this)[0].setCustomValidity("")
                                    })
                                }else{
                                    el.text(resp.msg)
                                    _this.prepend(el)
                                    el.show('slow')
                                    $("html, body,.modal").scrollTop(0);
                                }
                            }else{
                                alert("An error occured",'error');
                            }
                            //end_loader()
                        }
                    })
                })

            })
        </script>
        <script src="<?php echo base_url();?>/plugins/summernote/summernote-bs4.min.js"></script>
    </body>
</html>