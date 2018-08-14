<link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/panel.css" type="text/css">
<div id="graficas" align="right">
            <?php
                // Guardamos nuestra consulta en formato JSON en un campo hidden para despues manipularlo con JavaScript
                if(!empty($grafica))
                {
                    // Comprobamos que arreglos son los que devolvio nuestro metodo generar_grafica para saber que tipo de grafica
                    // se va a mostrar al usuario
                    
                    if((!empty($grafica['personal'])) && ($grafica['personal']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[0]; ?>" value='<?php echo $grafica['personal'];?>' id="datos_grafica1">
                        <?php
                    }
                    if ((!empty($grafica['totales'])) && ($grafica['totales']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[1]; ?>" value='<?php echo $grafica['totales']; ?>' id="datos_grafica2">
                        <?php
                    }
                    if((!empty($grafica['Bajas'])) && ($grafica['Bajas']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[2]; ?>" value='<?php echo $grafica['Bajas']; ?>' id="datos_grafica3">
                        <?php
                    }
                    if((!empty($grafica['nivel'])) && ($grafica['nivel']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[3]; ?>" value='<?php echo $grafica['nivel']; ?>' id="datos_grafica4">
                        <input type="hidden" name="roles" value='<?php echo $grafica['Roles']?>' id="roles">
                        <?php
                    }
                    if((!empty($grafica['acumulado'])) && ($grafica['acumulado']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[6]; ?>" value='<?php echo $grafica['acumulado']; ?>' id="datos_grafica5">
                        <?php
                    }
                    if((!empty($grafica['antiguedad'])) && ($grafica['antiguedad']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[4]; ?>" value='<?php echo $grafica['antiguedad']; ?>' id="datos_grafica6">
                        <?php
                    }
                    if((!empty($grafica['criticoClave'])) && ($grafica['criticoClave']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[7]; ?>" value='<?php echo $grafica['criticoClave']; ?>' id="datos_grafica7">
                        <?php
                    }
                    if((!empty($grafica['criticoClaveBimestre'])) && ($grafica['criticoClaveBimestre']))
                    {
                        ?>
                        <input type="hidden" name="<?php echo $nombres[8]; ?>" value='<?php echo $grafica['criticoClaveBimestre']; ?>' id="datos_grafica8">
                        <?php
                    }
                }
            ?>
            <div id='container'>
                <div id="RotacionPersonalArea">
                    <div class="tituloA">% Rotaci&oacute;n de Personal de la <?php echo "$area $nombreMes"; ?></div>
                    <div id="flecha">
                        <?php
                            if(!empty($totalBajas2))
                            {
                                $diferencia=$totalBajas2[0]['% Bajas'] - $totalBajas[0]['% Bajas'];
                                if($diferencia<0)
                                {
                                    $diferencia=$diferencia*(-1);
                                    echo "% de Rotacion aumento un $diferencia % conforme al mes anterior";
                                }
                                else if($diferencia==0)
                                {
                                    echo "% de Rotacion se mantuvo igual conforme al mes anterior";
                                }
                                else
                                {
                                    echo "% de Rotacion disminuyo un $diferencia % conforme al mes anterior";
                                }
                            }
                        ?>
                    </div>
                    <div id='grafica2' style="height: 95%; width: 90%;"></div>
		</div>
		<div id="BajasArea">
                    <div class="tituloA">% de Bajas por &Aacute;rea de la <?php echo "$area en el Mes de $nombreMes"; ?></div>
                    <div id='grafica1' style="height: 95%; width: 90%;"></div>
		</div>
                <div id="MotivosBajas">
                    <div class="titulo">Acumulado de Motivos de Bajas <?php echo $yearSelected ?></div>
                    <div id='grafica3' style="height: 95%; width: 90%;"></div>
		</div>
                <div id="RotacionAcumulado">
                    <div class="titulo">% Rotaci&oacute;n Acumulado - A&ntilde;o <?php echo $yearSelected?></div>
                    <div id='grafica5' style="height: 92%; width: 90%;"></div>
		</div>
                <div id="BajasRol">
                    <div class="titulo">Acumulado Bajas por Nivel(Rol) <?php echo $yearSelected?></div>
                    <div class="niveles">
                        <?php
                            if(!empty($bajasNivel2))
                            {
                                $diferencia=$bajasNivel[0]['% Nivel'] - $bajasNivel2[0]['% Nivel'];
                                if($diferencia<0)
                                {
                                    $diferencia=$diferencia*(-1);
                                    echo $bajasNivel2[0]['Nombre_nivel']."<strong class='menor'> disminuyo un ".round($diferencia,2)." % </strong>conforme al mes anterior<br>";
                                }
                                else if($diferencia==0)
                                {
                                    echo $bajasNivel2[0]['Nombre_nivel']."<strong class='igual'> se mantuvo igual en ".round($diferencia,2)." % </strong>conforme al mes anterior<br>";
                                }
                                else
                                {
                                    echo $bajasNivel2[0]['Nombre_nivel']."<strong class='mayor'> aumento un ".round($diferencia,2)." % </strong>conforme al mes anterior<br>";
                                }
                                
                                $diferencia=$bajasNivel[1]['% Nivel'] - $bajasNivel2[1]['% Nivel'];
                                if($diferencia<0)
                                {
                                    $diferencia=$diferencia*(-1);
                                    echo $bajasNivel2[1]['Nombre_nivel']."<strong class='menor'> disminuyo un ".round($diferencia,2)." % </strong> conforme al mes anterior<br>";
                                }
                                else if($diferencia==0)
                                {
                                    echo $bajasNivel2[1]['Nombre_nivel']." se mantuvo igual en <strong class='igual'>".round($diferencia,2)." % </strong> conforme al mes anterior<br>";
                                }
                                else
                                {
                                    echo $bajasNivel2[1]['Nombre_nivel']."<strong class='mayor'> aumento un ".round($diferencia,2)." % </strong> conforme al mes anterior<br>";
                                }
                                            
                                $diferencia=$bajasNivel[2]['% Nivel'] - $bajasNivel2[2]['% Nivel'];
                                if($diferencia<0)
                                {
                                    $diferencia=$diferencia*(-1);
                                    echo $bajasNivel2[2]['Nombre_nivel']."<strong class='menor'> disminuyo un ".round($diferencia,2)." % </strong> conforme al mes anterior<br>";
                                }
                                else if($diferencia==0)
                                {
                                    echo $bajasNivel2[2]['Nombre_nivel']."se mantuvo <strong class='igual'>igual en ".round($diferencia,2)." % </strong>conforme al mes anterior<br>";
                                }
                                else
                                {
                                    echo $bajasNivel2[2]['Nombre_nivel']."<strong class='mayor'> aumento un ".round($diferencia,2)." % </strong> conforme al mes anterior<br>";
                                }
                            }
                        ?>
                    </div>
                    <div id='grafica4' style="height: 80%; width: 90%;"></div>
		</div>
                <div id="Antiguedad">
                    <div class="titulo">Acumulado Bajas por Antig&uuml;edad-A&ntilde;o <?php echo $yearSelected?></div>
                    <div id='grafica6' style="height: 100%; width: 90%;"></div>
		</div>
                <div id="BajasCritico">
                    <div class="titulo">Bajas Personal Clave y Cr&iacute;tico <?php echo"$nombreMes ". $yearSelected; ?></div>
                    <div id='grafica7' style="height: 100%; width: 90%;"></div>
		</div>
                <div id="AcumuladoCritico">
                    <div class="titulo">Acumulado de Bajas Clave y Cr&iacute;tico <?php echo $yearSelected ; ?></div>
                    <div id='grafica8' style="height: 100%; width: 90%;"></div>
		</div>
                <div id="BajasPersonal">
                    <div class="titulo">Bajas por Personal Cr&iacute;tico y Clave <?php echo"$nombreMes ". $yearSelected; ?></div>
                    <div style="height: 95%; width: 100%;">
                        <?php
                            echo "<table id='reporte-tabla'>
                                    <tr>
                                        <td class='encabezado'>ID</td>
                                        <td class='encabezado'>Nombre</td>
                                        <td class='encabezado'>Antig&uuml;edad (meses)</td>
                                        <td class='encabezado'>&Aacute;rea</td>
                                        <td class='encabezado'>Personal Cr&iacute;tico y Clave</td>
                                    </tr>
                                    ";
                            if(!empty($bajasAntiguedad))
                            {
                            		    $conta=1;
                                foreach ($bajasAntiguedad as $row)
                                { 
                                    ($conta%2)== 0 ? $color="#D7DCE9" :$color="#fff";
                                    echo "<tr style='background-color: $color ;'>
                                              <td>".$conta."</td>
                                              <td>".$row['Nombre_personal']."</td>
                                              <td>".$row['Antiguedad']."</td>
                                              <td>".$row['Nombre_Subarea']."</td>
                                              <td>".$row['Personal']."</td>
                                            </tr>
                                           ";
                                    $conta++;
                                }
                            }
                          echo "</table>";
                        ?>
                    </div>
		</div>
            </div>
            <br><br>
            <br>	        
        </div>