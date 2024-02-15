@section('title')
    {{ $book->title }}
@endsection

@include('layoute.head')


<div class="flex justify-between">
    <div class="pt-10 m-2">
        <a href="{{ route('filter') }}"
            class="text-blue-500 italic hover:text-blue-400 hover:border-b-2 border-blue-400 pb-3 transition-all py-20">
            < Back to previous page </a>
    </div>
    <div class="pt-10 m-2">
        <a href="{{ route('review.create',$book) }}"
            class="text-blue-500 italic hover:text-blue-400 hover:border-b-2 border-blue-400 pb-3 transition-all py-20">
             Create new review ></a>
    </div>
</div>
<div class="m-auto w-3/4 pt-10 pb-20">
    {{-- start Book show card --}}
    <img class="w-60 m-auto" src="{{ asset('image/' . $book->image) }}" alt="" srcset="">
    {{-- book avg rating with diferent style --}}
    <div class="flex items-center justify-center mt-5  pb-20 ">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $book->averageRating)
                <!-- Filled star -->
                <svg class="w-8 h-8 ms-3 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
            @else
                <svg class="w-8 h-8 ms-3 text-gray-300 dark:text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path
                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
            @endif
        @endfor
        <div class="ml-3 font-normal text-gray-700 dark:text-gray-400">out of {{ $book->reviews->count() }} reviews
        </div>
    </div>
    {{-- end Book Show card  --}}

    <div class="mb-3 mx-auto w-4/5  justify-center">

        @forelse ($book->reviews as $review)
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row   dark:border-gray-700 dark:bg-gray-800  mb-3">

                <div class="flex flex-col justify-between p-4 leading-normal">

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $review->content }}</p>
                    @include('review-rating')
                    {{--  --}}
                </div>
                <div class="mb-3 pt-10 font-normal text-gray-700 dark:text-gray-400">
                    {{ $review->created_at->format('d M, Y') }}</div>
            </div>
    </div>
@empty
    <div
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-3">

        <div class="flex flex-col justify-between p-4 leading-normal">

            <h2 class="mb-3 font-normal text-gray-700 dark:text-gray-400">No Reviews</h2>

        </div>

    </div>
    @endforelse







</div>
{{-- <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 w-full mx-auto" id="about"  aria-labelledby="about-tab">
        @include('card')
        @include('card')
        @include('card')
    </div> --}}

</div>






</body>

</html>
