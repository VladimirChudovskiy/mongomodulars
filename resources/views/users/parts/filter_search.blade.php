{!! Form::open(['route'=>['users.index']]) !!}

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('f_name_like', null, [
                'class' => 'form-control',
                'placeholder' => 'Name'
            ]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('f_phone_like', null, [
                'class' => 'form-control',
                'placeholder' => 'Phone'
            ]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::text('f_email_like', null, [
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]) !!}
        </div>
    </div>

    <div class="col-md-3">
        {!! Form::submit('Фильтр', ['class'=>'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}