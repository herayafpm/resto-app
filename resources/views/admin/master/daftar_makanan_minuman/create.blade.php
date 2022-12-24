@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.master.daftar_makanan_minuman.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control {{$errors->has('nama')?'is-invalid':''}}" placeholder="Isikan Nama" value="{{old('nama')}}">
                  @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{$errors->first('nama')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="number" name="harga" id="harga" class="form-control {{$errors->has('harga')?'is-invalid':''}}" placeholder="Isikan Harga" value="{{old('harga')}}">
                  @if($errors->has('harga'))
                    <div class="invalid-feedback">
                        {{$errors->first('harga')}}
                    </div>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary">Buat</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection