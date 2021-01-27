
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div id="mensajesDemediosPorTerminarContrato" class="col-md-12"></div>

<!-- 
  <div class="mx-auto">
   <div class="col-lg-12 proximamente">
     <img src="<?= base_url("assets/images/proximamente.png")?>" alt="">
   </div> 
 </div> -->
<div class="row justify-content-center">
  <div class="col-md-3 col-lg-2">
    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
  </div>
  <div class="col-md-3 col-lg-2">
    <input type="date" class="form-control" id="fechaTermino" name="fechaTermino">
  </div>

  <div class="col-md-3 col-lg-3">
    <select name="vendedor" id="vendedor" class="form-control">
    <option value="">Selecciona un vendedor</option>
      <?php foreach($vendedores as $vendedor):?>
        <option value="<?= $vendedor["id"]?>"><?= $vendedor["nombre"]. " " .$vendedor["apellidos"]?></option>
      <?php endforeach?>
    </select>
  </div>
  <div class="col-md-3 col-lg-2">
    <button class="btm btn-warning btn-block" id="btnLimpiarFiltros">Limpiar filtros</button>
  </div>
</div>

<div class="ventasPorMes"></div>


<!-- Modal Medios Por vencer contrato -->
<div class="modal fade" id="MediosPorVencerContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Medios por terminar contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      </div>
    </div>
  </div>
</div>
<script>indexit.classList.add("selected");</script>
<script src="<?= base_url('assets/js/dashboard.js')?>"></script>
<script src="<?= base_url('assets/js/chart.js')?>"></script>
