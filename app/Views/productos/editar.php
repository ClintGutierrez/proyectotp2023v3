<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>
    <?php \Config\Services::validation()->listErrors(); ?>
    
    <form action="<?php echo base_url();?>/productos/actualizar" method="POST" autocomplete="off">
        
    <?php csrf_field(); ?>

        <input type="hidden" id="id" name="id" value="<?php echo $producto['id'] ?>">
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Código</label>
                    <input type="text" value="<?php echo $producto['codigo'] ?>" class="form-control" id="codigo" name="codigo" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" value="<?php echo $producto['nombre'] ?>" class="form-control" id="nombre" name="nombre" required>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Unidad</label>
                    <select class="form-control" name="id_unidad" id="id_unidad" required>
                        <option value="">Seleccionar Unidad</option>
                        <?php foreach($unidades as $unidad) {?>
                            <option value="<?php echo $unidad['id'] ?>" <?php if($unidad['id']==
                            $producto['id_unidad']){echo 'selected';}?>>
                            <?php echo $unidad['nombre'] ?></option>

                            <?php }?>
                    </select>
                </div>

                <div class="col-12 col-sm-6">
                    <label for="">Categoría</label>
                    <select class="form-control" name="id_categoria" id="id_categoria" required>
                        <option value="">Seleccionar categoría</option>
                        <?php foreach($categorias as $categoria) {?>
                            <option value="<?php echo $categoria['id'] ?>" <?php if($categoria['id']==
                            $producto['id_categoria']){echo 'selected';}?>><?php echo $categoria['nombre'] ?></option>

                            <?php }?>
                    </select>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Precio Venta</label>
                    <input type="text" value="<?php echo $producto['precio_venta'] ?>" class="form-control" id="precio_venta" name="precio_venta" required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Precio Compra</label>
                    <input type="text" value="<?php echo $producto['precio_compra'] ?>" class="form-control" id="precio_compra" name="precio_compra" required>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Stock minimo</label>
                    <input type="text" value="<?php echo $producto['stock_minimo'] ?>" class="form-control" id="stock_minimo" name="stock_minimo" required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Es Inventariable</label>
                    <select name="inventariable" id="inventariable" class="form-control">
                        <option value="1" <?php if($producto['inventariable']==1){echo 'selected';}?>>Si</option>
                        <option value="0"<?php if($producto['inventariable']==0){echo 'selected';}?>>No</option>
                    </select>
                </div>

            </div>
        </div>


            <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</button>

        
    </form>

</div>

