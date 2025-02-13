<div class="p-4 mb-4 rounded-lg {{ $type === 'danger' ? 'bg-red-100 text-red-800' : '' }}
                        {{ $type === 'success' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $type === 'warning' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $type === 'info' ? 'bg-blue-100 text-blue-800' : '' }}">
    {{ $message }}
</div>
