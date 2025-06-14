@if($log->type === "update")
	<li class="py-4">
		<p class="text-gray-800">
			<strong>{{ $log->user ? $log->user->name : 'Unknown User' }}</strong>
			updated category 
			<span class="font-medium text-indigo-600">{{ $log->categories->name }}</span>.
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
			created a new category: 
			<span class="font-medium text-indigo-600">{{ $log->categories->name }}</span>.
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
			deleted a category:
			<span class="font-medium text-indigo-600">{{ $log->categories->name }}</span>.
		</p>
		<time class="text-sm text-gray-500"
			datetime="{{ $log->created_at }}">{{ $log->updated_at->format('F d, Y h:i a') }}
		</time>
	</li>
@endif
