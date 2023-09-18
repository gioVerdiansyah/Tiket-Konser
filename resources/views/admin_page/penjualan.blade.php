@extends('layouts.admin ')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Property 1=Default</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		.rounded-tl-none {
			border-top-left-radius: 0;
		}

		.rounded-tr-none {
			border-top-right-radius: 0;
		}

		.rounded-bl-none {
			border-bottom-left-radius: 0;
		}

		.rounded-br-none {
			border-bottom-right-radius: 0;
		}

		.rotate-0 {
			transform: rotate(0deg);
		}

		.opacity-100 {
			opacity: 1;
		}

		.relative {
			position: relative;
		}

		.text-left {
			text-align: left;
		}

		.text-xl {
			font-size: 1.25rem;
		}

		.font-bold {
			font-weight: bold;
		}

		.text-[#000000] {
			color: #000000;
		}

		.w-[104.02961730957031px] {
			width: 104.03px;
		}

		.h-[27.78864860534668px] {
			height: 27.79px;
		}

		.rounded-tl-[15px] {
			border-top-left-radius: 15px;
		}

		.rounded-tr-[15px] {
			border-top-right-radius: 15px;
		}

		.rounded-bl-[15px] {
			border-bottom-left-radius: 15px;
		}

		.rounded-br-[15px] {
			border-bottom-right-radius: 15px;
		}

		.border-t-[3px] {
			border-top-width: 3px;
		}

		.border-r-[3px] {
			border-right-width: 3px;
		}

		.border-b-[3px] {
			border-bottom-width: 3px;
		}

		.border-l-[3px] {
			border-left-width: 3px;
		}

		.border-t-[#000000] {
			border-top-color: #000000;
		}

		.border-r-[#000000] {
			border-right-color: #000000;
		}

		.border-b-[#000000] {
			border-bottom-color: #000000;
		}

		.border-l-[#000000] {
			border-left-color: #000000;
		}

		.rounded-tl-[20px] {
			border-top-left-radius: 20px;
		}

		.rounded-tr-[20px] {
			border-top-right-radius: 20px;
		}

		.rounded-bl-[20px] {
			border-bottom-left-radius: 20px;
		}

		.rounded-br-[20px] {
			border-bottom-right-radius: 20px;
		}

		.bg-[#f0eeed] {
			background-color: #f0eeed;
		}

		.rounded-tl-none {
			border-top-left-radius: 0;
		}

		.rounded-tr-none {
			border-top-right-radius: 0;
		}

		.rounded-bl-none {
			border-bottom-left-radius: 0;
		}

		.rounded-br-none {
			border-bottom-right-radius: 0;
		}

		.rotate-[-90.00000250447849deg] {
			transform: rotate(-90.00000250447849deg);
		}

		.bg-[#e6e6e6] {
			background-color: #e6e6e6;
		}

		.w-[185px] {
			width: 185px;
		}

		.h-3.5 {
			height: 3.5px;
		}

		.text-[15px] {
			font-size: 15px;
		}

		.text-[#c10c99] {
			color: #c10c99;
		}
	</style>
</head>
<body>
	<div class="rounded-tl-none rounded-tr-none rounded-bl-none rounded-br-none rotate-0 opacity-100 relative">
		<h1 class="w-[104.02961730957031px] h-[27.78864860534668px] rotate-0 opacity-100 text-left text-xl font-bold relative text-[#000000]">Currents</h1>
		<div class="rounded-tl-[15px] rounded-tr-[15px] rounded-bl-[15px] rounded-br-[15px] rotate-0 opacity-100 border-t-[3px] border-r-[3px] border-b-[3px] border-l-[3px] border-t-[#000000] border-r-[#000000] border-b-[#000000] border-l-[#000000]"></div>
		<img src="{{ asset('admin/img/image.png') }}" class="rounded-tl-[20px] rounded-tr-[20px] rounded-bl-[20px] rounded-br-[20px] rotate-0 opacity-100 bg-[#f0eeed]">
		<div class="rounded-tl-none rounded-tr-none rounded-bl-none rounded-br-none rotate-[-90.00000250447849deg] opacity-100 bg-[#e6e6e6]"></div>
		<p class="w-[185px] h-3.5 rotate-0 opacity-100 text-left text-[15px] font-bold relative text-[#c10c99]">Lihat Detail Verifikasi</p>
	</div>

	<script>
		$(document).ready(function(){
			// Add your jQuery code here
		});
	</script>
</body>
</html>
@endsection