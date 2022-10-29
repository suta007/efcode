@extends('layouts.home')
@section('title', 'หน้าแรก')
@php
	
	//$datas = App\Models\Post::all();
	$datas = App\Models\Post::search('vun')->paginate(6);
	//dd($datas);
@endphp
@section('content')
	@foreach ($datas as $item)
		<a href="{{ route('acticle', $item->slug) }}">{{ $item->name }}</a><br>
	@endforeach
@endsection
