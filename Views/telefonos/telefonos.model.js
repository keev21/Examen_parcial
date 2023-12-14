class Telefonos_model{
    constructor(
        id_telefono,
        marca,
        modelo,
        ram,
        almacenamiento,
        costo,
        Ruta
    ){
        this.id_telefono = id_telefono;
        this.marca = marca;
        this.modelo = modelo;
        this.ram = ram;
        this.almacenamiento = almacenamiento;
        this.costo = costo;
        this.Ruta = Ruta;

    }
    todos(){
        var html = "";
        $.get("../../Controllers/telefonos.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);
            $.each(res, (index, valor) => {
               
                
                html += `<tr>
                            <td>${index + 1}</td>
                            <td>${valor.marca}</td>
                            <td>${valor.modelo}</td>
                            <td>${valor.ram}</td>
                            <td>${valor.almacenamiento}</td>
                            <td>${valor.costo}</td>
                            </span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.id_telefono
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.id_telefono
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.id_telefono
            })'>Ver</button>
            </td></tr>
                `;
            });
            $("#tabla_telefonos").html(html);
        });
        return html;
    
    }
    insertar() {
      var dato = new FormData();
      dato = this.costo;
      $.ajax({
        url: "../../Controllers/telefonos.controller.php?op=insertar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("telefonoss", "telefonos Registrado", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        },
      });
      this.limpia_Cajas();
    }
      

      uno() {
        var id_telefono = this.id_telefono;
        $.post(
          "../../Controllers/telefonos.controller.php?op=uno",
          { id_telefono: id_telefono },
          (res) => {
            console.log(res);
            res = JSON.parse(res);
            $("#id_telefono").val(res.id_telefono);
           $("#marca").val(res.marca);
            $("#modelo").val(res.modelo);
            $("#ram").val(res.ram);
            $("#almacenamiento").val(res.almacenamiento);
            
            document.getElementById("costo").value = res.costo; //asiganr al select el valor
    
          }
        );
        $("#Modal_telefonos").modal("show");
      }

      editar() {
        var dato = new FormData();
        dato = this.costo;
        $.ajax({
          url: "../../Controllers/telefonos.controller.php?op=actualizar",
          type: "POST",
          data: dato,
          contentType: false,
          processData: false,
          success: function (res) {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("telefonos", "telefonos Registrado", "success");
              todos_controlador();
            } else {
              Swal.fire("Error", res, "error");
            }
          },
        });
        this.limpia_Cajas();
      }

      eliminar() {
        var id_telefono = this.id_telefono;
    
        Swal.fire({
          title: "telefonoss",
          text: "Esta seguro de eliminar el telefonos",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Eliminar",
        }).then((result) => {
          if (result.isConfirmed) {
            $.post(
              "../../Controllers/telefonos.controller.php?op=eliminar",
              { id_telefono: id_telefono },
              (res) => {
                console.log(res);
                
                res = JSON.parse(res);
                if (res === "ok") {
                  Swal.fire("telefonoss", "telefonos Eliminado", "success");
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
        document.getElementById("marca").value = "";
        document.getElementById("modelo").value = "";
        document.getElementById("ram").value = "";
        document.getElementById("almacenamiento").value = "";
        document.getElementById("costo").value = "";
        $("#id_telefono").val("");
        
        $("#Modal_telefonos").modal("hide");
      }
}