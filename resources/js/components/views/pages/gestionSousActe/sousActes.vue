<script setup>
    import Base from './../../components/base.vue'
    import {ref,onMounted} from 'vue'
    import debounce from 'lodash/debounce'


    const codes = ref([])
    const searchQuery = ref('')
    const pagination = ref({
      currentPage: 1,
      totalPages: 1,
    });

    const getCodes = async(page = 1, perPage = 5)=>{
      let response = await axios.get('api/get_codes', {
            params: {
            page,
            perPage,
            search: searchQuery.value,
            },
            });
            codes.value = response.data.codes.data;
            pagination.value.currentPage = response.data.codes.current_page;
            pagination.value.totalPages = response.data.codes.last_page;
    }

    const getActesDelayed = debounce(getCodes, 10);

    const deleteCode =  (codeId) => {
    Swal.fire({
          title: "Are you sure ?",
          text: "You can't go back",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it !",
      }).then((result) => {
          if (result.value) {
              axios.get("/api/delete_code/" + codeId).then(() => {
                  Swal.fire("Delete", "sous_acte delete successfully", "success");
                  //getCustomers(pagination.value.currentPage);
                  getCodes()
              });
          }
      });
}


    onMounted( async() => {
    getCodes()
})
</script>
<template>
    <div class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300">
        <Base />

        <!-- Page Body Start -->
        <div class="page-body" style="margin-top: 8rem;">
          <div class="grid grid-cols-12 gap-card-gap">
            <div class="col-span-12">
              <div class="card" style="background-color: rgb(155, 11, 168);"> 
                <div class="card-header pb-4">
                  <div class="flex gap-2 justify-between items-center 3sm:flex-col 3sm:items-end"> 
                    <div class="flex items-center m-0">
                      <input class="py-[11px] px-[25px] dark:bg-sidebar-dark2 dark:border-border-dark
                       dark:text-white rtl:rounded-bl-none  rtl:rounded-tl-none border rounded w-full 
                       text-xs text-Gray-darker rounded-tr-none rounded-br-none" 
                       type="Search" placeholder="Search"
                       v-model="searchQuery"
                       @input="getActesDelayed"
                       >
                     
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="overflow-auto custom-scroll"> 
                    <table class="table equal-space table-action invoice">
                      <thead> 
                        <tr>
                          <th style="color: gold; text-transform: uppercase;">Nom</th>
                          <th style="color: gold; text-transform: uppercase;">Prix</th>
                          <th style="color: gold; text-transform: uppercase;">Acte</th>
                          <th style="color: gold; text-transform: uppercase;">Action</th>
                        </tr>
                      </thead>
                      <tbody> 
                        <tr class="hover:bg-warning dark:border-border-dark group hover:text-white" v-for="code in codes" :key="code.id">
                          <td class="min-w-[210px]">
                            <div class="flex items-center gap-2">
                              <div class="flex items-center gap-[.5625rem]">
                              
                                <div><a href="invoice-preview.html">
                                    <h4 class="text-xs font-semibold text-white">{{ code.nom }}</h4></a></div>
                              </div>
                            </div>
                          </td>
                          <td class="min-w-[7.5rem]"> 
                            <h4 class="text-xs font-semibold text-white">{{ code.prix }}  F.CFA</h4>
                          </td>
                          <td class="min-w-[7.5rem]"> 
                            <h4 class="text-xs font-semibold text-white">{{ code.acte.nom }}</h4>
                          </td>
                          <td class="min-w-[3.125rem] text-right">
                            <div class="items-center gap-3 flex 2lg:hidden">

                                <router-link :to="{name: 'EditSousActe',params:{sousacteId:code.id}}">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>

                                </router-link>
                                <button  type="button" @click="deleteCode(code.id)">

                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>

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
                          @click="getCodes(pagination.currentPage - 1)"
                        >
                          <svg class="w-4 h-4 stroke-title group-hover:stroke-white">
                            
                          </svg>
                          <span class="sm:hidden">Précédent</span>
                        </button>
                       
                        <button
                          class="btn border border-border-light rounded-none flex items-center gap-2 hover:bg-primary dark:border-border-dark group hover:text-white"
                          :disabled="pagination.currentPage === pagination.totalPages"
                          @click="getCodes(pagination.currentPage + 1)"
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