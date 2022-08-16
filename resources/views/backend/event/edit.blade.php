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
                        <form action="{{ url('/event-update', $event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="event_name">Event Name</label>
                                <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}">
                            </div>
                            <div class="form-group">
                                <label for="event_date">Event Date</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $event->event_date }}">
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