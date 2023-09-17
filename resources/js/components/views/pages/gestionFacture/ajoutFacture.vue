<script setup>
import Base from "../../components/base.vue";
import { onMounted, ref,computed} from "vue";
import router from "./../../../../router/index.js";

const actes = ref([])
const clients = ref([])
// const codes = ref([])

const items = ref([
    {
        numero_dent: "",
        acte_id: "",
        code_id: "",

    },
]);

const form = ref({
   
    total: "",
    
    client_id: "",
});
const total = computed(() => {
    let totalPrice = 0;
    items.value.forEach((item) => {
        const selectedCodeId = item.code_id;
        if (selectedCodeId) {
            const selectedCode = actes.value
                .flatMap((acte) => acte.codes)
                .find((code) => code.id === selectedCodeId);
            if (selectedCode) {
                totalPrice += parseFloat(selectedCode.prix); // Utiliser parseFloat pour s'assurer que les prix sont traités comme des nombres
            }
        }
    });

    // Mettre à jour form.total avec le total calculé
    form.value.total = totalPrice.toFixed(2); // Stocker le total dans form.total

    return form.value.total; // Retourner le total pour l'affichage
});

const updateFilteredCodes = (index) => {
    const selectedActeId = items.value[index].acte_id;
    if (selectedActeId) {
        const selectedActe = actes.value.find((acte) => acte.id === selectedActeId);
        if (selectedActe) {
            items.value[index].code_id = ''; // Réinitialise le code sélectionné
            items.value[index].code_id = selectedActe.codes[0].id; // Sélectionne le premier code par défaut
        }
    }
};

const filteredCodes = computed(() => {
    return items.value.map((item) => {
        const selectedActeId = item.acte_id;
        if (selectedActeId) {
            const selectedActe = actes.value.find((acte) => acte.id === selectedActeId);
            if (selectedActe) {
                return selectedActe.codes;
            }
        }
        return [];
    });
});

const saveFacture = async () => {
  const dataToSend = {
              form: form.value,
              items: items.value,
            }
            await axios.post('api/create_facture', dataToSend).then((response)=> {
              if(response.data.success){
                console.log('ok')
                toast.fire({
                      icon: "success",
                      title: "Facture enregistrer avec success",
                  });
                 router.push("/factures")
              }

            })
}

const addItem = () => {
    items.value.push({ numero_dent: "", acte_id: "", code_id: "" });
};



const removeItem = (index) => {
    items.value.splice(index, 1);
};


const getCustomer = async () => {
    let response = await axios.get("/api/customers");
    clients.value = response.data.clients;
};

const getActe = async () => {
    let response = await axios.get("/api/actes");
    actes.value = response.data.actes;
};
// const getCode = async () => {
//     let response = await axios.get("/api/codes");
//     codes.value = response.data.codes;
// };


onMounted(async () => {
    getCustomer();
    getActe();
   //getCode();

});
</script>

