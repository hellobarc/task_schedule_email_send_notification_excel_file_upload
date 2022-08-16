@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Create A New Email Templete</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/save-event-email') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="event_email_subject">Event Eamil Subject</label>
                                <input type="text" class="form-control" id="event_email_subject" name="event_email_subject" placeholder="Enter eamil subject">
                            </div>
                            <div class="form-group">
                                <label for="event_email_body">Event Eamil Body</label>
                                <textarea class="form-control" id="event_email_body" name="event_email_body" placeholder="Write here...."></textarea>
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