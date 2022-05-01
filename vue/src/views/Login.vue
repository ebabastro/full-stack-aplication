<template>
  <div>
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Inicie sesión en su cuenta
      </h2>
      <!-- <p class="mt-2 text-center text-sm text-gray-600">
        Or
        {{ "" }}
        <router-link
          :to="{ name: 'Register' }"
          class="font-medium text-indigo-600 hover:text-indigo-500"
        >
          register for free
        </router-link>
      </p> -->
    </div>
      <AlertModal :open="modal" @clicked="closeModal">
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
              Error de autenticación
            </DialogTitle>
          
            <div v-if="error" class="mt-2">
              <p class="text-sm text-gray-500">
                {{ errorMsg }}
              </p>
            </div>
          </div>
        </template>
        
          
        
       
      </AlertModal>
    <form class="mt-8 space-y-6" @submit="login">


      <input type="hidden" name="remember" value="true" />
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="name" class="sr-only">Usuario</label>
          <input
            v-model="user.name"
            id="name"
            name="name"
            type="input"
            autocomplete="name"
            required
            class="appearance-none rounded-none relative block w-full px-3 py-2 border-2 border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-red-800 focus:border-red-800 focus:z-10 sm:text-sm"
            placeholder="Usuario"
          />
        </div>
        <div>
          <label for="password" class="sr-only">Contraseña</label>
          <input
            v-model="user.password"
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
            class="appearance-none rounded-none relative block w-full px-3 py-2 border-2 border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-red-800 focus:border-red-800 focus:z-10 sm:text-sm"
            placeholder="Contraseña"
          />
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input
            v-model="user.remember"
            id="remember-me"
            name="remember-me"
            type="checkbox"
            class="h-4 w-4 text-red-800 focus:ring-red-500 border-gray-300 rounded"
          />
          <label for="remember-me" class="ml-2 block text-sm text-gray-900">
            Recuérdame
          </label>
        </div>
      </div>

      <div>
        <button
          type="submit"
          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-800 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
        >
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <LockClosedIcon class="h-5 w-5 text-white group-hover:hidden" />
            <LockOpenIcon class="h-5 w-5 text-white invisible group-hover:visible" />
          </span>
          Iniciar sesión
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { LockClosedIcon, LockOpenIcon, UserIcon, ExclamationIcon } from "@heroicons/vue/solid";
import { ref } from "vue";
import { useRouter } from "vue-router";
import store from "../store";
import ModalComponent from "../components/ModalComponent.vue";
import AlertModal from "../components/AlertModal.vue";

const router = useRouter();

const user = {
  name: "",
  password: "",
  remember: false,
};

let errorMsg = ref("");
let error = ref(false);
let modal = ref(false);

function closeModal(value) {
  modal.value = value;
}

function login(ev) {
  ev.preventDefault();
  store
    .dispatch("login", user)
    .then((res) => {
      router.push({
        name: "Inicio",
      });
    })
    .catch((err) => {
      error.value = true;
      errorMsg.value = err.response.data.error;
      modal.value = true;
    });
}
</script>

<style scoped>
a {
  color: #42b983;
}
</style>
