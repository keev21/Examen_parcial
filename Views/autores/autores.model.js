class autores_model{
    constructor(
        id_autor,
        nombre,
        nacionalidad,
        fecha_nacimiento,
        Ruta
    ){
        this.id_autor = id_autor;
        this.nombre = nombre;
        this.nacionalidad = nacionalidad;
        this.fecha_nacimiento = fecha_nacimiento;
        this.Ruta = Ruta;

    }
    todos(){
        var html = "";
        $.get("../../Controllers/autores.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);
            $.each(res, (index, valor) => {
               
                
                html += `<tr>
                            <td>${index + 1}</td>
                            <td>${valor.nombre}</td>
                            <td>${valor.nacionalidad}</td>
                            
                            <td>${valor.fecha_nacimiento}</td>
                            </span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.id_autor
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.id_autor
            })'>Eliminar</button>
            
            </td></tr>
                `;
            });
            $("#tabla_autores").html(html);
        });
        return html;
    
    }
    insertar() {
      var dato = new FormData();
      dato = this.fecha_nacimiento;
      $.ajax({
        url: "../../Controllers/autores.controller.php?op=insertar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("autoress", "autores Registrado", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        },
      });
      this.limpia_Cajas();
    }
      

      uno() {
        var id_autor = this.id_autor;
        $.post(
          "../../Controllers/autores.controller.php?op=uno",
          { id_autor: id_autor },
          (res) => {
            console.log(res);
            res = JSON.parse(res);
            $("#id_autor").val(res.id_autor);
           $("#nombre").val(res.nombre);
            $("#nacionalidad").val(res.nacionalidad);
            
            
            document.getElementById("fecha_nacimiento").value = res.fecha_nacimiento; //asiganr al select el valor
    
          }
        );
        $("#Modal_autores").modal("show");
      }

      editar() {
        var dato = new FormData();
        dato = this.fecha_nacimiento;
        $.ajax({
          url: "../../Controllers/autores.controller.php?op=actualizar",
          type: "POST",
          data: dato,
          contentType: false,
          processData: false,
          success: function (res) {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("autores", "autores Registrado", "success");
              todos_controlador();
            } else {
              Swal.fire("Error", res, "error");
            }
          },
        });
        this.limpia_Cajas();
      }

      nombre_repetido() {
        var nombre = this.nombre;
        $.post(
            "../../Controllers/autores.controller.php?op=nombre_repetido",
            { nombre: nombre },
            (res) => {
                res = JSON.parse(res);
                if (parseInt(res.nombre_repetido) > 0) {
                    $("#errornombre").removeClass("d-none");
                    $("#errornombre").html("El autor ya existe en la base de datos");
                    $("button").prop("disabled", true);
                } else {
                    $("#errornombre").addClass("d-none");
                    $("button").prop("disabled", false);
                }
            }
        );
    }

      eliminar() {
        var id_autor = this.id_autor;
    
        Swal.fire({
          title: "autoress",
          text: "Esta seguro de eliminar el autores",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Eliminar",
        }).then((result) => {
          if (result.isConfirmed) {
            $.post(
              "../../Controllers/autores.controller.php?op=eliminar",
              { id_autor: id_autor },
              (res) => {
                console.log(res);
                
                res = JSON.parse(res);
                if (res === "ok") {
                  Swal.fire("autoress", "autores Eliminado", "success");
                  todos_controlador();
                } else {
                  Swal.fire("Error", res, "error");
                }
              }
            );
          }
        });
    
        this.limpia_Cajas();
      }

      limpia_Cajas(){
        document.getElementById("nombre").value = "";
        document.getElementById("nacionalidad").value = "";
        
        document.getElementById("fecha_nacimiento").value = "";
        $("#id_autor").val("");
        
        $("#Modal_autores").modal("hide");
      }
}