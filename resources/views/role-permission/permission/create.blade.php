@extends('layouts.Master-Layout')

@section('title','Create Roles')


@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Permissions</h4>
                            <a href="{{url('permissions')}}" class="btn btn-sm px-3 btn-primary me-2">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{url('permissions')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="">Permission Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm px-3 btn-primary me-2">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
