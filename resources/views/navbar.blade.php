<div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    @include('menu')
    <div id="defaultTabContent">
        <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 w-full mx-auto {{ Route::is('latest') ? '' : 'hidden' }}"
            id="about" aria-labelledby="about-tab">
            @include('card')

        </div>

        <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 w-full mx-auto {{ Route::is('month') ? '' : 'hidden' }}"
            id="about" aria-labelledby="about-tab">
            @include('card')

        </div>
        
        <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 w-full mx-auto {{ Route::is('popular-six-months') ? '' : 'hidden' }}"
            id="about" aria-labelledby="about-tab">
            @include('card')

        </div>

        <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 w-full mx-auto {{ Route::is('rated-month') ? '' : 'hidden' }}"
            id="about" aria-labelledby="about-tab">
            @include('card')

        </div>

        <div class=" p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 w-full mx-auto {{ Route::is('rated-six-month') ? '' : 'hidden' }}"
            id="about" aria-labelledby="about-tab">
            @include('card')

        </div>


    </div>
</div>
