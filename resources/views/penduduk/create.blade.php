@extends('layouts.master')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Create Penduduk</h4>
        </div>
        <div class="card-body">
          <form id="FormIni" method="POST" enctype="multipart/form-data" action="{{url('penduduk/store')}}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Lengkap</label>
                  <input name="nama_lengkap" maxlength="45" type="text" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Tempat Lahir</label>
                  <input name="tmp_lahir" maxlength="45" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label class="bmd-label-floating">Tanggal Lahir</label>
                  <input name="nama_lengkap" maxlength="45" type="text" class="form-control">
                  <select name="tgl">
                      <?php
                      for ($i=1; $i < 31 ; $i++) { ?>
                      <option value="{{ $i }}">{{ $i }}</option>
                      <? } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label class="bmd-label-floating">Bulan Lahir</label>
                  <select name="bln">
                      <?php
                      for ($i=1; $i < 12 ; $i++) { ?>
                      <option value="{{ $i }}">{{ $i }}</option>
                      <? } ?>
                  </select>
                </div>
                <div class="col-md-1">
                <div class="form-group">
                  <label class="bmd-label-floating">Tahun Lahir</label>
                  <select name="bln">
                      <?php
                      for ($i=1900; $i < date("Y") ; $i++) { ?>
                      <option value="{{ $i }}">{{ $i }}</option>
                      <? } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Jenis Kelamin</label>
                  <select name="jk">
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Golongan Darah</label>
                  <select name="gol_darah">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="O">O</option>
                      <option value="AB">AB</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Agama</label>
                  <input name="alamat" maxlength="45" type="text" class="form-control">
                </div>
              </div>
            </div>

            <!-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> -->
            <a href="{{url('penduduk')}}" class="btn btn-info pull-right">Back</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

@push('scripts')

<script type="text/javascript">
$(document).ready(function() {

  $('#FormIni').validate({
    rules: {
        penduduk: {
          required: true,
          remote: "check_penduduk"
        },
     },

     messages: {
        penduduk : {
          remote: "Penduduk sudah ada."
        }

      },


      errorElement: "em",
      errorPlacement: function ( error, element ) {
        // Add the `help-block` class to the error element
        error.addClass( "help-block alert_error" );

        if ( element.prop( "type" ) === "checkbox" ) {
          error.insertAfter( element.parent( "label" ) );
        } else {
          error.insertAfter( element );
        }
      },
      highlight: function ( element, errorClass, validClass ) {
        $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
      },
      unhighlight: function (element, errorClass, validClass) {
        $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
      }

  });

});
</script>

@endpush

@endsection
