<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de autores</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_autores">
                        Nuevo Autor
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                        <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">nacionalidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha</h6>
                                </th>
                               
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_autores">

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
<div class="modal fade" id="Modal_autores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_autores">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">autores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="id_autor" id="id_autor">
                
                
                <div class="form-group">
                        <label for="nombre">nombre</label>
                        <input type="text" onfocusout="nombre_repetido();" required class="form-control" id="nombre" name="nombre" placeholder="nombre">
                        <div class="alert alert-danger d-none" role="alert" id="errornombre">
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="nacionalidad">nacionalidad</label>
                        <input type="text" onfocusout="nombre_repetido();" required class="form-control" id="nacionalidad" name="nacionalidad" placeholder="nacionalidad">
                        <div class="alert alert-danger d-none" role="alert" id="errornacionalidad">
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_nacimiento">fecha_nacimiento</label>
                        <input type="date" required class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento">
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

<script src="autores.controller.js"></script>
<script src="autores.model.js"></script>