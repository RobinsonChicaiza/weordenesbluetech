{!! Form::open(array('url'=>'categorias','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">    
    <div class="input-group">        
        <input type="text" class="form-control" id="searchText" placeholder="Buscar.." name="searchText" value="{{ $searchText }}">
        <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>
{!! Form::close() !!}