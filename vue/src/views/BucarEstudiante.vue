<template>
  <PageComponent>
    <template v-slot:header>
      <h1 class="text-3xl font-bold text-gray-900 text-center">
        Buscar Estudiante
      </h1>
    </template>
    <AlertModal :open="modal" :errorMsg="errorMsg" @clicked="closeModal">
      <template v-slot:alert-content>
        <div
          v-if="error"
          class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
        >
          <ExclamationIcon
            class="h-6 w-6 text-red-600"
            aria-hidden="true"
          />
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <DialogTitle
            as="h3"
            class="text-lg leading-6 font-medium text-gray-900"
          >
            Error de búsqueda
          </DialogTitle>
          <div v-if="error" class="mt-2">
              <p class="text-sm text-gray-500">
                {{ errorMsg }}
              </p>
            </div>
        </div>
      </template>
    </AlertModal>


    <div
      class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
      <form
        class="rounded-md shadow-sm -space-y-px"
        @submit.prevent="getEstudiante"
      >

        <div class="mb-3">
          <label for="ci" class="sr-only">Carnet de Identidad</label>
          <input
            v-model="ci"
            id="ci"
            name="ci"
            type="text"
            autocomplete="ci"
            required=""
            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-red-800 focus:border-red-800 focus:z-10 sm:text-sm"
            placeholder="Carnet de Identidad"
          />
        </div>
        <div>
          <button
            type="submit"
            class="mt-3 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-800 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
          >
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <SearchIcon
                class="h-5 w-5 text-white-500 group-hover:text-white"
                aria-hidden="true"
              />
            </span>
            Buscar
          </button>
        </div>
      </form>
    </div>
  </PageComponent>
</template>

<script setup>
import store from "../store";
import { LockClosedIcon, LinkIcon, SearchIcon, ExclamationIcon, CheckIcon } from "@heroicons/vue/solid";
import PageComponent from "../components/PageComponent.vue";
import { computed, ref } from "@vue/reactivity";
import router from "../router";
import ModalComponent from "../components/ModalComponent.vue";
import AlertModal from "../components/AlertModal.vue";

const ci = ref();

const errorMsg = ref("");
let modal = ref(false);
let error = ref(false);

function closeModal(value) {
  modal.value = value;
}

function getEstudiante(ev) {
  ev.preventDefault();
  store
    .dispatch("getEstudiante", ci)
    .then((res) => {
      router.push({
        name: "Estudiante",
      });
    })
    .catch((err) => {
      error.value = true;
      errorMsg.value = err.response.data.message;
      modal.value = true;
    });
}
</script>

<style scoped>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
