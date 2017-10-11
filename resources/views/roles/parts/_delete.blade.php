{!! Form::open([
            'method' => 'DELETE',
            'route' => ['users.destroy', $user->id]
        ]) !!}

{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}