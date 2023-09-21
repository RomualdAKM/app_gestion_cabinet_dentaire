<script setup>
import Base from './../../components/base.vue'
import {ref,onMounted} from 'vue'
import debounce from 'lodash/debounce'


const customers = ref([])
const searchQuery = ref('')
const pagination = ref({
  currentPage: 1,
  totalPages: 1,
});

const getCustomers = async (page = 1, perPage = 20) => {

    let response = await axios.get('api/get_customers', {
        params: {
        page,
        perPage,
        search: searchQuery.value,
        },
        });
        customers.value = response.data.customers.data;
        pagination.value.currentPage = response.data.customers.current_page;
        pagination.value.totalPages = response.data.customers.last_page;
}  
const getCustomersDelayed = debounce(getCustomers, 10);



const deleteCustomer =  (customerId) => {
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
            axios.get("/api/delete_customer/" + customerId).then(() => {
                Swal.fire("Delete", "customer delete successfully", "success");
                //getCustomers(pagination.value.currentPage);
               getCustomers()
            });
        }
    });
}

onMounted( async () => {
    getCustomers()
})

</script>

<template>
      <div class="page-body-wrapper  xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300">
        <Base />
        
          <!-- Page Body Start -->
        <div class="page-body" style="margin-top: 8rem;">
          <div class="grid grid-cols-12 gap-card-gap">
            <div class="col-span-12" >
              <div class="card" style="background-color: #E1E4F4;"> 
                <div class="card-header pb-4">
                  <div  class="flex gap-2 justify-between items-center 3sm:flex-col 3sm:items-end"> 
                    
                    <div class="flex items-center m-0" >
                      <input class="py-[11px] px-[25px] dark:bg-sidebar-dark2 dark:border-border-dark 
                      dark:text-white rtl:rounded-bl-none  rtl:rounded-tl-none border rounded w-full text-xs 
                      text-Gray-darker rounded-tr-none rounded-br-none" 
                      type="Search" 
                      v-model="searchQuery"
                      @input="getCustomersDelayed"
                      placeholder="Search">
                      
                    </div>
                  </div>
                </div>
                <div class="card-body" >
                  <div class="overflow-auto custom-scroll"> 
                    <table class="table equal-space table-action invoice" >
                      <thead> 
                        <tr>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Nom</th>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Prenom</th>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Date Naissance</th>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Numéro</th>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Adresse</th>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Email</th>
                          <th style="color: rgb(11, 79, 151); text-transform: uppercase;">Action</th>
                        </tr>
                      </thead>
                      <tbody> 
                        <tr class="hover:bg-warning dark:border-border-dark group hover:text-white" v-for="customer in customers" :key="customer.id">
                         
                          <td class="min-w-[7.5rem]"> 
                            <h4 class="text-xs font-bold text-dark">{{ customer.nom }}</h4>
                          </td>
                          <td class="min-w-[7.5rem]"> 
                            <h4 class="text-xs font-bold text-dark">{{ customer.prenom }}</h4>
                          </td>
                          <td class="min-w-[7.5rem]"> 
                            <h4 class="text-xs font-bold text-dark">{{ customer.date }}</h4>
                          </td>
                          <td class="min-w-[7.5rem]"> 
                            <h4 class="text-xs font-bold text-dark">{{ customer.telephone }}</h4>
                          </td>
                          <td class="min-w-[5.5rem]">
                            <h4 class="text-xs font-bold capitalize text-dark">{{ customer.adresse }}</h4>
                          </td>
                          <td class="min-w-[6.25rem]">
                            <h4 class="text-xs font-bold text-dark">{{ customer.email }}</h4>
                          </td>
                          <td class="min-w-[3.125rem] text-right">
                            <div class="items-center gap-3 flex 2lg:hidden">

                                <router-link :to="{name: 'EditCustomer',params:{customerId:customer.id}}">
    
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
    
                                </router-link>
                                <button  type="button" @click="deleteCustomer(customer.id)">
    
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
    
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
                          @click="getCustomers(pagination.currentPage - 1)"
                        >
                          <svg class="w-4 h-4 stroke-title group-hover:stroke-white">
                            <!-- Icône de la flèche gauche -->
                          </svg>
                          <span class="sm:hidden">Précédent</span>
                        </button>
                        <!-- Afficher les numéros de page ici -->
                        <button
                          class="btn border border-border-light rounded-none flex items-center gap-2 hover:bg-primary dark:border-border-dark group hover:text-white"
                          :disabled="pagination.currentPage === pagination.totalPages"
                          @click="getCustomers(pagination.currentPage + 1)"
                        >
                          <span class="sm:hidden">Suivant</span>
                          <svg class="w-4 h-4 stroke-title group-hover:stroke-white">
                            <!-- Icône de la flèche droite -->
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
<style>
/* Fichier CSS */
.table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
}

.table th,
.table td {
  padding: 10px;
  text-align: center; /* Aligner horizontalement le texte au centre */

  vertical-align: middle;
  border: 1px solid #ccc; /* Ajoute des bordures */
}

.table th {
  background-color: rgb(229, 235, 247); /* Couleur de fond de l'en-tête */
  color: white;
  text-transform: uppercase;
}

.table tbody tr:nth-child(even) {
  background-color: rgb(223, 237, 253); /* Couleur de fond des lignes paires */
}

.table tbody tr:hover {
  background-color: rgb(244, 246, 249); /* Couleur de fond au survol */
  color: white; /* Couleur du texte au survol */
}



</style>

