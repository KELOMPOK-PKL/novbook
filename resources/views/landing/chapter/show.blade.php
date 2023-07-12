<x-landing-layout>
    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
        <div class="p-5">
            <x-button variant="ligth" href="{{ route('landing.chapters.index', $chapter->novel->id) }}" class="m-5">
                back
            </x-button>
        </div>
        <div>
            <canvas id="my_canvas"></canvas>
        </div>



        {{-- <div class="p-8">
            <iframe src="{{ asset('storage/'. $chapter->pdf)}}#toolbar=0" class="w-full h-screen"></iframe>
        </div> --}}
    </div>

    @push('js')
        <script>
            var pdfUrl = "{{ asset('storage/' . $chapter->pdf) }}";

            pdfjsLib.getDocument(pdfUrl).promise.then(function(doc) {
                console.log("Dokumen berisi " + doc.numPages + " halaman");

                // Dapatkan halaman pertama
                doc.getPage(1).then(function(page) {
                    var canvas = document.getElementById('my_canvas');
                    var context = canvas.getContext('2d');
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
            });
        </script>
    @endpush
</x-landing-layout>
