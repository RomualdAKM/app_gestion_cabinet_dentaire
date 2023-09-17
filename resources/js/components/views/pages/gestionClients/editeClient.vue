<script setup>
import Base from '../../components/base.vue'
import {reactive,ref,onMounted} from 'vue'
import router from "./../../../../router/index.js"
import { useRoute } from 'vue-router'

const route = useRoute()

const customerId = ref(route.params.customerId)


let customer = ref({
  nom:"",
  prenom:"",
  date:"",
  adresse:"",
  telephone:"",
  email:"",
  
})

const getCustomer = async () => {
    let response = await axios.get(`/api/get_customer/${customerId.value}`)
    customer.value = response.data.customer
    console.log('customer',response.data.customer)
}

const editCustomer = async () => {

await axios.post("/api/update_customer/" + customer.value.id, customer.value)
.then((response) => {
    if(response.data.success){
        router.push("/clients")
        toast.fire({
        icon: "success",
        title: "Client Modifier avec success",
    })
    }else{
           toast.fire({
                  icon: "error",
                  title: "Remplissez Correctement tout les champs",
              });
        console.log('errorr',response.data.message)
    }
})

}

onMounted( async () => {
    getCustomer()
})
</script>

<template>
    <div class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300">
        <Base />
        <!-- Page Body Start -->
        <div class="page-body" style="margin-top: 8rem;">
          <div class="grid grid-cols-6 gap-card-gap">
            <div class="col-span-6 md:col-span-12">
              <div class="card tabs" style="background-color: rgb(163, 23, 165);">
                <div class="card-header pb-2 header-bottom-border">
                  <div class="flex flex-col">
                    <h2 class="text-lg font-bold text-primary">MODIFIER CLIENT</h2>
                 
                  </div>
                </div>
                <div class="card-body">                                  
                  <div class="tabs-content">
                    <div class="tab-pan active show " data-tabContent="1">
                      <div class="checkout-detail">    
                        <form class="theme-form flex flex-col gap-4 !m-0" style="background-color: rgb(163, 23, 165);">
                        
                            <div class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1">
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: rgb(240, 198, 92); font-weight: 900;">Nom</label>
                                <input type="text" v-model="customer.nom" id="sku" placeholder="Nom" >
                                </div>
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: rgb(240, 198, 92); font-weight: 900;">Prenom</label>
                                <input type="email" id="sku" v-model="customer.prenom"  placeholder="Prenom" >
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1">
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: rgb(240, 198, 92); font-weight: 900;">Email</label>
                                <input type="text" v-model="customer.email"  id="sku" placeholder="facultatif">
                                </div>
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: rgb(240, 198, 92); font-weight: 900;">Contact</label>
                                <input type="text" v-model="customer.telephone"  id="sku" placeholder="Contact Ex=+229956845" >
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1">
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: rgb(240, 198, 92); font-weight: 900;">Adresse</label>
                                <input type="text" v-model="customer.adresse"  id="sku" placeholder="Adresse" >
                                </div>
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: rgb(240, 198, 92); font-weight: 900;">Date de Naissance</label>
                                <input type="date" v-model="customer.date"  id="sku">
                                </div>
                                
                            </div>
                         
                          <div class="flex justify-end items-center">
                            <button
                             class="btn btn-primary bg-warning text-white text-xs font-semibold py-2 !m-0 !w-fit"
                              type="button"
                             @click="editCustomer()">Modifier</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- Page Body End -->
    </div>
</template>