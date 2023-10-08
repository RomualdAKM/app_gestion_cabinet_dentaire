<script setup>
import { ref } from 'vue'
import Base from './components/base.vue'

</script>

<template>
    <div>
      <div class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300">
        <Base />
        <!-- Page Body Start  -->
        <div class="page-body" style="margin-top: 8rem;">
          <div class="grid grid-cols-6 gap-card-gap">
            <div class="col-span-3 ratio_109 4xl:col-span-4 lg:col-span-5 2lg:col-span-6 lg:-order-2 2md:col-span-12">
              <!-- Welcome Card -->
              <div class="card p-card-space before:!pt-0 bg-white relative common-animate-main 4xl:h-[390px] xl:h-full gap-0 common-animate-main welcome-card-main h-[410px] ">
                <div>
                  <div class="flex items-center gap-2 justify-between"> <span class="flex items-center gap-2 text-3xl font-semibold text-white 3sm:text-lg 5xl:text-2xl">Bienvenu dans votre application .....</span>
                    
                  </div>
                  <p class="text-xs font-semibold text-content-white leading-[22px] max-w-[285px] mt-1 2md:line-clamp-2 sm:line-clamp-none">Bienvenu dans votre application .</p>
                  <button class="mt-6 sm:mt-4 rounded-5 py-[8px] px-4 bg-white text-xs font-bold text-title dark:bg-sidebar-dark2 hover:text-primary">What New!</button>
                </div>
                <div class=" bg-img"> <img class="img-fluid welcome-img w-25 h-" src="./../imgs/image.png" 
                  alt="welcome-image">
                  
                  <!-- <img class="w-[28px] h-[28px] common-animate animate-ping top-[14px] 6xl:top-[30px] 
                  4xl:top-[14px] absolute left-[10%] 2md:left-[24%] sm:left-[10%] animate__animated animate__infinite animate__shakeY 
                  animate__slower" src="https://admin.pixelstrap.com/govo/assets/images/svg/done.svg" alt="welcome-done-image">
                  <img class="w-24 h-w-24 common-animate animate-ping top-[-10%] 6xl:top-[4%] 4xl:top-[-10%] absolute right-[2%]
                   2md:right-[17%] sm:right-[2%] left-unset  animate__animated animate__infinite animate__shakeY animate__slower" 
                   src="https://admin.pixelstrap.com/govo/assets/images/svg/rocket.svg" alt="welcome-rocket-image"> -->
                  </div>
              </div>
            </div>
            <div class="col-span-3 4xl:col-span-4 lg:col-span-6">
              <div class="grid grid-cols-2 gap-card-gap">
                <div class="col-span-2 lg:col-span-1 2md:col-span-2">
                  <div class="card transition duration-500 ease-in delay-400 hover:shadow-sm hover:-translate-y-1 hover:scale-45">
                    <div class="card-body">
                      <div>
                        <div class="flex items-center justify-between">
                          <div>
                            <h3 class="text-lg font-bold leading-none text-title">Revenu</h3>
                            <h4 class="flex items-center mt-[12px] text-2xl 5xl:text-lg 4xl:text-base font-extrabold text-title gap-[7px]">
                              </h4>
                          </div>
                          
                        </div>
                        <div class="mt-[17px]" id="revenueChart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-span-2 lg:col-span-1 2md:col-span-2">
                  <div class="card transition duration-500 ease-in delay-400 hover:shadow-sm hover:-translate-y-1 hover:scale-45">
                    <div class="card-body">
                      <div>
                        <div class="flex items-center justify-between">
                          <div>
                            <h3 class="text-lg font-bold leading-none text-title">Nombre de Patient</h3>
                            <h4 class="flex items-center mt-[12px] text-2xl 5xl:text-lg 4xl:text-base font-extrabold text-title gap-[7px]">
                              </h4>
                          </div>
                          
                        </div>
                        <div class="mt-[17px]" id="revenueChart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                
          </div>
        </div>
        <!-- Page Body End  -->
        <div class="page-footer 3sm:!px-[10px] fixed bottom-0 xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300 sm:flex-col flex sm:gap-1 gap-2 items-center justify-between py-[1.1875rem] sm:py-4  shadow-footer bg-white px-body-space mt-card-gap">
          <p class="text-xs font-semibold text-center text-content 3sm:text-2xs">Copyright 2023 © Govo theme by pixelstrap</p>
          <div class="flex items-center gap-2 sm:hidden">
            <p class="text-xs font-semibold text-center text-content 3sm:text-2xs">Hand crafted & made with</p><i class="stroke-danger h-[18px] 3sm:h-[14px] 3sm:w-[14px] w-[18px] fill-danger" data-feather="heart"></i>
          </div>
        </div>
      </div>
      <!-- Customizer-->
      <div class="bg-white customizer-sidebar dark:bg-sidebar-dark2 dark:border-border-dark">
        <div class="flex rtl:flex items-center text-title bg-primary justify-between  p-[15px] shadow-md"> <span class="text-base font-semibold text-white">Customizer</span>
          <button class="customizer-close"> <i class="w-4 h-4 stroke-white" data-feather="x"></i></button>
        </div>
        <div class="py-[4px] dark:bg-mode-200">
          <div class="px-[15px] py-7  h-[calc(100vh_-_139px)] overflow-auto ">
            <ul class="flex flex-col gap-7 mode-event">
              <li>
                <div>
                  <h5 class="leading-none text-dark text-sm font-semibold dark:text-white">Template Mode</h5><span class="leading-none text-content text-xs font-medium">Choose template mode dark & light</span>
                </div>
                <div class="mt-2">
                  <ul class="flex items-center gap-3 flex-wrap">
                    <li class="relative">
                      <input class="absolute invisible opacity-0 peer" checked id="light-checked" type="radio" name="mode"><i class="stroke-primary z-[10] transition-all scale-0 opacity-0 absolute peer-checked:opacity-100 peer-checked:scale-100 top-2 right-2 w-4 h-4" data-feather="check-circle"></i>
                      <label class="cursor-pointer block overflow-hidden border shadow-md mode-theme-light border-light dark:border-border-dark rounded-5" for="light-checked"> </label>
                    </li>
                    <li class="relative">
                      <input class="absolute invisible opacity-0 peer" id="dark-checked" type="radio" name="mode"><i class="stroke-white z-[10] transition-all scale-0 opacity-0 absolute peer-checked:opacity-100 peer-checked:scale-100 top-2 right-2 w-4 h-4" data-feather="check-circle"></i>
                      <label class="cursor-pointer block overflow-hidden border shadow-md mode-theme-dark border-light dark:border-border-dark rounded-5" for="dark-checked"> </label>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <div>
                  <h5 class="leading-none text-dark text-sm font-semibold dark:text-white">Layout Type</h5><span class="leading-none text-content text-xs">Choose layout Ltr & Rtl</span>
                </div>
                <div class="mt-2">
                  <ul class="flex items-center gap-3">
                    <li class="relative">
                      <input class="absolute invisible opacity-0 peer" checked id="ltr-checked" type="radio" name="dir"><i class="stroke-primary z-[10] transition-all scale-0 opacity-0 absolute peer-checked:opacity-100 peer-checked:scale-100 top-2 right-2 w-4 h-4" data-feather="check-circle"></i>
                      <label class="cursor-pointer block overflow-hidden border shadow-md layout-ltr border-light dark:border-border-dark rounded-5" for="ltr-checked"> </label>
                    </li>
                    <li class="relative">
                      <input class="absolute invisible opacity-0 peer" id="rtl-checked" type="radio" name="dir"><i class="stroke-white z-[10] transition-all scale-0 opacity-0 absolute peer-checked:opacity-100 peer-checked:scale-100 top-2 right-2 w-4 h-4" data-feather="check-circle"></i>
                      <label class="cursor-pointer block overflow-hidden border shadow-md layout-rtl border-light dark:border-border-dark rounded-5" for="rtl-checked"> </label>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <div class="flex items-center justify-between"><span class="dark:text-white text-sm font-semibold text-title">Monochrome Mode </span>
                  <label class="cursor-pointer inline-flex relative items-center">
                    <input class="sr-only peer monochrome toggle toggle-primary" name="monochrome" type="checkbox" id="monochrome"><span class="w-7 h-4 bg-content rounded-full peer peer-focus:outline-none peer-checked:after:translate-x-full peer-checked:after:content-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-light after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-primary"></span>
                  </label>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="flex items-center gap-2 p-[15px] border-t border-light dark:bg-primaryLight dark:border-t dark:border-border-dark ">
          <button class="btn btn-ghost flex-1 reset-customizer dark:!bg-sidebar-dark dark:text-white">Reset </button>
          <button class="btn btn-primary text-white flex-1">Buy Now</button>
        </div>
      </div>
    </div>
    </div>
    </div>
</template>
