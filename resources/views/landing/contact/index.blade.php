<x-landing-layout>
    <section class="max-w-5xl p-6 mx-auto rounded-md">
        <div class="container px-6 py-12 mx-auto">
            <div class="text-center">
                <p class="font-bold text-blue-500 ">FIND US</p>

                <h1 class="mt-2 text-2xl font-bold text-gray-800 md:text-3xl">CONTACT US</h1>

                <p data-aos="fade-up" data-aos-duration="2000" class="mt-8 text-gray-500">If you have
                    questions about Novbook, you can contact us
                    below.</p>
            </div>

            <form data-aos="fade-up" data-aos-duration="2000" class="mt-28" action="{{ route('landing.contact.send') }}"
                method="POST">
                @csrf
                <div class="-mx-2 md:items-center md:flex">
                    <div class="flex-1 px-2">
                        <label class="block mb-2 text-sm text-gray-600 font-semibold">Full
                            Name</label>
                        <input type="text" placeholder="Your Name" name="name"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-slate-50 border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div class="flex-1 px-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm text-gray-600 font-semibold">Email
                            address</label>
                        <input type="email" placeholder="youremail@gmail.com" name="email"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-slate-50 border border-gray-300 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>
                </div>

                <div class="w-full mt-4">
                    <label class="block mb-2 text-sm text-gray-600 font-semibold">Message</label>
                    <textarea name="message"
                        class="block w-full h-32 px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-slate-50 border border-gray-300 rounded-md md:h-56 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        placeholder="Message"></textarea>
                </div>

                <button
                    class="px-6 py-2 mt-5 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    SUBMIT
                </button>
            </form>
            <div data-aos="fade-up" data-aos-duration="2000" class="overflow-hidden rounded-lg lg:col-span-2 h-96 lg:h-auto mt-6">
                <iframe width="1000" height="300" frameborder="0" title="map" marginheight="0"
                    marginwidth="0" scrolling="no"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.789259394256!2d112.62377797374994!3d-8.020654080051852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ff6464e13253%3A0x2fb0543a5667d6fb!2sVistech%20Software%20House!5e0!3m2!1sid!2sid!4v1687146022251!5m2!1sid!2sid"></iframe>
            </div>
        </div>
    </section>
</x-landing-layout>
