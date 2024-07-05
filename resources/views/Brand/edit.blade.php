@extends('layouts.Master-Layout')

@section('title')Show Brand @endsection

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
                <h3 class="title fw-bold m-0">Show Brand</h3>
                <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto"
                        id="showhidebtn">Edit All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
            </div>

            <div class="inner-page-content mb-4">
                <div class="main-grid-container ">
                    <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                        <a href="{{ route('brands.index') }}"
                           class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1"
                           id="bu-backto-icon"></a>
                        <span class="fs-6 text-black fw-normal">Show Brand</span>
                    </div>
                    <div class="main-form-container px-md-5 px-3">
                        <h6 class="title small fw-bold mb-4 text-uppercase">Brand Information:</h6>
                        <form class="main-form" action="{{ route('brands.update',$Brand->id) }}" method="POST"
                              id="userForm">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7 col-12">

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label for="business_unit_id" class="form-label small">Business Unit:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="form-select form-select-sm form-single-select defaultselect @error('business_unit_id') is-invalid @enderror"
                                                    id="business_unit_id" name="business_unit_id" size="5"
                                                    data-initialized="false">
                                                        <option value="{{$Brand->businessUnit->id }}" selected>
                                                            {{ $Brand->businessUnit->business_unit_name }}
                                                        </option>
                                            </select>
                                            @error('business_unit_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label for="category_id" class="form-label small">Category:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="form-select form-select-sm form-single-select defaultselect @error('category_id') is-invalid @enderror"
                                                    id="category_id" name="category_id" size="5"
                                                    data-initialized="false">
                                                        <option value="{{$Brand->category->id }}" selected>
                                                            {{ $Brand->category->category_name }}
                                                        </option>
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label for="brand_name" class="form-label small">Brand Name:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('brand_name') is-invalid @enderror"
                                                   id="brand_name" value="{{ $Brand->brand_name }}"
                                                   name="brand_name"/>
                                            @error('brand_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label for="brand_company_code" class="form-label small">Business Company
                                                Code</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text"
                                                   class="form-control form-control-sm @error('brand_company_code') is-invalid @enderror"
                                                   id="brand_company_code"
                                                   value="{{ $Brand->brand_company_code }}"
                                                   name="brand_company_code"/>
                                            @error('brand_company_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <label for="status" class="form-label small">Status:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <select class="form-select form-select-sm @error('status') is-invalid @enderror"
                                                    id="status" name="status">
                                                <option value="active" {{ $Brand->status == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="inactive"
                                                        {{ $Brand->status == 'inactive' ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                            @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3 mt-4">
                                        <h6 class="mb-3 text-capitalize fw-medium">Additional Information:</h6>
                                        <div class="col-md-12">
                                            <div class="additional-info pt-3 px-3 rounded bg-white custom-primary-border">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-md-5">
                                                        <label for="added_by"
                                                               class="form-label small text-capitalize">User added
                                                            by:</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text"
                                                               class="form-control form-control-sm default-state custominput-padding"
                                                               value="salesfloadmin" placeholder="" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-md-5">
                                                        <label for="added_on" class="form-label small text-capitalize">User added  on:</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control form-control-sm default-state custominput-padding"
                                                               value="{{ now() }}" placeholder="" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <button type="submit"
                                                    class="btn btn-primary btn-primary-gradient text-capitalize px-md-5 px-4"
                                                    onclick="defaultAlert()">Update Brand
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('scripts')

@endsection
