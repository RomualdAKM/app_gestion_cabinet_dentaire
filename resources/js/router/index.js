import { createRouter, createWebHistory } from 'vue-router'
import index from '../components/views/index.vue'
import clients from '../components/views/pages/gestionClients/clients.vue'
import ajoutclient from '../components/views/pages/gestionClients/ajoutclient.vue'
import editeclient from '../components/views/pages/gestionClients/editeclient.vue'
import actes from '../components/views/pages/gestionActe/actes.vue'
import ajoutActe from '../components/views/pages/gestionActe/ajoutActe.vue'
import editeActe from '../components/views/pages/gestionActe/editeActe.vue'
import sousActe from '../components/views/pages/gestionSousActe/sousActes.vue'
import ajoutSousActe from '../components/views/pages/gestionSousActe/ajoutSousActe.vue'
import editeSousActe from '../components/views/pages/gestionSousActe/editeSousActe.vue'
import ajoutFacture from '../components/views/pages/gestionFacture/ajoutFacture.vue'
import factures from '../components/views/pages/gestionFacture/factures.vue'
import ajoutDevi from '../components/views/pages/gestionDevi/ajoutDevi.vue'
import devis from '../components/views/pages/gestionDevi/devis.vue'
import register from '../components/views/pages/auth/register.vue'
import login from '../components/views/pages/auth/login.vue'



import notFound from '../components/notFound.vue'

const routes = [
    {
        path: '/',
        name: 'adminHome',
        component: index,
        meta: {
            requiresAuth: true
        }
    },

    //client
    {
        path: '/clients',
        component: clients,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/ajouter_client',
        component: ajoutclient,
         meta: {
            requiresAuth: true
        }
    },
    {
        name: 'EditCustomer',
        path: '/editer-client/:customerId',
        component: editeclient,
         meta: {
            requiresAuth: true
        }
    },

    //acte
    {
        path: '/actes',
        component: actes,
         meta: {
            requiresAuth: true
        }
    },
    {
        path: '/ajouter_acte',
        component: ajoutActe,
         meta: {
            requiresAuth: true
        }
    },
    {
        name: 'EditActe',
        path: '/editer-acte/:acteId',
        component: editeActe,
         meta: {
            requiresAuth: true
        }
    },
    //sous Acte
    {
        path: '/sous_actes',
        component: sousActe,
         meta: {
            requiresAuth: true
        }
    },
    {
        path: '/ajouter_sous_acte',
        component: ajoutSousActe,
         meta: {
            requiresAuth: true
        }
    },
    {
        name: 'EditSousActe',
        path: '/editer-sous_acte/:sousacteId',
        component: editeSousActe,
         meta: {
            requiresAuth: true
        }
    },

    //facture
    {
        path: '/ajouter_facture',
        component: ajoutFacture,
         meta: {
            requiresAuth: true
        }
    },
    {
        path: '/factures',
        component: factures,
         meta: {
            requiresAuth: true
        }
    },

    //devi
    {
        path: '/ajouter_devi',
        component: ajoutDevi,
         meta: {
            requiresAuth: true
        }
    },
    {
        path: '/devis',
        component: devis,
         meta: {
            requiresAuth: true
        }
    },
    //auth
    {
        path: '/register',
        component: register,
         meta: {
            requiresAuth: false
        }
    },
    {
        path: '/login',
        component: login,
        name: 'Login',
        meta: {
            requiresAuth: false,
            
        }
    },

    {
        path: '/:pathMatch(.*)*',
        component: notFound,
         meta: {
            requiresAuth: false
        }
    }

]

const router = createRouter({
    history: createWebHistory(),
    routes,

})
router.beforeEach((to,from) =>{
    if(to.meta.requiresAuth && !localStorage.getItem('token')){
        return { name: 'Login' }
    }

    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return { name: 'adminHome' }
    }
})

export default router
