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
                    <h2>{{ $formTitle }} Industrial Class</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($products))
                    {!! Form::model($products, ['url' => ['admin/trainings', $products->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::hidden('id') !!}
                    @else
                    
                    {!! Form::open(['url' => 'admin/trainings/add', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('tahun', 'Tahun') !!}
                        {!! Form::select('tahun', $tahunOptions, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hari', 'Hari') !!}
                        {!! Form::select('hari', [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                        ], null, ['class' => 'form-control']) !!}
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
