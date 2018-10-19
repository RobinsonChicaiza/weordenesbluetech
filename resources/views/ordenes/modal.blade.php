<div class="modal fade modal-slide-in-ringht" id="modal-delete-{{$dato->Id}}" tabindex="-1" role="dialog" aria-hidden="true">
    {!! Form::open(array('action'=>array('OrdenController@destroy',$dato->Id),'method'=>'delete')) !!}



    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                    </span>
                </button>
                <h4>Eliminar Orden</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar la Orden</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
</div>