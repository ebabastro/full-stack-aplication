<template>
  <PageComponent>
    <template v-slot:header>
      <h1 class="text-5xl font-extrabold text-gray-900 text-center font-sans">
        Usuarios de la universidad
      </h1>
    </template>

    <div class="bg-gray-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-10 lg:max-w-none">
          <div
            class="mt-3 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-6"
          >
            <router-link to="/buscarEstudiante">
              <div class="group relative">
                <h3 class="text-gray-500 group-hover:text-red-800 text-sm">
                  <a>
                    <span class="absolute inset-0" />
                    Buscar
                  </a>
                </h3>
                <h1
                  class="font-semibold text-gray-900 mb-3 group-hover:text-red-800 text-3xl"
                >
                  Estudiantes de pregrado
                </h1>
                <div
                  class="relative bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 flex justify-center"
                >
                  <AcademicCapIcon class="h-[100%] text-red-800" />
                </div>
              </div>
            </router-link>
            <router-link to="/buscarTrabajador">
              <div class="group relative">
                <h3 class="text-sm text-gray-500 group-hover:text-red-800">
                  <a>
                    <span class="absolute inset-0" />
                    Buscar
                  </a>
                </h3>
                <p
                  class="font-semibold text-gray-900 mb-3 group-hover:text-red-800 text-3xl"
                >
                  Trabajadores de la universidad
                </p>
                <div
                  class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 flex justify-center"
                >
                  <LibraryIcon class="h-[100%] text-red-800" />
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </PageComponent>
</template>

<script setup>
import store from "../store";
import {
  LockClosedIcon,
  LinkIcon,
  SearchIcon,
  BookOpenIcon,
} from "@heroicons/vue/solid";

import {AcademicCapIcon , LibraryIcon} from "@heroicons/vue/outline"
import PageComponent from "../components/PageComponent.vue";
import { computed, ref } from "@vue/reactivity";
import router from "../router";
import { useRouter } from "vue-router";

const ci = ref();

let errorMsg = ref("");

function getEstudiante(ev) {
  ev.preventDefault();
  store
    .dispatch("getEstudiante", ci)
    .then((res) => {
      router.push({
        name: "Surveys",
      });
    })
    .catch((err) => {
      errorMsg.value = err.response.data.error;
    });
}

</script>

<style scoped>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.myColors {
  background-color: #e8dbcd;
}
</style>
