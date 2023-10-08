<template>
  <!-- Sidebar Start -->
  <div class="page-sidebar sidebar-dark unique-sidebar" style="background-color: #E1E4F4;">
    <aside class="sidebar">
      <div class="logo-wrapper" style="background-color: #a2aff9; border: none;">
        <button class="sidebar-btn">
          <svg class="w-6 h-5">
            <use href="https://admin.pixelstrap.com/govo/assets/svg/sprite.svg#Category"> </use>
          </svg>
        </button>
      </div>

      <nav class="sidebar-main">
        <ul class="sidebar-links custom-scroll">
          <li class="title" style="color: rgb(11, 79, 151); font-size: 13px;">Gestion Patients</li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title">
              <router-link to="/clients" class="sidebar-name" style="color: black;"><i class="fas fa-users"></i> Liste Patients</router-link>
            </a>
            <a class="sidebar-link sidebar-title mt-3">
              <router-link to="/ajouter_client" class="sidebar-name" style="color: black;"><i class="fas fa-user-plus"></i> Ajouter Patient</router-link>
            </a>
          </li>

          <li class="title" style="color: rgb(11, 79, 151); font-size: 13px;">Gestion Actes</li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title">
              <router-link to="/actes" class="sidebar-name" style="color: black;"><i class="fas fa-list"></i> Liste Actes</router-link>
            </a>
            <a class="sidebar-link sidebar-title mt-3">
              <router-link to="/ajouter_acte" class="sidebar-name" style="color: black;"><i class="fas fa-plus"></i> Ajouter Acte</router-link>
            </a>
            <a class="sidebar-link sidebar-title mt-3">
              <router-link to="/sous_actes" class="sidebar-name" style="color: black;"><i class="fas fa-list-alt"></i> Liste Sous_Actes</router-link>
            </a>
            <a class="sidebar-link sidebar-title mt-3">
              <router-link to="/ajouter_sous_acte" class="sidebar-name" style="color: black;"><i class="fas fa-plus-square"></i> Ajouter Sous_Acte</router-link>
            </a>
          </li>
          <li class="title" style="color: rgb(11, 79, 151); font-size: 13px;">Gestion Factures</li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title">
              <router-link to="/ajouter_facture" class="sidebar-name" style="color: black;"> <i class="fas fa-file-invoice"></i> Ajouter Facture</router-link>
            </a>
            <a class="sidebar-link sidebar-title mt-3">
              <router-link to="/factures" class="sidebar-name" style="color: black;"><i class="fas fa-file-alt"></i> Liste Factures</router-link>
            </a>
          </li>
          <li class="title font-extrabold" style="color: rgb(11, 79, 151); font-size: 13px;">Gestion Devis</li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title">
              <router-link to="/ajouter_devi" class="sidebar-name" style="color: black;"><i class="fas fa-file-signature"></i> Ajouter Devis</router-link>
            </a>
            <a class="sidebar-link sidebar-title mt-3">
              <router-link to="/devis" class="sidebar-name" style="color: black;"><i class="fas fa-file-contract"></i> Liste Devis</router-link>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
  </div>
  <!-- Sidebar End -->
</template>
<style scoped>
  /* Ajout d'un espace entre l'icône et le texte */
  .sidebar-link i {
    margin-right: 8px; /* Vous pouvez ajuster la valeur selon vos besoins */
    font-size: large;
  }

  /* Exemple d'utilisation de la couleur dorée pour le texte et les icônes */
.sidebar-link i,
.sidebar-name {
  color: rgb(11, 79, 151); /* Vous pouvez ajuster la teinte dorée selon vos préférences */
}



</style>


