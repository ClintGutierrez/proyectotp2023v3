<!-- Begin Page Content -->
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">
        <?php echo $titulo; ?>
    </h1>
    <?php if(isset($validation)){ ?>
    <div class="alert alert-danger">
    <?php echo $validation->listErrors(); ?>
    </div>
    <?php } ?>

    <form action="<?php echo base_url(); ?>/unidades/insertar" method="POST" autocomplete="off">

    <?php csrf_field(); ?>    

        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label >Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre');?>"  autofocus >
                </div>
                <div class="col-12 col-sm-6">
                    <label >Nombre corto</label>
                    <input type="text" class="form-control" id="nombre_corto" name="nombre_corto" value="<?php echo set_value('nombre_corto');?>">
                </div>

            </div>
        </div>

        <a href="<?php echo base_url(); ?>/unidades" class="btn btn-primary">Volver</a>
        <button type="submit" class="btn btn-success">Guardar</button>


    </form>

</div>