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
                     {{-- {{ dd ($group_name)}} --}}
                        <form action="{{ url('/emport-user')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Groups<span class="required">*</span></label>
                                {{-- <input type="text" class="form-control" name="live_session_topics" required> --}}
                                <select class="form-control custom-select role" name="group_info"  required>
                                    <option value="">Please select a group</option>
                                    @foreach ( $group_info as $info)
                                        <option value="{{ $info->id }}">{{ $info->group_name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Excel File Upload</label>
                                <input type="file" name="file" class="form-control" id="file" aria-describedby="fileHelp" placeholder="Enter your file">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ asset('download_file/upload_data_here.xlsx') }}" class="btn btn-info float-right">Upload your data here</a>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection