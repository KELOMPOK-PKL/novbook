<x-landing-layout>
    <div class="py-8 px-40">
        <p class="font-bold text-2xl">
            {{ $novel->title }}
        </p>
    </div>
    <div class="flex justify-center items-center">
        <div class="m-8 w-3/4 border-gray-300 rounded-xl bg-white shadow-lg">
            <div class="p-5">
                <canvas id="my_canvas"></canvas>
            </div>
            <div class="flex flex-wrap w-full justify-between lg:pb-16 lg:px-24 sm:pb-12 sm:px-20 pb-6 px-6">
                <div>
                    <button
                        class="lg:m-3 m-1 bg-yellow-500 hover:bg-yellow-400 text-white lg:text-base sm:text-base text-xs sm:px-4 sm:py-2.5 px-2.5 py-1.5 sm:rounded-full rounded-md">
                        <a href="{{ route('landing.novels.show', $chapter->novel_id) }}">Beri Rating</a>
                        <button>
                </div>
                <div id="navigation_controls">
                    <button
                        class="lg:m-3 m-1 lg:text-xl text:xs sm:text-xl border bg-gray-100 hover:bg-gray-200 rounded-full"
                        id="go_previous"><i class="fa-solid fa-arrow-left sm:p-3 p-1.5"></i></button>
                    <button
                        class="lg:m-3 m-1 lg:text-xl text:xs sm:text-xl border bg-gray-100 hover:bg-gray-200 rounded-full"
                        id="go_next"><i class="fa-solid fa-arrow-right sm:p-3 p-1.5"></i></button>
                </div>
            </div>

        </div>
    </div>
   <div class="flex justify-center items-center mb-10">
    <div class="w-3/4 h-3/4 rounded-lg bg-white shadow-lg">
        <div class="flex flex-wrap items-center">
            <div class="w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                <img src="{{ asset('storage/' . $novel->image) }}" alt="..."
                    class="container w-2/3 h-2/3 rounded-lg my-8" />
            </div>
            <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                <div class="px-6 py-12 md:px-12 w-full">
                    <h2 class="mb-10 text-xl font-bold text-center md:text-left text-black">
                        {{ $novel->title }}
                    </h2>
                    <div class="ml-6 mt-5">
                        <div class="overflow-y-auto max-h-52 ">
                            @foreach ($chapters as $chapter)
                                <a href="{{ route('landing.chapters.show', $chapter->id) }}">
                                    <div class="w-full border-b-2 border-gray-100 border-opacity-100 py-4">
                                        <p>{{ $chapter->title }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>


        @push('js')
            <script>
                var pdfUrl = "{{ asset('storage/' . $chapter->pdf) }}";
                var myState = {
                    pdf: null,
                    currentPage: 1
                };

                pdfjsLib.getDocument(pdfUrl).promise.then(function(doc) {
                    console.log("Dokumen berisi " + doc.numPages + " halaman");
                    myState.pdf = doc;

                    render();
                });

                function render() {
                    var canvas = document.getElementById('my_canvas');
                    var context = canvas.getContext('2d');
                    var currentPage = myState.currentPage;
                    var pdf = myState.pdf;

                    pdf.getPage(currentPage).then(function(page) {
                        var viewport = page.getViewport({
                            scale: 3
                        });

                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        // Render halaman ke dalam canvas
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });
                    });
                }

                document.getElementById('go_previous').addEventListener('click', (e) => {
                    if (myState.pdf == null || myState.currentPage === 1) {
                        return;
                    }
                    myState.currentPage -= 1;
                    render();
                });

                document.getElementById('go_next').addEventListener('click', (e) => {
                    if (myState.pdf == null || myState.currentPage >= myState.pdf.numPages) {
                        return;
                    }
                    myState.currentPage += 1;
                    render();
                });
            </script>
        @endpush


</x-landing-layout>
