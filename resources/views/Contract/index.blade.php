@extends('layouts.Master-Layout')

@section('title', 'Show All Contracts')

@section('body')
<main class="main-content">
    <div class="container-fluid topbarCustomPadding">
        <!-- BREADCRUMBS -->
        <nav class="theme-breadcrumbs d-inline-block rounded mt-4 mb-3 bg-transparent p-0" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active"><a href="{{ route('contract.index') }}"><i class="icon-bold-profile-2user1 me-1"></i>Contract</a></li>
            </ol>
        </nav>
        <!-- PAGE TITLE -->
        <div class="page-title d-flex mb-3 justify-content-between">
            <h3 class="title fw-bold m-0">Contracts</h3>
            <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
        </div>
    
        <div class="inner-page-content mb-4">
            <div class="main-grid-container bg-white">
                <div class="main-tab-container">
                    <!-- GRID INNER TAB SELECTOR -->
                    <div class="px-3 pt-3">
                        <ul class="nav nav-tabs nav-tabs-default mb-3 border-bottom" id="productTabsContainer" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="contracts-tab" data-bs-toggle="tab" data-bs-target="#contracts-tab-pane" type="button" role="tab" aria-controls="contracts-tab-pane" aria-selected="true">Contracts</button>
                            </li>
                        </ul>
                    </div>
                    <!-- TAB CONTENTS -->
                    <div class="tab-content" id="myTabContent">
                        <!-- CONTRACTS SECTION -->
                        <div class="tab-pane fade show active" id="contracts-tab-pane" role="tabpanel" aria-labelledby="contracts-tab" tabindex="0">
                            <div class="grid-container">
                                <div class="add-new-sku-buttons px-3 mb-3">
                                    <button data-bs-toggle="modal" data-bs-target="#Import-Dynamic-Classification" class="btn btn-sm px-3 btn-primary me-2" id="add-new-contract">Upload Contract</button>
                                    <button class="btn btn-sm px-3 btn-primary me-2" id="add-new-contract">Download Contract</button>
                                </div>
                                <!-- GRID TABLE -->
                                <table id="contracts-grid" class="table table-striped borderless tableNowrap m-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Contract Name</th>
                                            <th>Uploaded On</th>
                                            <th>Uploaded By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Contract as $contract)
                                            <tr>
                                                <td>{{ $contract->customer->customer_name }}</td>
                                                <td>{{ $contract->contract_name }}</td>
                                                <td>{{ $contract->uploaded_on }}</td>
                                                <td>{{ $contract->uploaded_by }}</td>
                                                <td>
                                                    <!-- <a href="{{ route('contract.show', $contract->id) }}" class="btn btn-sm border-0 p-0"><i class="icon-outline-eye font-size-16 text-primary"></i></a>
                                                    <a href="{{ route('contract.edit', $contract->id) }}" class="btn btn-sm border-0 p-0"><i class="icon-outline-edit-2 text-primary font-size-14 px-1"></i></a> -->
                                                    {!! generateButton(route('contract.show', $contract->id), 'icon-outline-eye font-size-16 text-primary', 'View Contract') !!}
                                                    {!! generateButton(route('contract.edit', $contract->id), 'icon-outline-edit-2 text-primary font-size-14 px-1', 'Edit Contract') !!}
                                                    {!! generateButton(route('contractDownload', $contract->id), 'icon-outline-import-1 me-1', 'Download Contract') !!}
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

    <div class="modal fade customSettingsClass" id="Import-Dynamic-Classification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
            <div class="modal-content bg-white d-flex flex-column align-items-center py-3 rounded-4">
                <i class="icon-outline-import-1 fs-2 text-primary mb-3 SKU-icon"></i>
                <h4 class="fs-5 fw-bold mb-1">Import Data</h4>
                <p class="customFontSize-12px mb-3">Seamlessly amplify your data horizons by
                    importing CSV
                    files effortlessly.</p>
                <div class="px-3 w-100">
                <form action="{{ route('uploadcontract') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="rounded-2 custom-dotted-border py-4 mb-3" style="margin-left: 30px; ">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <div class="w-100" id="upload2" data-state="0"
                                data-ready="false">
                                <div class="modal__content w-100">
                                    <div
                                        class="modal__actions w-100 d-flex flex-column align-items-center">
                                        <i class="icon-outline-document-upload fs-4 mb-1"></i>
                                        <p class="customFontSize-12px m-0">Drag and drop
                                            your file here</p>
                                        <p class="customFontSize-10px m-0 text-body-secondary my-1">
                                            or</p>
                                        <button class="customFontSize-10px text-white border-0 rounded-2 px-4 py-2 bg-primary d-flex align-items-center" type="button" data-action="file"><i class="icon-outline-add me-1"></i>Choose File</button>
                                        <input id="file2" type="file" name="file2" hidden>
                                    </div>
                                    <div
                                        class="modal__actions w-100 flex-column align-items-center">
                                        <div class="d-flex align-items-center mb-2 px-5">
                                            <p class="modal__file text-center customFontSize-12px m-0"
                                                data-file></p>
                                            <i class="icon-outline-close-circle fs-4 ms-2"
                                                role="button" data-action="fileReset"></i>
                                        </div>
                                        <button class="customFontSize-10px text-white border-0 rounded-2 px-4 py-2 bg-primary d-flex align-items-center" type="button" data-action="upload">Upload</button>
                                    </div>
                                </div>
                                <div class="modal__content">
                                    <div
                                        class="modal__actions w-100 d-flex flex-column align-items-center justify-content-center px-5">
                                        <div class="w-100 d-flex align-items-center justify-content-between mb-1">
                                            <p class="customFontSize-12px m-0">Uploading
                                                file...</p>
                                            <p class="customFontSize-12px m-0 fw-bold" data-progress-value>
                                                0%</p>
                                        </div>
                                        <div class="modal__progress-bar w-100 mb-3 mx-5">
                                            <div class="modal__progress-fill"
                                                data-progress-fill></div>
                                        </div>
                                        <button
                                            class="customFontSize-10px text-primary border-0 rounded-2 px-4 py-2 bg-transparent d-flex align-items-center"
                                            type="button" data-action="cancel">Cancel
                                            Upload</button>
                                    </div>
                                </div>
                                <div class="modal__content">
                                    <div
                                        class="modal__actions w-100 d-flex flex-column align-items-center justify-content-center px-5">
                                        <p class="mb-4 customFontSize-12px text-center text-primary">
                                            Something
                                            went wrong! Please try again</p>
                                        <div class="d-flex align-items-center">
                                            <button class="mx-2 customFontSize-10px text-white border-0 rounded-2 px-4 py-2 bg-primary d-flex align-items-center"  type="button" data-action="upload">Retry
                                                Upload</button>
                                            <button class="mx-2 customFontSize-10px text-primary border-0 rounded-2 px-4 py-2 bg-transparent d-flex align-items-center"
                                                type="button" data-action="cancel">Cancel
                                                Upload</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal__content flex-column align-items-center">
                                    <div class="modal__actions w-100 d-flex flex-column align-items-center justify-content-center px-5">
                                        <i class="icon-bold-document-upload text-primary fs-4 my-2"></i>
                                        <p class="customFontSize-10px mb-1 text-body-secondary my-1">
                                            File
                                            Uploaded!</p>
                                        <p class="modal__file text-center customFontSize-12px mb-2" uploaded-file>File Name: <span class="text-center text-black customFontSize-12px" id="fileName2" name="fileName2"> </span></p>
                                    </div>
                                    <button class="customFontSize-10px text-primary border-0 rounded-2 px-4 py-2 bg-transparent d-flex align-items-center"
                                        type="button" data-action="cancel"><i
                                            class="icon-bold-arrow-2 me-1"></i>Change
                                        File</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="fw-bold mb-1 customFontSize-12px">Instructions</p>
                    <p class="customFontSize-10px">Prepare an import-ready CSV (Comma
                        Separated Value) file.
                        Microsoft Excel is a suitable tool for creating and editing CSV
                        files. Format your
                        CSV as a table, ensuring the initial line serves as a header
                        defining your table's
                        fields.</p>
                    <div class="rounded-2 my-2 overflow-hidden customBorderTable cs-scrollbar-style">
                        <table class="display customFontSize-10px" id="importTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Business Unit Code</th>
                                    <th>Category Code</th>
                                    <th>Brand Code</th>
                                    <th>Manufacturer Code</th>
                                    <th>Description</th>
                                    <th>Master SKU Manufacturer Code</th>
                                    <th>Company Code</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>BU1</td>
                                    <td>C1</td>
                                    <td>B1</td>
                                    <td>M0001</td>
                                    <td>M1</td>
                                    <td>M0001</td>
                                    <td>MSCC00057</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>BU2</td>
                                    <td>C2</td>
                                    <td>B2</td>
                                    <td>M0002</td>
                                    <td>Master SKU 2</td>
                                    <td>M0001</td>
                                    <td>MSCC00057</td>
                                    <td>Active</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between w-100">
                        <a class="btn btn-outline-primary customFontSize-12px py-1 px-3 me-2" href="{{ route('downloadSampleConract') }}">Download Sample CSV file</a>
                        <div>
                            <button class="btn customFontSize-12px py-1 px-3 closeDistributorSKU"
                                data-bs-dismiss="modal">Cancel</button>
                            <button data-state class="d-none btn btn-primary customFontSize-12px py-1 px-3 ms-2 closeDistributorSKU" id="saveFileButton2"  type="submit" >Save File</button>
                            <!-- <a data-state class="d-none btn btn-primary customFontSize-12px py-1 px-3 ms-2" id="saveFileButton2" href="{{ route('uploadcontract') }}" >Save File</a> -->

                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $("#contracts-grid").DataTable({
            initComplete: function () {
                $("body").find(".dataTables_scrollBody").addClass("scrollbar");
            },
            scrollX: true,
            deferRender: true,
            scroller: true,
            bPaginate: true,
            dom:
                '<"top row m-0 mb-1 justify-content-between"<"col-sm-12 col-md-auto customVeDropdown ms-1"><"col-sm-12 col-md-auto d-flex"f<"dt-aditional-btns mx-2"B><"refreshIcon">>>rt<"bottom row mx-0 border-top border-dark-subtle d-flex align-items-center justify-content-center py-1"<"col-12 col-sm d-flex align-items-center justify-content-center theme-pagination"p><"col-12 col-sm-auto ms-auto"l>><"clear">',
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

        document.querySelector("div.refreshIcon").innerHTML = '<button class="btn icon-btn btn-sm me-2 btn-outline-primary refreshIconbtn" id="refresh-data-table"><i class="icon-outline-refresh-2"></i></button>';
        document.querySelector("div.customVeDropdown").innerHTML = '<select class="form-select form-select-sm" style="width:230px;"><option class="view-record">View Record</option><option value="edit-record">Edit Record</option></select>';

        const table = new DataTable("#contracts-grid");

        $("#contracts-grid").on("click", "tbody tr", function (e) {
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

        $(function () {
            $.contextMenu({
                selector: "#contracts-grid > tbody > tr",
                events: {
                    show: function () {
                        table
                            .rows(".custom-selected-row")
                            .nodes()
                            .each((row) => row.classList.remove("custom-selected-row"));
                        this.addClass("custom-selected-row");
                        $(".context-menu-item:nth-child(1)").attr("id", "newID");
                    },
                },
                items: {
                    view: { name: "View Record" },
                    edit: { name: "Edit Record" },
                },
            });
        });


        // Perform AJAX request to fetch customer data
        $.ajax({
            url: '{{ route('GetAllCustomer') }}',  // Route to your Laravel controller method
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Assuming data is an array of objects { id: ..., customer_name: ... }
                var select = $('#customer-select');
                select.empty();  // Clear existing options if needed
                
                $.each(data, function(index, customer) {
                    select.append('<option value="' + customer.id + '">' + customer.customer_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching customers:', error);
            }
        });

    });
</script>

<script>
    @if(session('success'))
    Swal.fire({ title:"Success!",text:"{{ session('success') }}.",icon:"success"});
    @endif

    @if (session('error'))
    Swal.fire({ title:"Error!",text:"{{ session('error') }}.",icon:"error"});
    @endif
</script>


   
@endsection
