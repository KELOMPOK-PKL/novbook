<!-- component -->
<div class="flex flex-col m-auto p-auto">
<<<<<<< HEAD
    <div class="flex overflow-x-scroll pb-10 hide-scroll-bar lg:mr-44 lg:ml-44 md:mr-20 md:ml-20">
        <div class="flex flex-nowrap">
=======
    <div class="flex overflow-x-scroll pb-10 hide-scroll-bar lg:mr-44 lg:ml-44">
        <div class="flex flex-nowrap  ">
>>>>>>> 509792501271ab786e35b179d591e798eb9f236f
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
