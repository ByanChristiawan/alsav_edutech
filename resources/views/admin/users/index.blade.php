@extends('admin.layout')

@section('content')
<div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Users</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Class Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                                @forelse ($users as $pda => $user)
                                    <tr>    
                                        <td>{{ $pda + $users->firstitem()  }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->class_name }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/users/'. $user->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                                {!! Form::open(['url' => 'admin/users/'. $user->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
							<ul class="pagination pagination-seperated">
								<li class="page-item">
									<a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
										<span aria-hidden="true" class="mdi mdi-chevron-left mr-1"></span> Prev
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item active">
									<a class="page-link" href="#">{{ $users->currentPage() }}</a>
								</li>
                                @if ($users->hasMorePages())
								<li class="page-item">
									<a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
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
                            <a href="{{ url('admin/users/create') }}" class="btn btn-primary">Add New</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection