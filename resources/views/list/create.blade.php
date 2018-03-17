@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <a href="{{ route('admin.dashboard') }}">Go Back</a>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create List</div>
    
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                         
                        <form action="{{ route('admin.list.store') }}" method="POST">
                                {{ csrf_field() }}
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"> <br>
                            <textarea name="description" id="description" class="form-control"></textarea> <br>
                            <input type="submit" class="btn">
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection