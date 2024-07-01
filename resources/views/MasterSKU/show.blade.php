@extends('layouts.Master-Layout')

@section('title')Edit MasterSKU @endsection

@section('styles')
<style>
        input.is-invalid + .invalid-feedback { display: block; }
</style>
@endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">

    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Edit MasterSKU</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>

    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('ShowAllMasterSKU')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Edit MasterSKU</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">MasterSKU Information:</h6>
                           
                                <div class="row">
                                    <div class="col-md-7 col-12">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="manufacturer_id" class="form-label small">Manufacturer :</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-select form-select-sm form-single-select defaultselect @error('manufacturer_id') is-invalid @enderror"
                                                        id="manufacturer_id" name="manufacturer_id" size="5"
                                                        data-initialized="false">
                                                      
                                                            <option value="{{ $MasterSKU->manufacturer->id }}" selected>
                                                                {{ $MasterSKU->manufacturer->manufacturer_name }}
                                                            </option>
                                                </select>
                                                @error('business_unit_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="business_unit_id" class="form-label small">Busniess Unit:</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-select form-select-sm form-single-select defaultselect @error('business_unit_id') is-invalid @enderror"
                                                        id="business_unit_id" name="business_unit_id" size="5"
                                                        data-initialized="false">
                                                            <option value="{{ $MasterSKU->businessUnit->id }}" selected>
                                                                {{ $MasterSKU->businessUnit->business_unit_name }}
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
                                                            <option value="{{ $MasterSKU->category->id }}" selected>
                                                                {{ $MasterSKU->category->category_name }}
                                                            </option>
                                                </select>
                                                @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="category_id" class="form-label small">Brand:</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-select form-select-sm form-single-select defaultselect @error('brand_id') is-invalid @enderror"
                                                        id="brand_id" name="brand_id" size="5"
                                                        data-initialized="false">
                                                            <option value="{{ $MasterSKU->brand->id }}" selected>
                                                                {{ $MasterSKU->brand->brand_name }}
                                                            </option>
                                                </select>
                                                @error('brand_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="master_sku_name" class="form-label small">Master SKU Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('master_sku_name') is-invalid @enderror" id="master_sku_name" value="{{$MasterSKU->master_sku_name }}" name="master_sku_name"  />
                                            @error('master_sku_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="master_sku_company_code" class="form-label small">Master SKU Company Code</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('master_sku_company_code') is-invalid @enderror" id="master_sku_company_code" value="{{$MasterSKU->master_sku_company_code }}" name="master_sku_company_code" />
                                            @error('master_sku_company_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="attribute" class="form-label small">Attribute</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('attribute') is-invalid @enderror" id="attribute" value="{{$MasterSKU->attribute }}" name="attribute" />
                                            @error('attribute')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="sub_attribute" class="form-label small">Sub Attribute</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('sub_attribute') is-invalid @enderror" id="sub_attribute" value="{{$MasterSKU->sub_attribute }}" name="sub_attribute" />
                                            @error('sub_attribute')
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
                                                <option value="active" {{ $MasterSKU->status == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="inactive" {{ $MasterSKU->status == 'inactive' ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                            @error('status')
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

@endsection