<template>
    <form @submit.prevent="createUsers()">
        <a-card title="Tạo mới tài khoản" class="w-full">
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
                                <span>Tình trạng:</span>
                                <!-- :class="{ 'text-red-500': errors.status_id }" -->
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-select show-search placeholder="Tình trạng" style="width: 100%" :options="users_status"
                                :filter-option="filterOption" allow-clear v-model:value="status_id">
                                <!-- :class="{ 'select-danger': errors.status_id }" -->
                            </a-select>
                            <!-- <small v-if="errors.status_id" class="text-red-500">{{ errors.status_id[0] }}</small> -->
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
                        <div class="w-1/4 flex items-center justify-end sm:text-end mr-3">
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span>Họ và tên:</span>
                                <!-- :class="{ 'text-red-500': errors.name }" -->
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-input placeholder="Họ và tên" allow-clear v-model:value="name" />
                            <!-- :class="{ 'name-danger': errors.name }"  -->
                            <!-- <small v-if="errors.name" class="text-red-500">{{ errors.name[0] }}</small> -->

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
                            <label>
                                <span class="text-red-500 mr-1">*</span>
                                <span>Mật khẩu:</span>
                            </label>
                        </div>
                        <div class="w-2/4">
                            <a-input-password placeholder="Password" allow-clear v-model:value="password" />
                        </div>
                    </div>

                    <div class="w-full flex mb-3">
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
                </div>
            </div>

            <div class="">
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
        </a-card>
    </form>
</template>
<script>
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useRouter } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../stores/use-menu.js";

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys("admin-users-create");

        const users_status = ref([]); //bắt buộc phải tham chiếu đến value
        const departments = ref([]);
        const router = useRouter();
        const users = reactive({
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            department_id: [],
            status_id: []
        });

        const errors = ref({});

        const getUsersCreate = () => {
            axios.get("http://127.0.0.1:8001/api/users/create")
                .then((response) => {
                    users_status.value = response.data.users_status;
                    departments.value = response.data.departments;
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const createUsers = () => {
            axios.post("http://127.0.0.1:8001/api/users", users)
                .then((response) => {
                    if(response.status == 200){
                    message.success("Tạo mới thành công!")
                    router.push({name: "user"})
                }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                });
        };
        getUsersCreate();
        return {
            users_status,
            departments,
            ...toRefs(users),
            errors,
            filterOption,
            createUsers,
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