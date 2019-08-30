var modo = 0;
var unicodispositivo = 0;
var appv;
var primera = true;
var cargainicial = false;
var internet = false;
var pictureSource;   
var destinationType;
var db = null;
var weburl = "https://www.reportes.cl/signergia/";
var apiurl = "https://www.reportes.cl/sig/";
var api = "https://www.reportes.cl/sig/api.php";
var nombreDB = "sig.db";
window.uniqid = "";
window.lat = "";
window.lon = "";



$(document).ready(function () {

      document.addEventListener("backbutton", function (e) {
            e.preventDefault();
      }, false );
      
      $.support.cors = true;

      $(document).bind("deviceready", function() {
         //console.log("recien cargue el ready");
         onDeviceReady();
      });

      $(document).bind("resume", function() {
         console.log("Aplicación fue RESUMIDA");
      }); 
      $(document).bind("pause", function() {
         console.log("Aplicación está PAUSADA");
      }); 
});



function iniciarDB(callback){
    db = window.openDatabase(nombreDB, "1.1", "signbi_v1", 2 * 1024 * 1024);
    db.transaction(
    function (tx) {
        tx.executeSql("SELECT name FROM sqlite_master WHERE type='table'", [], function (tx, result) {
            console.log("Tiene "+result.rows.length+" tablas.");
            if (result.rows.length == 1) {
                console.log("FUE CREADA POR PRIMERA VEZ");

                probar_internet(function(data){
                console.log("Revisando si existen internet para descargar las tablas desde Internet -> "+data);
                if(data=="1"){

                db.transaction(habilitaDB, function(a){
                    callback(-1);
                    console.log("No se pudo iniciar la aplicación en tu celular, revisa si cuentas con espacio suficiente antes de continuar.");
                }, function(a){habilitaDB
                  console.log("FUE HABILITADA LA BASE DE DATOS");
                   callback(1);
                  });

                }else{
                        callback(-2);
                        console.log("Hemos detectado que tu dispositivo no tiene internet, por favor activa la red de datos y vuelve a ingresar.");
                }

                });
            } else {
              callback(1);
            }
        });
    }
  );

    
}

function successFunction()
{
    console.info("Módulo Fullscreen activo");
}
 
function errorFunction(error)
{
    console.error(error);
}

function getPhoneGapPath() {
   var path = window.location.pathname;
   path = path.substr( path, path.length - 10 );
   return path;
};

function getPhoneGapURL() {
   var path = window.location.pathname.replace('/android_asset/www/', '');;
   return path;
};

window.traeGPSsimple = function(callback){

  cordova.plugins.diagnostic.isLocationAuthorized(function (res){
      console.log("Está autorizado GPS en la APP: "+res);
      if(!res){
        swal({
        title: 'Ups! La APP no tiene permisos para usar el GPS',
        text: '¿Deseas activar los permisos?',
        type: 'warning',
        buttons: true,
        dangerMode: true,
        buttons: ["No, continuar", "Si, quiero activarlo"]
      }).then((result) => {
        if(result) {
          cordova.plugins.diagnostic.switchToSettings();
          //window.location.href = "admin.html";
         }
      })
         // cordova.plugins.diagnostic.switchToLocationSettings();
         // window.location.href = "admin.html";
         callback(0,1);
      }
   }, function (err){
    callback(0,1);
    console.log("Error: "+JSON.stringify(err));
  });

  cordova.plugins.diagnostic.isLocationEnabled(function (res){
      console.log("Localización Disponible: "+res);
   }, function (err){
    console.log("Error: "+JSON.stringify(err));
  });

  window.cordova.plugins.diagnostic.isGpsLocationAvailable(function (res){
    console.log("Ubicación está: "+res);
    if(res){
       navigator.geolocation.getCurrentPosition(function (position) {
       callback(position.coords.latitude, position.coords.longitude);     
    }, function(){ callback(window.lat, window.lon); },{timeout:10000});

    }else{
      callback(0,1);
    }
    //!res ? cordova.plugins.diagnostic.switchToLocationSettings() : '';
  }, function (err){
    callback(0,1);
    console.log("Error: "+JSON.stringify(err));
  });

  

}

