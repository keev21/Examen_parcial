function init() {
  $("#form_autores").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
    //detecta carga de la pagina
    todos_controlador();
  });

var todos_controlador = () => {
var todos = new autores_model("", "", "", "","todos");
todos.todos();
}


var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#form_autores")[0]);
 
  var id_autor = document.getElementById("id_autor").value
 
  if(id_autor > 0){
    var autores = new autores_model('','','',formData,'editar');
    autores.editar();
  }else{
    var autores = new autores_model('','','',formData,'insertar');
  autores.insertar();
  }
};
var editar = (id_autor) => {
  var uno = new autores_model(id_autor, "", "", "", "uno");
  uno.uno();
};

var nombre_repetido = () => {
  var nombre = $("#nombre").val();
  var nacionalidad = $("#nacionalidad").val();
  
  var autores = new autores_model("", nombre, nacionalidad, "", "nombre_nacionalidad_repetidos");
  autores.nombre_nacionalidad_repetidos();
};


var eliminar=(id_autor)=>{
  var eliminar = new autores_model(id_autor, "", "","", "eliminar");
  eliminar.eliminar();
}

;init();
