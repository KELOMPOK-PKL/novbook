<x-landing-layout>
    <div class="flex justify-center items-center">
        <div class="m-8 w-3/4 border-gray-300 rounded-lg bg-white shadow-lg">
            <div class="pb-5">
                <canvas id="my_canvas"></canvas>
            </div>
            <div class="flex flex-wrap w-full justify-between lg:pb-16 lg:px-24 sm:pb-12 sm:px-20 pb-6 px-6">
                <div>
                    <button class="lg:m-3 m-1 bg-yellow-500 hover:bg-yellow-400 text-white lg:text-base sm:text-base text-xs sm:px-4 sm:py-2.5 px-2.5 py-1.5 sm:rounded-full rounded-md">
                        <a href="{{ route('landing.novels.show', $chapter->novel_id) }}">Beri Rating</a>
                    <button>
                </div>
                <div id="navigation_controls">
                    <button class="lg:m-3 m-1 lg:text-xl text:xs sm:text-xl border bg-gray-100 hover:bg-gray-200 rounded-full" id="go_previous"><i class="fa-solid fa-arrow-left sm:p-3 p-1.5"></i></button>
                    <button class="lg:m-3 m-1 lg:text-xl text:xs sm:text-xl border bg-gray-100 hover:bg-gray-200 rounded-full" id="go_next"><i class="fa-solid fa-arrow-right sm:p-3 p-1.5"></i></button>
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
