@extends('backend.layouts.master')

@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>File Upload</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/emport-user')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Excel File Upload</label>
                                <input type="file" name="file" class="form-control" id="file" aria-describedby="fileHelp" placeholder="Enter your file">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ url('export-user') }}" class="btn btn-info float-right">Download</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection