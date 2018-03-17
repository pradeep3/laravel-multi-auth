@extends('layouts.app')

@section('content')
<div class="container">
    
    <button type="button" class="btn btn-primary">
        Search Results <span class="badge badge-light">{{ $listgroup->total() }}</span>
    </button>
    <br><hr>
    @foreach ( $listgroup as $list)
        {{ $list->name }} <hr> 
    @endforeach
</div>
@endsection