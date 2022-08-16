@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Edit Group</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/group-update', $group->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="group_name">Event Eamil Subject</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" value="{{$group->group_name}}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </section>

@endsection