<template>
    <div
        class="page-body-wrapper xl:w-full 4xl:w-[calc(100%_-_14.375rem)] w-[calc(100%_-_15.8125rem)] ml-auto transition-all duration-300"
    >
        <Base />
        <!-- Page Body Start -->
        <div class="page-body" style="margin-top: 6rem">
            <div class="grid grid-cols-6 gap-card-gap">
                <div class="col-span-6 md:col-span-12">
                    <div class="card tabs" style="background-color: rgb(163, 23, 165);">
                        <div class="card-header pb-2 header-bottom-border">
                            <div class="flex flex-col">
                                <h2 class="text-lg font-bold text-warning">
                                    AJOUTER FACTURE
                                </h2>

                                <img src="./../../../imgs/dent-dent.jpg" alt="avatar" class="h-25 w-30"/>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tabs-content">
                                <div
                                    class="tab-pan active show"
                                    data-tabContent="1"
                                >
                                    <div class="checkout-detail">
                                        <form style="background-color: rgb(163, 23, 165);"
                                            class="theme-form flex flex-col gap-4 !m-0"
                                        >
                                            
                                            <div>
                                                <label for="number" style="color: rgb(247, 202, 91); font-weight: 900;"
                                                        >Client</label
                                                    >
                                                    <select
                                                        v-model="form.client_id"
                                                        class="form-select block w-full px-3 text-xs font-normal text-content3 bg-white bg-clip-padding bg-no-repeat border border-border-light rounded-5 transition ease-in-out m-0 min-w-[150px] py-[9px] dark:border-border-dark dark:bg-sidebar-dark2"
                                                        id="status"
                                                        aria-label="Default select example"
                                                    >
                                                        <option
                                                            v-for="client in clients"
                                                            :key="client.id"
                                                            :value="client.id"
                                                        >
                                                            {{ client.nom }}
                                                        </option>
                                                    </select>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-warning py-3 text-white"
                                                @click="addItem()"
                                            >
                                                +
                                            </button>

                                            <div
                                                v-for="(item, index) in items"
                                                :key="index"
                                            >
                                                <div>
                                                    <label for="number" style="color: rgb(247, 202, 91); font-weight: 900;"
                                                        >Numero Dent</label
                                                    >
                                                    <select
                                                        v-model="
                                                            item.numero_dent
                                                        "
                                                        class="form-select block w-full px-3 text-xs font-normal text-content3 bg-white bg-clip-padding bg-no-repeat border border-border-light rounded-5 transition ease-in-out m-0 min-w-[150px] py-[9px] dark:border-border-dark dark:bg-sidebar-dark2"
                                                        id="status"
                                                        aria-label="Default select example"
                                                    >
                                                        <option value="18">
                                                            18
                                                        </option>
                                                        
                                                        <option value="20">
                                                            20
                                                        </option>
                                                        <option value="21">
                                                            21
                                                        </option>
                                                        <option value="22">
                                                            22
                                                        </option>
                                                        <option value="23">
                                                            23
                                                        </option>
                                                        <option value="24">
                                                            24
                                                        </option>
                                                        <option value="25">
                                                            25
                                                        </option>
                                                        <option value="26">
                                                            26
                                                        </option>
                                                        <option value="27">
                                                            27
                                                        </option>
                                                        <option value="28">
                                                            28
                                                        </option>
                                                        <option value="29">
                                                            29
                                                        </option>
                                                        <option value="30">
                                                            30
                                                        </option>
                                                        <option value="31">
                                                            31
                                                        </option>
                                                        <option value="32">
                                                            32
                                                        </option>
                                                        <option value="33">
                                                            33
                                                        </option>
                                                        <option value="34">
                                                            34
                                                        </option>
                                                        <option value="35">
                                                            35
                                                        </option>
                                                        <option value="29">
                                                            36
                                                        </option>
                                                        <option value="36">
                                                            37
                                                        </option>
                                                        <option value="38">
                                                            38
                                                        </option>
                                                        <option value="39">
                                                            39
                                                        </option>
                                                        <option value="40">
                                                            40
                                                        </option>
                                                        <option value="41">
                                                            41
                                                        </option>
                                                        <option value="42">
                                                            42
                                                        </option>
                                                        <option value="43">
                                                            43
                                                        </option>
                                                        <option value="44">
                                                            44
                                                        </option>
                                                        <option value="45">
                                                            45
                                                        </option>
                                                        <option value="46">
                                                            46
                                                        </option>
                                                        <option value="47">
                                                            47
                                                        </option>
                                                        <option value="48">
                                                            48
                                                        </option>
                                                        
                                                    </select>
                                                </div>

                                                <div
                                                    class="grid grid-cols-12 gap-5 sm:gap-3 sm:-mt-1"
                                                >
                                                    <div
                                                        class="col-span-6 2md:col-span-6 sm:col-span-12"
                                                    >
                                                        <label for="number" style="color: rgb(247, 202, 91); font-weight: 900;"
                                                            >Acte</label
                                                        >
                                                        <select
                                                            v-model="
                                                                item.acte_id
                                                            "
                                                            @change="updateFilteredCodes(index)"
                                                            class="form-select block w-full px-3 text-xs font-normal text-content3 bg-white bg-clip-padding bg-no-repeat border border-border-light rounded-5 transition ease-in-out m-0 min-w-[150px] py-[9px] dark:border-border-dark dark:bg-sidebar-dark2"
                                                            id="acte"
                                                            aria-label="Sélectionnez un Acte"
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                            >
                                                                Sélectionnez un
                                                                Acte
                                                            </option>
                                                            <option
                                                                v-for="acte in actes"
                                                                :key="acte.id"
                                                                :value="acte.id"

                                                            >
                                                                {{ acte.nom }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        class="col-span-6 2md:col-span-6 sm:col-span-12"
                                                    >
                                                        <label for="number" style="color: rgb(247, 202, 91); font-weight: 900;"
                                                            >Sous_Acte</label
                                                        >
                                                        <select
                                                            class="form-select block w-full px-3 text-xs font-normal text-content3 bg-white bg-clip-padding bg-no-repeat border border-border-light rounded-5 transition ease-in-out m-0 min-w-[150px] py-[9px] dark:border-border-dark dark:bg-sidebar-dark2"
                                                            id="sous_acte"
                                                            aria-label="Sélectionnez un Sous_Acte"
                                                            v-model="item.code_id"
                                                        >
                                                            <option
                                                                value="item.code_id"
                                                                disabled
                                                            >
                                                                Sélectionnez un
                                                                code
                                                            </option>
                                                            <option
                                                              v-for="code in filteredCodes[index]"
                                                              :key="code.id"
                                                              :value="code.id"
                                                          >
                                                              {{ code.nom }} -> Prix : {{ code.prix }} F.CFA

                                                          </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-span-1 md:col-span-6 sm:col-span-12 mt-2 min-w-[130px]"
                                                >
                                                    <button
                                                        type="button"
                                                        @click="
                                                            removeItem(index)
                                                        "
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="40"
                                                            height="40"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="red"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-x-octagon"
                                                        >
                                                            <polygon
                                                                points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"
                                                            ></polygon>
                                                            <line
                                                                x1="15"
                                                                y1="9"
                                                                x2="9"
                                                                y2="15"
                                                            ></line>
                                                            <line
                                                                x1="9"
                                                                y1="9"
                                                                x2="15"
                                                                y2="15"
                                                            ></line>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mt-4">
        <label style="color: rgb(247, 202, 91); font-weight: 900;">Total : {{ total }} F.CFA</label>
    </div>
                                            <div
                                                class="flex justify-end items-center"
                                            >
                                                <button
                                                    class="btn btn-white bg-warning text-white text-xs font-semibold py-2 !m-0 !w-fit"
                                                    type="button"
                                                    @click="saveFacture()"
                                                >
                                                    Créer Facture
                                                </button>
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
