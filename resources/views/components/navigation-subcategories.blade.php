@props(['category'])

<div class="grid grid-cols-3 p-4">
    <div>{{--Div para separa uno al lado del otro --}}
         <p class="text-lg font-bold text-center text-gray-500 mb-3">Subcategories</p> 
            {{--Select * from categories where select * form subctegorie where id = 1--}}
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="" class="text-gray-500 font-semibold inline-block py-1 px-4 hover:text-orange-500">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
        </ul>
             
            
    </div>{{--Div para separa uno al lado del otro --}}
    <div class="col-span-2">
        <img  class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt=""> 
    </div>
    
</div>{{--grid grid-cols-4--}}