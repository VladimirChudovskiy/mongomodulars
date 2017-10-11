{!! Form::open(['route'=>['users.index']]) !!}

    {!! Form::hidden('_method', 'GET') !!}

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('filter__name__eq', null, [
                'class' => 'form-control',
                'placeholder' => 'Name'
            ]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('filter__phone__like', null, [
                'class' => 'form-control',
                'placeholder' => 'Phone'
            ]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('filter__email__like', null, [
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]) !!}
        </div>
    </div>

    <div class="col-md-3">
        {!! Form::submit('Фильтр', ['class'=>'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}