<x-layouts>
    <body class="mb-48">


            <x-hero></x-hero>

        <main>
            <!-- Search -->
           <x-search></x-search>



            <div
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >
                <!-- Item 1 -->

                @foreach ( $listings as $listing )

                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="{{asset('storage/'. $listing->logo) }}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="{{ url('listing/'.$listing->id) }}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                            <ul class="flex">
                                   <x-listings-tags :tagsCsv='$listing->tags' />
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i>{{ $listing->location }}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </main>

        {{ $listings->links() }}

    </body>

</x-layouts>





