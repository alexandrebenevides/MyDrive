<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('livewire.components.head')

    <body>        
        {{ $slot }}
    </body>
</html>
