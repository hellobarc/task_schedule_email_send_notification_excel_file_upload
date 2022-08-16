@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($groups)
                        {{-- <a href="{{ url('export-user') }}" class="btn btn-info float-right mb-2">Download all users list</a> --}}
                            <table class="table table-bordered table-stirped">
                                <thead>
                                    <tr>
                                        <td>Sl No</td>
                                        <td>Group Name</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $group->group_name }}</td>
                                        <td>
                                            <a href="{{ url('/group-edit', $group->id) }}" class="btn btn-success">Edit</a>

                                            <a href="#deleteModel{{ $group->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModel{{ $group->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are your sure to delete this content!!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>

                                                    <div class="modal-body">
                                                    <form action="{{ url('/group-delete', $group->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                                    </form>
                                                    </div>


                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Cancel</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                    @else
                        <tr>
                            <p class="alert alert-success">Thier have no user in the database</p>
                        </tr>
                        
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection