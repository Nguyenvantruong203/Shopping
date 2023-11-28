<template>
    <Header></Header>
    <div class="mx-auto">
        <div class="md:flex sm:flex-wrap">
            <!-- Sidebar -->
            <div class="md:w-1/4">
                <div class="bg-gray-200 w-full p-4">
                    <a-list bordered style="width: 100%;">
                        <Menu></Menu>
                        <template #header>
                            <div>Bảng điểu khiển</div>

                        </template>

                    </a-list>
                </div>
            </div>

            <!-- Main Content -->
            <div class="md:w-3/4">
                <router-view></router-view>
                
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../components/admin/Header.vue'
import Menu from '../components/admin/Menu.vue'
export default {
    components: {
        Header,
        Menu
    }
}
</script>