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
                    <h2>{{ $formTitle }} Materi UI & UX</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($products))
                    {!! Form::model($products, ['url' => ['admin/ui_ux/materi', $products->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::hidden('id') !!}
                    @else
                    
                    {!! Form::open(['url' => ['admin/ui_ux/materi/add', $id ], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                        {{ Form::label('materi', 'Materi') }}
                        {{ Form::file('materi', ['class' => 'form-control']) }}
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
