function init() {
    $("#form_libros").on("submit", function (e) {
      guardaryeditar(e);
    });
  }
  
  $().ready(() => {
    todos();
  });
  
  var todos = () => {
    var html = "";
    $.get("../../Controllers/libros.controller.php?op=todos", (res) => {
      
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.titulo}</td>
                  <td>${valor.nombre_autor}</td>
                  <td>${valor.genero}</td>
                  <td>${valor.fecha_publicacion}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${
                valor.id_libro
              })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${
                valor.id_libro
              })'>Eliminar</button>
              
              </td></tr>
                  `;
      });
      $("#tabla_libros").html(html);
    });
    
  };
  
  var guardaryeditar = (e) => {
    e.preventDefault();
    var dato = new FormData($("#form_libros")[0]);
    var ruta = "";
    var id_libro = document.getElementById("id_libro").value;
    if (id_libro > 0) {
      ruta = "../../Controllers/libros.controller.php?op=actualizar";
    } else {
      ruta = "../../Controllers/libros.controller.php?op=insertar";
    }
    $.ajax({
      url: ruta,
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res == "ok") {
          Swal.fire("libros", "Registrado con éxito", "success");
          todos();
          limpia_Cajas();
        } else {
          Swal.fire("libros", "Error al guardo, intente mas tarde", "error");
        }
      },
    });
    
  };
  
  var cargaAutores = () => {
    return new Promise((resolve, reject) => {
      $.post("../../Controllers/autores.controller.php?op=todos", (res) => {
        res = JSON.parse(res);
        var html = "";
        $.each(res, (index, val) => {
          html += `<option value="${val.id_autor}"> ${val.nombre}</option>`;
        });
        $("#id_autor").html(html);
        resolve();
      }).fail((error) => {
        reject(error);
      });
    });
  };
  
  var editar = async (id_libro) => {
    await cargaAutores();
    $.post(
      "../../Controllers/libros.controller.php?op=uno",
      { id_libro: id_libro },
      (res) => {
        res = JSON.parse(res);
  
        $("#id_libro").val(res.id_libro);
        $("#id_autor").val(res.id_autor);
        $("#genero").val(res.genero);
        $("#fecha_publicacion").val(res.fecha_publicacion);
        //document.getElementById("id_autor").value = res.id_autor;
  
  
        $("#titulo").val(res.titulo);
      }
    );
    $("#Modal_libros").modal("show");
    limpia_Cajas();
  };
  
  var eliminar = (id_libro) => {
    Swal.fire({
      title: "Paises",
      text: "Esta seguro de eliminar la provincia",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/libros.controller.php?op=eliminar",
          { id_libro: id_libro },
          (res) => {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("libros", "Provincia Eliminado", "success");
              todos();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });
  
    limpia_Cajas();
  };
  
  var limpia_Cajas = () => {
    document.getElementById("id_libro").value = "";
    document.getElementById("id_autor").value = "";
    document.getElementById("titulo").value = "";
    document.getElementById("genero").value = "";
    document.getElementById("fecha_publicacion").value = "";
    $("#Modal_libros").modal("hide");
  };
  init();