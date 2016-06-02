        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Padres</h1>
                </div>
                <!-- /.col-lg-12 -->             
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                          <a href="<?php echo site_url('director/father/add'); ?>" class="btn btn-primary" role="button">Registrar</a>          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>telefono</th>
                                            <th>direccion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($fathers as $father) {
                                            # code...
                                            $data='';
                                            $data=json_encode($father,true);
                                            
                                    ?>
                                   
                                        <tr class="gradeA">
                                            <td><?php
                                                    echo "".$father['nomApoderado'].' ';
                                                    echo $father['apePaternoApoderado'].' ';
                                                    echo $father['apeMaternoApoderado'].' ';
                                            ?></td>
                                            <td>
                                            <?php
                                                    echo $father['TelfApoderado'];
                                            ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $father['DirApoderado'];
                                            ?>
                                            </td>

                                            <td class="center">

                                                <form action="<?php echo site_url('director/father/edit'); ?>" method="post">
                                                <a href="<?php echo '#'; ?>" class="btn btn-primary btn-circle" role="button"><i class="fa fa-list"></i></a>
                                                
                                                <button class="btn btn-warning btn-circle" role="button"><i class="fa fa-edit"></i></button>    
                                                <input type="hidden" name="data" value='<?php echo($data);?>' />    

                                                
                                                <a href="<?php echo site_url('student/relation_father_student'); ?>" class="btn btn-success btn-circle" role="button"><i class="fa fa-arrows-h"></i></a>             
                                                <?php if ($father['EstadoApoderado']=='1' ): ?>
                                                <a  id="<?php echo $father['codApoderado'];?>" onclick="desactivar_apoderado('<?php echo $father['codApoderado'] ;?>',this);" class="btn btn-danger btn-circle" role="button"><i class="fa fa-times"></i></a>     
                                                <?php else: ?>
                                                <a  id="<?php echo $father['codApoderado'];?>" onclick="activar_apoderado('<?php echo $father['codApoderado'] ;?>',this);" class="btn btn-info btn-circle" role="button"><i class="fa fa-check"></i></a>    
                                                <?php endif ?>

                                                
                                                
                                                </form>
                                            </td>
                                        </tr>
                                          <?php  }
                                    ?>
                                   
                                    </tbody>
                                </table>
                            </div>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

