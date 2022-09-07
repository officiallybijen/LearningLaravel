@props(['name','class'=>'btn'])
<button type="submit" class="{{$class}}">
    {{ $slot}}
</button>