var deniedCount = 2;

function onError(error){
    console.error("The following error occurred: "+error);
}

function evaluateAuthorizationStatus(status){
    switch(status){
       case cordova.plugins.diagnostic.permissionStatus.NOT_REQUESTED:
           console.log("Permission not requested");
           window.requestAuthorization();
           break;
       case cordova.plugins.diagnostic.permissionStatus.DENIED:
           console.log("Permission denied");
           if(deniedCount < 3){
              deniedCount++;
              window.requestAuthorization();
           }else{
              // Are we sure we want to hassle the user more than 3 times?
           }
           break;
       case cordova.plugins.diagnostic.permissionStatus.DENIED_ALWAYS:
           console.log("Permission permanently denied");
           navigator.notification.confirm(
                "La APP no tiene habilitada la función de GPS, quieres cambiar las configuraciones?", 
                function (i) {
                    if (i === 1) {
                        cordova.plugins.diagnostic.switchToSettings();
                    }
                }, "Localización", ['Si', 'No']);
           break;
       case cordova.plugins.diagnostic.permissionStatus.GRANTED:
           console.log("Permission granted always");
           // Yay! use location
           break;        
   }
}

window.requestAuthorization = function(){
    cordova.plugins.diagnostic.requestLocationAuthorization(evaluateAuthorizationStatus, onError);
}

window.checkAuthorization = function(){
    cordova.plugins.diagnostic.getLocationAuthorizationStatus(evaluateAuthorizationStatus, onError);
}

window.habilitarGPS = function(){


  window.checkAuthorization();


};

window.traeGPS = function(callback){

  cordova.plugins.diagnostic.isLocationAuthorized(function (res){
      console.log("Está autorizado GPS en la APP: "+res);
      if(!res){
        swal({
        title: 'Ups! La APP no tiene permisos para usar el GPS',
        text: '¿Deseas activar los permisos?',
        type: 'warning',
        buttons: true,
        dangerMode: true,
        buttons: ["No, continuar", "Si, quiero activarlo"]
      }).then((result) => {
        if(result) {
          cordova.plugins.diagnostic.switchToSettings();
          //window.location.href = "admin.html";
         }
      })
         // cordova.plugins.diagnostic.switchToLocationSettings();
         // window.location.href = "admin.html";
         callback(0,1);
      }
   }, function (err){
    callback(0,1);
    console.log("Error: "+JSON.stringify(err));
  });

  cordova.plugins.diagnostic.isLocationEnabled(function (res){
      console.log("Localización Disponible: "+res);
   }, function (err){
    console.log("Error: "+JSON.stringify(err));
  });

	window.cordova.plugins.diagnostic.isGpsLocationAvailable(function (res){
    console.log("Ubicación está: "+res);
	  if(res){
	  	 navigator.geolocation.getCurrentPosition(function (position) {
			 callback(position.coords.latitude, position.coords.longitude);     
		}, function(){ callback(window.lat, window.lon); },{timeout:10000});

	  }else{
	  	swal({
	      title: '¿Desea activar su GPS?',
	      text: 'Con tu ubicación podremos identificar de mejor manera el lugar del incidente.',
	      type: 'warning',
	      buttons: true,
	      dangerMode: true,
	      buttons: ["No", "Si, quiero activarlo"]
	    }).then((result) => {
	      if(result) {
	        cordova.plugins.diagnostic.switchToLocationSettings();
	        window.location.href = "admin.html";
	       }else callback(0,0);
	    })
	  }
	  //!res ? cordova.plugins.diagnostic.switchToLocationSettings() : '';
	}, function (err){
    callback(0,1);
	  console.log("Error: "+JSON.stringify(err));
	});

	

}





