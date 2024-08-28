@extends('layouts.admin')

@section('title', 'SGE')

@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            SUGERENCIAS DE DESCRIPCIONES DE FALLAS
        </div>
    </div>
    <a onclick="window.close();" class="btn btn-default btn-md active" style="background-color: white">
        <span><i class="far fa-eye-slash"></i></span> Cerrar
    </a>

    <div class="col md 15 col md offset 0 col xs 20">
        <div class="panel panel default">
            <table class="table table striped">
                <tr>
                    <td>
                        <P>
                            SE CONSTATÓ QUE EL MISMO SE ENCUENTRA QUEMADO, AL PARECER POR GOLPE DE TENSIÓN ELÉCTRICA.
                            SE RECOMIENDA SU CAMBIO POR UNO DE SIMILARES CARACTERÍSTICAS.
                            SWITCH 10/100 DE 8 BOCAS, MARCA SUGERIDA TP LINK.
                        </P>
                        <P>
                            SE DETECTÓ QUE LA FALLA ES PROVENIENTE DE LA PLACA LÓGICA, DEL DISCO RIGIDO, QUE SE
                            ENCUENTRA QUEMADA.
                            SE RECOMIENDA SU REEEMPLAZO POR UNO DE SIMILARES CARACTERÍSTICAS.
                            DISCO RÍGIDO CONEXIÓN SATA, INDISTINTA MARCA Y CAPACIDAD.
                            ESTE ÚLTIMO A CONVENIR POR EL USUARIO).
                        </P>
                        <P>
                            SE CONSTATÓ QUE LA FUENTE DE ALIMENTACION ELÉCTRICA NO TIENE LOS VOLTAJES ADECUADOS.
                            SE RECOMIENDA SU REEMPLAZO POR UNA DE SIMILARES CARACTERÍSTICAS.
                            FUENTE DE ALIMENTACIÓN ELÉCTRICA ATX 24 PINES, CON CONEXIONES SATA, 500 W O SUPERIOR.
                        </P>
                        <P>
                            SE CONSTATÓ QUE LA PLACA DE RED ONBOARD SE ENCUENTRA QUEMADA.
                            SE RECOMIENDA SU REEMPLAZO POR UNA DE SIMILARES CARACTERISTICAS.
                            CARACTERÍSTICAS PLACA DE RED 10/100, CONEXION PCI, MARCA TPLINK O ENCORE.
                        </P>
                        <P>
                            SE CONSTATÓ LA FALLA DE FUNCIONAMIENTO EN DISPOSITIVO PERIFERICO.
                            SE RECOMIENDA SU REEMPLAZO POR IMPOSIBILIDAD DE RAPARACIÓN POR ESTAR QUEMADO.
                            EL RECAMBIO DEBERA SER POR DISPOSITIVOS DE SIMILARES CARACTERISTICAS CON CONEXIÓN PS/2 O
                            USB.
                        </P>
                        <P>
                            SE CONSTATÓ LA FALLA DE FUNCIONAMIENTO EN AMBOS DISPOSITIVOS PERIFERICOS.
                            SE RECOMIENDA SU REEMPLAZO POR IMPOSIBILIDAD DE RAPARACIÓN POR ESTAR QUEMADOS.
                            EL RECAMBIO DEBERA SER POR DISPOSITIVOS DE SIMILARES CARACTERISTICAS CON CONEXIÓN PS/2.
                        </P>
                        <P>
                            SE CONSTATÓ QUE LA FUENTE DE ALIMENTACION ELÉCTRICA ESTÁ QUEMADA.
                            ADEMÁS LA PLACA MADRE TIENE VARIOS CAPACITORES HINCHADOS (LO QUE AFECTA EL NORMAL
                            FUNCIONAMIENTO
                            DE LA PC VOLVIENDOLA INESTABLE). EL DISCO RIGIDO NO FUNCIONA DEBIDO A QUE LA PLACA LÓGICA
                            ESTÁ QUEMADA
                            AL IGUAL QUE LAS MEMORIAS RAM.
                            SE RECOMIENDA SU REEMPLAZO TOTAL POR UNA CPU DE SIMILARES CARACTERISTICAS. SE ADJUNTA FICHA
                            TÉCNICA
                            DE COMPUTADORA PERSONAL DE ESCRITORIO.
                        </P>
                        <P>
                            SE CONSTATÓ QUE LA MEMORIA RAM SE ENCUENTRA QUEMADA, AL PARECER POR GOLPE DE TENSIÓN
                            ELÉCTRICA.
                            SE RECOMIENDA SU CAMBIO POR UNO DE SIMILARES CARACTERÍSTICAS.
                            MEMORIA RAM DDR2 DE 512 MB O SUPERIOR, INDISTINTA MARCA.
                        </P>
                        <P>
                            SE CONSTATÓ QUE LA FUENTE DE ALIMENTACION ELÉCTRICA SE ENCUENTRA QUEMADA.
                            SE RECOMIENDA SU REEEMPLAZO POR UNA DE SIMILARES CARACTERÍSTICAS.
                            FUENTE DE ALIMENTACIÓN ELÉCTRICA MARCA LINKWORLD, MODELO LPKS2 200W
                            ATX 24 PINES, CON CONEXIONES SATA, 200 W O SUPERIOR.
                        </P>
                        <P>
                            SE CONSTATÓ QUE LA FUENTE DE ALIMENTACION ELÉCTRICA SE ENCUENTRA QUEMADA.
                            SE RECOMIENDA SU REEEMPLAZO POR UNA DE SIMILARES CARACTERÍSTICAS.
                            FUENTE DE ALIMENTACIÓN ELÉCTRICA ATX 24 PINES, CON CONEXIONES SATA, 500 W.
                        </P>
                        <P>
                            SE CONSTATÓ QUE EL CABLE DE DATOS USB NO FUNCIONA CORRECTAMENTE.
                            SE RECOMIENDA SU REEEMPLAZO POR UNO DE SIMILARES CARACTERÍSTICAS.
                            CABLE USB 2.0 TIPO A/B PARA IMPRESORAS, INDISTINTA MARCA.
                        </P>
                        <P>
                            SE CONSTATÓ QUE EL MISMO TIENE QUEMADA LA FUENTE DE ALIMENTACIÓN, AL PARECER POR GOLPE DE
                            TENSIÓN ELÉCTRICA.
                            SE RECOMIENDA SU CAMBIO.
                        </P>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<hr>
@endsection