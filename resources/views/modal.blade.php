<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-21">
    <ul class="nav navbar-nav">
        <!-- Trigger the modal with a button -->
        <!-- Modal -->
        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
            id="showmodal-show-{{$equipo->id}}">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                    </div>

                    <div class="modal-body" style="background-color: #f5f5f5">
                        <table class="table table-striped" id="MyTable">

                            <tr>
                                <th>
                                    <p style="font-size: 18px" class="btn btn-danger btn-xs active">ingresado</p>
                                </th>
                                <th>&nbsp;</th>
                                <th>
                                    <h4>El Equipo ingresó y tiene un servicio.</h4>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <p style="font-size: 18px" class="btn btn-warning btn-xs active">parcial</p>
                                </th>
                                <th>&nbsp;</th>
                                <th>
                                    <h4>El Equipo se encuentra en reparación.</h4>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <p style="font-size: 18px" class="btn btn-success btn-xs active">entregar</p>
                                </th>
                                <th>&nbsp;</th>
                                <th>
                                    <h4>El Equipo reparado se encuentra a la espera de ser retirado.</h4>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <p style="font-size: 18px; color: gray;background-color: #85C1E9"
                                        class="btn btn-info btn-xs active">entregado</p>
                                </th>
                                <th>&nbsp;</th>
                                <th>
                                    <h4>El Equipo ha sido entregado.</h4>
                                </th>
                            </tr>
                        </table>
                    </div>

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>