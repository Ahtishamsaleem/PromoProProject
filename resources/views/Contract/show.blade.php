@extends('layouts.Master-Layout')

@section('title')Show Contract @endsection

@section('styles')
<style>
        input.is-invalid + .invalid-feedback { display: block; }
</style>
@endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">

    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Show Contract</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>

    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('contract.index')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Show Contract</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">Contract Information:</h6>
                           
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="customer_id" class="form-label small">Customer Id :</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-select form-select-sm form-single-select defaultselect @error('customer_id') is-invalid @enderror"
                                                        id="customer_id" name="customer_id" size="5"
                                                        data-initialized="false">
                                                            <option value="{{ $contract->customer_id }}" selected>
                                                                {{ $contract->customer_name }}
                                                            </option>
                                                </select>
                                                @error('customer_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>  
                                       
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="contract_name" class="form-label small">Contract Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('contract_name') is-invalid @enderror" id="contract_name" value="{{$contract->contract_name}}" name="contract_name"  />
                                            @error('contract_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="uploaded_on" class="form-label small">Upload On</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="input-icon default-datepicker">
                                                    <input type="text" class="form-control form-control-sm customdate-input form-control-datepicker @error('uploaded_on') is-invalid @enderror" value="{{$contract->uploaded_on}}" id="uploaded_on" name="uploaded_on" placeholder="DD/MM/YY" style="max-width: 200px;" />
                                                </div>
                                            @error('uploaded_on')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="uploaded_by" class="form-label small">Uploaded By</label>
                                            </div>
                                            <div class="col-md-7">
                                                 <input type="text" class="form-control form-control-sm @error('uploaded_by') is-invalid @enderror" id="uploaded_by" value="{{$contract->uploaded_by}}" name="uploaded_by" />
                                            @error('uploaded_by')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="contract_details" class="form-label small">Contract Details</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('contract_details') is-invalid @enderror" id="contract_details" value="{{$contract->contract_details}}" name="contract_details" />
                                            @error('contract_details')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="start_date" class="form-label small">Start Date</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="input-icon default-datepicker">
                                                    <input type="text" class="form-control form-control-sm customdate-input form-control-datepicker @error('start_date') is-invalid @enderror" value="{{$contract->start_date}}" id="start_date" name="start_date" placeholder="DD/MM/YY" style="max-width: 200px;" />
                                                </div>
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="end_date" class="form-label small">End Date</label>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="input-icon default-datepicker">
                                                    <input type="text" class="form-control form-control-sm customdate-input form-control-datepicker @error('end_date') is-invalid @enderror" value="{{$contract->end_date}}" id="end_date" name="end_date" placeholder="DD/MM/YY" style="max-width: 200px;" />
                                                </div>
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="row align-items-center mb-3 mt-4 ">
                                            <h6 class="mb-3 text-capitalize fw-medium">Addtional Information:</h6>
                                            <div class="col-md-12">
                                                <div class="addtional-info pt-3 px-3 rounded bg-white custom-primary-border">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-md-5">
                                                            <label for="BussinessUnitAddedBy" class="form-label small text-capitalize">User added by:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="salesfloadmin" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-md-5">
                                                            <label for="BussinessUnitAddedOn" class="form-label small text-capitalize">User added on:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control form-control-sm default-state custominput-padding" value="{{now()}}" placeholder="" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      

                                    </div>
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
    $('#uploaded_on').daterangepicker({
        autoUpdateInput: true,
        singleDatePicker: true,
        showDropdowns: false,
        autoApply: true,
        maxYear: parseInt(moment().format("YYYY"), 10),
        showButtonPanel: true,
        locale: {
            format: "DD/MM/YYYY",
        },
    });
    $('#start_date').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        showDropdowns: false,
        autoApply: false,
        maxYear: parseInt(moment().format("YYYY"), 10),
        showButtonPanel: false,
        locale: {
            format: "DD/MM/YYYY",
        },
    });
    $('#end_date').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        showDropdowns: false,
        autoApply: false,
        maxYear: parseInt(moment().format("YYYY"), 10),
        showButtonPanel: false,
        locale: {
            format: "DD/MM/YYYY",
        },
    });
</script>
@endsection