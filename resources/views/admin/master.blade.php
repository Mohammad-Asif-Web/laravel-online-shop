<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
            @include('admin.includes.nav')
			<!-- Main Sidebar Container -->
            @include('admin.includes.sidebar')

			<!-- Page Main Content -->
            @yield('content')
			<!-- /.content-wrapper -->

            {{-- footer --}}
            @include('admin.includes.footer')
		</div>
		<!-- ./wrapper -->
        @include('admin.includes.scripts')
	</body>
</html>
