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
        component: index
    },

    //client
    {
        path: '/clients',
        component: clients
    },
    {
        path: '/ajouter_client',
        component: ajoutclient
    },
    {
        name: 'EditCustomer',
        path: '/editer-client/:customerId',
        component: editeclient
    },

    //acte
    {
        path: '/actes',
        component: actes
    },
    {
        path: '/ajouter_acte',
        component: ajoutActe
    },
    {
        name: 'EditActe',
        path: '/editer-acte/:acteId',
        component: editeActe
    },
    //sous Acte
    {
        path: '/sous_actes',
        component: sousActe
    },
    {
        path: '/ajouter_sous_acte',
        component: ajoutSousActe
    },
    {
        name: 'EditSousActe',
        path: '/editer-sous_acte/:sousacteId',
        component: editeSousActe
    },

    //facture
    {
        path: '/ajouter_facture',
        component: ajoutFacture
    },
    {
        path: '/factures',
        component: factures
    },

    //devi
    {
        path: '/ajouter_devi',
        component: ajoutDevi
    },
    {
        path: '/devis',
        component: devis
    },
    //auth
    {
        path: '/register',
        component: register
    },
    {
        path: '/login',
        component: login
    },

    {
        path: '/:pathMatch(.*)*',
        component: notFound,
    }

]

const router = createRouter({
    history: createWebHistory(),
    routes,

})

export default router
