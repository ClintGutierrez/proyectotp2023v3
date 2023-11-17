<div class="container-fluid">

    <br>
    <div class="row">
        <div class="col-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <?php echo $total;?> Total de productos
                </div>
                <a href="<?php echo base_url(); ?>/
                productos" class="card-footer text-white bg-success bg-opacity-75"> Ver detalles</a>
            </div>
        </div>

        <div class="col-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <?php echo $total;?> Ventas del día
                </div>
                <a href="<?php echo base_url(); ?>/
                productos" class="card-footer text-white bg-info"> Ver detalles</a>
            </div>
        </div>

        <div class="col-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <?php echo $total;?> Productos con stock minimo
                </div>
                <a href="<?php echo base_url(); ?>/
                productos" class="card-footer text-white bg-danger"> Ver detalles</a>
            </div>
        </div>
    </div>

</div>