@extends('layouts.Master-Layout')

@section('title')Dashboard @endsection

@section('body')
<main class="main-content">

<div class="container-fluid topbarCustomPadding">
    <nav class="theme-breadcrumbs d-inline-block rounded mt-4 mb-3 bg-transparent p-0" aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#"><i class="icon-bold-dashboard me-1"></i>Dashboard</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">SKU Assortment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Master SKU</li> -->
        </ol>
    </nav>
    <div class="page-title d-flex mb-3 justify-content-bentween">
        <h3 class="title fw-bold m-0">Dashbaord</h3>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-black p-0 ms-auto" id="showhidebtn">Show All <i class="icon-outline-arrow-down-1" id="showhidebtn2"></i></button>
    </div>
    <div class="inner-page-content mb-4">
        <div class="main-grid-container p-3">
            Dashboard
        </div>
    </div>
</div>

</main>
@endsection
