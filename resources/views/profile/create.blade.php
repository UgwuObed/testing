<form method="POST" action="{{ route('profile.store') }}">
    @csrf

    <label for="country">Country</label>
    <input type="text" name="country" required>

    <label for="state">State</label>
    <input type="text" name="state" required>

    <label for="city">City</label>
    <input type="text" name="city" required>

    <button type="submit">Create Profile</button>
</form>
