<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pdf</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>

<!--ESTILO..............................................................................-->
<style>

   header { position: fixed;
     left: 0px;
     top: -110px;
     right: 0px;
     height: 50px;
     background-color: white;
     text-align: center;
   }

   body{
     font-family: sans-serif;
   }

   body tr{
    font-size: 10px;
   }

    body th{
    font-size: 10px;
    text-align: left;
    }
    body td{
    font-size: 10px;
    }

   @page
   {
   /*margin: 95px 70px;*/
   margin: -10px 70px;
   margin-bottom: 0px;
   }

   footer {
     position: fixed;
     left: 0px;
     bottom: -40px;
     right: 0px;
     height: 40px;
     border-bottom: 2px solid #ddd;

   }
   footer .page:after {
     content: counter(page);
   }
   footer table {
     width: 100%;
   }
   footer p {
     text-align: center;
   }
   footer .izq {
     text-align: center;
   }
</style>
<!--ESTILO...............................................................................-->

<!--HEADER...............................................................................-->
<!--
<header>
    <div>
        <p><img src="images/pdi0.png"></p>
    </div>    
</header>
-->
<!--BODY.................................................................................-->
<body>
<!--...............................INGRESADO Y ENTREGAR..................................-->

    @if ($servicio -> estado_servicio == "INGRESADO" || $servicio -> estado_servicio == "ENTREGAR")
        <!--INGRESADO Y ENTREGAR Parte de arriba-->
        <section>
            <div style="text-align: center">
                <h5>Sistema de Gestión de Equipos - Reporte de servicio {{ $servicio->id }} - 
                    <u>Serie DIP {{ $servicio->aequipo->id }}</u></h5>
                <p style="font-size: 10px"><u>Comprobante para el usuario</u></p>
                <p style="font-size: 10px; text-align: left">En la fecha hago entrega del equipo, tomando conocimiento que esta casa de informática, <b>no se responsabiliza</b> por la información que se halle en el mismo, siendo responsabilidad del usuario realizar las copias de seguridad que correspondan así como tampoco de su hardware.</p>
            </div>   

            <table>  
                <tr class="vistacss">
                    <th width="110">Serie DIP</th>
                    <th width="110">Serie Equipo</th>
                    <th width="110">Fecha ingreso</th>
                    <th width="110">Tipo</th>
                    <th width="110">Marca</th>
                </tr>     
                <tr>
                    <td width="110">{{ $servicio->aequipo->id }}</td>
                    <td width="110">{{ $servicio->aequipo->serie_equipo_anterior }}</td>
                    <td width="110">
                        <!--{{ $servicio ->fecha_ingreso }}-->
                        <?php
                            $originalDate = $servicio->fecha_ingreso;
                            $newDate = date("d/m/Y", strtotime($originalDate));
                        ?>
                        {{ $newDate }}
                    </td>
                    <td width="110">{{ $servicio->aequipo->tipo }}</td> 
                    <td width="110">{{ $servicio->aequipo->marca }}</td>   
                </tr>
            </table>

            <table>        
                <tr>
                    <th>Unidad de destino</th>
                    <th>Subunidad de destino</th>
                    <th>Telefono</th>             
                </tr>
                <tr>
                    <td width="148">{{ $servicio->aequipo->unidad_destino }}</td>
                    <td width="148">{{ $servicio->aequipo->subunidad_destino }}</td> 
                    <td width="100">{{ $servicio->aequipo->telefono }}</td>  
                </tr>
            </table>
            <table>
                <tr>
                    <th class="text-left" width="148">Accesorios</th>
                </tr> 
                <tr>              
                    <td align="justify" width="148">{{ $servicio->accesorios }}</td>
                </tr>
            </table>
            <table>        
                <tr>
                    <th class="text-left" width="148">Personal que entrega equipo</th>
                    <th class="text-left" width="148">Personal DIP que recibe equipo</th>
                </tr>
                <tr>

                    <td align="left" width="300">{{ $servicio->personal_entrega }}
                    </td>
                    <td align="left" width="148" style="text-transform: uppercase">
                        {{ $servicio->personal_div_servicio }}
                    </td> 
                </tr>
            </table>
            <table> 
                <tr>
                    <th class="text-left" width="110">Motivo de ingreso</th>
                </tr>         
                <tr>
                    <td align="justify" width="500">{{ $servicio->motivo_ingreso }}</td>
                </tr>
            </table>
            <div style="text-align: center">
                <p><img src="images/sellopdinuevo.png"></p>
            </div>
        </section>
    
        <div style="text-align: center; font: Garamond; font-size: 10px">
            Tel: 0342 4505100 internos 6228/6229/6236/6235. Cel: 0342 155 900004. E-mail: divinformatica@santafe.gov.ar
        </div>
        <div style="text-align: center; font: Garamond; font-size: 10px">                    
            BLM Casa de Informática
        </div>
