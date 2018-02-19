<!DOCTYPE html>
<html lang="en">
		@include('layouts.promoter_partials.header')
	<body>
		<div class="container-fluid">
			<div class="row">				
				@include('layouts.dashboard_partials.sidebar')
				@yield('content')
			</div>
		</div>
		@include('layouts.promoter_partials.footer')
	</body>
</html>