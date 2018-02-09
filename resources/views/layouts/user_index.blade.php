<!DOCTYPE html>
<html lang="en">
		@include('layouts.user_partials.header')
	<body>
		<div class="container-fluid">
			<div class="row">
				@include('layouts.user_partials.sidebar')
				@yield('content')
			</div>
		</div>
		@include('layouts.user_partials.footer')
	</body>
</html>