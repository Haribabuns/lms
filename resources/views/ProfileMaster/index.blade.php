    @extends('layouts.default')
    @section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>LearningMinds Profile</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('profile.create') }}"> Create New Profile</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Profile ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Created by</th>
                <th>Created Date</th>
                <th>Updated by</th>
                <th>Updated Date</th>
                <th>Date Of Birth</th>
                <th>Gender</th>
                <th>Profile Picture</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>City Code</th>
                <th width="280px">Action</th>
            </tr>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name}}</td>
            <td>{{ $product->details}}</td>
            <td>
                <a class="btn btn-info" href="{{ route('productCRUD.show',$product->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('productCRUD.edit',$product->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['productCRUD.destroy', $product->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </table>
        {!! $products->render() !!}
    @endsection