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
     <!-- Flot Charts JavaScript -->
    <script src="<?php echo base_url() ;?>/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php echo base_url() ;?>/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ;?>/bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ;?>/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url() ;?>/bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ;?>/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>


    <?php if ($Report=='Report'): ?>


  <script>
  function selection_form(form){
    //seleciono aprobados_desaprobados
    if (form==1) {
        var dhtml='<div class="form-group">'+
                '<label>Trimestre</label>'+
                    '<select onChange="crear_pastel(this.selectedIndex);" class="form-control" name="gender">'+
                        '<option>Seleccionar trimestre</option><option value="1">Primero</option><option value="2">Segundo</option><option value="3">tercero</option>'+
                    '</select>'+
                '</div>';
        document.getElementById("form").innerHTML='';
        var masterForm = document.getElementById("form");
        var d = document.createElement("div");
        d.innerHTML=dhtml;
        masterForm.appendChild(d);



    }
    //seleciono progrecion
    else if(form==2){
        var dhtml='<div class="form-group">'+
                '<label>Trimestres</label>'+
                    '<select onChange="crear_pastel_progreso(this.selectedIndex);" class="form-control" name="gender">'+
                        '<option>Seleccionar trimestre</option><option value="1">Primero</option><option value="2">Segundo</option><option value="3">tercero</option>'+
                    '</select>'+
                '</div>';
        document.getElementById("form").innerHTML='';
        var masterForm = document.getElementById("form");
        var d = document.createElement("div");
        d.innerHTML=dhtml;
        masterForm.appendChild(d);
    };

  }
  </script>      
  
  <script>
    function pastel(curso,name){
        var htmlpastel='<div class="panel panel-default">'+
                        '<div class="panel-heading">'+   curso+
                        '</div>'+
                        '<div class="panel-body">'+
                            '<div class="flot-chart">'+
                                '<div class="flot-chart-content" id="'+name+'"></div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
             return  htmlpastel;    
    }
    </script>
<script>
    function crear_pastel(trimestre){
       if (trimestre!=0) {
            var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/master/Report/aprobados_profesor');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"trimestre="+(trimestre)
            });

        request.done(function(response,TextStatus,jqXHR){
            
            var results=response;
            var objet=JSON.parse(results);
            var datospastel=[];
            document.getElementById("cake").innerHTML='';
            $.each(objet,function(index,value){
                console.log(value);

                var data = [{
                    label: "Aprobados",
                    data: parseInt(value['Aprobados'])
                }, {
                    label: "Desaprobados",
                    data: parseInt(value['Desaprobados'])
                }];
                var masterCake = document.getElementById("cake");
                var grado=value['CodGrado'].substring(0,1);
                var nivel=value['CodGrado'].substring(1,2)=='S'?'Secundatia':'Primaria';
                var seccion=value['NomSeccion'];
                var turno=value['Turno'];
                var curso=value['DescripCurso'];                    
                var title= curso+' '+grado+' '+'"'+seccion+'"'+' turno '+turno +' '+ nivel;
                var pastelnuevo=pastel(title,index+'cake');
                var d = document.createElement("div");
                d.innerHTML=pastelnuevo;
                masterCake.appendChild(d);

                pastelero(data,index+'cake');
            });

            
          

        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();       
       };
        
    }

</script>
<script>
    function crear_pastel_progreso(trimestre){
        //console.log(trimestre);
       if (trimestre!=0) {
            var request;
        if (request) {
            request.abort();
        };
        request=$.ajax({
            url:"<?php echo base_url('/master/Report/progresoPorSeccion');?>" ,
            type:"POST",
                //contentType: "application/json; charset=utf-8",
              //  dataType: "json",
            data:"trimestre="+(trimestre)
            });

        request.done(function(response,TextStatus,jqXHR){
            
            var results=response;
            
            var objet=JSON.parse(results);
            console.log(objet);
            var datospastel=[];
            document.getElementById("cake").innerHTML='';
            $.each(objet,function(index,value){
                

                var data = [{
                    label: "Logrado",
                    data: parseInt(value['Logrado'])
                }, {
                    label: "Proceso",
                    data: parseInt(value['Proceso'])
                }, {
                    label: "Deficiente",
                    data: parseInt(value['Deficiente'])
                }];
                var masterCake = document.getElementById("cake");
                var grado=value['CodGrado'].substring(0,1);
                var nivel=value['CodGrado'].substring(1,2)=='S'?'Secundatia':'Primaria';
                var seccion=value['NomSeccion'];
                var turno=value['Turno'];
                var curso=value['DescripCurso'];                    
                var title= curso+' '+grado+' '+'"'+seccion+'"'+' turno '+turno +' '+ nivel;
                var pastelnuevo=pastel(title,index+'cake');
                var d = document.createElement("div");
                d.innerHTML=pastelnuevo;
                masterCake.appendChild(d);

                pastelero(data,index+'cake');
            });

            
          

        });
        request.fail(function(jqXHR,TextStatus,thrown){
            console.log('Error hh '+TextStatus);
        });

        request.always(function(){
            console.log('termino');
        });

        //e.preventDefault();       
       };
        
    }

</script>

    <script>
    function pastelero(data,name) {
   /* var data = [{
        label: "Aprobados",
        data: 3.5
    }, {
        label: "Desaprobados",
        data: 1.5
    }];*/
    var plotObj = $.plot($("#"+name), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

}
</script>
<?php endif ?>
    <script>
        $(document).ready(function() {
            $('#dataTables-alumno-apoderado').DataTable({
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
            });



        });
    </script>
    <script>
        $(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            
        }); 
    </script>

      <script>
        function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    }      
}
    </script>

    <script>
        $('#icol').click(function(){

            if($('#col').val()){
                $('#notas tr').append($("<td>"));
                $('#notas thead tr>td:last').html($('#col').val());
                $('#notas tbody tr').each(
                    function()
                    {

                      var jhon=$(this).children('td:first').attr('id');

                      $(this).children('td:last').append(
                        $('<input class="form-control" value="0" name="'.concat(jhon,'" required>')))
                  }
                  );
                $('#criterios').val($('#col').val());
                var parrafo = document.getElementById("icol");
                parrafo.parentNode.removeChild(parrafo);
                var parrafo = document.getElementById("col");
                parrafo.parentNode.removeChild(parrafo);


            }else{alert('INGRESE NOMBRE DE NOTA');}
        });
    </script>

<script type="text/javascript">
     function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }
</script>