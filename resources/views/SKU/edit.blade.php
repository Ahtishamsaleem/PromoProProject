@extends('layouts.Master-Layout')

@section('title')Edit SKU @endsection

@section('styles')
<style>
        input.is-invalid + .invalid-feedback { display: block; }
</style>
@endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">

    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Edit SKU</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>

    <div class="inner-page-content mb-4 ">
        <div class="main-grid-container ">					
                        <div class="returnback-heading px-3 py-2 d-flex align-items-center mb-3 mt-2">
                            <a href="{{route('skus.index')}}" class="btn btn-outline-link p-0 icon-outline-arrow-left-2 text-primary fs-5 me-1" id="bu-backto-icon"></a>
                            <span class="fs-6 text-black fw-normal ">Edit SKU</span>
                        </div>
                        <div class="main-form-container px-md-5 px-3">
                            <h6 class="title small fw-bold mb-4 text-uppercase">SKU Information:</h6>
                            <form class="main-form" action="{{route('skus.update',$SKU->id)}}" method="POST" id="userForm" >
                                @csrf
                                @method('PUT')
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
                                                            <option value="{{ $SKU->manufacturer->id }}" selected>
                                                                {{ $SKU->manufacturer->manufacturer_name }}
                                                            </option>
                                                </select>
                                                @error('manufacturer_id')
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
                                                            <option value="{{ $SKU->businessUnit->id }}" selected>
                                                                {{ $SKU->businessUnit->business_unit_name }}
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
                                                            <option value="{{ $SKU->category->id }}" selected>
                                                                {{ $SKU->category->category_name }}
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
                                                            <option value="{{ $SKU->brand->id }}" selected>
                                                                {{ $SKU->brand->brand_name }}
                                                            </option>
                                                </select>
                                                @error('brand_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="master_sku_id" class="form-label small">Master SKU:</label>
                                            </div>
                                            <div class="col-md-7">
                                                <select class="form-select form-select-sm form-single-select defaultselect @error('master_sku_id') is-invalid @enderror"
                                                        id="master_sku_id" name="master_sku_id" size="5"
                                                        data-initialized="false">
                                                            <option value="{{ $SKU->masterSKU->id }}" selected>
                                                                {{ $SKU->masterSKU->master_sku_name }}
                                                            </option>
                                                </select>
                                                @error('master_sku_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="sku_name" class="form-label small">SKU Name:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('sku_name') is-invalid @enderror" id="sku_name" value="{{$SKU->sku_name}}" name="sku_name"  />
                                            @error('sku_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="sku_company_code" class="form-label small">SKU Company Code</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('sku_company_code') is-invalid @enderror" id="sku_company_code" value="{{$SKU->sku_company_code}}" name="sku_company_code" />
                                            @error('sku_company_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="pack_type" class="form-label small">Pack Type</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('pack_type') is-invalid @enderror" id="pack_type" value="{{$SKU->pack_type}}" name="pack_type" />
                                            @error('pack_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="variant" class="form-label small">Variant</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('variant') is-invalid @enderror" id="variant" value="{{$SKU->variant}}" name="variant" />
                                            @error('variant')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="pack_size" class="form-label small">Pack Size</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('pack_size') is-invalid @enderror" id="pack_size" value="{{$SKU->pack_size}}" name="pack_size" />
                                            @error('pack_size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <label for="attribute" class="form-label small">Attribute</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" class="form-control form-control-sm @error('attribute') is-invalid @enderror" id="attribute" value="{{$SKU->attribute}}" name="attribute" />
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
                                            <input type="text" class="form-control form-control-sm @error('sub_attribute') is-invalid @enderror" id="sub_attribute" value="{{$SKU->sub_attribute}}" name="sub_attribute" />
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
                                                <option value="active" {{ $SKU->status == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="inactive" {{ $SKU->status == 'inactive' ? 'selected' : '' }}>
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

                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-5">
                                                <button type="submit" class="btn btn-primary btn-primary-gradient text-capitalize px-md-5 px-4" onclick="defaultAlert()">Update SKU </button>
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