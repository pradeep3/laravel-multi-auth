@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="clear-fix"></div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-title">My Collections - {{ Auth::user()->have_role->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warn'))
                        <div class="alert alert-warning">
                            {{ session('warn') }}
                        </div>
                    @endif

                    
                    
                </div>
            </div>
        </div>

    </div>
</div>

    
@endsection
