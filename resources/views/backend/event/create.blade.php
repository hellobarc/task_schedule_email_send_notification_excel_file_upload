@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                    <div class="card-header">
                        <h2>Create A New Event</h2>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ url('/save_event') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="event_name">Event Name</label>
                                <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Enter event name">
                            </div>
                            <div class="form-group">
                                <label for="event_date">Event Date</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" placeholder="Enter event date">
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