@section('head')
<style>
    .img{
        width:10vw;
    }

	.icon{
		width:1.5vw;
	}
</style>
@endsection
@extends('layout')
@section('title','Proveedor')
@section('content')
<div class="container-fluid p-5 bg-dark text-white">
  <img class="img" src="https://cdn-icons.flaticon.com/png/512/552/premium/552909.png?token=exp=1651700606~hmac=a5a6b3ba138098d3cd048bd8d066f6aa" alt="">
  <h1>{{$suppliers->Nombre_proveedor}}</h1>
  <label><strong>No. Acreedor: </strong>{{$suppliers->Acreedor}}	</label><a href="{{route('suppliers.edit', $suppliers->Acreedor)}}"><img src="https://cdn-icons-png.flaticon.com/512/1160/1160758.png" class="icon" alt=""></a>
</div>
	@endsection