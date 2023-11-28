@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Materi Website</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Type User</th>
                            <th>Tahun</th>
                            <th>Hari</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($trainings as $pda => $training)
                            <tr>
                                <td>{{ $pda + $trainings->firstitem()  }}</td>
                                <td>{{ $training->user->type }}</td>
                                <td>{{ $training->tahun }}</td>
                                <td>{{ $training->hari }}</td>
                                <td>
                                    @if($training->type == 'videos')
                                    <a href="{{ url('admin/website/materi/video/'. $training->id) }}"
                                        class="btn btn-info btn-sm">materi</a>
                                            @else
                                            <a href="{{ url('admin/website/materi/'. $training->id) }}"
                                        class="btn btn-success btn-sm">materi</a>
                                    @endif
                                    
                                
                                    <a href="{{ url('admin/website/'. $training->id .'/edit') }}"
                                        class="btn btn-warning btn-sm">edit</a>

                                    {!! Form::open(['url' => 'admin/website/'. $training->id, 'class' => 'delete',
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
                                <a class="page-link" href="{{ $trainings->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true" class="mdi mdi-chevron-left mr-1"></span> Prev
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $trainings->currentPage() }}</a>
                            </li>
                            @if ($trainings->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $trainings->nextPageUrl() }}" aria-label="Next">
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
                    <a href="{{ url('admin/website/create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
