<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Inventory Activity Log</title>
	<script src="https://cdn.tailwindcss.com"></script>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<style>
    body {
    	font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial,
    		sans-serif;
    	background-color: #ffffff;
    	color: #000000;
    }
	</style>
</head>

<body class="bg-gray-100 text-gray-900">
	@include('partials.header')
	<main class="max-w-5xl mx-auto p-6">
		<section aria-label="Inventory activity log" class="bg-white rounded-lg shadow-md p-6">
			<header class="mb-6">
				<h1 class="text-2xl font-bold tracking-tight">Activity Log</h1>
				<p class="text-gray-600 mt-1">Recent actions and updates in inventory management</p>
			</header>

			<ul class="divide-y divide-gray-200 max-h-[480px] overflow-y-auto">
				@foreach ($logs as $log)
					@if($log->product_id != null)
						@include('partials.products_log', ['log' => $log])
					@elseif($log->category_id != null)
						@include('partials.categories_log', ['log' => $log])
					@endif
				@endforeach
			</ul>
		</section>
	</main>

</body>

</html>