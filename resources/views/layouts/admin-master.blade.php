<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>@yield('title')</title>
	<link href="{{URL::to('src/admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::to('src/admin/css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{URL::to('src/admin/css/styles.css')}}" rel="stylesheet">
	@yield('styles')
<!--Icons-->
	<script src="{{URL::to('src/admin/js/lumino.glyphs.js')}}"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	@include('includes.admin.header')
	@include('includes.admin.sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('page-title')</h1>
			</div>
			<div class="col-lg-12">
				
				@if(count($errors)>0)
					<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						{{$error}}<br>
					@endforeach
					</div>
				@endif
				@if(Session::has('message'))
					<div class="alert alert-{{Session::get('type')}}">
						{{Session::get('message')}}
					</div>
				@endif
			</div>
		</div><!--/.row-->
		@yield('content')
		
		</div><!--/.row-->

	<script src="{{URL::to('src/admin/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{URL::to('src/admin/js/bootstrap.js')}}"></script>
	<script src="{{URL::to('src/admin/js/bootstrap-datepicker.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
	@yield('scripts')
</body>
</html>