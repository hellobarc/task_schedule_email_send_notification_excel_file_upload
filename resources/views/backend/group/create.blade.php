@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Create A New Group</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/save-group') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="group_name">Group Name</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter a group name">
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </section>

@endsection