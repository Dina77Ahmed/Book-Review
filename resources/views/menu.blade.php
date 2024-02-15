<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
<li class="me-2">
    <a href="{{ route('filter',['data_filter'=>'latest']) }}" id="about-tab" data-tabs-target="#about" type="button" role="tab"
        aria-controls="about" aria-selected="true"
        class="inline-block p-4  rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $data_filter=='latest' ? 'dark:text-blue-500 ' : '' }}">Add recently</a>
</li>
<li class="me-2">
    <a href="{{ route('filter',['data_filter'=>'month']) }}" id="about-tab" data-tabs-target="#about" type="button" role="tab"
        aria-controls="about" aria-selected="true"
        class="inline-block p-4  rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $data_filter=='month' ? 'dark:text-blue-500 ' : '' }}">Popular
        Last Month</a>
</li>
<li class="me-2">
    <a href="{{ route('filter',['data_filter'=>'popular-six-months']) }}" id="about-tab" data-tabs-target="#about" type="button" role="tab"
        aria-controls="about" aria-selected="true"
        class="inline-block p-4  rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $data_filter=='popular-six-months' ? 'dark:text-blue-500 ' : '' }}">Popular
        Last Six Months</a>
</li>
<li class="me-2">
    <a href="{{ route('filter',['data_filter'=>'rated-month']) }}" id="about-tab" data-tabs-target="#about" type="button" role="tab"
        aria-controls="about" aria-selected="true"
        class="inline-block p-4  rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $data_filter=='rated-month' ? 'dark:text-blue-500 ' : '' }}">Hightest Rated Last Month</a>
</li>
<li class="me-2">
    <a href="{{ route('filter',['data_filter'=>'rated-six-month']) }}" id="about-tab" data-tabs-target="#about" type="button" role="tab"
        aria-controls="about" aria-selected="true"
        class="inline-block p-4  rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $data_filter=='rated-six-month' ? 'dark:text-blue-500 ' : '' }}">Hightest Rated Last Six Months</a>
</li>

</ul>