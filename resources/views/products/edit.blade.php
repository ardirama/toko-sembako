@extends('layouts.app')

@section('embedcss')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h1>Edit data</h1>
			<form action="{{ route('product.update', $product->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-6">
						<label for="productName">Nama Produk<span style="color: red;">*</span></label>
						<input type="text" name="productName" class="form-control @error('productName') is-invalid @enderror" id="productName" value="{{ $product->name }}">
						@error('productName')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>          
					<div class="col-md-3">
						<label for="stock">Stok<span style="color: red;">*</span></label>
						<input type="number" name="productStock" min="0" class="form-control @error('productStock') is-invalid @enderror" id="stock" value="{{ $product->stock }}">
						@error('productStock')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>     
					<div class="col-md-3">
						<label for="category">Kategori<span style="color: red;">*</span></label>
						<select class="custom-select @error('productCategory') is-invalid @enderror" name="productCategory">
							@foreach($category as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
						@error('productCategory')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>     
					<div class="col-md-12 mt-4">
						<label for="price">Harga<span style="color: red;">*</span></label>
						<input type="number" name="productPrice" class="form-control @error('productPrice') is-invalid @enderror" min="0" id="price" value="{{ $product->price }}">
						@error('productPrice')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</div>
					<div class="col-md-12">
						<a href="{{ route('products') }}" class="btn btn-danger" style="margin-top: 27px;">kembali</a>
						<button class="btn btn-warning" style="margin-top: 27px;">simpan</button>   
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection