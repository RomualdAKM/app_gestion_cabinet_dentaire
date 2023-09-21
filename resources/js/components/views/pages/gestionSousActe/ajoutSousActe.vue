<script setup>
import Base from '../../components/base.vue'
import {reactive,ref,onMounted} from 'vue'
import router from "./../../../../router/index.js"

const actes = ref([])
let form = reactive({

  nom:"",
  prix:"", 
  acte_id:"",

})

const getActe = async () => {
  let response =   await axios.get('/api/actes')
  actes.value = response.data.actes
  console.log( actes.value)
}


const saveSousActe = async () => {
  await axios.post('/api/create_code',form).then((response) => {
    if(response.data.success){

                router.push("/sous_actes")

                console.log('ok')
                  toast.fire({
                      icon: "success",
                      title: "Sous_Acte enregistrer avec success",
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

onMounted( async () =>{
    getActe()
})
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
                    <h2 class="text-lg font-bold text-dark">AJOUTER SOUS_ACTE</h2>
                 
                  </div>
                </div>
                <div class="card-body">                                  
                  <div class="tabs-content">
                    <div class="tab-pan active show " data-tabContent="1">
                      <div class="checkout-detail">    
                        <form class="theme-form flex flex-col gap-4 !m-0" style="background-color: #d3d9fc;">
                            
                            <div> 
                                <label for="productName" style="color: black; font-weight: 700;">Nom</label>
                                <input type="text" v-model="form.nom" style="color: rgb(112, 107, 107); font-weight: 700;">
                            </div>
                            <div> 
                                <label for="productName" style="color: black; font-weight: 700;">Prix</label>
                                <input type="number" v-model="form.prix" style="color: rgb(112, 107, 107); font-weight: 700;" placeholder="sans espace">
                            </div>
                            <div class="col-span-3  md:col-span-6 sm:col-span-12 min-w-[150px]">
                            <label for="number" style="color: black; font-weight: 700;">Acte</label>
                            <select  v-model="form.acte_id"  class="form-select block w-full px-3 text-xs font-normal text-content3 bg-white bg-clip-padding bg-no-repeat border border-border-light rounded-5 transition ease-in-out m-0 min-w-[150px] py-[9px] dark:border-border-dark dark:bg-sidebar-dark2" id="status" aria-label="Default select example">
                            
                            <option v-for="acte in actes" :key="acte.id" :value="acte.id">{{acte.nom}}</option>

                            </select>
                            </div>
                            
                         
                          <div class="flex justify-end items-center">
                            <button
                             class="btn btn-primary bg-primary text-white text-xs font-semibold py-2 !m-0 !w-fit"
                              type="button"
                          @click="saveSousActe()">Ajouter</button>
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