<script setup>
import Base from '../../components/base.vue'
import {reactive,ref} from 'vue'
import router from "./../../../../router/index.js"


let form = reactive({
  nom:"",
  description:"", 
})



const saveActe = async () => {
  await axios.post('/api/create_acte',form).then((response) => {
    if(response.data.success){

                 router.push("/actes")

                console.log('ok')
                  toast.fire({
                      icon: "success",
                      title: "Acte enregistrer avec success",
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
            <div class="col-span-6 md:col-span-12">
              <div class="card tabs" style="background-color: #d3d9fc;">
                <div class="card-header pb-2 header-bottom-border">
                  <div class="flex flex-col">
                    <h2 class="text-lg font-bold text-dark">AJOUTER ACTE</h2>
                 
                  </div>
                </div>
                <div class="card-body">                                  
                  <div class="tabs-content">
                    <div class="tab-pan active show " data-tabContent="1">
                      <div class="checkout-detail">    
                        <form class="theme-form flex flex-col gap-4 !m-0" style="background-color: #c9d0f7;">
                        
                            <div> 
                                <label for="productName" style="color: black; font-weight: 700;">Nom</label>
                                <input type="text" v-model="form.nom"  style="color: rgb(112, 107, 107); font-weight: 700;"  >
                            </div>
                           
                         
                          <div class="flex justify-end items-center">
                            <button
                             class="btn btn-primary text-white text-xs font-semibold py-2 !m-0 !w-fit"
                              type="button"
                          @click="saveActe()">Ajouter</button>
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