function necesitaUpdate(callback){
  probar_internet(function(data){
  console.log("Revisando si existen internet para ver si existen actualizaciones -> "+data);
  if(data=="1"){
        var token = window.localStorage.getItem("token");
        axios.get(api+'/UPDATES_APP?transform=1&filter[]=APP,eq,incidente&filter[]=version,eq,'+appv)
        .then(response => {
            if (typeof response.data === 'undefined' && response.data.length == 0) {
                this.errores.push("Error al intentar obtener los registros.");
                callback(0);
            }else{
               if(response.data["UPDATES_APP"]!=""){
                  var json = JSON.parse(JSON.stringify(response.data["UPDATES_APP"][0]));
                  if(json.estado_up == 1){
                     callback(1);
                     alert("Tienes una actualización disponible para tu aplicación.");
                     console.log("Abriendo: "+json.url_up);
                     window.open(json.url_up, '_system');
                     navigator.app.exitApp();
                     onSalir(1);
                  }else callback(0);
               }else callback(0);
            }
        })
  }else{
    callback(0);
  }
  });
        //callback(1);
}

function onDeviceReady() {

  //db = window.openDatabase(nombreDB, "1.1", "reportes_inciv1", 2 * 1024 * 1024);

 /* window.sqlitePlugin.echoTest(function() {
    console.log('ECHO test OK');
  });

  var db = window.sqlitePlugin.openDatabase({name: 'my.db', location: 2}, function(){
    alert("DB creada");
  }, function(){
    alert("Error al crear DB");
  });*/

  window.uniqid = device.uuid;
  var pathname = getPhoneGapURL();
  pictureSource=navigator.camera.PictureSourceType;
  destinationType=navigator.camera.DestinationType;
  AndroidFullScreen.immersiveMode(successFunction, errorFunction);
  window.SoftInputMode.set('adjustPan');

  console.log("Ruta de las BD: " + nombreDB);

  if(pathname.indexOf('admin.html') >= 0 ){


  }

  //btn_iniciar
  if(pathname.indexOf('index.html') >= 0 ){
  cordova.getAppVersion.getVersionNumber(function (version) {
      appv = version;

      necesitaUpdate(function(data){

        if(data=="0"){
            iniciarDB(function(a){
                console.log("resultado iniciar: " + a);
                 if(a == 1){
                    removeClass(document.getElementById("btn_iniciar"), "hide");
                    addClass(document.getElementById("cargador"), "hide");
                 }else{
                    
                    console.log("Se detectaron problemas al iniciar la aplicación.");
                    addClass(document.getElementById("cargador"), "hide");
                    removeClass(document.getElementById("error_alerta"), "hide");
                 }
                  
            });
        }else{
          alert("tienes actualizaciones, no puedes usar esta versión de la APP.");
          console.log("Tienes actualizaciones disponibles");
        }

      });
  });
}else{

}

    

}

function habilitaDB(tx) {
     //tx.executeSql('DROP TABLE RECINTOS');
     tx.executeSql('CREATE TABLE IF NOT EXISTS ACTUALIZACIONES (ID integer primary key autoincrement, TIPO, t TIMESTAMP DEFAULT CURRENT_TIMESTAMP)');
     tx.executeSql('CREATE TABLE IF NOT EXISTS DIRECCIONES (IDDIRE integer primary key, DIREC_NOMBRE, FECHA_MODIF)');
     tx.executeSql('CREATE TABLE IF NOT EXISTS GERENCIAS (IDGERENCIA integer primary key, IDDIRE, GERENCIA_NOMBRE, FECHA_MODIF)');
     tx.executeSql('CREATE TABLE IF NOT EXISTS AREAS (IDAREA integer primary key, IDSUBGERENCIA, AREA, FECHA_MODIF)');
     tx.executeSql('CREATE TABLE IF NOT EXISTS SUBGERENCIAS (IDSUBGEREN integer primary key, IDGERENCIA, SUBGERENCIA_NOMBRE, FECHA_MODIF)');
     //tx.executeSql('CREATE TABLE IF NOT EXISTS INCIDENTES (id_inc integer primary key, nombre, gravedad, fecha_inc, recinto, direccion, accion, foto, tipo, f_creacion, modo, FECHA_MODIF, riesgos, que_hizo, glosa)');
     tx.executeSql('CREATE TABLE IF NOT EXISTS RECINTOS (IDRECINTO integer primary key, IDAREA, RECINTO, FECHA_MODIF)');
    // tx.executeSql('CREATE TABLE IF NOT EXISTS ACTUALIZADOR (id integer primary key autoincrement, archivo , remoto, ruta)');
}