<p style="text-align: center">__________________________________________________________________________________________
</p>
        <!--INGRESADO Y ENTREGAR Parte de abajo-->
        <section>
            <div style="text-align: center">
                <h5>Sistema de Gestión de Equipos - Reporte de servicio {{ $servicio->id }} - 
                    <u>Serie DIP {{ $servicio->aequipo->id }}</u></h5>
                <p style="font-size: 10px"><u>Comprobante para el personal de la DIP</u></p>
                <p style="font-size: 10px; text-align: left">En la fecha hago entrega del equipo, tomando conocimiento que esta casa de informática, <b>no se responsabiliza</b> por la información que se halle en el mismo, siendo responsabilidad del usuario realizar las copias de seguridad que correspondan así como tampoco de su hardware.</p>
            </div>   
            <table>  
                <tr class="vistacss">
                    <th class="text-left" width="110">Serie DIP</th>
                    <th class="text-left" width="110">Serie Equipo</th>
                    <th class="text-left" width="110">Fecha ingreso</th>
                    <th class="text-left" width="110">Tipo</th>
                   <th class="text-left" width="110">Marca</th>
                </tr>     
                <tr>
                    <td align="left" width="110">{{ $servicio->aequipo->id }}</td>
                    <td align="left" width="110">{{ $servicio->aequipo->serie_equipo_anterior }}</td>
                    <td align="left" width="110">
                        <?php
                            $originalDate = $servicio->fecha_ingreso;
                            $newDate = date("d/m/Y", strtotime($originalDate));
                        ?>
                        {{ $newDate }}
                    </td>         
                    <td align="left" width="110">{{ $servicio->aequipo->tipo }}</td> 
                    <td align="left" width="110">{{ $servicio->aequipo->marca }}</td>   
                </tr>
            </table>
            <table>        
                <tr>
                    <th class="text-left" width="200">Unidad de destino</th>
                    <th class="text-left" width="160">Subunidad de destino</th>
                    <th class="text-left" width="100">Telefono</th>                
                </tr>
                <tr>
                    <td align="left" width="148">{{ $servicio->aequipo->unidad_destino }}</td>
                    <td align="left" width="148">{{ $servicio->aequipo->subunidad_destino }}</td> 
                    <td align="left" width="100">{{ $servicio->aequipo->telefono }}</td>  
                </tr>
            </table>
            <table>
                <tr>
                    <th class="text-left" width="148">Accesorios</th>
                </tr> 
                <tr>              
                    <td align="justify" width="148">{{ $servicio->accesorios }}</td>
                </tr>
            </table>
            <table>        
                <tr>
                    <th class="text-left" width="148">Personal que entrega equipo</th>
                    <th class="text-left" width="148">Personal DIP que recibe equipo</th>
                </tr>
                <tr>
                    <td align="left" width="300">{{ $servicio->personal_entrega }}
                    </td>
                    <td align="left" width="148" style="text-transform: uppercase">
                        {{ $servicio->personal_div_servicio }}
                    </td> 
                </tr>
            </table>
            <table> 
                <tr>
                    <th class="text-left" width="110">Motivo de ingreso</th>
                </tr>     
                <tr>
                    <td align="justify" width="500">{{ $servicio->motivo_ingreso }}</td>
                </tr>
            </table>
            <br>
            <div style="text-align: center">
                <h6 style="text-align: left; height: -10px">Firma..............................................</h6>
                <h6 style="text-align: left">{{ $servicio->personal_entrega }}</h6>
            </div>
        </section>
        <div style="text-align: center; font: Garamond; font-size: 10px">
            Tel: 0342 4505100 internos 6228/6229/6236/6235. Cel: 0342 155 900004. E-mail: divinformatica@santafe.gov.ar
        </div>
        <div style="text-align: center; font: Garamond; font-size: 10px">                    
            BLM Casa de Informática
        </div>
    @else
