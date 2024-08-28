<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pdf</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>

<!--ESTILO..............................................................................-->
<style>
    header {
        position: fixed;
        left: 0px;
        top: -110px;
        right: 0px;
        height: 50px;
        background-color: white;
        text-align: center;
    }

    body {
        font-family: sans-serif;
    }

    body tr {
        font-size: 10px;
    }

    body th {
        font-size: 10px;
        text-align: left;
    }

    body td {
        font-size: 10px;
    }

    @page {
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

<body>
    <section>
        <div style="text-align: center">
            <h4>SISTEMA DE GESTION DE EQUIPOS - ESTADISTICAS</h4>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 100px">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="cm" style="text-align: center">
                <h5>SE GENERARON <u>{{ $total }}</u> SERVICIOS ENTRE LAS FECHAS <u>{{ $newDesde }}</u> Y <u>{{ $newHasta }}</h5>
            </div>
        </div>
    </section>

    <div style="text-align: center; font: Garamond; font-size: 10px">
        Tel: 0342 4505100 internos 6228/6229/6236/6235. Cel: 0342 155 900004. E-mail: divinformatica@santafe.gov.ar
    </div>
    <div style="text-align: center; font: Garamond; font-size: 10px">
        BLM Casa de Informática
    </div>
</body>

</html>