@extends('layouts.app')

@section('content')
<main class="py-4 bg-gradient-primary text-white">
    <div class="container my-5">
	    <div class="row justify-content-center">
        	<h1>Vyhľadať v databáze obcí</h1>
        </div>
	    <div class="row justify-content-center">
	        <div class="form col-md-4 col-lg-3 mx-2">
	            <input class="form-control" type="search" placeholder="{{ __('Zadajte názov') }}" aria-label="{{ __('Zadajte názov') }}" id="municipality_search">
	        </div>
	    </div>
    </div>
</main>

    <!-- Script -->
    <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#municipality_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('municipalities.search')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#municipality_search').val(ui.item.label);
           location.href="{{route('municipalities.detail')}}/" + ui.item.id;
           return false;
        }
      });

    });
    </script>
@endsection