<!--..................................PARCIAL (FICHA TECNICA)...........................-->

        @if($servicio -> estado_servicio == "PARCIAL")
            <!--PARCIAL UNA HOJA A4 ENTERA-->
            <section>
                <div style="text-align: center">
                    <h4 style="font-family: Garamond; font-size: 18px">Ficha Técnica - 
                        <u>Serie DIP {{ $servicio->aequipo->id }}
                </u></h4>
                    <p style="font-size: 10px"><u>Comprobante para el usuario y para archivo de la DIP (dos copias)</u></p>
                    <h6><u>¡RETIRAR EL EQUIPO UNICAMENTE CON ESTE COMPROBANTE!</u></h6>
                </div>   
                <table>  
                    <tr class="vistacss">
                        <th class="text-left" width="110">Serie DIP</th>
                        <th class="text-left" width="110">Serie Equipo</th>
                        <th class="text-left" width="110">Fecha ingreso</th>
                        <th class="text-left" width="110">Tipo</th>
                        <th class="text-left" width="110">Marca</th>
                    </tr>     
                    <tr>
                        <!--<td align="center" width="10">{{ $servicio -> equipo_id }}</td>-->
                        <td align="left" width="110">{{ $servicio->aequipo->id }}</td>
                        <td align="left" width="110">{{ $servicio->aequipo->serie_equipo_anterior }}</td>
                        <td align="left" width="110">
                        <!--{{ $servicio ->fecha_ingreso }}-->
                        <?php
                            $originalDate = $servicio->fecha_ingreso;
                            $newDate = date("d/m/Y", strtotime($originalDate));
                        ?>
                        {{ $newDate }}
                        </td>         
                        <td align="left" width="110">{{ $servicio->aequipo->tipo }}</td> 
                        <td align="left" width="110">{{ $servicio->aequipo->marca }}</td>   
                    </tr>
                </table>
                <table>        
                    <tr>
                        <th class="text-left" width="200">Unidad de destino</th>
                        <th class="text-left" width="160">Subunidad de destino</th>
                        <th class="text-left" width="100">Telefono</th>
                        
                    </tr>
                    <tr>
                        <td align="left" width="148">{{ $servicio->aequipo->unidad_destino }}</td>
                        <td align="left" width="148">{{ $servicio->aequipo->subunidad_destino }}</td> 
                        <td align="left" width="100">{{ $servicio->aequipo->telefono }}</td>  
                    </tr>
                </table>
                <table>
                    <tr>
                        <th class="text-left" width="148">Accesorios</th>
                    </tr> 
                    <tr>              
                        <td align="justify" width="148">{{ $servicio->accesorios }}</td>
                    </tr>
                </table>
                <table> 
                    <tr>
                        <th class="text-left" width="110">Motivo de ingreso</th>
                    </tr> 
                
                    <tr>
                        <td align="justify" width="500">{{ $servicio->motivo_ingreso }}</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th class="text-left" width="110">Descripción de la falla</th>
                    </tr> 
                    <tr>
                        <td align="justify" width="110">{{ $servicio->detalle_reparacion }}</td> 
                    </tr>
                </table>
                <div style="text-align: center">
                    <!-- <p><img src="images/sello_tecnicoaic.png"></p> -->
                </div>
                <div style="text-align: center; font: Garamond; font-size: 10px">
                    Tel: 0342 4505100 internos 6228/6229/6236/6235. Cel: 0342 155 900004. E-mail: divinformatica@santafe.gov.ar
                </div>
                <div style="text-align: center; font: Garamond; font-size: 10px">
                    BLM Casa de Informática
                </div>
            </section>

        @else
