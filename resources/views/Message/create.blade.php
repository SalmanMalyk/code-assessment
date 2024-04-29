<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Message Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('message.store')}}" method="POST">
                      @csrf()
                      <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" rows="3" name="text" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="recipient">Recipient:</label>
                        <select class="form-control" id="recipient" name="recipient_id" required>
                            <option value="">Select Recipient</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="expiry">Expiry Date/Time:</label>
                        <input type="datetime-local" class="form-control" id="expiry" name="expires_at">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




