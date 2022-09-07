@props(['name','type'=>'text','value'])

<input class="form-control" type="{{ $type }}" name="{{$name}}" {{ $attributes(['value'=>old($name)]) }} 

placeholder="Enter {{$name}}" />
<br>

<x-form.error :name="$name" />
    