<!--.................................ENTREGADO...........................................-->

        @if($servicio -> estado_servicio == "ENTREGADO")
            <section>
                <div style="text-align: center">
                <h5>Sistema de Gestión de Equipos - Reporte de servicio {{ $servicio->id }} - 
                    <u>Serie DIP {{ $servicio->aequipo->id }}</u></h5>
                    <p style="font-size: 10px"><u>Comprobante para el usuario y para archivo de la DIP (dos copias)</u></p>
                </div>   
                <table>  
                    <tr class="vistacss">
                        <th class="text-left" width="110">Serie DIP</th>
                        <th class="text-left" width="110">Serie Equipo</th>
                        <th class="text-left" width="110">Fecha ingreso</th>
                        <th class="text-left" width="110">Tipo</th>
                        <th class="text-left" width="110">Marca</th>
                    </tr>     
                    <tr>
                        <!--<td align="center" width="10">{{ $servicio -> equipo_id }}</td>-->
                        <td align="left" width="110">{{ $servicio->aequipo->id }}</td>
                        <td align="left" width="110">{{ $servicio->aequipo->serie_equipo_anterior }}</td>
                        <td align="left" width="110">
                            <!--{{ $servicio ->fecha_ingreso }}-->
                            <?php
                                $originalDate = $servicio->fecha_ingreso;
                                $newDate = date("d/m/Y", strtotime($originalDate));
                            ?>
                            {{ $newDate }}                            
                        </td>         
                        <td align="left" width="110">{{ $servicio->aequipo->tipo }}</td> 
                        <td align="left" width="110">{{ $servicio->aequipo->marca }}</td>   
                    </tr>
                </table>
                <table>        
                    <tr>
                        <th class="text-left" width="200">Unidad de destino</th>
                        <th class="text-left" width="160">Subunidad de destino</th>
                        <th class="text-left" width="100">Telefono</th>
                        
                    </tr>
                    <tr>
                        <td align="left" width="148">{{ $servicio->aequipo->unidad_destino }}</td>
                        <td align="left" width="148">{{ $servicio->aequipo->subunidad_destino }}</td> 
                        <td align="left" width="100">{{ $servicio->aequipo->telefono }}</td>  
                    </tr>
                </table>
                <table>
                    <tr>
                        <th class="text-left" width="148">Accesorios</th>
                    </tr> 
                    <tr>              
                        <td align="justify" width="148">{{ $servicio->accesorios }}</td>
                    </tr>
                </table>
                <table>        
                    <tr>
                        <th class="text-left" width="148">Personal que entrega equipo</th>
                        <th class="text-left" width="148">Personal DIP que recibe equipo</th>
                    </tr>
                    <tr>
                    <td align="left" width="300">{{ $servicio->personal_entrega }}
                    </td>
                        <td align="left" width="148" style="text-transform: uppercase">
                            {{ $servicio->personal_div_servicio }}</td> 
                    </tr>
                </table>
                <table> 
                    <tr>
                        <th class="text-left" width="110">Motivo de ingreso</th>
                    </tr> 
                
                    <tr>
                        <td align="justify" width="500">{{ $servicio->motivo_ingreso }}</td>
                    </tr>
                </table>
                <table> 
                    <tr>
                        <th class="text-left" width="110">Observaciones</th>
                    </tr> 
                
                    <tr>
                        <td align="justify" width="500">{{ $servicio->observacion_retira }}</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th class="text-left" width="110">Detalle de reparación</th>
                    </tr> 
                    <tr>
                        <td align="justify" width="500">{{ $servicio->detalle_reparacion }}</td> 
                    </tr>
                </table>
                <table>
                    <tr>
                        <th class="text-left" width="150">Fecha de devolución</th>
                        <th class="text-left" width="200">Personal que retira equipo</th>
                        <th class="text-left" width="200">Personal DIP que entrega equipo</th>
                    </tr> 
                    <tr> 
                        <td align="left" width="110">
                        	<!--{{ $servicio->fecha_devolucion }}-->
                        <?php
                            $originalDate = $servicio->fecha_devolucion;
                            $newDate = date("d/m/Y", strtotime($originalDate));
                        ?>
                        {{ $newDate }}                        	
                        </td>
                        <td align="left" width="150">{{ $servicio->personal_retira }}</td> 
                        <td align="left" width="200" style="text-transform: uppercase">
                            {{ $servicio->personal_div_entrega }}</td> 
                    </tr>
                </table>
                <br><br><br>
                <div style="text-align: center">
                    <p><img src="images/sellopdi_entrega.png"></p>
                </div>
            </section>
            <div style="text-align: center; font: Garamond; font-size: 10px">
                Tel: 0342 4505100 internos 6228/6229/6236/6235. Cel: 0342 155 900004. E-mail: divinformatica@santafe.gov.ar
            </div>
            <div style="text-align: center; font: Garamond; font-size: 10px">
                BLM Casa de Informática
            </div>
        @else
        @endif
    @endif
    @endif
        <!--<p>Personal DIP que entrega: {{ $servicio -> personal_div_servicio }}</p>-->
        <!--<p>Estado:                {{ $servicio -> estado_servicio       }}</p>-->
        <!--<p>Informe creado por:    {{ Auth::user()->name }}</p>-->
</body>
</html>






