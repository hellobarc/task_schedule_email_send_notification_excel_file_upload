@extends('backend.layouts.master')

@section('main-content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($users)
                       
                            <table class="table table-bordered table-stirped">
                                <thead>
                                    <tr>
                                        <td>Sl No</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Date of Birth</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->data_of_birth }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                    @else
                        <p class="alert alert-success">Thier have no user in the database</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection