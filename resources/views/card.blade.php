<div class="mb-3 mx-auto w-4/5 ">
    @foreach ($books as $book)
    <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-5">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg " src="{{ asset("image/".$book->image) }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $book->title }}{{ $book->id }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $book->description }}</p>
            @include('raing')
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
        </div>
           <div class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">By: {{ $book->author }}</div>
        </div>
    </a>
    @endforeach
    
</div>

