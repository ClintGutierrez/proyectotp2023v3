<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>
    <?php \Config\Services::validation()->listErrors(); ?>
    
    <form action="<?php echo base_url();?>/clientes/actualizar" method="POST" autocomplete="off">
        
    <?php csrf_field(); ?>

        <input type="hidden" id="id" name="id" value="<?php echo $cliente['id'] ?>">

        
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                    value="<?php echo $cliente['nombre'] ?>" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"
                    value="<?php echo $cliente['direccion'] ?>">
                </div>

            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" 
                    value="<?php echo $cliente['telefono'] ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Correo</label>
                    <input type="text" class="form-control" id="correo" name="correo" 
                    value="<?php echo $cliente['correo'] ?>">
                </div>

            </div>
        </div>

            <a href="<?php echo base_url();?>/clientes" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</button>

        
    </form>

</div>

