<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end mb-3"> 
                <a href="{{ route('message.create') }}" class="btn btn-primary">Create Message</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Message</th>
                        <th scope="col">Recipient</th>
                        <th scope="col">Expires At</th>
                        <th scope="col">Seen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $index => $message)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$message->decrypted_text}}</td>
                                <td>{{$message->recipient?->name}}</td>
                                <td>{{$message->expires_at}}</td>
                                <td>
                                    @if($message->read)
                                        <span class="badge badge-success">Seen</span>
                                    @else
                                        <span class="badge badge-danger">Unseen</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    window.onload = function() {
        fetch('{{ route("message.markSeen") }}')
            .then(response => {
                if (response.ok) {
                    console.log('GET request successful');
                } else {
                    console.error('GET request failed');
                }
            })
            .catch(error => {
                console.error('Error sending GET request:', error);
            });
    };
</script>