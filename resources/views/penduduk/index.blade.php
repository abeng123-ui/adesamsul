@extends('layouts.master')

@section('content')
<style type="text/css">
  tfoot {
                display: table-header-group;
            }
  select[name=tb_ini_length]{
      width: 30px
  }
</style>
<script type="text/javascript">
function hapus()
    {
       var x = confirm("Yakin ingin menghapus ?");
       if(x)
        { return true; }
      else { return false; }

    }
</script>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Penduduk</h4>
          <p class="card-category"></p>
          <a class="btn btn-info" href="{{ url('penduduk/create') }}">Tambah Penduduk</a>
          <br>
            @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                {!! session('message.content') !!}
                </div>
            @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table style="width:100%" id='tb_ini'  class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
              <thead class=" text-primary">
                <th> No </th>
                <th> NIK </th>
                <th> Nama </th>
                <th> JK </th>
                <th> Tanggal Lahir </th>
                <th> Aksi </th>
              </thead>

               <tfoot>
                <th> No </th>
                <th> NIK </th>
                <th> Nama </th>
                <th> JK </th>
                <th> Tanggal Lahir </th>
                <th> Aksi </th>
              </tfoot>

              <tbody>
              <?php $x=1; ?>
                  @foreach($data as $row)
                      <tr>
                          <th>{{ $x }}</th>
                          <th>{{ $row->nik }}</th>
                          <th>{{ $row->nama_lengkap }}</th>
                          <th>{{ $row->jk }}</th>
                          <th>{{ $row->tgl_lahir }}</th>

                          <th align="center">
                            <a class="btn btn-primary" href="{{ url('penduduk/edit') }}/{{ $row->id }}">Ubah</a>
                              <a onclick="return hapus()" href="{{url('penduduk/delete')}}/{{$row->id}}" type="submit" class="btn btn-danger">Hapus</a>
                          </th>

                      </tr>
                      <?php $x++; ?>
                  @endforeach
              </tbody>
            </table>

            <br><br>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        // $('#id_kopi').DataTable();
        var table = $('#tb_ini').DataTable({
         // "order": [[ 1, "desc" ]],
         "aLengthMenu": [10, 25, 50, 100],

       });

        $('#tb_ini tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Cari '+title+'" />' );

            var table = $('#tb_ini').DataTable();
            table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                    }
                } );
            } );

        } );
    });
</script>
@endpush


@endsection