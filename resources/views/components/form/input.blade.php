@props(['name','type'=>'text'])

<input type="{{ $type }}" name="{{$name}}" value="{{ old($name) }}" 

placeholder="enter {{$name}}" />
<br>

<x-form.error :name="$name" />
    