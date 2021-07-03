@extends('layouts.app')

@section('embedcss')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <button class="btn btn-danger btn-sm mb-4" id="back" style="display: none;">kembali</button>
            <button class="btn btn-warning btn-sm mb-4" id="insert">Tambah Produk</button>
            <div id="content">

                <!-- INSERT FORM -->
                <form action="{{ route('product.insert') }}" method="POST" id="formInsert" style="display: none;">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="productName">Nama Produk<span style="color: red;">*</span></label>
                            <input type="text" name="productName" class="form-control @error('productName') is-invalid @enderror" id="productName">
                            @error('productName')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>          
                        <div class="col-md-3">
                            <label for="stock">Stok<span style="color: red;">*</span></label>
                            <input type="number" name="productStock" min="0" class="form-control @error('productStock') is-invalid @enderror" id="stock">
                            @error('productStock')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>     
                        <div class="col-md-3">
                            <label for="category">Kategori<span style="color: red;">*</span></label>
                            <select class="custom-select @error('productCategory') is-invalid @enderror" name="productCategory">
                                <option selected value="">Pilih Kategori Produk</option>
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
                            <input type="number" name="productPrice" class="form-control @error('productPrice') is-invalid @enderror" min="0" id="price">
                            @error('productPrice')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-warning" style="margin-top: 27px;">simpan</button>   
                        </div>
                    </div>
                </form>

            </div>
            <div id="table" class="mb-5">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Stock</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm">
                                    <a href="{{ route('product.delete', $product->id) }}" class="text-dark text-decoration-none" id="btn-hapus-table" onclick="return confirm('Ingin hapus data?');">
                                        hapus
                                    </a>
                                </button>
                                <button class="btn btn-info btn-sm">
                                    <a href="{{ route('product.edit', $product->id) }}" class="text-dark text-decoration-none">Edit</a>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="{{ route('category.insert') }}" method="POST" class="border-top pt-5" id="kategori">
                @csrf
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <h2>Tambah Kategori</h2>
                        <label for="category">Nama</label>
                        <input type="text" class="form-control" placeholder="pangan, sembako, dsb" id="category" name="categoryName" required>
                    </div>
                    <div class="col-md-5">
                        <h2 class="mb-4">List Kategori</h2>
                        @foreach($category as $cat)
                        <p class="mb-2 text-capitalize">{{ $cat->name }} <a href="{{ route('category.delete', $cat->id) }}" class="text-white float-right ml-5 bg-danger rounded text-monospace px-2 text-decoration-none" id="btn-hapus-category" onclick="return confirm('Ingin hapus data?');">hapus</a></p> 
                        @endforeach
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <button class="btn btn-warning w-100">tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@section('embedjs')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $.noConflict();
        $('#example').DataTable();

        $('#insert').click(function() {
            $('#back').show();
            $('#insert').hide();
            $('#table').hide();
            $('#formInsert').show();
            $('#kategori').hide();
        });
        $('#back').click(function() {
            $('#back').hide();
            $('#insert').show();
            $('#table').show();
            $('#formInsert').hide();
            $('#kategori').show();
        });
    });
</script>
@endsection