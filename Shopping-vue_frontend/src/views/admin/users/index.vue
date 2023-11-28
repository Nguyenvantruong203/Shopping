<template>
    <a-card title="Tài khoản" style="width: 100%" class="ms:w-full">
        <div class="w-full flex justify-end mb-5">
            <a-button type="primary" class="bg-blue-600 ">
                <router-link :to="{name:'admin-user-create'}">
                    <i class="fa-solid fa-plus"></i>
                </router-link>
            </a-button>
        </div>
        <div class="w-full">
            <a-table :dataSource="users" :columns="columns" :scroll="{ x: 586 }">
                <template #bodyCell="{ column, index, record }">
                    <template v-if="column.key === 'index'">
                        <span>
                            {{ index + 1 }}
                        </span>
                    </template>

                    <template v-if="column.key === 'status'">
                        <span v-if="record.status_id == 1" class="text-blue-400">{{ record.status }}
                        </span>
                        <span v-if="record.status_id == 2" class="text-red-400">{{ record.status }}
                        </span>
                    </template>

                    <template v-if="column.key === 'action'">
                    <router-link :to="{name: 'admin-user-edit', params:{id: record.id}}">
                        <a-button type="primary" class="bg-blue-600">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a-button>
                    </router-link>
                    </template>

                </template>
            </a-table>
        </div>
    </a-card>
</template>
<script>
import { defineComponent, ref } from 'vue';
import { useMenu } from '../../../stores/use-menu.js';

export default defineComponent({

    setup() {
        useMenu().onSelectedKeys('users')

        const users = ref([])

        const columns = [
            {
                title: 'No',
                key: 'index',
            },
            {
                title: 'Avatar',
                key: 'avatar',
            },
            {
                title: 'Họ và tên',
                dataIndex: 'name',
                key: 'name',
            },
            {
                title: 'Phòng ban',
                dataIndex: 'departments',
                key: 'departments',
            },
            {
                title: 'Vai trò ',
                dataIndex: 'departments',
                key: 'roles',
            },
            {
                title: 'Tình trang',
                dataIndex: 'users_status',
                key: 'users_status',
            },
            {
                title: 'Hành động',
                key: 'action',
                fixed: 'right'
            },
        ]

        const getUser = () => {
            axios.get('http://127.0.0.1:8001/api/users')
                .then((response) => {
                    users.value = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
        getUser();
        return {
            users, columns
        }
    },

})
</script>