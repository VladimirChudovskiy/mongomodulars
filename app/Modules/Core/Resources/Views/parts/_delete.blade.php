{!! Form::open(['route'=>[$route, $id], ]) !!}
    {{ method_field('DELETE') }}
    {{ csrf_field() }}

{!! Form::submit('Remove', ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}