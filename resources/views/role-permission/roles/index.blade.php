@extends('layouts.Master-Layout')

@section('title','Roles')

@section('body')
<main class="main-content">
    <div class="container-fluid topbarCustomPadding">
        <!-- BREADCRUMBS -->
        <nav class="theme-breadcrumbs d-inline-block rounded mt-4 mb-3 bg-transparent p-0" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active"><a href="{{route('roles.index')}}"><i
                            class="icon-bold-profile-2user1 me-1"></i>Users Role</a></li>
            </ol>
        </nav>
        <!-- PAGE TITLE -->
        <div class="page-title d-flex mb-3 justify-content-bentween">
            <h3 class="title fw-bold m-0">User Roles</h3>
            <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto"
                id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
        </div>

        <div class="inner-page-content mb-4">
            <div class="main-grid-container bg-white">
                <div class="main-tab-container">
                    <!-- GRID INNER TAB SELECTER -->
                    <div class="px-3 pt-3">
                        <ul class="nav nav-tabs nav-tabs-default mb-3 border-bottom" id="productTabsContainer"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="distributors-tab" data-bs-toggle="tab"
                                    data-bs-target="#distributors-tab-pane" type="button" role="tab"
                                    aria-controls="distributors-tab-pane" aria-selected="true">Users
                                </button>
                            </li>

                        </ul>
                    </div>
                    <!-- TAB CONTENTS -->
                    <div class="tab-content" id="myTabContent">
                        <!-- DISTRIBUTORS SECTION -->
                        <div class="tab-pane fade show active" id="distributors-tab-pane" role="tabpanel"
                            aria-labelledby="distributors-tab" tabindex="0">
                            <div class="grid-container">
                                <div class="add-new-sku-buttons px-3 mb-3">
                                        <a href="{{url('roles/create')}}" class="btn btn-sm px-3 btn-primary me-2">Add Roles</a>
                                </div>
                                <!-- GRID TABLE -->
                                <table id="paymentcollection-grid"
                                    class="table table-striped borderless tableNowrap m-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <a href="{{url('roles/'.$item->id.'/add_permission' )}}"
                                                    class="btn-flat action-report-btn edit-record-btn p-0 mx-2 addUrl tooltipped-top"
                                                    title="Edit">Add / Edit Role Permission</a>
                                                @if(auth()->user()->hasRole('Admin'))
                                                <a href="{{url('roles/'.$item->id.'/edit' )}}"
                                                    class="btn-flat action-report-btn edit-record-btn p-0 mx-2 addUrl tooltipped-top"><i
                                                        class="fa-solid fa-pen-to-square fa-1x display-flex align-items-center justify-content-center"></i>Edit</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
$(document).ready(function() {
    $("#paymentcollection-grid").DataTable({
        initComplete: function() {
            $("body").find(".dataTables_scrollBody").addClass("scrollbar");
        },
        scrollX: true,
        // scrollY: 325,
        deferRender: true,
        scroller: true,
        bPaginate: true,
        dom: '<"top row m-0 mb-1 justify-content-between"<"col-sm-12 col-md-auto customVeDropdown ms-1"><"col-sm-12 col-md-auto d-flex"f<"dt-aditional-btns mx-2"B><"refreshIcon">>>rt<"bottom row mx-0 border-top border-dark-subtle d-flex align-items-center justify-content-center py-1"<"col-12 col-sm d-flex align-items-center justify-content-center theme-pagination"p><"col-12 col-sm-auto ms-auto"l>><"clear">',
        language: {
            search: "",
            searchPlaceholder: "Search",
            searchBuilder: {
                title: "Advance Search",
            },
            paginate: {
                next: '<i class="nextpage-iconarrow-left pagination-arrows"></i>',
                previous: '<i class="prevpage-iconarrow-left pagination-arrows"></i>',
                sLast: '<i class="lastpage-iconarrow-left pagination-arrows"></i>',
                sFirst: '<i class="firstpage-iconarrow-left pagination-arrows"></i>',
            },
            lengthMenu: '<select class="form-select form-select-sm bg-primary text-white"><option value="10">10</option><option value="20">20</option><option value="30">30</option></select>',
        },
        buttons: ["searchBuilder"],
        pagingType: "full_numbers",
    });
    document.querySelector("div.refreshIcon").innerHTML =
        '<button class="btn icon-btn btn-sm me-2 btn-outline-primary refreshIconbtn" id="refresh-data-table"><i class="icon-outline-refresh-2"></i></button>';
    document.querySelector("div.customVeDropdown").innerHTML =
        '<select class="form-select form-select-sm" style="width:230px;"><option class="view-record">View Record</option><option value="edit-record">Edit Record</option></select>';

    const table = new DataTable("#paymentcollection-grid");
    $("#paymentcollection-grid").on("click", "tbody tr", function(e) {
        let classList = e.currentTarget.classList;
        if (classList.contains("custom-selected-row")) {
            classList.remove("custom-selected-row");
        } else {
            table
                .rows(".custom-selected-row")
                .nodes()
                .each((row) => row.classList.remove("custom-selected-row"));
            classList.add("custom-selected-row");
        }
    });
    $(function() {
        $.contextMenu({
            selector: "#paymentcollection-grid > tbody > tr",
            events: {
                show: function() {
                    table
                        .rows(".custom-selected-row")
                        .nodes()
                        .each((row) => row.classList.remove("custom-selected-row"));
                    this.addClass("custom-selected-row");
                    $(".context-menu-item:nth-child(1)").attr("id", "newID");
                },
            },
            items: {
                view: {
                    name: "View Record"
                },
                edit: {
                    name: "Edit Record"
                },
            },
        });
    });
});
</script>
@endsection