@extends('layouts.master')

@section('css')

<link href="{{ asset('assets/libs/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet">

@endsection

@section('breadcrumb')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
					<li class="breadcrumb-item active">Add service</li>
				</ol>
			</div>
			<h4 class="page-title">Add new service</h4>
		</div>
	</div>
</div>
<!-- end page title -->
@endsection

@section('content')
<div class="row">
	<div class="col">
		<div class="card-box">
			<div id="rootwizard">
				<ul class="nav nav-pills nav-justified form-wizard-header mb-3">
					<li class="nav-item" data-target-form="#generalForm">
						<a href="#first" data-toggle="tab" class="nav-link active">
							<span class="number">1.</span>
							<span class="d-none d-sm-inline">General</span>
						</a>
					</li>
					<li class="nav-item" data-target-form="#variantsForm">
						<a href="#second" data-toggle="tab" class="nav-link">
							<span class="number">2.</span>
							<span class="d-none d-sm-inline">Variants</span>
						</a>
					</li>
					<li class="nav-item" data-target-form="#connectForm">
						<a href="#third" data-toggle="tab" class="nav-link">
							<span class="number">3.</span>
							<span class="d-none d-sm-inline">Connect</span>
						</a>
					</li>
				</ul>
				<div class="tab-content mb-0 b-0">
					<div class="tab-pane active" id="first">
						<form id="generalForm" class="form-horizontal" action="{{route('service.shopify')}}" method="POST">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="title">Title<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input id="title" type="text" class="form-control" value="{{$service->title}}" required>
									<div class="invalid-feedback">Invalid title</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="description">Description<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<div id="description" style="height: 300px;">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="second">
						<form id="variantsForm" method="post" action="#" class="form-horizontal">
							<div class="form-group row">
								<div class="col-sm-12">
									<ul class="nav nav-tabs nav-bordered">
										<?php $i = 1; ?>
										<?php foreach ($variants as $variant): ?>
										<li class="nav-item">
											<a href="#variant<?= $i ?>" data-toggle="tab" aria-expanded="<?= $i==1?'false':'true' ?>" class="nav-link<?= $i==1?' active ml-0':'' ?>">
												<span class="d-none d-sm-inline-block"><?= $variant->title ?></span>
											</a>
										</li>
										<?php $i++ ?>
										<?php endforeach; ?>
									</ul>
									<div class="tab-content">
										<?php $i = 1; ?>
										<?php foreach ($variants as $variant): ?>
										<div class="tab-pane fade<?= $i==1?' active show':'' ?>" id="variant<?= $i ?>">
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Price<span class="text-danger">*</span></label>
												<div class="col-sm-10">
													<div class="input-group">
														<div class="input-group-prepend">
															<div class="input-group-text">$</div>
														</div>
														<input type="text" class="form-control" value="<?= $variant->price ?>" required>
														<div class="invalid-feedback">Invalid price</div>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Description</label>
												<div class="col-sm-10">
													<textarea class="form-control" rows="3"><?= $variant->description ?></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Duration<span class="text-danger">*</span></label>
												<div class="col-sm-10">
													<div class="input-group">
														<input type="text" class="form-control" value="<?= $variant->duration ?>" required>
														<div class="input-group-append">
															<div class="input-group-text">days</div>
														</div>
														<div class="invalid-feedback">Invalid duration</div>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-2 col-form-label">Features</label>
												<div class="col-sm-10">
													<textarea class="form-control" rows="5"><?php foreach ($variant->features as $feature): ?><?= $feature."\n" ?><?php endforeach; ?></textarea>
													<small>Please enter each feature in a new line</small>
												</div>
											</div>
										</div>
										<?php $i++ ?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="third">
						<!-- <div class="card-box"> -->
            <!-- <p>This is placeholder for dashboard</p> -->
        <!-- </div> -->
					</div>
				</div>
				<ul class="list-inline wizard mb-0">
					<li class="previous list-inline-item disabled"><a href="javascript: void(0);" class="btn btn-secondary btn-previous">Previous</a>
					</li>
					<li class="next list-inline-item float-right"><a href="javascript: void(0);" class="btn btn-secondary btn-next">Next</a></li>
				</ul>
			</div>
		</div>
	</div><!-- end col -->
</div>
@endsection

@section('script')

@endsection

@section('script-bottom')
<!-- init js -->
<script src="{{ asset('assets/libs/quill/quill.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script type="text/javascript">
var quill = new Quill("#description",{theme:"snow",modules:{toolbar:[[{size:[]}],["bold","italic","underline","strike"],[{color:[]},{background:[]}],[{header:[!1,1,2,3,4,5,6]},"blockquote","code-block"],[{list:"ordered"},{list:"bullet"},{indent:"-1"},{indent:"+1"}],[{align:[]}],["link","image","video"]]}});
var contents = JSON.parse("{!!$service->description!!}");
quill.setContents(contents.ops);

$(document).ready(function(){"use strict";$("#rootwizard").bootstrapWizard({nextSelector:".btn-next",previousSelector:".btn-previous",finishSelector:".btn-save",onNext:function(t,r,a){var o=$($(t).data("targetForm"));if(o&&(o.addClass("was-validated"),!1===o[0].checkValidity()))return event.preventDefault(),event.stopPropagation(),!1}})});
</script>

@endsection
