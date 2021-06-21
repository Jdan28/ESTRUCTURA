/*
este es el archivo principal con el cual se llamaran a los controladores por medio de ajax*/

//funcion con la que se cargan los diferentes componentes en el sitio
 function Ajax(URL, LAYER, AFTERLOAD, POST, HIDE_LOADING)
 {
   var REQUEST;

   if (window.XMLHttpRequest)
   {
     REQUEST = new XMLHttpRequest();
     REQUEST.onreadystatechange = function(){processStatusChange();}
   }
   else if (window.ActiveXObject)
   {
     REQUEST = new ActiveXObject("Microsoft.XMLHTTP");
     if (REQUEST)
     {
       REQUEST.onreadystatechange = function(){processStatusChange();}
     }
   }

   if (POST == '' || POST == undefined)
   {
     REQUEST.open("GET", URL, true);
     REQUEST.send(null);
   }
   else
   {
     REQUEST.open("POST", URL, true);
     REQUEST.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
     REQUEST.send(POST);
   }


   return REQUEST;

   function processStatusChange()
   {
//    var JAVASCRIPT;
//     var SCRIPT_ALL = new RegExp('(?:<script.*?>)((\n|\r|.)*?)(?:<\/script>)', 'img');
//     var SCRIPT_ONE = new RegExp('(?:<script.*?>)((\n|\r|.)*?)(?:<\/script>)', 'im');

//SI se carga  correctamente el archivo se publica el contenido
     if(REQUEST.readyState == 4)
     {
//       var SCRIPTS_AJAX;
//       CONTENIDO = REQUEST.responseText.split("@@@", 2);
      CONTENIDO = REQUEST.responseText;
  if(LAYER)
  {
    LAYER_SHOW = $('#'+LAYER);
  }
if(LAYER)
       {
         if(LAYER_SHOW)
         {
           LAYER_SHOW.html(CONTENIDO);
         }
       }

       afterLoad();
     }
   }

   function afterLoad()
   {
     if(AFTERLOAD)
     {
       eval(AFTERLOAD);
     }
   }

   function show_loading(LAYER)
   {
     //revisar el agregado de div
     LOADING_LAYER_NAME = 'AJAX_LOADING_LAYER';

     if(!document.getElementById(LOADING_LAYER_NAME))
     {
       if(AJAX_LAYER = document.getElementById(LAYER))
       {
         var LOADING_LAYER = document.createElement('div');
         var LOADING_IMAGE_LAYER = document.createElement('div');

         LOADING_IMAGE_LAYER.innerHTML = '';
         AJAX_LAYER.appendChild(LOADING_LAYER);
         AJAX_LAYER.appendChild(LOADING_IMAGE_LAYER);
       }
     }
   }
 }

 function obtener_formato_post(o_POST)
 {
   var m_VALORES = [];

   for(var e_I in o_POST)
   {
     m_VALORES.push(e_I + '=' + encodeURIComponent(o_POST[e_I]));
   }

   return m_VALORES.join('&');
 }


 //funcion con la cual se crea un arreglo con los parametros que seran enviados por ajax a el controlador.
 //se envia un array con un nombre asociativo y en el controlador definimos el nombre del array para validarlo.

 function js_form_to_post(FORMA, PREFIJO)
 {
   PREFIJO = PREFIJO.replace(/\[/g, '\\\[');
   PREFIJO = PREFIJO.replace(/\]/g, '\\\]');

   var REG1 = new RegExp("^" + PREFIJO);
   var POST_STRING = "";
   for(CONT = 0; CONT < FORMA.elements.length; CONT++)
   {
     var E = FORMA.elements[CONT];
     if(E.name && REG1.test(E.name))
     {
       if(E.type == 'select-multiple')
       {
         for(a = 1;  a < FORMA.elements[E.name].length; a++)
         {
           if(E.options[a].selected == true)
             POST_STRING = POST_STRING + E.name + "=" + (E.options[a].text).replace(/\+/g, '%2B') + "&";
             //POST_STRING = POST_STRING + E.name + "=" + escape(E.options[a].text).replace(/\+/g, '%2B') + "&";
         }
       }
       else if(E.type != "checkbox")
         POST_STRING = POST_STRING + E.name + "=" + (E.value).replace(/\+/g, '%2B') + "&";
         //POST_STRING = POST_STRING + E.name + "=" + escape(E.value).replace(/\+/g, '%2B') + "&";
       else if(E.checked)
         POST_STRING = POST_STRING + E.name + "=" + (E.value).replace(/\+/g, '%2B') + "&";
         //POST_STRING = POST_STRING + E.name + "=" + escape(E.value).replace(/\+/g, '%2B') + "&";
     }
   }

   return POST_STRING;
 }


//funcion para cargar los componentes por AJAX
 function load_component(e_URL, e_DIV, e_CALLBACK, e_FORM)
 {
   new Ajax(e_URL,e_DIV,e_CALLBACK,e_FORM, false);
 }
