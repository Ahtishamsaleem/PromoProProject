@extends('layouts.Master-Layout')

@section('title', 'Update User Role')

@section('body')

<main class="main-content">
    <div class="container-fluid topbarCustomPadding">
        <div class="inner-page-content mb-4">
            <div class="main-grid-container bg-white">
                <div class="main-tab-container">
                    <div class="px-3 pt-3">
                        <ul class="nav nav-tabs nav-tabs-default mb-3 border-bottom" id="productTabsContainer"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-3 active" id="user-designation-tab" data-bs-toggle="tab"
                                    data-bs-target="#user-designation-tab-pane" type="button" role="tab"
                                    aria-controls="user-designation-tab-pane" aria-selected="true"> {{ $role->name}}
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="user-designation-tab-pane" role="tabpanel" aria-labelledby="user-designation-tab" tabindex="0">
                            <form action="{{url('roles/'.$role->id.'/give_permission') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- User Designation Grid Content -->
                                <div class="grid-container">
                                    <div class="m-auto" id="UD-accordion-grid" style="max-width: 900px;">
                                        @foreach ($permissions as $pitem)
                                        <div class="accordion">
                                            <div class="accordion-item border border-2 border-primary rounded-4 mb-2 mx-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button userDesig-accordion border-0 rounded-4 shadow-none bg-transparent form-label mb-0 font-size-17 text-primary collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#UD-accordion1"
                                                        aria-expanded="false">{{ $pitem->name }}</button>
                                                </h2>
                                                <div id="UD-accordion1" class="accordion-collapse collapse overflow-hidden"
                                                    data-bs-parent="#accordionExample" style="border-radius: 15px;">
                                                    <div class="accordion-body p-0">
                                                        <div class="table-responsive">
                                                            <table class="table general-Table m-0"
                                                                style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Role Type</th>
                                                                        <!-- <th>View</th>
                                                                        <th>Add</th>
                                                                        <th>Update</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="100">
                                                                            <div class="form-check form-switch p-0 d-flex justify-content-start">
                                                                                <input class="form-check-input font-size-16 custom-icon-margin customswitch-padding m-0"
                                                                                    type="checkbox" role="switch"
                                                                                    name="permission[]"
                                                                                    value="{{ $pitem->id }}"
                                                                                    {{ in_array($pitem->id, $rolePermissions) ? 'checked' : '' }}  />
                                                                            </div>
                                                                        </td>
                                                                        <!-- <td width="100">
                                                                            <div class="form-check form-switch p-0 d-flex justify-content-start">
                                                                                <input class="form-check-input font-size-16 custom-icon-margin customswitch-padding m-0"
                                                                                    type="checkbox" role="switch"
                                                                                    id="channelstatus-switchtoggle2" />
                                                                            </div>
                                                                        </td>
                                                                        <td width="100">
                                                                            <div class="form-check form-switch p-0 d-flex justify-content-start">
                                                                                <input class="form-check-input font-size-16 custom-icon-margin customswitch-padding m-0"
                                                                                    type="checkbox" role="switch"
                                                                                    id="channelstatus-switchtoggle3" />
                                                                            </div>
                                                                        </td> -->
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Till here -->
                                <div class="my-4 d-flex justify-content-center px-md-5 px-3">
                                    <button type="submit" id="update-roles" class="btn btn-sm px-3 btn-primary me-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<script>

 
</script>
@endsection
