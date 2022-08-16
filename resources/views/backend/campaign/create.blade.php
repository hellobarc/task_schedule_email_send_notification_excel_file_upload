@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Create A New Campaign</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/save-campaign') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="campaign_name">Campaign Name</label>
                                <input type="text" class="form-control" id="campaign_name" name="campaign_name" placeholder="Enter campaign">
                            </div>
                            <div class="form-group">
                                <label for="group_id">Group</label>
                                <select class="form-control custom-select role" name="group_id"  required>
                                    <option value="">Please select a group</option>
                                    @foreach ( $group_info as $info)
                                        <option value="{{ $info->id }}">{{ $info->group_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message_id">Campaign Message</label>
                                {{-- <textarea class="form-control" id="event_email_body" name="event_email_body" placeholder="Write here...."></textarea> --}}
                                <select class="form-control custom-select role" name="message_id"  required>
                                    <option value="">Please select a message</option>
                                    @foreach ( $message_info as $message)
                                        <option value="{{ $message->id }}">{{$message->event_email_subject}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="campaign_date">Campaign Start Date</label>
                                <input type="date" class="form-control" id="campaign_date" name="campaign_date" placeholder="Enter campaign date">
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