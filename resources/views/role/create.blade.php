@extends('layouts.master')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Tambah Akses</h4>
        </div>
        <div class="card-body">
          <form id="FormIni" method="POST" action="{{url('role/store')}}">
                  {{ csrf_field() }}
          <table class="table">

              <tr>
                <td width="20%">Kode Akses </td>
                <td>
                  <input style="width: 200px;" type="text" name="role_code" class="form-control">
                </td>
              </tr>

              <tr>
                <td>Nama Akses</td>
                <td>
                  <input style="width: 200px;" type="text" name="role_name" class="form-control">
                </td>
              </tr>

              <tr valign="top">
                <td>Informasi Akses </td>
                <td>
                  <?php
                            $routeCollection = Route::getRoutes();
                            $new             = [];
                            $groups          = [];
                            foreach ($routeCollection as $value) {

                                if(($value->getName() != '') or (!$value)){
                                    if(strpos($value->getName(), 'front-user') === false){

                                        if (in_array(explode(".",$value->getName())[0], $groups)) {

                                        } else {

                                            array_push($groups, explode(".",$value->getName())[0]);
                                        }
                                        array_push($new, $value->getName());
                                    }
                                }
                            }
                            asort($groups);
                            foreach ($groups as $key => $group) {
                                if(!in_array($group, ['login', 'logout', 'password', 'register'])){
                                    # code...
                                    echo '<label class="switch"><input type="checkbox" class="skip" onclick="checkclass(\''.$group.'\')" id="'.$group.'"/><span></span><em> '.$group.'</em> </label></br>';
                                    foreach ($routeCollection as $row) {
                                        if(explode(".",$row->getName())[0] == $group){
                                              echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="switch" style="margin-left:25px;"><input type="checkbox" name="routelist[]" class="'.$group.' skip" value="'.$row->getName().'"/><span></span> '.$row->getName().'</label></br>';
                                        }
                                    }
                                    echo '</br>';
                                }
                            }

                        ?>
                </td>
              </tr>

              <tr>
                <td></td>
                <td><br>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{url('role')}}" class="btn btn-info">Back</a>
                </td>

              </tr>

            </table>
        </div>
      </div>
    </div>
  </div>

@push('scripts')

<script type="text/javascript">
$(document).ready(function() {

  $('#FormIni').validate({
    rules: {
        role_code: {
          required: true,
        },
        role_name: {
          required: true,
        },
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

function checkclass(data)
    {
        if($( "#"+data ).is(':checked'))
        {
            $( "."+data ).not(this).prop( "checked", true );
        }
        else
        {
            $( "."+data ).not(this).prop( "checked", false );
        }

    }
</script>

@endpush

@endsection
