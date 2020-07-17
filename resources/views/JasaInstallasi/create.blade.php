@extends('adminlte::page')
@section('title', 'Labkom FMIPA UNS | Jasa Installasi | Insert Data')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Insert Data Customer</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('JasaInstallasi.index') }}">Jasa Installasi</a></li>
                <li class="breadcrumb-item active">Insert Data</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <form action="{{ route('JasaInstallasi.store') }}" method="post">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Personal</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama">Nama :</label>
                            <select name="id_mahasiswa" id="Nama" class="custom-select @error('id_mahasiswa') is-invalid @enderror">
                                <option disabled @if(!old('id_mahasiswa')) selected @endif>Pilih Nama Mahasiswa</option>
                                @foreach($Mahasiswa as $elemen)
                                    @if(old('id_mahasiswa') == $elemen->id)
                                        <option selected value="{{ old('id_mahasiswa') }}">{{ $elemen->nama_mahasiswa }}</option>
                                    @else
                                        <option value="{{ $elemen->id }}">{{ $elemen->nama_mahasiswa }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_mahasiswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="laptop">Laptop :</label>
                            <input type="text" name="laptop" id="laptop" class="form-control @error('laptop') is-invalid @enderror" placeholder="Masukkan Merk Laptop" value="{{ old('laptop') }}">
                            @error('laptop')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelengkapan">Kelengkapan :</label>
                            <textarea name="kelengkapan" cols="40" rows="4" id="kelengkapan" class="form-control @error('kelengkapan') is-invalid @enderror" placeholder="Masukkan Kelengkapan Laptop">{{ old('kelengkapan') }}</textarea>
                            @error('kelengkapan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Tanggal">Tanggal :</label>
                            <input type="text" name="tanggal" id="Tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukkan tanggal" onfocus="this.type = 'date'" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Software</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Software">Software :</label>
                            <select name="id_software" id="Software" class="custom-select @error('id_software') is-invalid @enderror">
                                <option disabled @if(!old('id_software')) selected @endif>Pilih Software</option>
                                <option>Service</option>
                                @foreach($Software as $elemen)
                                    @if(old('id_software') == $elemen->id)
                                        <option selected value="{{ old('id_software') }}">{{ $elemen->nama_software }}</option>
                                    @else
                                        <option value="{{ $elemen->id }}">{{ $elemen->nama_software }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_software')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Keterangan">Keterangan :</label>
                            <textarea name="keterangan" cols="40" rows="4" id="Keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                      placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis :</label>
                            <select name="jenis" id="jenis" class="custom-select @error('jenis') is-invalid @enderror">
                                <option disabled @if(!old('jenis')) selected @endif>Pilih Jenis</option>
                                @if(old('jenis') == 'install')
                                    <option selected value="install">Install</option>
                                    <option value="service">Service</option>
                                @elseif(old('jenis') == 'service')
                                    <option selected value="service">Service</option>
                                    <option value="install">Install</option>
                                @else
                                    <option value="install">Install</option>
                                    <option value="service">Service</option>
                                @endif
                            </select>
                            @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Jam_Ambil">Jam Ambil :</label>
                            <input type="time" name="jam_ambil" id="Jam_Ambil" class="form-control @error('jam_ambil') is-invalid @enderror" value="{{ old('jam_ambil') }}">
                            @error('jam_ambil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="card-tools" >
                        <a href="{{ route('JasaInstallasi.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-lg float-right">
                            <i class="fas fa-plus"></i>
                            Insert Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
