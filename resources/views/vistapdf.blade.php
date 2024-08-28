<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PDF</title>
</head>

<style type="text/css">
	body th {
		font-size: 12px;
		text-align: left;
	}

	body td {
		font-size: 12px;

	}
</style>

<body>

	<div style="text-align: center">
		<h4>Sistema de Gestión de Equipos - <u>Serie DIP {{ $servicio->aequipo->id }}
			</u> - Reporte de servicio {{ $servicio->id }}</h4>
		<p style="font-size: 10px"><u>Comprobante para el usuario</u></p>
		<p style="font-size: 10px; text-align: left">En la fecha hago entrega del equipo, tomando conocimiento que la
			División Informática Policial, <b>no se responsabiliza</b> por la información que se halle en el mismo,
			siendo responsabilidad del usuario realizar las copias de seguridad que correspondan así como tampoco de de su hardware.</p>
	</div>

	<table>
		<tr>
			<th>Serie
				DIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</th>
			<th>Serie
				Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</th>
			<th>Fecha
				Ingreso&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</th>
			<th>Tipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</th>
			<th>Marca</th>
		</tr>
		<tr>
			<td>{{ $servicio->aequipo->id }}</td>
			<td>{{ $servicio->aequipo->serie_equipo_anterior }}</td>
			<td>
				<!--{{ $servicio ->fecha_ingreso }}-->
				<?php
                	$originalDate = $servicio->fecha_ingreso;
	                $newDate = date("d/m/Y", strtotime($originalDate));
    	    	    ?>
				{{ $newDate }}
			</td>
			<td>{{ $servicio->aequipo->tipo }}</td>
			<td>{{ $servicio->aequipo->marca }}</td>
		</tr>
	</table>

	<br><br><br>
	<table>
		<tr class="vistacss" style="font-family: roman">
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

	<br><br><br>





</body>

</html>