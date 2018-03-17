@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="clear-fix"></div>
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

        @foreach ( $groups as $group )
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{ $group->name }}</div>
                        <ul class="list-group">
                            @foreach ( $collections as $coll )
                                @if ($group->id == $coll->group_id )
                                    <li class="list-group-item">{{ $coll->listings[0]->name }}</li>
                                @endif
                            @endforeach
                        </ul>    
                    </div>
                </div>
            </div>
        @endforeach
        

    </div>
</div>

    
@endsection
