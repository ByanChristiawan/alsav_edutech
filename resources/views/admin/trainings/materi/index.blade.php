@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Materi </h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Materi</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($materis as $pda => $materi)
                            <tr>
                                <td>{{ $pda + $materis->firstitem()  }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$materi->materi) }}" width="100" height="auto" />
                                </td>
                                <td>
                                    <a href="{{ url('admin/trainings/materi/'. $materi->id .'/edit') }}"
                                        class="btn btn-warning btn-sm">edit</a>

                                    {!! Form::open(['url' => 'admin/trainings/materi/'. $materi->id, 'class' => 'delete',
                                    'style' => 'display:inline-block']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-seperated">
                            <li class="page-item">
                                <a class="page-link" href="{{ $materis->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true" class="mdi mdi-chevron-left mr-1"></span> Prev
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $materis->currentPage() }}</a>
                            </li>
                            @if ($materis->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $materis->nextPageUrl() }}" aria-label="Next">
                                    Next
                                    <span aria-hidden="true" class="mdi mdi-chevron-right ml-1"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            @else
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('admin/trainings/materi/create/' . $id) }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
