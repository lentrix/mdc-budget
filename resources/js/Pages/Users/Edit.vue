<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: null,
    availableRoles: Array,
    assignedRoles: Array
})

const form = useForm({
    full_name: props.user.full_name,
    user_name: props.user.user_name,
    password: ""
})

const form2 = useForm({
    role: "",
    action: ""
})

const submit = () =>{
    form.patch('/users/' + props.user.id)
}

async function assign(role, action) {
    form2.role = role
    form2.action = action

    form2.patch('/users/role/' + props.user.id)
    //update the permissions array in the page props.

    //fetch all the permissions of the role.

    if(action=='assign') {


        //add all the permissions into the page props
    }else {
        //remove all the fetched permissions from the page props
    }
}

</script>

<template>
    <Head title="Edit User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Edit User</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="#" @submit.prevent="submit">
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" id="user_name" v-model="form.user_name">
                                <div class="error-label" v-if="form.user_name.error">{{ form.user_name.error }}</div>
                            </div>
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" v-model="form.full_name">
                                <div class="error-label" v-if="form.user_name.error">{{ form.full_name.error }}</div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" v-model="form.password">
                                <div class="error-label" v-if="form.password.error">{{ form.password.error }}</div>
                            </div>
                            <div class="mt-4">
                                <button class="button2" type="submit">
                                    <i class="fa fa-save"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                    <div class="p-6 text-gray-900 flex gap-2">
                        <div class="flex-1">
                            <h4 class="text-xl text-center">Available Roles</h4>
                            <ul>
                                <li class="av-role" v-for="role in availableRoles" :key="role.id" @click="assign(role.name, 'assign')">
                                    <span>{{ role.name }} </span>
                                    <i class="fa-solid fa-circle-right"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl text-center">Assigned Roles</h4>
                            <ul>
                                <li class="as-role" v-for="role in assignedRoles" :key="role" @click="assign(role,'revoke')">
                                    <i class="fa-solid fa-circle-left"></i>
                                    <span class="text-right">{{ role }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                    <div class="p-6 text-gray-900 flex gap-2">
                        <DeleteUserForm class="max-w-xl" :user="props.user" />
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
