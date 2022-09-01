@props(['blogs'])     
        <x-custom-featured-card :blog="$blogs[0]" />
            @if($blogs->count()>1)
            <div class="lg:grid lg:grid-cols-6">
                @foreach($blogs->skip(1) as $blogs)
                    <x-custom-card :blog="$blogs" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'  }}"/>
                @endforeach
            </div>
            @endif