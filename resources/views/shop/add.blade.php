@extends('layouts.master')
@section('content')
@section('breadcrumb')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Search Results !</h4>
        </div>
    </div>
</div>
<!-- end page title -->
@endsection
	<div class="row">
	    <div class="col">
			<form id="connectForm" method="post" action="{{route('shop.make')}}" class="form-horizontal">
				@csrf
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="title">Shopify App URL<span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input id="" type="text" name="shopify_url" class="form-control" required>
						<div class="invalid-feedback">Invalid App URL</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="title">Shopify App Whitelisted Redirection URL<span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input id="" type="text" class="form-control" name="redirect_url" required>
						<div class="invalid-feedback">Invalid App Whitelisted Redirection URL</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="title">Shopify App API Key<span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input id="" type="text" class="form-control" name="api_key" required>
						<div class="invalid-feedback">Invalid App API Key</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="title">Shopify App API Secret Key<span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input id="" type="text" class="form-control" name="api_secret_key" required>
						<div class="invalid-feedback">Invalid App API Secret Key</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="title">Shopify App API Scopes<span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<input id="" type="text" class="form-control" name="api_scopes" required>
						<div class="invalid-feedback">Invalid App API Scopes</div>
					</div>
				</div>
				<div class="form-group mb-0 justify-content-end row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Add Shop</button>
					</div>
				</div>
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			</form>
		</div>
	</div>
@endsection