function errorDB(err) {
  alert("Error intentando acceder a la base de datos en su dispositivo: "+err.code+" mensaje: "+err.message);
}

function exitoGPS(position) {
		window.lat = position.coords.latitude;
		window.lon = position.coords.longitude;
		console.log("GPS OK "+position.coords.latitude+" / "+position.coords.longitude);
        alert('Latitude: '          + position.coords.latitude          + '\n' +
              'Longitude: '         + position.coords.longitude         + '\n' +
              'Altitude: '          + position.coords.altitude          + '\n' +
             'Accuracy: '          + position.coords.accuracy          + '\n' +
             'Altitude Accuracy: ' + position.coords.altitudeAccuracy  + '\n' +
             'Heading: '           + position.coords.heading           + '\n' +
             'Speed: '             + position.coords.speed             + '\n' +
             'Timestamp: '         + position.timestamp                + '\n');        
};

function errorGPS(error) {
    alert('GPS ERROR: code: '    + error.code    + '\n' + 'message: ' + error.message + '\n');
}

function exitoDB() {
  console.log("Conexion Local Establecida");
}

window.guid = function() {
          function s4() {
            return Math.floor((1 + Math.random()) * 0x10000)
              .toString(16)
              .substring(1);
          }
          return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
        }

window.verBD = function() {
    db.transaction(function(tx){ 
            tx.executeSql('select * from DIRECCIONES', [], function(tx, results){ 
                var len = results.rows.length;
                console.log("Tabla DIRECCIONES: Tiene " + len + " registros.");
            }, errorDB);
            tx.executeSql('select * from INCIDENTES', [], function(tx, results){ 
                var len = results.rows.length;
                console.log("Tabla INCIDENTES: Tiene " + len + " registros.");
            }, errorDB);
            tx.executeSql('select * from GERENCIAS', [], function(tx, results){ 
                var len = results.rows.length;
                console.log("Tabla GERENCIAS: Tiene " + len + " registros.");
            }, errorDB);
            tx.executeSql('select * from RECINTOS', [], function(tx, results){ 
                var len = results.rows.length;
                console.log("Tabla RECINTOS: Tiene " + len + " registros.");
            }, errorDB);
            tx.executeSql('select * from AREAS', [], function(tx, results){ 
                var len = results.rows.length;
                console.log("Tabla AREAS: Tiene " + len + " registros.");
            }, errorDB);
            tx.executeSql('select * from SUBGERENCIAS', [], function(tx, results){ 
                var len = results.rows.length;
                console.log("Tabla SUBGERENCIAS: Tiene " + len + " registros.");
            }, errorDB);

    });
}


function trae_recintos(callback) {
    db.transaction(function(tx){ 
      tx.executeSql('select * from RECINTOS', [], function(tx, results){ 
          var len = results.rows.length;
          if(len>0){
              res = results.rows.item(0);
          }
          callback(res);
      }, errorDB);
    });
}

function verRecintos(callback) {
        db.transaction(function(tx) {
              tx.executeSql('select * from RECINTOS', [], function(tx, results){ 
                var len = results.rows.length;
                if(len>0){
                    res = results.rows.item(0);
                }
                callback(res);
              });
        }, function(err){
            console.log("Error consultando: "+ err.message);
            callback(0);
        });
}

