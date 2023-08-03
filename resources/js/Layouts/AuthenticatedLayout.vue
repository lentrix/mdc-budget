<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen flex">
        <div id="sidebar" class="min-h-screen max-w-[240px] w-[240px] bg-gray-900 py-8 flex items-center flex-col">
            <a href="/dashboard" class="text-center">
                <img src="images/MDC-Logo-clipped.png" class="max-w-[120px] w-[120px] mx-auto" alt="">
                <div class="text-xl text-center text-gray-100 mt-3 px-4">MDC Budgeting System</div>
            </a>

            <nav class="py-6 flex flex-col justify-stretch min-w-full">
                <NavLink href="/procurement-plans" :active="$page.url.startsWith('procurement')">Procurement Plans</NavLink>
                <NavLink href="/items" :active="$page.url.startsWith('items')">Items</NavLink>
                <NavLink href="/departments" :active="$page.url.startsWith('departments')">Departments</NavLink>
                <NavLink href="/budgets" :active="$page.url.startsWith('budgets')">Budgets</NavLink>
                <NavLink href="/users" :active="$page.url.startsWith('users')">Users</NavLink>
            </nav>
        </div>
        <div id="container" class="flex-1 bg-gray-100">
            <div id="top-bar" class="bg-blue-200 flex justify-between p-4 shadow-md">
                <slot name="header" />
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {{ $page.props.auth.user.user_name }}

                                        <svg
                                            class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </div>
            <div>
                <slot />
            </div>
        </div>
    </div>
</template>
