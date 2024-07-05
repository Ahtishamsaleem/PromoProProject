@extends('layouts.Master-Layout')

@section('title', 'Show All Customers')

@section('body')
<main class="main-content">
    <div class="container-fluid topbarCustomPadding">
        <!-- BREADCRUMBS -->
        <nav class="theme-breadcrumbs d-inline-block rounded mt-4 mb-3 bg-transparent p-0" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}"><i class="icon-bold-profile-2user1 me-1"></i>Customer</a></li>
            </ol>
        </nav>
        <!-- PAGE TITLE -->
       

        <div class="inner-page-content mb-4">
            <div class="main-grid-container bg-white">
                <div class="main-tab-container">
                    <!-- GRID INNER TAB SELECTOR -->
                    <div class="px-3 pt-3">
                        <ul class="nav nav-tabs nav-tabs-default mb-3 border-bottom" id="customerTabsContainer" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="customers-tab" data-bs-toggle="tab" data-bs-target="#customers-tab-pane" type="button" role="tab" aria-controls="customers-tab-pane" aria-selected="true">Customers</button>
                            </li>
                        </ul>
                    </div>
                    <!-- TAB CONTENTS -->
                    <div class="tab-content" id="myTabContent">
                        <!-- CUSTOMERS SECTION -->
                        <div class="tab-pane fade show active" id="customers-tab-pane" role="tabpanel" aria-labelledby="customers-tab" tabindex="0">
                            <div class="grid-container">
                                <div class="add-new-sku-buttons px-3 mb-3">
									<a type="button" href="{{route('customers.create')}}" class="btn btn-sm px-3 btn-primary me-2" id="add-new-distributor">Add New Customer</a>
								</div>
                                <!-- GRID TABLE -->
                                <table id="customers-grid" class="table table-striped borderless tableNowrap m-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer Code</th>
                                            <th>Customer Name</th>
                                            <th>Company Code</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->customer_code }}</td>
                                            <td>{{ $customer->customer_name }}</td>
                                            <td>{{ $customer->customer_company_code }}</td>
                                            <td>{{ ucfirst($customer->customer_status) }}</td>
                                            <td>
                                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm border-0 p-0" type="button"><i class="icon-outline-eye font-size-16 text-primary"></i></a>
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm border-0 p-0" type="button"> <i class="icon-outline-edit-2 text-primary font-size-14 px-1"></i></a>
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
    $(document).ready(function () {
        // Initialize DataTable
        $('#customers-grid').DataTable({
            initComplete: function () {
                $("body").find(".dataTables_scrollBody").addClass("scrollbar");
            },
            scrollX: true,
            deferRender: true,
            scroller: true,
            bPaginate: true,
            dom:
                '<"top row m-0 mb-1 justify-content-between"<"col-sm-12 col-md-auto customVeDropdown ms-1"><"col-sm-12 col-md-auto d-flex"f<"dt-aditional-btns mx-2 B"><"refreshIcon">>>rt<"bottom row mx-0 border-top border-dark-subtle d-flex align-items-center justify-content-center py-1"<"col-12 col-sm d-flex align-items-center justify-content-center theme-pagination"p><"col-12 col-sm-auto ms-auto"l>><"clear">',
            language: {
                search: "",
                searchPlaceholder: "Search",
                searchBuilder: {
                    title: "Advanced Search",
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

        // Add Refresh and View Record dropdown
        document.querySelector("div.refreshIcon").innerHTML = '<button class="btn icon-btn btn-sm me-2 btn-outline-primary refreshIconbtn" id="refresh-data-table"><i class="icon-outline-refresh-2"></i></button>';
        document.querySelector("div.customVeDropdown").innerHTML = '<select class="form-select form-select-sm" style="width:230px;"><option class="view-record">View Record</option><option value="edit-record">Edit Record</option></select>';

        // Highlight row on click
        const table = new DataTable("#customers-grid");
        $("#customers-grid").on("click", "tbody tr", function (e) {
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

        // Context menu
        $(function () {
            $.contextMenu({
                selector: "#customers-grid > tbody > tr",
                events: {
                    show: function () {
                        table
                            .rows(".custom-selected-row")
                            .nodes()
                            .each((row) => row.classList.remove("custom-selected-row"));
                        this.addClass("custom-selected-row");
                    },
                },
                items: {
                    view: { name: "View Record", callback: function (key, opt) { window.location.href = opt.$trigger.find('a').attr('href'); } },
                    edit: { name: "Edit Record", callback: function (key, opt) { window.location.href = opt.$trigger.find('a').attr('href'); } },
                },
            });
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success"
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: "Error!",
        text: "{{ session('error') }}",
        icon: "error"
    });
</script>
@endif
@endsection
