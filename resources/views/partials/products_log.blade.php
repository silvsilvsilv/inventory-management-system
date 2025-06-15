@if($log->type === "update")
	<li class="py-4">
		<p class="text-gray-800">
			<strong>{{ $log->user ? $log->user->name : 'Unknown User' }}</strong>
			added the stock of
			<span class="font-medium text-indigo-600">{{ $log->products->name }}</span>
			by {{ $log->stock_added }}.
		</p>
		<time class="text-sm text-gray-500"
			datetime="{{ $log->created_at }}">{{ $log->updated_at->format('F d, Y h:i a') }}
		</time>
	</li>
@endif
@if($log->type === "create")
	<li class="py-4">
		<p class="text-gray-800">
			<strong>{{ $log->user ? $log->user->name : 'Unknown User' }}</strong>
			added {{$log->stock_added}} of a new product:
			<span class="font-medium text-green-600">{{ $log->products->name }}</span>.
		</p>
		<time class="text-sm text-gray-500"
			datetime="{{ $log->created_at }}">{{ $log->updated_at->format('F d, Y h:i a') }}
		</time>
	</li>
@endif
@if ($log->type === "delete")
	<li class="py-4">
		<p class="text-gray-800">
			<strong>{{ $log->user ? $log->user->name : 'Unknown User' }}</strong>
			delete a product:
			<span class="font-medium text-red-600">{{ $log->products->name }}</span>.
		</p>
		<time class="text-sm text-gray-500"
			datetime="{{ $log->created_at }}">{{ $log->updated_at->format('F d, Y h:i a') }}
		</time>
	</li>
@endif
