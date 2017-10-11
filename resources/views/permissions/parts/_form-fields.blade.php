<!-- Name Form Input -->
<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('resource')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('resource', 'Resource') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('resource', null, ['class' => 'form-control', 'placeholder' => 'Resource']) !!}
        </div>
        @if ($errors->has('resource')) <p class="help-block">{{ $errors->first('resource') }}</p> @endif
    </div>
</div>

<!-- email Form Input -->
<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('action')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('action', 'Action') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('action', null, ['class' => 'form-control', 'placeholder' => 'Action']) !!}
        </div>
        @if ($errors->has('action')) <p class="help-block">{{ $errors->first('action') }}</p> @endif
    </div>
</div>

<!-- password Form Input -->
<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('mode')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('mode', 'Mode') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('mode', null, ['class' => 'form-control', 'placeholder' => 'Mode']) !!}
        </div>
        @if ($errors->has('mode')) <p class="help-block">{{ $errors->first('mode') }}</p> @endif
    </div>
</div>

<div class="col-md-12">
    <div class="hr-line-dashed"></div>
    <div class="form-group @if ($errors->has('description')) has-error @endif">
        <label class="col-sm-2 control-label">
            {!! Form::label('description', 'Description') !!}
        </label>
        <div class="col-sm-10">
            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
        </div>
        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
    </div>
</div>