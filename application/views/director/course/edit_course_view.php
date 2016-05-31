<?php 
$level=substr($data['CodGrado'], 1,2);
$grado=substr($data['CodGrado'], 0,1);
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">modificar Curso</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ingrese informacion basica del estudiante
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="CodCourse"  value="<?php echo $data['CodCurso'] ?>" class="form-control" required>
                                    <input type="hidden" name="edit"  value="edit" class="form-control" required>
                                    <label>Nombre</label>
                                    <input name="descripCurso"  value="<?php echo $data['DescripCurso'] ?>" class="form-control" required>

                                </div>
                                <div class="form-group">
                                    <label>nivel</label>
                                    <select name="nivel" class="form-control">
                                        <option value="P" <?php if ($level=='S'): ?>
                                            selected
                                        <?php endif ?>>primaria</option>
                                        <option value="S"  <?php if ($level=='S'): ?>
                                            selected
                                        <?php endif ?> >secundaria</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Grado</label>
                                    <select name="grade" class="form-control">
                                        <option value="1" <?php if ($grado=='1'): ?>selected<?php endif ?>>1</option>
                                        <option value="2" <?php if ($grado=='2'): ?>selected<?php endif ?>>2</option>
                                        <option value="3" <?php if ($grado=='3'): ?>selected<?php endif ?>>3</option>
                                        <option value="4" <?php if ($grado=='4'): ?>selected<?php endif ?>>4</option>
                                        <option value="5" <?php if ($grado=='5'): ?>selected<?php endif ?>>5</option>
                                        <option value="6" <?php if ($grado=='6'): ?>selected<?php endif ?>>6</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Agregar</button>

                            </form>
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