window.verIncidentes =  function(callback) {
        var registros = new Array();
        db = window.openDatabase(nombreDB, "1.1", "reportes_inciv1", 2 * 1024 * 1024);
        db.transaction(function(tx) {
              tx.executeSql('select * from INCIDENTES order by id_inc DESC', [], function(tx, results){ 
                var len = results.rows.length;
                if(len>0){
                   // res = results.rows;
                    for (i = 0; i < results.rows.length; i++){
                        registros.push(results.rows.item(i));
                    }
                    //console.log(results.rows);
                    //registros.push(res);
                }
                callback(registros);
              });
        }, function(err){
            console.log("Error consultando: "+ err.message);
            callback(0);
        });
}

window.verGerencias =  function(callback) {
        var registros = new Array();
        db = window.openDatabase(nombreDB, "1.1", "reportes_inciv1", 2 * 1024 * 1024);
        db.transaction(function(tx) {
              tx.executeSql('select * from GERENCIAS where IDGERENCIA > 0', [], function(tx, results){ 
                var len = results.rows.length;
                if(len>0){
                    for (i = 0; i < results.rows.length; i++){
                        registros.push(results.rows.item(i));
                    }
                }
                callback(registros);
              });
        }, function(err){
            console.log("Error consultando: "+ err.message);
            callback(0);
        });
}


window.verAreas =  function(callback) {
        var registros = new Array();
        db = window.openDatabase(nombreDB, "1.1", "reportes_inciv1", 2 * 1024 * 1024);
        db.transaction(function(tx) {
              tx.executeSql('select * from AREAS where IDAREA > 0', [], function(tx, results){ 
                var len = results.rows.length;
                if(len>0){
                   // res = results.rows;
                    for (i = 0; i < results.rows.length; i++){
                        registros.push(results.rows.item(i));
                    }
                    //console.log(results.rows);
                    //registros.push(res);
                }
                callback(registros);
              });
        }, function(err){
            console.log("Error consultando: "+ err.message);
            callback(0);
        });
}


function successCallback(res){
  alert("Location is " + (res ? "Enabled" : "not Enabled"));
  console.log("Location is " + (res ? "Enabled" : "not Enabled"));
  !res ? cordova.plugins.diagnostic.switchToLocationSettings() : '';
}
function errorCallback(err){
  console.log("Error: "+JSON.stringify(err));
}


function actualizaRecintos(callback) {
    axios.get(api+'/recintos?transform=1')
      .then(response => {
      if(response.data.error){
          console.log("Error al intentar obtener los recintos, he introducciendolos a la BD.");
      }else{
        let resultado = response.data["recintos"];
        db.transaction(function(tx) {
            $.each(resultado, function(i, item) {
                tx.executeSql('INSERT OR REPLACE INTO RECINTOS (IDRECINTO, IDAREA, RECINTO, FECHA_MODIF) VALUES ("'+item.IDRECINTO+'", "'+item.IDAREA+'", "'+item.RECINTO+'", "'+item.FECHA_MODIF+'")');
            });
            console.log("Carga completada");
        }, function(err){
            console.log("Error Insertando: "+ err.message);
            callback(0);
        }, function() { 
            console.log('Filas creadas');
            callback(1);
        });

        }
    })
}


function actualizaSubgerencias(callback) {
    axios.get(api+'/subgerencias?transform=1')
      .then(response => {
      if(response.data.error){
          console.log("Error al intentar obtener los subgerencias, he introducciendolos a la BD.");
      }else{
        let resultado = response.data["subgerencias"];
        db.transaction(function(tx) {
            $.each(resultado, function(i, item) {
                tx.executeSql('INSERT OR REPLACE INTO SUBGERENCIAS (IDSUBGEREN, IDGERENCIA, SUBGERENCIA_NOMBRE, FECHA_MODIF) VALUES ("'+item.IDSUBGEREN+'", "'+item.IDGERENCIA+'" , "'+item.SUBGERENCIA_NOMBRE+'", "'+item.FECHA_MODIF+'")');
            });
            console.log("Carga completada");
        }, function(err){
            console.log("Error Insertando: "+ err.message);
            callback(0);
        }, function() { 
            console.log('Filas creadas');
            callback(1);
        });

        }
    })
}

