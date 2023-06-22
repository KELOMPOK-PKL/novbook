<!-- component -->
<div class="flex flex-col m-auto p-auto items-center justify-center">
    <div class="flex overflow-x-scroll pb-10 hide-scroll-bar lg:mr-44 lg:ml-44">
        <div class="flex flex-nowrap">
           {{$slot}}
        </div>
    </div>
</div>
<style>
    .hide-scroll-bar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .hide-scroll-bar::-webkit-scrollbar {
        display: none;
    }
</style>
