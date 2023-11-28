<template>
    <form @submit.prevent="updateUsers()">
        <a-card title="Cập nhập tài khoản" class="w-full">
            <div class="flex justify-center gap-4">
                <div class="md:w-[25%] p-2 sm:w-full">
                    <div class="flex justify-center mb-3">
                        <a-avatar shape="square" :size="200">
                            <template #icon>
                                <img src="https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/03/17/trend-avatar-1.jpg"
                                    alt="Avatar" />
                            </template>
                        </a-avatar>
                    </div>
                    <div class="flex justify-center">
                        <a-button type="primary bg-blue-500">
                            <i class="fa-solid fa-plus mr-2"></i>chọn ảnh</a-button>
                    </div>
                </div>
                <div class="w-[75%]">
                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label class="">
                                <span class="text-red-500 mr-1">*</span>
                                <span :class="{ 'text-red-500': errors.status_id }">Tình trạng:</span>

                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-select show-search placeholder="Tình trạng" style="width: 100%" :options="users_status"
                                :filter-option="filterOption" allow-clear v-model:value="status_id"
                                :class="{ 'select-danger': errors.status_id }">

                            </a-select>
                            <small v-if="errors.status_id" class="text-red-500">{{ errors.status_id[0] }}</small>
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span :class="{ 'text-red-500': errors.name }">Họ và tên:</span>

                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-input placeholder="Họ và tên" allow-clear v-model:value="name"
                                :class="{ 'name-danger': errors.name }" />

                            <small v-if="errors.name" class="text-red-500">{{ errors.name[0] }}</small>

                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span>Email:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-input placeholder="Email" allow-clear v-model:value="email" />
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span>Phòng ban:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-select show-search placeholder="Tình trạng" style="width: 100%" :options="departments"
                                :filter-option="filterOption" allow-clear v-model:value="department_id"></a-select>
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">

                        </div>
                        <div class="w-2/4">
                            <a-checkbox v-model:checked="change_password">Đối mật khẩu</a-checkbox>
                        </div>
                    </div>

                    <div class="w-full flex mb-3" v-if="change_password == true">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span>Mật khẩu:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-input-password placeholder="Password" allow-clear v-model:value="password" />
                        </div>
                    </div>

                    <div class="w-full flex mb-3" v-if="change_password == true">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span>Xác nhận mật khẩu:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-input-password placeholder="Confirm password" allow-clear
                                v-model:value="password_confirmation" />
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span>Lần đăng nhập gần đây:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <span>{{ login_at }}</span>
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span>Lần đổi mật khẩu gần đây:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <span>{{ change_password_at }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="w-full flex justify-end">
                    <div class="w-full flex justify-end">
                        <a-button class="">
                            <router-link to="/user">
                                <span>Hủy</span>
                            </router-link>
                        </a-button>
                        <a-button type="primary" class="bg-blue-500 ml-2" html-type="submit">
                            <span>Lưu</span>
                        </a-button>
                    </div>
                </div>
            </div>
        </a-card>
    </form>
</template>
<script>
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../stores/use-menu.js";
import dayjs from "dayjs"

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys("admin-users");

        const users_status = ref([]); //bắt buộc phải tham chiếu đến value
        const departments = ref([]);
        const router = useRouter();
        const route = useRoute();
        const users = reactive({
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            department_id: [],
            status_id: [],
            change_password: false,
            login_at: "",
            change_password_at: "",
        });

        const errors = ref({});

        const getUserEdit = () => {
            axios.get(`http://127.0.0.1:8001/api/users/${route.params.id}/edit`)
                .then((response) => {
                    users.name = response.data.users.name;
                    users.email = response.data.users.email;
                    users.department_id = response.data.users.department_id;
                    users.status_id = response.data.users.status_id;

                    response.data.users.login_at ? users.login_at = dayjs(response.data.users.login_at).format('DD/MM/YYYY - HH:mm') : users.login_at = "Chưa có lần đăng nhập nào!"

                    response.data.users.change_password_at ? users.change_password_at = dayjs(response.data.users.change_password_at).format('DD/MM/YYYY - HH:mm') : users.change_password_at = "Chưa có lần thay đổi nào!"

                    users_status.value = response.data.users_status;
                    departments.value = response.data.departments;
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        const updateUsers = () => {
            axios.put(`http://127.0.0.1:8001/api/users/${route.params.id}`, users)
                .then((response) => {
                    if (response.status == 200) {
                        message.success("cập nhập thành công!")
                        router.push({ name: "user" })
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                })
        }


        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };
        getUserEdit();
        return {
            users_status,
            departments,
            ...toRefs(users),
            errors,
            filterOption,
            updateUsers
        };
    },
});
</script>

<style>
.select-danger {
    border: 1px solid red;
    border-radius: 6px;
}

.name-danger {
    border: 1px solid red;
    border-radius: 6px;
}
</style>