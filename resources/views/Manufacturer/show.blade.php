@extends('layouts.Master-Layout')

@section('title')Show Manufacturer @endsection

@section('styles')
<style>
        input.is-invalid + .invalid-feedback { display: block; }
</style>
@endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">

    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Show Manufacturer</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>

    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('manufacturers.index')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Show Manufacturer</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">Manufacturer Information:</h6>
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                      
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Manufactuer Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('manufacturer_name') is-invalid @enderror" id="manufacturer_name" value="{{ $Manufacturer->manufacturer_name }}" name="manufacturer_name"  />
                                            @error('manufacturer_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Manufactuer Company Address</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('company_address') is-invalid @enderror" id="company_address" value="{{$Manufacturer->company_address}}" name="company_address" />
                                            @error('company_address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Contact Person:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('contact_person') is-invalid @enderror" id="contact_person" value="{{$Manufacturer->contact_person}}" name="contact_person"  />
                                            @error('contact_person')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="" class="form-label small">Email Address:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('email_address') is-invalid @enderror" id="email_address" value="{{$Manufacturer->email_address}}" name="email_address" />
                                            @error('email_address')
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

@endsection