<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="valor" id="valor" type="search" placeholder="Buscar">
      <button class="btn btn-success" name="busca" id="busca" type="button">Buscar</button>
    </form>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10">
      <h3>Mapa</h3>
       <div id="map"></div>
       <script async defer accesskey 
               src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi2OI-6Mw9V15vMiHyj6r9g4aPRbD7utc&callback=initMap">
        </script>
    </div>
    <div class="col col-md-2">
        <h3>Busqueda</h3>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Tipo de habitación:</label>
            <select class="form-control" id="habitacion">
                <option selected="">Tipo habitación</option>
                <?php
                foreach ($tipoHabitacion as $row =>$value)
                {
                    echo '<option value="'.$value['tipo'].'">'.$value['tipo'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Nivel de daño:</label>
            <select class="form-control" id="nivel">
                <option selected="">Nivel daño</option>
                <?php
                foreach ($nivelDano as $row =>$value)
                {
                    echo '<option value="'.$value['idNivel_dano'].'">'.$value['nombre_dano'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Delegación:</label>
            <select class="form-control" id="delegacion">
                <option selected="">Delegaciones</option>
                <?php 
                foreach ($delegacion as $row =>$value)
                {
                    echo '<option value="'.$value['idDelegacion'].'">'.$value['nombre_delegacion'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Zona geografica:</label>
            <select class="form-control" id="zona">
                <option selected="">Zona geografica</option>
                <?php 
                foreach ($zonas as $row =>$value)
                {
                    echo '<option value="'.$value['idZona'].'">'.$value['nombre'].'</option>';
                }
                ?>
            </select>
        </div>        
    </div>
  </div>
</div>