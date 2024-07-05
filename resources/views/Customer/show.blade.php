@extends('layouts.Master-Layout')

@section('title', 'Show Customer')

@section('styles')
<style>
    input.is-invalid + .invalid-feedback {
        display: block;
    }
</style>
@endsection

@section('body')
<main class="main-content">
    <div class="container-fluid topbarCustomPadding">
        <div class="page-title d-flex mb-3 justify-content-bentween">
            <h3 class="title fw-bold m-0">Show Customer</h3>
            <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
        </div>

        <div class="inner-page-content mb-4">
            <div class="main-grid-container">
                <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                    <a href="{{ route('customers.index') }}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                    <span class="fs-6 text-black fw-normal">Show Customer</span>
                </div>

                <div class="main-form-container px-md-5 px-3">
                    <h6 class="title small fw-bold mb-4 text-uppercase">Customer Information:</h6>
              
                        <div class="row">
                            <div class="col-md-7 col-12">
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_code" class="form-label small">Customer Code:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('customer_code') is-invalid @enderror" id="customer_code" name="customer_code" value="{{ $Customer->customer_code }}" required disabled>
                                        @error('customer_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_name" class="form-label small">Customer Name:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ $Customer->customer_name }}" required>
                                        @error('customer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_company_code" class="form-label small">Customer Company Code:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('customer_company_code') is-invalid @enderror" id="customer_company_code" name="customer_company_code" value="{{$Customer->customer_company_code }}" required>
                                        @error('customer_company_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_status" class="form-label small">Customer Status:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-select form-select-sm @error('customer_status') is-invalid @enderror" id="customer_status" name="customer_status" required>
                                            <option value="{{$Customer->customer_status}}" >{{$Customer->customer_status}}</option>
                                           
                                        </select>
                                        @error('customer_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_channel" class="form-label small">Customer Channel:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-select form-select-sm @error('customer_channel') is-invalid @enderror" id="customer_channel" name="customer_channel" required>
                                            <option value="{{$Customer->customer_channel}}">{{  $Customer->customer_channel }}</option>
                                       
                                        </select>
                                        @error('customer_channel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_sub_channel" class="form-label small">Customer Sub Channel:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-select form-select-sm @error('customer_sub_channel') is-invalid @enderror" id="customer_sub_channel" name="customer_sub_channel" required>
                                            <option value="{{ $Customer->customer_sub_channel }}" > {{ $Customer->customer_sub_channel }}</option>
                                          
                                        </select>
                                        @error('customer_sub_channel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="customer_address" class="form-label small">Customer Address:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('customer_address') is-invalid @enderror" id="customer_address" name="customer_address" value="{{ $Customer->customer_address }}" required>
                                        @error('customer_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="contact_person" class="form-label small">Contact Person:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('contact_person') is-invalid @enderror" id="contact_person" name="contact_person" value="{{ $Customer->contact_person }}">
                                        @error('contact_person')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="contact_number" class="form-label small">Contact Number:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ $Customer->contact_number }}">
                                        @error('contact_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="email" class="form-label small">Email:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ $Customer->email }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="cnic" class="form-label small">CNIC:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm @error('cnic') is-invalid @enderror" id="cnic" name="cnic" value="{{ $Customer->cnic }}">
                                        @error('cnic')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <label for="cnic_expiry" class="form-label small">CNIC Expiry:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="date" class="form-control form-control-sm @error('cnic_expiry') is-invalid @enderror" id="cnic_expiry" name="cnic_expiry" value="{{ $Customer->cnic_expiry }}">
                                        @error('cnic_expiry')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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

@endsection
