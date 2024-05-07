<x-mail::message>
# Nouveau post de {{ $user->name }}

Suivez le lien pour lire. <a href="{{ route('posts.show',$post->id) }}">Lire post</a>

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}
{{-- 
Thanks,<br>
{{ config('app.name') }} --}}
</x-mail::message>
