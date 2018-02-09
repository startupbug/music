<!DOCTYPE html>
<html lang="en">
	@include('layouts.dashboard_partials.header')
	<body>
		<div class="container-fluid">
			<div class="row">
				@include('layouts.dashboard_partials.sidebar')
				@yield('content')
			</div>
		</div>
		@include('layouts.dashboard_partials.footer')
	</body>
</html>
