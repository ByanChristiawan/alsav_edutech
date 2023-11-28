@extends('admin.layout')

@section('content')

@php
$formTitle = !empty($products) ? 'Update' : 'New'
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>{{ $formTitle }} Materi </h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($products))
                    {!! Form::model($products, ['url' => ['admin/website', $products->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::hidden('id') !!} 
                    @else
                    
                    {!! Form::open(['url' => 'admin/website/add', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('tahun', 'Tahun') !!}
                        {!! Form::select('tahun', $tahunOptions, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('type', 'Type') !!}
                        {!! Form::select('type', ['images'=>'images', 'videos'=>'videos'], null, ['class' => 'form-control custom-class'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hari', 'Hari') !!}
                        {!! Form::text('hari', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Save</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
