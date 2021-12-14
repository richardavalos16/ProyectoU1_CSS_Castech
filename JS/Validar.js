

     function compruebaContacto()
    { 
        if ((document.formulario.nombre.value.length == 0) || 
            (document.formulario.telefono.value.length == 0) ||
            (document.formulario.correo.value.length == 0) ||
            (document.formulario.Comentarios.value.length == 0))
        {
            alert ('Falta información.');
            return false;
        }
    
        var reTel = /(^[0-9]{10})|^$/;
        var reCorreo= /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
        
        alert ("Registrando información para el envío");
        
        if ((reCorreo.test(document.getElementById("correo").value))
            &&(reTel.test(document.getElementById("telefono").value)))
        { 
            alert("Correcto, a continuación se enviará su mensaje.");
        }
        else
        {
            alert("El correo o el número de teléfono es incorrecto.");
            return false;
        }
    }

    function compruebaRegistro()
    { 
        if ((document.formulario.nombres.value.length == 0) || 
            (document.formulario.apellidos.value.length == 0) ||
            (document.formulario.usuario.value.length == 0) ||
            (document.formulario.correo.value.length == 0) ||
            (document.formulario.contrasena.value.length == 0))
        {
            alert ('Falta información.');
            return false;
        }
    
        var reUsu = /^[a-zA-Z0-9]{5,10}$/;
        var reCorreo= /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
        var reCon = /^[a-zA-Z0-9]{10,15}$/;
        
        alert ("Registrando información para el registro.");
        
        if ((reUsu.test(document.getElementById("usuario").value))
            &&(reCon.test(document.getElementById("contrasena").value))
            &&(reCorreo.test(document.getElementById("correo").value)))
        { 
            alert("Correcto, su registro ha sido exitoso.");
        }
        else
        {
            alert("El usuario, el correo o la contraseña son incorrectos, el usuario debe de ser de 5-10 dígitos con letras y números, la contraseña debe ser de 10-15 dígitos con letras y números.");
            return false;
        }
    }

    function compruebaInicio()
    { 
        if ((document.formulario.usuario.value.length == 0) ||
            (document.formulario.contrasena.value.length == 0))
        {
            alert ('Falta información.');
            return false;
        }
    
        var reUsu = /^[a-zA-Z0-9]{5,10}$/;
        var reCon = /^[a-zA-Z0-9]{10,15}$/;
        
        alert ("Registrando información para el registro.");
        
        if ((reUsu.test(document.getElementById("usuario").value))
            &&(reCon.test(document.getElementById("contrasena").value)))
        { 
            alert("Correcto, su sesión ha iniciado de forma exitosa.");
        }
        else
        {
            alert("El usuario, el correo o la contraseña son incorrectos, el usuario debe de ser de 5-10 dígitos con letras y números, la contraseña debe ser de 10-15 dígitos con letras y números.");
            return false;
        }
    }
    
    function compruebaAltas()
    { 
        if ((document.formulario.nombre.value.length == 0) ||
            (document.formulario.imagen.value.length == 0) ||
            (document.formulario.precio.value.length == 0) ||
            (document.formulario.existencia.value.length == 0))
        {
            alert ('Falta información.');
            return false;
        }
    
    }

    function compruebaCambios()
    { 
        if ((document.formulario.id_producto.value.length == 0) ||
            (document.formulario.nombre.value.length == 0) ||
            (document.formulario.imagen.value.length == 0) ||
            (document.formulario.precio.value.length == 0) ||
            (document.formulario.existencia.value.length == 0))
        {
            alert ('Falta información.');
            return false;
        }
    
    }