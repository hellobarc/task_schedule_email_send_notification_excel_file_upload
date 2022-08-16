@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Edit Event</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/event-email-update', $eventEmail->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="event_email_subject">Event Eamil Subject</label>
                                <input type="text" class="form-control" id="event_email_subject" name="event_email_subject" value="{{$eventEmail->event_email_subject}}">
                            </div>
                            <div class="form-group">
                                <label for="event_email_body">Event Eamil Body</label>
                                <textarea class="form-control" id="event_email_body" name="event_email_body">{{$eventEmail->event_email_body}}</textarea>
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