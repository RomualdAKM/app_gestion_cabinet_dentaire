<script setup>
import Base from '../../components/base.vue'
import {reactive,ref,onMounted} from 'vue'
import router from "./../../../../router/index.js"
import { useRoute } from 'vue-router'

const route = useRoute()

const acteId = ref(route.params.acteId)


let acte = ref({
  nom:"",
  description:"",
   
})

const getActe = async () => {
    let response = await axios.get(`/api/get_acte/${acteId.value}`)
    acte.value = response.data.acte
    console.log('acte',response.data.acte)
}

const editActe = async () => {

await axios.post("/api/update_acte/" + acte.value.id, acte.value)
.then((response) => {
    if(response.data.success){
        router.push("/actes")
        toast.fire({
        icon: "success",
        title: "Acte Modifier avec success",
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
              <div class="card tabs" style="background-color: rgb(163, 23, 165);">
                <div class="card-header pb-2 header-bottom-border">
                  <div class="flex flex-col">
                    <h2 class="text-lg font-bold text-primary">MODIFIER ACTE</h2>
                    
                  </div>
                </div>
                <div class="card-body">                                  
                  <div class="tabs-content">
                    <div class="tab-pan active show " data-tabContent="1">
                      <div class="checkout-detail">    
                        <form class="theme-form flex flex-col gap-4 !m-0" style="background-color: rgb(163, 23, 165);">
                        
                            <div> 
                                <label for="productName" style="color: rgb(247, 202, 91); font-weight: 900;">Nom</label>
                                <input type="text" v-model="acte.nom"  id="productName" placeholder="Nom">
                            </div>
                            <div> 
                                <label for="productName" style="color: rgb(247, 202, 91); font-weight: 900;">Description</label>
                                <textarea v-model="acte.description" placeholder="description">
                                </textarea>
                            </div>
                         
                          <div class="flex justify-end items-center">
                            <button
                             class="btn btn-primary text-white text-xs font-semibold py-2 !m-0 !w-fit"
                              type="button"
                              @click="editActe()">Modifier</button>
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