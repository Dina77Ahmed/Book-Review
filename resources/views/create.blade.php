@section('title')
    Add Review For {{ $book->title }}
@endsection

@include('layoute.head')

<div class="m-auto w-3/4 pt-5 ">
    <form action="{{ route('review.store', $book) }}" method="POST">
        @csrf
        <textarea name="content" placeholder="Add Your Review..."
            class="py-20 bg-transparent block border-b-2 w-full h-60  dark:text-2xl text-gray-100 mb-5 outline-none"></textarea>

        <label for="countries"
            class="block mb-2 text-sm font-medium mt-3 text-gray-900 dark:text-2xl dark:text-white">Rating</label>
        <select id="countries" name="rating"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-20">
            <option selected>Select A Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

        </select>

        {{-- <input type="hidden" name="book_id" value={{ $book->id }}> --}}

        <button type="submit"
            class="inline-flex mt-20 items-center py-2.5 px-3 ms-2 uppercase font-extrabold  text-gray-100 text-lg  bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-5">
            Add Review
        </button>
        {{-- <button
            type="submit"
            class="uppercase mt-15 m bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button> --}}
    </form>
</div>
</body>

</html>
