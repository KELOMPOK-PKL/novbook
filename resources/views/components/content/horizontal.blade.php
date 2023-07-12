<!-- component -->
<div class="flex flex-col m-auto p-auto container ">
    <div class="flex overflow-x-scroll pb-10 hide-scroll-bar lg:mr-44 lg:ml-44 md:mr-20 md:ml-20">
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
