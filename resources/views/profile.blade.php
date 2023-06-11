
@livewire('navigation-menu')
@livewire('profile.update-profile-information-form')
@livewire('profile.update-password-form')
@livewire('profile.two-factor-authentication-form')
@livewire('profile.logout-other-browser-sessions-form')
@livewire('profile.delete-user-form')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
             @livewireStyles
     @livewireScripts
    </head>
    <body>
        
   
    <h1>Profile</h1>

    <form method="POST" action="{{ route('profile.store') }}">
        @csrf
        @livewire('profile-form') 


        <label for="state">State:</label>
        <input type="text" name="state" id="state">

        <label for="city">City:</label>
        <input type="text" name="city" id="city">

        <button type="submit">Save</button>
    </form>
     </body>
