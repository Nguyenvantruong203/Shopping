

<template>
    <section class="absolute w-full h-full">
        <div class="absolute top-0 w-full h-full bg-gray-900"
            style="background-image: url('https://media.istockphoto.com/id/1322277517/photo/wild-grass-in-the-mountains-at-sunset.jpg?s=612x612&w=0&k=20&c=6mItwwFFGqKNKEAzv0mv6TaxhLN3zSE43bWmFN--J5w='); background-size: 100%; background-repeat: no-repeat;">
        </div>
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                        <div class="rounded-t mb-0 px-6 py-6">
                            <div class="text-center mb-3">
                                <h6 class="text-gray-600 text-sm font-bold">
                                    Login with
                                </h6>
                            </div>
                            <div class="btn-wrapper text-center">
                                <button
                                    class="bg-white active:bg-gray-100 text-gray-800 px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                                    type="button" style="transition: all 0.15s ease 0s;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16">
                                        <path fill="currentColor"
                                            d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301c1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg>Google
                                </button>
                            </div>
                            <hr class="mt-6 border-b-1 border-gray-400" />
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <div class="text-gray-500 text-center mb-3 font-bold">
                                <small>Or sign in with credentials</small>
                            </div>
                            <form @submit.prevent="saveData">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="name">Name</label>
                                    <input type="name" id="name" v-model="student.name"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Name" style="transition: all 0.15s ease 0s" />
                                </div>

                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="email">Email</label>
                                    <input type="email" id="email" v-model="student.email"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Email" style="transition: all 0.15s ease 0s" />
                                </div>

                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="password">Password</label>
                                    <input type="password" id="password" v-model="student.password"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Password" style="transition: all 0.15s ease 0s" />
                                </div>

                                <div class=" text-center">
                                    <RouterLink to="/login" class=""><small>Do you have an account?</small>
                                    </RouterLink>
                                </div>
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                        type="submit" style="transition: all 0.15s ease 0s;">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            student: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        saveData() {
            axios.post("http://127.0.0.1:8001/api/register", this.student)
                .then(response => {
                    alert('saved...');
                    // Xử lý dữ liệu trả về nếu cần
                })
                .catch(error => {
                    alert('failed...');
                    // Xử lý lỗi nếu cần
                });
        }
    }
};
</script>
