function init() {
  $("#form_telefonos").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
    //detecta carga de la pagina
    todos_controlador();
  });

var todos_controlador = () => {
var todos = new Telefonos_model("","", "", "", "", "","todos");
todos.todos();
}


var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#form_telefonos")[0]);
 
  var id_telefono = document.getElementById("id_telefono").value
 
  if(id_telefono > 0){
    var telefonos = new Telefonos_model('','','','','',formData,'editar');
    telefonos.editar();
  }else{
    var telefonos = new Telefonos_model('','','','','',formData,'insertar');
  telefonos.insertar();
  }
};
var editar = (id_telefono) => {
  var uno = new Telefonos_model(id_telefono, "", "", "", "", "", "uno");
  uno.uno();
};

var eliminar=(id_telefono)=>{
  var eliminar = new Telefonos_model(id_telefono, "", "", "", "", "", "eliminar");
  eliminar.eliminar();
}

;init();
