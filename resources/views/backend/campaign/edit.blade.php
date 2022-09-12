@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Edit Campaign</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/campaign-update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="campaign_name">Campaign Name</label>
                                <input type="text" class="form-control" id="campaign_name" name="campaign_name" value="{{$campaign->campaign_name}}">
                            </div>
                            <div class="form-group">
                                <label for="campaign_date">Campaign Start Date</label>
                                <input type="date" class="form-control" id="campaign_date" name="campaign_date" value="{{$campaign->campaign_date}}">
                            </div>
                            <div class="form-group">
                                <label for="group_id">Group</label>
                                <select class="form-control custom-select role" name="group_id"  required>
                                    <option value="">Please select a group</option>
                                    @foreach ( $group_info as $info)
                                        <option value="{{ $info->id }}" {{$info->id == $campaign->id? 'selected' : ''}}>{{ $info->group_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message_id">Edit a email subject</label>
                                {{-- <textarea class="form-control" id="event_email_body" name="event_email_body" placeholder="Write here...."></textarea> --}}
                                <input type="text" class="form-control" id="email_subject" name="email_subject" value="{{$campaign->email_subject}}">
                            </div>
                            <div class="form-group">
                                <label for="message_id">Select a email templete</label>
                                {{-- <textarea class="form-control" id="event_email_body" name="event_email_body" placeholder="Write here...."></textarea> --}}
                                <select class="form-control custom-select role" name="message_id"  required>
                                    <option value="">Please select a email templete</option>
                                    <option value="1">Templete 1</option>
                                    <option value="2">Templete 2</option>
                                    <option value="3">Templete 3</option>
                                </select>
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