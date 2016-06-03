
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Configure un reporte</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Reporte
                </div>
                <div class="panel-body">
                    <div class="row">
                     <div class="col-lg-6">

                         <div class="row">
                            <div class="col-lg-6">
                                <form>
                                    <div class="form-group">
                                        <label>tipo de reporte</label>
                                        <select onChange="selection_form(this.selectedIndex);" class="form-control" name="gender">
                                            <option>Seleccionar trimestre</option>
                                            <option value="1">aprobados_desaprobados</option>
                                            <option value="2">progrecion</option>
                                        </select>

                                    </div> 
                                </form>
                            </div>
                            <div class="col-lg-6" >
                                <form id='form'>
                                     
                                </form>
                            </div>
                        </div>
                        <div class="row" id="cake">
                           
                         
                        </div>


                        <!-- /.panel -->
                    </div> 

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
