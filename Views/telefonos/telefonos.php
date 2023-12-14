<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de telefonos</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_telefonos">
                        Nuevo Teléfono
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Marca</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Modelo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">RAM</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Almacenamiento</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Costo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody id="tabla_telefonos">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_telefonos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_telefonos">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Telefonos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="id_telefono" id="id_telefono">
                <div class="form-group">
                        <label for="marca">Marca</label>
                        <select name="marca" id="marca" class="form-control">
                            <option value="Samsung">Samsung</option>
                            <option value="Apple">Apple</option>
                            <option value="Xiaomi">Xiaomi</option>
                            <option value="Motorola">Motorola</option>
                            <option value="Nokia">Nokia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" required class="form-control" id="modelo" name="modelo" placeholder="modelo">
                    </div>
                    <div class="form-group">
                        <label for="ram">RAM</label>
                        <input type="text" required class="form-control" id="ram" name="ram" placeholder="ram">
                    </div>
                    <div class="form-group">
                        <label for="almacenamiento">Almacenamiento</label>
                        <input type="text" required class="form-control" id="almacenamiento" name="almacenamiento" placeholder="almacenamiento">
                    </div>
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input type="text" required class="form-control" id="costo" name="costo" placeholder="costo">
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="telefonos.controller.js"></script>
<script src="telefonos.model.js"></script>