@extends('layouts.Master-Layout')

@section('title','Edit Role')

@section('body')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Roles</h4>
                        <a href="{{url('roles')}}" class="btn btn-sm px-3 btn-primary me-2">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{url('roles/'.$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" class="form-control" value="{{$role->name}}" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm px-3 btn-primary me-2">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
