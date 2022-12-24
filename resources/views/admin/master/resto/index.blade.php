@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.master.resto.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="nama_resto">Nama Resto</label>
                  <input type="text" name="nama_resto" id="nama_resto" class="form-control {{$errors->has('nama_resto')?'is-invalid':''}}" placeholder="Isikan Nama Resto" value="{{old('nama_resto',$resto->nama_resto)}}">
                  @if($errors->has('nama_resto'))
                    <div class="invalid-feedback">
                        {{$errors->first('nama_resto')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="nama_pemilik">Nama Pemilik</label>
                  <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control {{$errors->has('nama_pemilik')?'is-invalid':''}}" placeholder="Isikan Nama Pemilik" value="{{old('nama_pemilik',$resto->nama_pemilik)}}">
                  @if($errors->has('nama_pemilik'))
                    <div class="invalid-feedback">
                        {{$errors->first('nama_pemilik')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" class="form-control {{$errors->has('alamat')?'is-invalid':''}}" placeholder="Isikan Alamat Resto" cols="30" rows="5">{{old('alamat',$resto->alamat)}}</textarea>
                  @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{$errors->first('alamat')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control {{$errors->has('no_hp')?'is-invalid':''}}" placeholder="Isikan No HP" value="{{old('no_hp',$resto->no_hp)}}">
                    @if($errors->has('no_hp'))
                      <div class="invalid-feedback">
                          {{$errors->first('no_hp')}}
                      </div>
                    @endif
                  </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection