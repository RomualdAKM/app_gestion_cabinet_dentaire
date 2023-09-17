<script setup>
import Base from '../../components/base.vue'
import {reactive,ref} from 'vue'
import router from "./../../../../router/index.js"


let form = reactive({
  nom:"",
  prenom:"",
  date:"",
  adresse:"",
  telephone:"",
  email:"",
  
})



const saveCustomer = async () => {
  await axios.post('/api/create_customer',form).then((response) => {
    if(response.data.success){

                 router.push("/clients")

                console.log('ok')
                  toast.fire({
                      icon: "success",
                      title: "Client enregistrer avec success",
                  });

                }

                 
              else{
                toast.fire({
                      icon: "error",
                      title: "Remplissez correctement tout les champs",
                  });
                console.log('errorr',response.data.message)
              }
      
      
   
  })

}
</script>

<template>
    <div class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300">
        <Base />
        <!-- Page Body Start -->
        <div class="page-body" style="margin-top: 8rem;">
          <div class="grid grid-cols-6 gap-card-gap">
            <div class="col-span-6 md:col-span-12" >
              <div class="card tabs" style="background-color: rgb(107, 177, 252);">
                <div class="card-header pb-2 header-bottom-border">
                  <div class="flex flex-col">
                    <h2 class="text-lg font-bold text-dark">AJOUTER PARTIENT</h2>
                 
                  </div>
                </div>
                <div class="card-body">                                  
                  <div class="tabs-content">
                    <div class="tab-pan active show " data-tabContent="1">
                      <div class="checkout-detail">    
                        <form class="theme-form flex flex-col gap-4 !m-0" style="background-color: rgb(107, 177, 252);">
                        
                            <div class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1">
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: black; font-weight: 700;">Nom</label>
                                <input type="text" v-model="form.nom" id="sku"  >
                                </div>
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: black; font-weight: 700;">Prenom</label>
                                <input type="email" id="sku" v-model="form.prenom"   >
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1">
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: black; font-weight: 700;">Email</label>
                                <input type="text" v-model="form.email"  id="sku" >
                                </div>
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: black; font-weight: 700;">Contact</label>
                                <input type="text" v-model="form.telephone"  id="sku" >
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1">
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: black; font-weight: 700;">Adresse</label>
                                <input type="text" v-model="form.adresse"  id="sku" >
                                </div>
                                <div class="col-span-6 2md:col-span-6 sm:col-span-12">
                                <label for="sku" style="color: black; font-weight: 700;">Date de Naissance</label>
                                <input type="date" v-model="form.date"  id="sku">
                                </div>
                                
                            </div>
                         
                          <div class="flex justify-end items-center">
                            <button
                             class="btn btn-primary bg-primary text-white text-xs font-bold py-2 !m-0 !w-fit"
                              type="button"
                          @click="saveCustomer()">Ajouter</button>
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
