@extends('layouts.appb')
@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">{{$title}}</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}"><i class="fa fa-home"><span
                            class="path1"></span><span class="path2"></span></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sekolah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
               <div class="box box-bordered border-success">
                <div class="box-body">
                     <form action="{{ route('backend.sekolah.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="importfile" class="form-control @error('importfile') is-invalid @enderror" required>
                    @error('importfile')
                    <div class="form-control-feedback">
                        <small> <code>{{ $message }}</code> </small>
                    </div>
                    @enderror
                    <button type="submit" class="mt-3 btn btn-primary btn-sm">Import</button>
                </form>
                <div class="py-20">
                    Silahkan untuh Template  file spreadsheet terlebih dahulu <a class="btn btn-info btn-sm ms-3" href="{{asset('')}}uploads/files/templates/1profil_sekolah.xlsx" >Template</a>
                </div>
                </div>
               </div>
            </div>
        </div>
        <form id="post-form" enctype="multipart/form-data" action="{{ route('backend.yayasan.store') }}" method="post">
            <div class="row">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Tambah Data Sekolah</h4>
                                <div class="box-controls pull-right">
                                    <input type="text" name="status_yayasan_update" id="status_yayasan_update" hidden>
                                    <input type="text" name="fresh_site" id="fresh_site" hidden>
                                    <button id="publish-btn" type="submit"class="btn btn-sm btn-primary">
                                        Publish
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home7" role="tab"><span class="hidden-sm-up">
                                            <i class="ion-home"></i></span> <span class="hidden-xs-down">General</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages7" role="tab"><span class="hidden-sm-up">
                                            <i class="ion-email"></i></span> <span class="hidden-xs-down">Contac Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#logo7" role="tab"><span class="hidden-sm-up">
                                            <i class="ion-email"></i></span> <span class="hidden-xs-down">Logo</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#maps7" role="tab"><span class="hidden-sm-up">
                                            <i class="ion-email"></i></span> <span class="hidden-xs-down">Maps</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home7" role="tabpanel">
                                        <div class="p-15">
                                            <div class="box">
                                                <div class="box-header">
                                                    <h4 class="box-title"> General
                                                    </h4>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <h5>Nama Yayasan <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama Yayasan" required>
                                                        </div>
                                                        @error('nama')
                                                        <div class="form-control-feedback"><small> <code>{{ $message }}</code> </small></div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Nama Pimpinan Yayasan <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="nama_pimpinam_yayasan" class="form-control @error('nama_pimpinam_yayasan') is-invalid @enderror" value="{{ old('nama_pimpinam_yayasan') }}" placeholder="Nama Pimpina Yayasan" required>
                                                        </div>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                        @error('nama_pimpinam_yayasan')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Nomor SK Pendirian <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="url" name="no_pendirian_yayasan" class="form-control @error('no_pendirian_yayasan') is-invalid @enderror" value="{{ old('no_pendirian_yayasan') }}" placeholder="Nomor Sk Pendiriran" required>
                                                        </div>
                                                        @error('no_pendirian_yayasan')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Tanggal Pendirian <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="tgl_pendirian_yayasan" class="form-control @error('tgl_pendirian_yayasan') is-invalid @enderror" value="{{ old('tgl_pendirian_yayasan') }}" placeholder="Tanggal Pendirian" required>
                                                        </div>
                                                        <div class="form-control-feedback"><small><code>Tangal/bulan/Tahun | 30/01/2000</code></small>
                                                        </div>
                                                        @error('tgl_pendirian_yayasan')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="messages7" role="tabpanel">
                                        <div class="p-15">
                                            <div class="box">
                                                <div class="box-header">
                                                    <h4 class="box-title">
                                                        Contact Info
                                                    </h4>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <h5>Website </h5>
                                                        <div class="controls">
                                                            <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder=" website">
                                                        </div>
                                                        <div class="form-control-feedback">
                                                            <small><code> Alamat Website </code></small>
                                                        </div>
                                                        @error('website')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Email </h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder=" email">
                                                        </div>
                                                        <div class="form-control-feedback">
                                                            <small><code> Email </code></small>
                                                        </div>
                                                        @error('email')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Nomor Telepon </h5>
                                                        <div class="controls">
                                                            <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}" placeholder=" no_telp">
                                                        </div>
                                                        <div class="form-control-feedback">
                                                            <small><code> Nomor Telepon/HP </code></small>
                                                        </div>
                                                        @error('no_telp')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Alamat Jalan </h5>
                                                        <div class="controls">
                                                            <textarea rows="5" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="alamat">{{ old('alamat') }} </textarea>
                                                        </div>
                                                        <div class="form-control-feedback">
                                                            <small><code> Alamat jalan </code></small>
                                                        </div>
                                                        @error('alamat')
                                                        <div class="form-control-feedback"><small>
                                                            <code>{{ $message }}</code> </small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>RT</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt') }}" placeholder=" RT">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> RT 00000 </code></small>
                                                                </div>
                                                                @error('rt')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>RW</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}" placeholder=" RW">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> RW 00000 </code></small>
                                                                </div>
                                                                @error('rw')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>Nama Dusun</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="nama_dusun" class="form-control @error('nama_dusun') is-invalid @enderror" value="{{ old('nama_dusun') }}" placeholder=" Nama Dusun">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> Nama Dusun </code></small>
                                                                </div>
                                                                @error('nama_dusun')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>Desa / Kelurahan</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="desa_kelurahan" class="form-control @error('desa_kelurahan') is-invalid @enderror" value="{{ old('desa_kelurahan') }}" placeholder=" Desa / Kelurahan">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> Nama Dusun </code></small>
                                                                </div>
                                                                @error('desa_kelurahan')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>Kecamatan</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') }}" placeholder=" Kecamatan">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> Kecamatan </code></small>
                                                                </div>
                                                                @error('kecamatan')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <h5>Kab./ Kota</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" value="{{ old('kabupaten') }}" placeholder=" Kab./ Kota">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> Kab./ Kota </code></small>
                                                                </div>
                                                                @error('kabupaten')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <h5>Provinsi</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi') }}" placeholder=" Provinsi">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> Provinsi </code></small>
                                                                </div>
                                                                @error('provinsi')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <h5>Kode Pos</h5>
                                                                <div class="controls">
                                                                    <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" value="{{ old('kode_pos') }}" placeholder=" Kode Pos">
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small><code> Kode Pos </code></small>
                                                                </div>
                                                                @error('kode_pos')
                                                                <div class="form-control-feedback"><small>
                                                                    <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="logo7" role="tabpanel">
                                        <div class="p-15">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="box h-300">
                                                        <div class="box-header">
                                                            <h4 class="box-title">
                                                                Logo
                                                            </h4>
                                                        </div>
                                                        <div class="text-center box-body ">
                                                            <label class="form-label">Size : 600 pixel x 400 pixel</label>
                                                            <div class="form-group">
                                                                <div class=" fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                                                        <img src="{{ asset('') }}assets/images/no_image.png" alt="...">
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                                                    <div>
                                                                        <span class="btn btn-outline-secondary btn-file">
                                                                            <span class="fileinput-new">
                                                                                Select image
                                                                            </span>
                                                                            <span class="fileinput-exists">Change</span>
                                                                            <input type="file" class="@error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}"></span>
                                                                            <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                    @error('logo')
                                                                    <div class="form-control-feedback">
                                                                        <small> <code>{{ $message }}</code> </small>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="maps7" role="tabpanel">
                                            <div class="p-15">
                                                <div class="row">
                                                    <div class="box">
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <h5>Lintang</h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="lintang" class="form-control @error('lintang') is-invalid @enderror" value="{{ old('lintang') }}" placeholder=" Lintang">
                                                                        </div>
                                                                        <div class="form-control-feedback">
                                                                            <small><code> Lintang  </code></small>
                                                                        </div>
                                                                        @error('lintang')
                                                                        <div class="form-control-feedback"><small>
                                                                            <code>{{ $message }}</code> </small>
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <h5>Bujur</h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="bujur" class="form-control @error('bujur') is-invalid @enderror" value="{{ old('bujur') }}" placeholder=" Bujur">
                                                                        </div>
                                                                        <div class="form-control-feedback">
                                                                            <small><code> Bujur  </code></small>
                                                                        </div>
                                                                        @error('bujur')
                                                                        <div class="form-control-feedback"><small>
                                                                            <code>{{ $message }}</code> </small>
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <h5>Maps Script</h5>
                                                                <div class="controls">
                                                                    <textarea rows="5" name="maps" class="form-control @error('maps') is-invalid @enderror" placeholder="maps">{{ old('maps') }} </textarea>
                                                                </div>
                                                                <div class="form-control-feedback">
                                                                    <small>
                                                                        Exp:
                                                                        <code>
                                                                            https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6519218789713!2d117.08926731409771!3d-0.5232837354157259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f93048b4a03%3A0x77d556abf72c93d0!2sPENERBIT%20BUKU%20MEDIATAMA%20CABANG%20SAMARINDA!5e0!3m2!1sen!2sid!4v1643782605913!5m2!1sen!2sid
                                                                        </code>
                                                                    </small>
                                                                </div>
                                                                @error('maps')
                                                                <div class="form-control-feedback">
                                                                    <small> <code>{{ $message }}</code> </small>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>

                @push('styles')
                <!-- Jasny Bootstrap 4 -->
                <link rel="stylesheet"
                href="{{ asset('') }}assets/vendor_plugins/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
                @endpush

                @push('scripts')
                <script src="{{ asset('') }}assets/vendor_plugins/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
                <script src="{{ asset('') }}assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
                <script src="{{ asset('') }}assets/vendor_components/select2/dist/js/select2.full.js"></script>
                <script src="{{ asset('') }}assets/vendor_components/ckeditor/ckeditor.js"></script>
                <script src="{{ asset('') }}assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

                <script>
                    var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
                    };
                </script>
                <script>
                    CKEDITOR.replace('editor1', options);
                    //Initialize Select2 Elements
                    $('.select2').select2();

                    //Save Draft
                    $('#draft-btn').click(function(e) {
                        e.preventDefault();
                        $('#status_yayasan_update').val(0);
                        $('#post-form').submit();
                    });
                    //Save Publish
                    $('#publish-btn').click(function(e) {
                        e.preventDefault();
                        $('#status_yayasan_update').val(1);
                        $('#fresh_site').val(1);
                        $('#post-form').submit();
                    });
                </script>
                @endpush
                @endsection
