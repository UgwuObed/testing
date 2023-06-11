
    <h1>Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        @livewire('profile-form')


        <label for="state">State:</label>
        <input type="text" name="state" id="state" value="{{ $user->state }}">
        
        <label for="city">City:</label>
        <input type="text" name="city" id="city" value="{{ $user->city }}">

        <button type="submit">Update</button>
    </form>