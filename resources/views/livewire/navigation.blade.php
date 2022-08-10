 <header class="bg-gray-700 sticky top-0 z-50" x-data="dropdown()">
     {{-- Care about people's approval and you will be their prisoner. --}}
  
         <div class="container flex items-center h-16 justify-between md:justify-start">
 
 
                 <a x-on:click ="show()"
                 class="flex flex-col items-center justify-center order-last md:order-first px-4 md:px-6 bg-white bg-opacity-25 text-white font-semibold h-full cursor-pointer">
                     <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                         <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /> 
                     </svg>
                     <span class="hidden md:block">Container</span>
                 </a>
 
                 <a href="/" class="mx-6">
                     <x-jet-application-mark class="block h-9 w-auto"/>
                 </a>
                <div class="flex-1 hidden md:block">
                    @livewire('search')
                </div>
                 
 
 
                 <!-- Settings Dropdown -->
               
                      
                            
                 <div class="mx-6 relative hidden md:block">
                  @auth
                    
                        <x-jet-dropdown align="right" width="48">
                             <x-slot name="trigger">
                                 @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                     <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                     <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> 
                         
                                 
                                     </button>
                                 @else
                                     <span class="inline-flex rounded-md">
                                         <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                             {{ Auth::user()->name }}
 
                                             <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                 <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                             </svg>
                                         </button>
                                     </span>
                                 @endif
                             </x-slot>
 
                             <x-slot name="content">
                                 <!-- Account Management -->
                                 <div class="block px-4 py-2 text-xs text-gray-400">
                                     {{ __('Manage Account') }}
                                 </div>
 
                                 <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                     {{ __('Profile') }}
                                 </x-jet-dropdown-link>
 
                                 @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                     <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                         {{ __('API Tokens') }}
                                     </x-jet-dropdown-link>
                                 @endif
 
                                 <div class="border-t border-gray-100"></div>
 
                                 <!-- Authentication -->
                                 <form method="POST" action="{{ route('logout') }}" x-data>
                                     @csrf
 
                                     <x-jet-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                         {{ __('Log Out') }}
                                     </x-jet-dropdown-link>
                                 </form>
                             </x-slot>
                         </x-jet-dropdown>
 
                   @else
                      <x-jet-dropdown align="right" width="48">
                         <x-slot name="trigger">
                             <i class="fa fa-user-circle text-white text-4xl cursor-pointer" ></i>
                         </x-slot>
                         <x-slot name="content">
 
                            <x-jet-dropdown-link href="{{route('login')}}">
                                 {{__('Login')}}
                            </x-jet-dropdown-link>
 
                            <x-jet-dropdown-link href="{{route('register')}}">
                             {{__('Register')}}
                           </x-jet-dropdown-link>
                         </x-slot>
                      </x-jet-dropdown>
                        
                  @endauth
                
                 </div>
                 <div class="hidden md:block">
 
                 @livewire('dropdown-cart')
                </div> 
             </div>
 
 
 
 <nav
 x-show="open" :class="{'block':open, 'hidden':!open}"
 class="bg-gray-700 bg-opacity-25 w-full absolute hidden" id="navigation-menu">
 
     <div
     x-on:click.away = "close()"
     class="container h-full hidden md:block">
         <div class="grid grid-cols-4 h-full relative">
             <ul class="bg-white">
                 @foreach ($categories as $category)
                     <li class="navigation-link text-gray-500 hover:bg-orange-500 hover:text-white">
                         <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">
                             <span class="flex justify-center w-9">{!!$category->icon!!}</span>
                             {{$category->name}}
                         </a>
                         
                         <div class="navigation-submenu bg-gray-100 absolute w-3/4 top-0 right-0 h-full hidden">
                             
                             <x-navigation-subcategories :category="$category" />  
                              
                             {{-- <p class="text-red-700">{{var_dump($category)}}</p>    --}}
                        </div>
                     </li>
                 @endforeach
 
             </ul>
             <div class="col-span-3 bg-gray-100">
                <x-navigation-subcategories :category="$category->first()"/>
                     
             </div>{{--col-span-3 bg-gray-100--}}
 
         </div>{{--grid grid-cols-4 h-full relative--}}
 
     </div>{{--container h-ful--}}
 
 
 {{--MOBILE MENU--}}


<div class="bg-white h-full overflow-y-auto">
    <div class="container py-6 mb-2 bg-gray-200">
        @livewire('search')
    </div>
<ul>
@foreach ($categories as $category)
                     <li class="navigation-link text-gray-500 hover:bg-orange-500 hover:text-white">
                         <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">
                             <span class="flex justify-center w-9">{!!$category->icon!!}</span>
                             {{$category->name}}
                         </a>
                     </li>
@endforeach
</ul>

<p class="text-gray-500 my-2 px-6 text-sm flex items-center">USERS</p>
@auth
<a href="{{route("profile.show")}}" class="py-2 px-6 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
<span class="justify-center w-9 flex">
    <i class="fa-solid fa-id-card"></i>
</span>
    Profile
</a>

<a href=""
onclick="event.preventDefault();
document.getElementById('logout').submit()"
class="py-2 px-6 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
    <span class="justify-center w-9 flex">
        <i class="fa-solid fa-person-to-door"></i>
    </span>
        Logout
    </a>

    <form id="logout" action="{{route('logout')}}" method="post">
    @csrf
    </form>

    @else
    <a href="{{route("login")}}" class="py-2 px-6 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
        <span class="justify-center w-9 flex">
            <i class="fa fa-user-check"></i>
        </span>
            Login
        </a>

        <a href="{{route("register")}}" class="py-2 px-6 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
            <span class="justify-center w-9 flex">
                <i class="fa fa-user-edit"></i>
            </span>
                Register
            </a>
@endauth
@livewire('cart-movile')
</div>
    </nav>
 
 
 </header>

 
