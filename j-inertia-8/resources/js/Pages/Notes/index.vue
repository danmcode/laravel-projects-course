<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Módulo de Notas
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px0">
              <h3 class="text-lg text-gray-900">Listado de Notas</h3>
              <p class="text-sm text-gray-600">
                Toma el registro y ejecuta cualquier accion (Ver, Editar o
                Eliminar)
              </p>
            </div>
          </div>

          <div class="md:col-span-2 mt-5 md:mt-0">
            <div class="shadow bg-white md:rounded-md p-4">
              <div class="flex justify-between py-4">
                <input type="text" 
                  class="form-input rounded-md shadow-sm"
                  placeholder="Buscar..."
                  v-model="q"
                >
                <Link
                  :href="route('notes.create')"
                  class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md"
                >
                  Crear
                </Link>
              </div>

              <table class="border px-4 py-2">
                <tr v-for="(note, i) in notes" :key="i">
                  <td>
                    {{ note.excerpt }}
                  </td>
                  <td class="px-4 py-2">
                    <Link :href="route('notes.show', note.id)"> ver </Link>
                  </td>
                  <td class="px-4 py-2">
                    <Link :href="route('notes.edit', note.id)"> Editar </Link>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    AppLayout,
    Head,
    Link,
  },
  props: {
    notes: Array,
  },
  data(){
    return {
      q: ''
    }
  },
  watch: {
    q: function (value){
      this.$inertia.replace(this.route('notes.index', {q:value}))
    }
  }
});
</script>