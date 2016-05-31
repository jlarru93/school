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