<template>
  <div class="w-full">
    <div class="flex text-white bg-green-800 p-4">
      <!-- Mobile Menu Button -->
      <div class="w-2/6 items-center justify-center">
        <span @click="showDrawer"><i class="fa-solid fa-align-justify"></i></span>
      </div>

      <!-- Logo and Title -->
      <div class="w-3/6 flex items-center justify-center sm:justify-start">
        <img
          src="https://marketplace.canva.com/EAErLHYem8k/1/0/900w/canva-h%E1%BB%93ng-b%C3%B4ng-hoa-h%C3%ACnh-v%E1%BA%BD-ngu%E1%BB%87ch-ngo%E1%BA%A1c-t%E1%BB%91i-gi%E1%BA%A3n-l%E1%BB%9Di-kh%E1%BA%B3ng-%C4%91%E1%BB%8Bnh-tr%C3%ADch-d%E1%BA%ABn-chung-h%C3%ACnh-n%E1%BB%81n-%C4%91i%E1%BB%87n-tho%E1%BA%A1i-4hHMlkM01Uk.jpg"
          alt="Logo" height="32" width="34" class="ms-3 me-3" />
        <span class="hidden sm:flex">QUAN TRI</span>
      </div>

      <!-- Admin Section -->
      <div class="w-1/6 sm:flex items-center justify-end">
        <span @click="showDrawerUser">Admin</span>
      </div>
    </div>

    <!-- Drawer for Mobile -->
    <a-drawer v-model:open="open" class="bg-black" root-class-name="root-class-name" :root-style="{ color: 'blue' }"
      style="color: red" title="Danh mục" placement="left" @afteropenchange="afterOpenChange">
        <Menu></Menu>
    </a-drawer>

    <!-- Drawer for Tablet and Desktop -->
    <a-drawer v-model:open="open_user" class="bg-black" root-class-name="root-class-name" :root-style="{ color: 'blue' }"
      style="color: red" title="Admin" placement="right" @afteropenchange="afterOpenChange">
      <p>Some contents...</p>
      <p>Some contents...</p>
      <p>Some contents...</p>
    </a-drawer>
  </div>
</template>
  
<script>
import Menu from '../admin/Menu.vue'
import { ref } from 'vue';

export default {
  components: {
    Menu,
  },
  setup() {
    const open = ref(false);
    const open_user = ref(false);

    const afterOpenChange = (bool) => {
      console.log('open', bool);
    };

    const showDrawer = () => {
      open.value = true;
    };

    const showDrawerUser = () => {
      open_user.value = true;
    };

    return { open, open_user, afterOpenChange, showDrawer, showDrawerUser };
  },
};
</script>
  