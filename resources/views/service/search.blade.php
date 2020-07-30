@extends('layouts.master')

@section('css')

@endsection

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

@section('content')
<div class="row">
    <div class="col">
        @foreach ($services as $service)
        <div class="card">
          <h5 class="card-header">{{$service->price}}</h5>
          <div class="card-body">
            <h5 class="card-title">{{$service->title}}</h5>
            <p class="card-text description">{{json_decode($service->description)}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            <!-- <script> ) </script> -->
          </div>
        </div>
        @endforeach
        
    </div><!-- end col -->
</div>
@endsection

@section('script')

@endsection

@section('script-bottom')
<!-- init js -->

<script src="{{ asset('assets/libs/quill/quill.min.js')}}"></script>
<script type="text/javascript">
    var quill = new Quill(".description");
    var contents = JSON.parse("{!!$service->description!!}");
quill.setContents(contents.ops);
</script>
@endsection
