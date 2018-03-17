@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="clear-fix"></div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-title">Dashboard - {{ Auth::user()->have_role->name }}</div>

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

                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>List</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $listings as $list )
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->description }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" onclick="passListId({{ $list->id }})" data-toggle="modal" data-target="#collectionModal">Add</button>
                                    </td>
                                </tr>
                            @endforeach
                            <input type="hidden" name="listId" id="listId">
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Collections</h5>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Group</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $listGroup as $group )
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="collectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add to</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <select name="group_id" id="group_id" class="form-control">
                <option>--SELECT--</option>
                @foreach ( $listGroup as $group )
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="saveCollection()">Save</button>
        </div>
        </div>
    </div>
</div>
    
@endsection

@push('scripts')
<script>
    function saveCollection() {
        var groupId = document.querySelector('#group_id').value;
        var listId = document.querySelector('#listId').value;
        console.log("group", groupId);
        console.log("list", listId);
        var data = {
            'list_id' : listId,
            'group_id' : groupId
        };
        axios.post('{{ route('admin.collection.store') }}', data)
            .then( res => {
                window.location.href = '{{ route('admin.dashboard') }}';
                // $("#collectionModal").modal('hide');
            })
            .catch( e => {
                console.log("Something wrong", e);
            });
    }
    function passListId(listId) {
        document.querySelector("#listId").value = listId;
    }
</script>
@endpush