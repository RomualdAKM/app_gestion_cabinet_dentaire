<script setup>
import { reactive, ref, onMounted } from "vue";
import router from "./../../../../router/index.js"


let form = reactive({
    name: "",
    email: "",
    password: "",
    c_password: "",
});

let errors = ref([]);


const register = async () => {
    await axios.post("/api/register", form).then((response) => {
        if (response.data.success) {
            localStorage.setItem("token", response.data.data.token);
             router.push("/");
            toast.fire({
            icon: "success",
            title: "Compte créé avec succé",
        });
        } else {
          console.log('error',response.data.message)
           toast.fire({
            icon: "error",
            title: "!!!! Remplissez tout les champs et assurez vous que les passwords correspondent",
        });
        }
    });
};


</script>

<template>
    <!-- Page Body Start -->
    <div class="page-body h-[100vh] !mt-0 bg-cover bg-no-repeat  bg-[url('../../assets/images/dotsbg.jpg')]">
        <div class="!flex items-center justify-center h-full p-[15px] common-animate-main ratio_asos">
          <div class=" grid grid-cols-12 gap-0 mx-auto w-full max-w-[70%] xl:max-w-[50%] md:max-w-[70%] sm:max-w-[80%] 2sm:max-w-[100%] xl:flex xl:justify-center lg:grid items-center">
            <div class="relative col-span-5 bg-white 2xl:col-span-6 z-1 xl:col-span-12 rounded-xl max-w-[470px] min-w-[300px] sm:min-w-[22.75rem] 2sm:min-w-[18.75rem] max-h-max">
              <form class="theme-form flex flex-col gap-3 !m-0 p-8 2sm:p-4" @submit.prevent="register()">
                <h3>Créer un Compte</h3>
               
                <div>
                  <input type="text" placeholder="nom" v-model="form.name">
                </div>
                <div>
                  <input type="email" placeholder="email" v-model="form.email">
                </div>
                <div class="relative">
                  <input type="password" id="password" name="password" placeholder="Password" v-model="form.password">
                  <div class="password-icon"><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye"> </i><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye-off"> </i></div>
                </div>
                <div class="relative">
                  <input type="password" id="password" name="c_password" placeholder="c_password" v-model="form.c_password">
                  <div class="password-icon"><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye"> </i><i class="cursor-pointer w-4 h-4 stroke-title right-[25px] rtl:right-unset top-1/2 rtl:left-[25px] absolute -translate-y-1/2  showHidePassword" data-feather="eye-off"> </i></div>
                </div>
                
                <button type="submit" class="btn btn-primary !text-white hover:drop-shadow-lg my-2">Inscription</button>
                
               
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Page Body End-->
</template>