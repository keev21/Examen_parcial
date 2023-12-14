<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de libros</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaAutores()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_libros">
                        Nuevo Libro
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Titulo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">titulo del autor</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Genero</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha de publicacion</h6>
                                </th>
                                
                                
                            </tr>
                        </thead>
                        <tbody id="tabla_libros">

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
<div class="modal fade" id="Modal_libros" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
       
            <form method="post" id="form_libros">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">libros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input  type="hidden" name="id_libro" id="id_libro">
                
<!--  
                   <div class="form-group">
                        <label for="titulo">titulo</label>
                        <input type="text" required class="form-control" id="titulo" name="titulo" placeholder="titulo">
                    </div>
                    -->
                    
 
                    
                    <div class="form-group">
                        <label for="titulo">titulo</label>
                        <input type="text" onfocusout="titulo_repetido();" required class="form-control" id="titulo" name="titulo" placeholder="titulo">
                        <div class="alert alert-danger d-none" role="alert" id="errorTitulo">
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="id_autor">Autor</label>
                      <select name="id_autor"  onfocusout="titulo_repetido();" id="id_autor" class="form-control">
                        <option value="0">Seleccione un autor</option>

                      </select>
                      <div class="alert alert-danger d-none" role="alert" id="errorAutor">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="genero">genero</label>
                        <input type="text" required class="form-control" id="genero" name="genero" placeholder="genero">
                    </div>
                    <div class="form-group">
                        <label for="fecha_publicacion">fecha_publicacion</label>
                        <input type="date" required class="form-control" id="fecha_publicacion" name="fecha_publicacion" placeholder="fecha_publicacion">
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

<script src="libros.js"></script>
