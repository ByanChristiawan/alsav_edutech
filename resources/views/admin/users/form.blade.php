<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('username', 'User Name') !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'User Name']) !!}
    @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>
<!-- password Form Input -->
<div class="form-group @if ($errors->has('type')) has-error @endif">
{!! Form::label('type', 'Type') !!}
{!! Form::select('type', ['admin'=>'Admin', 
                          'siswa'=>'Siswa',
                          'guru'=>'Guru',
                          'kids'=>'Kids',
                          ], 
                          null,
['class' => 'form-control custom-class'])!!}
    @if ($errors->has('type')) <p class="help-block">{{ $errors->first('type') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('class_name')) has-error @endif">
{!! Form::label('class_name', 'Class Name') !!}
{!! Form::select('class_name', ['admin'=>'Admin', 
                          'Training Class'=>'Training Class',
                          'Upskilling Class'=>'Upskilling Class',
                          'Industrial Class'=>'Industrial Class',
                          ], 
                          null,
['class' => 'form-control custom-class'])!!}
    @if ($errors->has('class_name')) <p class="help-block">{{ $errors->first('class_name') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('website')) has-error @endif">
{!! Form::checkbox('akses_materi1', 'website') !!}
{!! Form::label('website', 'Website') !!}
@if ($errors->has('website')) <p class="help-block">{{ $errors->first('website') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('codekidz')) has-error @endif">
{!! Form::checkbox('akses_materi2', 'codekidz') !!}
{!! Form::label('codekidz', 'Codekidz') !!}
@if ($errors->has('codekidz')) <p class="help-block">{{ $errors->first('codekidz') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('mobile')) has-error @endif">
{!! Form::checkbox('akses_materi3', 'mobile') !!}
{!! Form::label('mobile', 'Mobile') !!}
@if ($errors->has('mobile')) <p class="help-block">{{ $errors->first('mobile') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('ui_ux')) has-error @endif">
{!! Form::checkbox('akses_materi4', 'ui_ux') !!}
{!! Form::label('ui_ux', 'UI & UX') !!}
@if ($errors->has('ui_ux')) <p class="help-block">{{ $errors->first('ui_ux') }}</p> @endif
</div>
<div class="form-group @if ($errors->has('ai_softwar')) has-error @endif">
{!! Form::checkbox('akses_materi5', 'ai_softwar') !!}
{!! Form::label('ai_softwar', 'AI Softwar') !!}
@if ($errors->has('ai_softwar')) <p class="help-block">{{ $errors->first('ai_softwar') }}</p> @endif
</div>