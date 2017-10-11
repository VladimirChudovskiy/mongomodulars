<!-- Name Form Input -->
<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('name', 'Name') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    </div>
</div>

<!-- email Form Input -->
<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('email')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('display_name', 'Display name') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Display name']) !!}
        </div>
        @if ($errors->has('display_name')) <p class="help-block">{{ $errors->first('display_name') }}</p> @endif
    </div>
</div>

<!-- Name Form Input -->
<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('description', 'Description') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
        </div>
        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
    </div>
</div>