function actualizaAreas(callback) {
    axios.get(api+'/areas?transform=1')
      .then(response => {
      if(response.data.error){
          console.log("Error al intentar obtener los recintos, he introducciendolos a la BD.");
      }else{
        let resultado = response.data["areas"];
        db.transaction(function(tx) {
            $.each(resultado, function(i, item) {
                tx.executeSql('INSERT OR REPLACE INTO AREAS (IDAREA, IDSUBGERENCIA, AREA, FECHA_MODIF) VALUES ("'+item.IDAREA+'", "'+item.IDSUBGERENCIA+'" , "'+item.AREA+'", "'+item.FECHA_MODIF+'")');
            });
            console.log("Carga completada");
        }, function(err){
            console.log("Error Insertando: "+ err.message);
            callback(0);
        }, function() { 
            console.log('Filas creadas');
            callback(1);
        });

        }
    })
}
function actualizaDirecciones(callback) {
    axios.get(api+'/direcciones?transform=1')
      .then(response => {
      if(response.data.error){
          console.log("Error al intentar obtener los DIRECCIONES, he introducciendolos a la BD.");
      }else{
        let resultado = response.data["direcciones"];
        db.transaction(function(tx) {
            $.each(resultado, function(i, item) {
                tx.executeSql('INSERT OR REPLACE INTO DIRECCIONES (IDDIRE, DIREC_NOMBRE, FECHA_MODIF) VALUES ("'+item.IDDIRE+'", "'+item.DIREC_NOMBRE+'", "'+item.FECHA_MODIF+'")');
            });
            console.log("Carga completada");
        }, function(err){
            console.log("Error Insertando: "+ err.message);
            callback(0);
        }, function() { 
            console.log('Filas creadas');
            callback(1);
        });

        }
    })
}

function actualizaGerencias(callback) {
    axios.get(api+'/gerencias?transform=1')
      .then(response => {
      if(response.data.error){
          console.log("Error al intentar obtener los GERENCIAS, he introducciendolos a la BD.");
      }else{
        let resultado = response.data["gerencias"];
        db.transaction(function(tx) {
            $.each(resultado, function(i, item) {
                tx.executeSql('INSERT OR REPLACE INTO GERENCIAS (IDGERENCIA, IDDIRE, GERENCIA_NOMBRE, FECHA_MODIF) VALUES ("'+item.IDGERENCIA+'", "'+item.IDDIRE+'", "'+item.GERENCIA_NOMBRE+'", "'+item.FECHA_MODIF+'")');
            });
            console.log("Carga completada");
        }, function(err){
            console.log("Error Insertando: "+ err.message);
            callback(0);
        }, function() { 
            console.log('Filas creadas');
            callback(1);
        });

        }
    })
}

function limpiarQuotes(texto){

  if(texto == null || texto == "") return "";
  return texto.replace(/"/g, '\'').replace("[", "").replace("]", "");

}

var probar_internet = function(callbackFn) {
        var file = apiurl + "pixel.php";
        $.ajax({
          url: file,
          success: function(data) {
            modo = 1;
            callbackFn("1");
          },
          error: function(data) {
            modo = 0;
            callbackFn("0");
          }
        });
}

function hasClass(el, className)
{
    if (el.classList)
        return el.classList.contains(className);
    return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
}

function addClass(el, className)
{
    if (el.classList)
        el.classList.add(className)
    else if (!hasClass(el, className))
        el.className += " " + className;
}

function removeClass(el, className)
{
    if (el.classList)
        el.classList.remove(className)
    else if (hasClass(el, className))
    {
        var reg = new RegExp('(\\s|^)' + className + '(\\s|$)');
        el.className = el.className.replace(reg, ' ');
    }
}