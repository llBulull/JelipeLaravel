<x-app-layout>

    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                    @foreach ($product->images as $image)
                        
                    <li data-thumb="{{Storage::url($image->url)}}">
                        <img src="{{Storage::url($image->url)}}" />
                    </li>

                    @endforeach

                        
                      
                    </ul>
                  </div>

            </div>   
            <div>
                <h1 class="text-xl font-bold text-gray-700"> {{$product->name}}</h1>
                <div class="flex">
                <p class="text-gray-700">Brand: <a class="underline capitalize hover:text-orange-500" href="">{{$product->brand->name}}</a> </p>
                <p class="text-gray-700 ml-6">5 <i class="fa fa-star text-yellow-400"></i> </p>
            </div>

            </div>
        </div>
    </div>

    @push('script')
        
    
    <script>
        $(document).ready(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
    </script>

@endpush
</x-app-layout>