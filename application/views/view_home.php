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
            <select class="form-control" id="sel1">
                <option selected="">Tipo habitación</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Nivel de daño:</label>
            <select class="form-control" id="sel1">
                <option selected="">Nivel daño</option>
                <?php
                foreach ($nivelDano as $row =>$value)
                {
                    echo '<option value="'.$row['idNivel_dano'].'">'.$value['nombre_dano'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Delegación:</label>
            <select class="form-control" id="sel1">
                <?php 
                foreach ($delegacion as $row =>$value)
                {
                    echo '<option value="'.$row['idDelegacion'].'">'.$value['nombre_delegacion'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="custom-control custom-radio xmt-3">
            <label for="sel1">Zona geografica:</label>
            <select class="form-control" id="sel1">
                <option selected="">Zona geografica</option>
                <?php 
                foreach ($zonas as $row =>$value)
                {
                    echo '<option value="'.$row['idZona'].'">'.$value['nombre'].'</option>';
                }
                ?>
            </select>
        </div>        
    </div>
  </div>
</div>