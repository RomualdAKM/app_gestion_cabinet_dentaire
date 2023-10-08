<script setup>
import Base from "../../components/base.vue";
import {ref,onMounted} from 'vue'
import debounce from 'lodash/debounce'


    const devis = ref([])
    const searchQuery = ref('')
    const pagination = ref({
      currentPage: 1,
      totalPages: 1,
    });

    const sendDevi = async (idDevi) => {

        await axios.post('/api/send_devi',{
            id_Devi: idDevi

            }).then((response) => {
                                console.log('ok')
                                    toast.fire({
                                    icon: "success",
                                    title: "Devi envoyer avec succé",
                                });
                            })

        }

    const getDevis = async(page = 1, perPage = 20)=>{
      let response = await axios.get('api/get_devis', {
            params: {
            page,
            perPage,
            search: searchQuery.value,
            },
            });
            devis.value = response.data.devis.data;
            pagination.value.currentPage = response.data.devis.current_page;
            pagination.value.totalPages = response.data.devis.last_page;
    }

    const getDevisDelayed = debounce(getDevis, 10);

    const telechagerDevi = async (id) => {
    await axios.post('/api/download_devi', {id: id}, { responseType: 'arraybuffer' })
        .then(response => {
        const blob = new Blob([response.data], { type: 'application/pdf' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'invoice.pdf';
        link.click();
        })
        .catch(error => {
        console.error(error);
        });
    }


    onMounted( async() => {
        getDevis()
})
</script>


<template>
    <div class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300">
        <Base />
        <!-- Page Body Start -->
        <div class="page-body" style="margin-top: 8rem;">
          <div class="grid grid-cols-12 gap-card-gap">
            <div class="col-span-12">
              <div class="card" style="background-color: #E1E4F4;">
                <div class="card-header pb-4">
                  <div class="flex gap-2 justify-between items-center 3sm:flex-col 3sm:items-end">
                    <div class="flex items-center m-0">
                      <input class="py-[11px] px-[25px] dark:bg-sidebar-dark2 dark:border-border-dark
                       dark:text-white rtl:rounded-bl-none  rtl:rounded-tl-none border rounded w-full
                       text-xs text-Gray-darker rounded-tr-none rounded-br-none"
                       type="Search" placeholder="Search"
                       v-model="searchQuery"
                       @input="getDevisDelayed"
                       >
                      <button class="bg-primary text-white rounded border-none p-3 rounded-tl-none rounded-bl-none rtl:rounded-bl-5 rtl:rounded-br-none rtl:rounded-tr-none rtl:rounded-tl-5">
                        <svg class="w-[20px] h-[20px] stroke-white">
                          <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Search"> </use>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="overflow-auto custom-scroll">
                    <table class="table equal-space table-action invoice">
                      <thead>
                        <tr>
                          <th style="color: rgb(11, 11, 11); text-transform: uppercase;">Numero Devis</th>
                          
                          <th style="color: black; text-transform: uppercase;">Patient</th>
                          <th style="color: black; text-transform: uppercase;">Date</th>
                          <th style="color: black; text-transform: uppercase;">Total</th>
                          <th style="color: black; text-transform: uppercase;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="hover:bg-warning dark:border-border-dark group hover:text-white" v-for="devi in devis" :key="devi.id">
                          <td class="min-w-[210px]">
                            <div class="flex items-center gap-2">
                              <div class="flex items-center gap-[.5625rem]">

                                <div><a href="invoice-preview.html">
                                    <h4 class="text-xs font-semibold text-dark">{{ devi.id }}</h4></a></div>
                              </div>
                            </div>
                          </td>
                         
                          <td class="min-w-[7.5rem]">
                            <h4 class="text-xs font-semibold text-dark">{{ devi.client.nom }}</h4>
                          </td>
                          <td class="min-w-[7.5rem]">
                            <h4 class="text-xs font-semibold text-dark">{{ devi.created_at }}</h4>
                          </td>
                          <td class="min-w-[7.5rem]">
                            <h4 class="text-xs font-semibold text-dark">{{ devi.total }} F.CFA</h4>
                          </td>
                          <td class="min-w-[3.125rem] text-right">
                            <div class="items-center gap-3 flex 2lg:hidden">

                                <button type="button" @click="telechagerDevi(devi.id)">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                    stroke-linejoin="round" class="feather feather-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3">
                                      
                                    </line></svg>

                                </button>

                                <button type="button" @click="sendDevi(devi.id)">

                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                     stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                     class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line>
                                     <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>

                                </button>


                              </div>
                          </td>

                        </tr>


                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="flex justify-between items-center flex-wrap sm:flex-col sm:items-end">
                    <div class="flex items-center">
                        <button
                          class="btn border border-border-light rounded-none flex items-center gap-2 hover:bg-primary dark:border-border-dark group hover:text-white"
                          :disabled="pagination.currentPage === 1"
                          @click="getdevis(pagination.currentPage - 1)"
                        >
                          <svg class="w-4 h-4 stroke-title group-hover:stroke-white">

                          </svg>
                          <span class="sm:hidden">Précédent</span>
                        </button>

                        <button
                          class="btn border border-border-light rounded-none flex items-center gap-2 hover:bg-primary dark:border-border-dark group hover:text-white"
                          :disabled="pagination.currentPage === pagination.totalPages"
                          @click="getdevis(pagination.currentPage + 1)"
                        >
                          <span class="sm:hidden">Suivant</span>
                          <svg class="w-4 h-4 stroke-title group-hover:stroke-white">

                          </svg>
                        </button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page Body End  -->
    </div>

</template>
