    <!-- jQuery -->
    <script src="<?php echo base_url() ;?>/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ;?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ;?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ;?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ;?>/dist/js/sb-admin-2.js"></script>


    <!-- Bootstrap Datepicker -->
    <script src="<?php echo base_url() ;?>/js/bootstrap-datepicker.js"></script>

    <!-- JQuery -->
    <script src="<?php echo base_url() ;?>/js/bootstrap-datepicker.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
    <!-- datepicker -->
    <script>
        $(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            
        });
    </script>



    <!-- tablas busquedas -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({

              "language": {
                "lengthMenu": "mostrar _MENU_ alumnos por pagina",
                "zeroRecords": "Disculpe - no se encontro ningun resultado",
                "info": "pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "sSearch": "buscar",
                "oPaginate": {
                    "sNext": "siguiente",
                    "sPrevious": "anterior"
                }
            }
        }


        );
            $('#dataTables-courses').DataTable({

              "language": {
                "lengthMenu": "mostrar _MENU_ cursos por pagina",
                "zeroRecords": "Disculpe - no se encontro ningun resultado",
                "info": "pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "sSearch": "buscar",
                "oPaginate": {
                    "sNext": "siguiente",
                    "sPrevious": "anterior"
                }
            }
        }


        );




            //ocultar secundaria
            //document.getElementById('secundaria').style.display = 'none';



        });
</script>


<script>
    function desactivar_curso(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/Course/disabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codCurso="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Desactivado') {
                $(boton).removeClass('btn btn-danger btn-circle');
                $(boton).addClass('btn btn-info btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
               // console.log(id);
                $(boton).attr("onclick","activar_curso('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-check'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>
<script>
    function activar_curso(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/Course/enabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codCurso="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Activado') {
                $(boton).removeClass('btn btn-info btn-circle');
                $(boton).addClass('btn btn-danger btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
                //console.log(id);
                $(boton).attr("onclick","desactivar_curso('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-times'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>

<script>
    function desactivar_apoderado(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/Father/disabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codApoderado="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Desactivado') {
                $(boton).removeClass('btn btn-danger btn-circle');
                $(boton).addClass('btn btn-info btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
               // console.log(id);
                $(boton).attr("onclick","activar_apoderado('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-check'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>
<script>
    function activar_apoderado(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/Father/enabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codApoderado="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Activado') {
                $(boton).removeClass('btn btn-info btn-circle');
                $(boton).addClass('btn btn-danger btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
                //console.log(id);
                $(boton).attr("onclick","desactivar_apoderado('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-times'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>


<script>
    function desactivar_profesor(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/teacher/disabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codProfesor="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Desactivado') {
                $(boton).removeClass('btn btn-danger btn-circle');
                $(boton).addClass('btn btn-info btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
               // console.log(id);
                $(boton).attr("onclick","activar_profesor('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-check'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>
<script>
    function activar_profesor(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/teacher/enabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codProfesor="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Activado') {
                $(boton).removeClass('btn btn-info btn-circle');
                $(boton).addClass('btn btn-danger btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
                //console.log(id);
                $(boton).attr("onclick","desactivar_profesor('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-times'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>
<script>
    function desactivar_alumno(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/Student/disabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codEstudiante="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Desactivado') {
                $(boton).removeClass('btn btn-danger btn-circle');
                $(boton).addClass('btn btn-info btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
               // console.log(id);
                $(boton).attr("onclick","activar_alumno('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-check'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>
<script>
    function activar_alumno(id,boton){
      // console.log(id);
        var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/Director/Student/enabled');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"codEstudiante="+id
            });

        request.done(function(response,TextStatus,jqXHR){
            console.log(response);
            var results=response;
            //console.log(boton);
            if (results=='Activado') {
                $(boton).removeClass('btn btn-info btn-circle');
                $(boton).addClass('btn btn-danger btn-circle');
                $(boton).removeAttr("onclick");
                var id=$(boton).attr("id");
                //console.log(id);
                $(boton).attr("onclick","desactivar_alumno('"+id+"',this);");
                boton.innerHTML = '';
                $(boton).append( "<i class='fa fa-times'></i>" );
            }
            
          

            
        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();
    }

</script>

<script>

    $( "#btnprimaria" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria').draw();
    }); 
    $( "#btnprimaria1" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria 1°').draw();
    }); 
    $( "#btnprimaria2" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria 2°').draw();
    }); 
    $( "#btnprimaria3" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria 3°').draw();
    }); 
    $( "#btnprimaria4" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria 4°').draw();
    }); 
    $( "#btnprimaria5" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria 5°').draw();
    }); 
    $( "#btnprimaria6" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('primaria 6°').draw();
    }); 

</script>

<script>

    $( "#btnsecundaria" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('secundaria').draw();
    }); 
    $( "#btnsecundaria1" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('secundaria 1°').draw();
    }); 
    $( "#btnsecundaria2" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('secundaria 2°').draw();
    }); 
    $( "#btnsecundaria3" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('secundaria 3°').draw();
    }); 
    $( "#btnsecundaria4" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('secundaria 4°').draw();
    }); 
    $( "#btnsecundaria5" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('secundaria 5°').draw();
    }); 


</script>

<script >
    $( "#btnallcourses" ).click(function() {
        var tabla=$('#dataTables-courses').DataTable();
        tabla.search('').draw();
    }); 
</script>

<!-- ocultar div -->

<script>
    function getLevel(sel) {
        var value = sel.value;  
        if (value=='S') {
                //ocultar primaria
                document.getElementById('primaria').style.display = 'none';
                //mostrar secundaria
                document.getElementById('secundaria').style.display = 'block';
            }else{
                //ocultar secundaria
                document.getElementById('secundaria').style.display = 'none';
                //mostrar primaria
                document.getElementById('primaria').style.display = 'block';

            }
        }

    </script>
    <!-- Preview -->
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    </script>

    <!-- validar type image img -->

    <script>
        var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
        function Validate(oForm) {
            var arrInputs = oForm.getElementsByTagName("input");
            for (var i = 0; i < arrInputs.length; i++) {
                var oInput = arrInputs[i];
                if (oInput.type == "file") {
                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }

                        if (!blnValid) {
                            alert("Disculpe, " + sFileName + " este archivo es invalido, solo aceptamos estas extenciones: " + _validFileExtensions.join(", "));
                            return false;
                        }
                    }
                }
            }

            return true;
        }

    </script>
    <script >

        function filtro(mensaje){
           $('#dataTables-example').DataTable().search(mensaje).draw();fin
       }
   </script>>


