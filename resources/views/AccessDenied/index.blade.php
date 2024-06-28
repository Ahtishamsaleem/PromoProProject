@extends('layouts.Master-Layout')

@section('title')AccessDenied @endsection

@section('body')
<main class="main-content">
	
	<div class="container-fluid topbarCustomPadding">
		<nav class="theme-breadcrumbs d-inline-block rounded mt-4 mb-3 bg-transparent p-0" aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item"><a href="#"><i class="icon-bold-shopping-cart me-1"></i>Access Denied Page for Grid</a></li>
			</ol>
		</nav>
		<div class="page-title d-flex mb-3 justify-content-bentween">
			<h3 class="title fw-bold m-0">Access Denied Screen</h3>
		</div>
		<div class="inner-page-content mb-4">
			<div class="main-grid-container">
				<div class="main-form-container px-md-0 px-3">
					
					<!-- Use these lines of code for access denied -->
					<div class="access-denied-content">
						<div class="access-denied-grid position-relative rounded-3 overflow-hidden" id="inner-sweetalert">
							<img src="/images/access-denied-grid.jpg" alt="Access Denied" class="img-fluid rounded-3">
						</div>
					</div>
					<!-- Use these lines of code for access denied -->

				</div>
			</div>
		</div>
	</div>
</main>
@endsection