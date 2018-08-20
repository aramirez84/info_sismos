<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/panel.css" type="text/css">
<script src="<?php echo base_url()?>bootstrap/amcharts/amcharts.js"></script>
<script src="<?php echo base_url()?>bootstrap/amcharts/pie.js"></script>
<script src="<?php echo base_url()?>bootstrap/amcharts/serial.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="<?php echo base_url()?>bootstrap/amcharts/themes/light.js"></script>
<script src="<?php echo base_url()?>bootstrap/amcharts/plugins/dataloader/dataloader.min.js"></script>
<script src="<?php echo base_url()?>bootstrap/js/graficas_zona.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>bootstrap/js/zonas.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>bootstrap/js/delegaciones.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>bootstrap/js/tipos.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>bootstrap/js/niveles.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>bootstrap/js/tipos_habitacion.js" type="text/javascript"></script>

<div id="graficas" align="right">
            <div id='container'>
                <div id="RotacionPersonalArea">
                    <div class="tituloA">Zonas</div>
                    <div id='grafica2' style="height: 95%; width: 90%;"></div>
		</div>
		<div id="BajasArea">
                    <div class="tituloA">Delegaciones</div>
                    <div id='grafica1' style="height: 95%; width: 90%;"></div>
		</div>
                <div id="MotivosBajas">
                    <div class="titulo">Tipo de daño</div>
                    <div id='grafica3' style="height: 95%; width: 90%;"></div>
		</div>
                <div id="RotacionAcumulado">
                    <div class="titulo">Nivel de daño</div>
                    <div id='grafica5' style="height: 92%; width: 90%;"></div>
		</div>
                <div id="RotacionAcumulado">
                    <div class="titulo">Tipo de habitacion</div>
                    <div id='grafica6' style="height: 100%; width: 90%;"></div>
		</div>
            </div>
            <br><br>
            <br>	        
        </div>