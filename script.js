function validarRegistro() {
    var nombre = document.getElementById("nombre").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    var sexo = document.getElementById("sexo").value;
    var estatura = document.getElementById("estatura").value;
    var peso = document.getElementById("peso").value;
  
    if (nombre == "") {
      alert("Por favor, ingrese un nombre");
      return false;
    }
  
    if (fecha_nacimiento == "") {
      alert("Por favor, ingrese una fecha de nacimiento");
      return false;
    }
  
    if (sexo == "") {
      alert("Por favor, seleccione un sexo");
      return false;
    }
  
    if (estatura == "") {
      alert("Por favor, ingrese una estatura");
      return false;
    }
  
    if (peso == "") {
      alert("Por favor, ingrese un peso");
      return false;
    }
  
    return true;
  }

  
  