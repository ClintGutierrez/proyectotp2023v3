<!-- Begin Page Content -->
<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800"><?php echo $titulo;?></h1>
    <?php \Config\Services::validation()->listErrors(); ?>
    
    <form action="<?php echo base_url();?>/productos/insertar" method="POST" autocomplete="off">
        
    <?php csrf_field(); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
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
                            <option value="<?php echo $unidad['id'] ?>"><?php echo $unidad['nombre'] ?></option>

                            <?php }?>
                    </select>
                </div>

                <div class="col-12 col-sm-6">
                    <label for="">Categoría</label>
                    <select class="form-control" name="id_categoria" id="id_categoria" required>
                        <option value="">Seleccionar categoría</option>
                        <?php foreach($categorias as $categoria) {?>
                            <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></option>

                            <?php }?>
                    </select>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Precio Venta</label>
                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Precio Compra</label>
                    <input type="text" class="form-control" id="precio_compra" name="precio_compra" required>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Stock minimo</label>
                    <input type="text" class="form-control" id="stock_minimo" name="stock_minimo" autofocus required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Es Inventariable</label>
                    <select name="inventariable" id="inventariable" class="form-control">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>

            </div>
        </div>


            <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</button>

        
    </form>

</div>


