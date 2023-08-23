<x-mail::message>
# Introduction

Vous avez recu un demande pour le bien {{route('property.show',['name' => $property->title , 'property' => $property->id])}}

- Prenom : {{$data['firstname']}}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
