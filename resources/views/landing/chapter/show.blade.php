<x-landing-layout>
    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
        <div class="p-5">
            <canvas id="my_canvas"></canvas>
        </div>
        <div id="navigation_controls" class="flex w-full justify-between">
            <x-button id="go_previous">Previous</x-button>
            <x-button id="go_next">Next</x-button>
        </div>
        <div>
            <x-button>
                <a href="{{ route('landing.chapters.index', $chapter->novel_id)}}">Back</a>
            </x-button>
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
