{!! Form::open(['route'=>['locales.index']]) !!}

    {!! Form::hidden('_method', 'GET') !!}

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::text('filter__name__like', null, [
                'class' => 'form-control',
                'placeholder' => 'Name'
            ]) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::text('filter__abbr__like', null, [
                'class' => 'form-control',
                'placeholder' => 'Abbr'
            ]) !!}
        </div>
    </div>

    <div class="col-md-4">
        {!! Form::submit('Фильтр', ['class'=>'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}