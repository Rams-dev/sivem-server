const p = location.href
p2  = p.lastIndexOf("admin")
let path = p.slice(0, p2)
console.log(path);
const divMensaje = document.querySelector("#mensajesDemediosPorTerminarContrato");
const fechaInicio = document.querySelector("#fechaInicio");
const fechaTermino = document.querySelector("#fechaTermino");
const vendedor = document.querySelector("#vendedor");
const btnLimpiarfiltros = document.querySelector("#btnLimpiarFiltros");
let fecha_Inicio;
let fecha_Termino;
let vendedor_Id;


(function obtenerMediosPorTerminarContrato(){
    $.get(path+"admin/dashboard/obtenerMediosQueVanATerminarContrato", function(response){
        if(response != ""){
            let res = JSON.parse(response);
            enviarNotificacion(res.total);
            mostrarMediosPorTerminarContrato(res.medios)
        }
    })

    
})()


function enviarNotificacion(numero){
    divMensaje.innerHTML = ` <div class="alert alert-warning alert-dismissible fade show text-center text-dark" role="alert">
        Este mes vencerá el contrato de ${numero} Medios, echa un vistazo para saber cuales son.
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#MediosPorVencerContrato">Echar un vistazo</button>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    ` ;

}

function mostrarMediosPorTerminarContrato(medios){
    const contenedorModal = document.querySelector(".modal-body");
    medios.map(medio =>{
        // console.log(medio)
        contenedorModal.innerHTML += `
        <div class="card my-2">
           <div class="card-header">
                <div class="d-flex justify-content-between p-2">
                    <div class="title">
                        Clave master: <span class="text-danger"> ${medio.nocontrol}</span>
                    </div>
                    <div class="title">
                        Fecha de termino: <span class="text-danger"> ${medio.fecha_termino}</span>
                    </div>
                </div>
            </div>
            <div class="card-body modalBody">
            <div class="row justify-content-between">
                <div class="col-md-3 col-sm-3">
                <img src="${path}assets/images/medios/${medio.vista_media}" class="imagen-modal" alt="">
                </div>
                <div class="col-md-9">
                    <div class="d-flex ">
                        <div class="col-md-6 col-sm-6 modalp">
                            <p><b>Propietario: </b><span>${medio.nombre} <span></p>
                            <p><b>Telefono: </b><span>${medio.telefono} <span></p>
                            <p><b>Celular: </b><span>${medio.celular} <span></p>
                            <p><b>Municipio: </b><span>${medio.municipio} <span></p>
                        </div>
                        <div class="col-md-6 modalp">
                            <p><b>Tipo de medio: </b><span>${medio.tipo_medio} <span></p>
                            <p><b>Medidas: </b><span>${medio.ancho}m x ${medio.alto}m <span></p>
                            <p><b>Costo: </b><span>${medio.monto} <span></p>
                            <p><b>Status: </b><span>${medio.status} <span></p>
                        </div>
                    </div>

                </div>
                
                
            </div>
            </div>
        </div>
        `
    })
  

}

btnLimpiarfiltros.addEventListener("click", function(e){
    fechaInicio.value = null;
    fechaTermino.value = null;
    vendedor.value = "";
    quitarErrorAfechas();
})

fechaInicio.addEventListener("change", function(e){
    e.preventDefault()
    fechaInicio.classList.remove("is-invalid")
    fecha_Inicio = e.target.value;
    obtenerVentasPorfecha()
})

fechaTermino.addEventListener("change", function(e){
    e.preventDefault()
    fechaTermino.classList.remove("is-invalid")

    fecha_Termino = e.target.value;

    obtenerVentasPorfecha()

})

vendedor.addEventListener("change", function(e){
    e.preventDefault()
    vendedor_Id = e.target.value;
    obtenerVentasPorfecha()
})


function obtenerVentasPorfecha(){
    if(validarFechas()){
        arrayData = {
            "vendedorId": vendedor_Id,
            "fechaInicio": fecha_Inicio,
            "fechaTermino": fecha_Termino
        }
        $.ajax({
            url: path+"admin/dashboard/obtenerVentasPorFecha",
            type: "post",
            data: arrayData,
        })
        .done(function(response){
            let res = JSON.parse(response);
            printData(res)
        })
        .fail(function(error){
            console.log(error)
        })
        .always(function(){
            console.log("haciendo algo")
        })

    }
    
} 

function validarFechas(){
    if(fecha_Inicio > fecha_Termino){
        alertify.error("selecciona una fecha válida");
        agregarErrorAfechas()
        return 0;
    }
    if(fecha_Inicio == null || fecha_Termino == null){
        return true;
    }

    if(fecha_Inicio != null && fecha_Termino == null || fecha_Termino != null && fecha_Inicio == null){
        return false
    }
    quitarErrorAfechas()
    return true;
}


function agregarErrorAfechas(){
    fechaInicio.classList.add("is-invalid")
    fechaTermino.classList.add("is-invalid")
}

function quitarErrorAfechas(){
    fechaInicio.classList.remove("is-invalid")
    fechaTermino.classList.remove("is-invalid")

}

function printData(res){
    console.log(res);

}


