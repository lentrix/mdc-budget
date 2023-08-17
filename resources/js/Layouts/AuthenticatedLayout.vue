<script setup>
import { ref } from 'vue';
// import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
// import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
// import { Link } from '@inertiajs/vue3';

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
                <NavLink href="/procurement-plans" :active="$page.url.startsWith('procurement')">
                    <svg fill="#dddddd" height="30px" width="30px" version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve" stroke="#dddddd"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_11_" d="M57.9,41.9c11.3,0,20.5-9.2,20.5-20.5c0-11.3-9.2-20.5-20.5-20.5c-11.3,0-20.5,9.2-20.5,20.5 C37.4,32.7,46.6,41.9,57.9,41.9"></path> <path id="XMLID_10_" d="M203.4,41.6c11.5,0,20.8-9.3,20.8-20.8c0-11.5-9.3-20.8-20.8-20.8c-11.5,0-20.8,9.3-20.8,20.8 C182.6,32.3,191.9,41.6,203.4,41.6"></path> <path id="XMLID_7_" d="M50.3,158.5c-26.9,0-48.7,21.8-48.7,48.7c0,26.9,21.8,48.8,48.7,48.8c26.9,0,48.8-21.8,48.8-48.8 C99.1,180.3,77.2,158.5,50.3,158.5 M56.1,238.2v7.8H44.4v-7.8c-12.4-1.4-20.4-13.3-20.4-21h12.4c0,3.5,2.7,8.1,8,9.2v-14.6 c-2.7-0.5-4.2-0.9-7.1-1.7c-7.3-2-12.4-8.2-12.4-16.1c0-7.8,7.6-16.6,19.4-18.1v-7.3h11.7v7.3c12.5,1.6,20.1,10.8,20.1,20l-12.2,0 c0-4-3.4-7.7-8-8.1v13.7c3.4,0.7,3.4,0.7,6.5,1.5c11.6,3.2,14.2,10.7,14.2,17.1C76.8,229.8,69,236.5,56.1,238.2"></path> <path id="XMLID_4_" d="M44.4,199.3c-5.2-0.9-6.6-3.2-6.6-5.6c0-2.8,3.5-5.5,6.6-5.9V199.3z M56.2,226.3V214c5.1,0.7,8.4,3,8.4,6.1 C64.6,222.9,61.6,226.1,56.2,226.3"></path> <path id="XMLID_3_" d="M31.2,77.4h8.1l-9.3,34.7h56l-9.3-34.7h8.1l9.6,34.7h18L100.6,70c-3.1-10.2-13.2-21-26.4-21H41.5 c-13.2,0-23.3,10.8-26.4,21L3.6,112.1h18L31.2,77.4z"></path> <path id="XMLID_2_" d="M225.6,48.8c10.2,0,18.5,8.3,18.5,18.5l0,56.8H256v23.3l-24.1,0v96.4c0,6.7-5.5,12.2-12.3,12.2 c-6.7,0-12.2-5.5-12.2-12.2v-96.4h-7.8v96.4c0,6.7-5.5,12.2-12.2,12.2c-6.7,0-12.2-5.5-12.2-12.2v-96.4L1.6,147.4v-23.4h173.6V69.4 l-38.8,46c-8.2,9.4-22.7-2.4-14.5-12.4l40.2-48.4c2.6-2.6,4.9-5.8,14.5-5.8H225.6z"></path> </g></svg>
                    Procurement Plans
                </NavLink>
                <NavLink href="/items" :active="$page.url.startsWith('items')">
                    <svg fill="#dddddd" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="30px" height="30px" stroke="#dddddd"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(0 -1)"> <g> <g> <rect x="349.867" y="266.446" width="51.2" height="34.133"></rect> <path d="M469.333,334.713H460.8v-179.2c0-14.114-11.486-25.6-25.6-25.6H281.6c-14.114,0-25.6,11.486-25.6,25.6v179.2h-17.067 V121.38c0-14.114-11.486-25.6-25.6-25.6h-25.6c0-0.623-0.119-1.22-0.188-1.826c0.068,0.631,0.188,1.237,0.188,1.877v79.241 c0,5.914-3.524,11.196-8.986,13.457c-1.809,0.751-3.712,1.118-5.589,1.118c-3.772,0-7.475-1.485-10.274-4.267l-17.818-17.826 l-17.818,17.818c-4.181,4.181-10.402,5.419-15.863,3.157c-5.461-2.261-8.986-7.544-8.986-13.457V95.831 c0-0.64,0.119-1.246,0.188-1.877c-0.068,0.606-0.188,1.203-0.188,1.826H59.733c-14.114,0-25.6,11.486-25.6,25.6v214.195 C14.686,339.543,0,356.78,0,377.38c0,23.526,19.14,42.667,42.667,42.667h426.667c23.526,0,42.667-19.14,42.667-42.667 C512,353.853,492.86,334.713,469.333,334.713z M51.2,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533 s8.533,3.823,8.533,8.533S55.91,385.913,51.2,385.913z M85.333,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533 c4.71,0,8.533,3.823,8.533,8.533S90.044,385.913,85.333,385.913z M119.467,385.913c-4.71,0-8.533-3.823-8.533-8.533 s3.823-8.533,8.533-8.533S128,372.669,128,377.38S124.177,385.913,119.467,385.913z M153.6,385.913 c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533c4.71,0,8.533,3.823,8.533,8.533S158.31,385.913,153.6,385.913z M187.733,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533s8.533,3.823,8.533,8.533 S192.444,385.913,187.733,385.913z M221.867,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533 c4.71,0,8.533,3.823,8.533,8.533S226.577,385.913,221.867,385.913z M256,385.913c-4.71,0-8.533-3.823-8.533-8.533 s3.823-8.533,8.533-8.533s8.533,3.823,8.533,8.533S260.71,385.913,256,385.913z M290.133,385.913 c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533s8.533,3.823,8.533,8.533S294.844,385.913,290.133,385.913z M324.267,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533s8.533,3.823,8.533,8.533 S328.977,385.913,324.267,385.913z M358.4,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533 s8.533,3.823,8.533,8.533S363.11,385.913,358.4,385.913z M392.533,385.913c-4.71,0-8.533-3.823-8.533-8.533 s3.823-8.533,8.533-8.533c4.71,0,8.533,3.823,8.533,8.533S397.244,385.913,392.533,385.913z M409.6,317.646h-68.267 c-4.71,0-8.533-3.823-8.533-8.533v-51.2c0-4.71,3.823-8.533,8.533-8.533H409.6c4.719,0,8.533,3.823,8.533,8.533v51.2 C418.133,313.823,414.319,317.646,409.6,317.646z M426.667,385.913c-4.71,0-8.533-3.823-8.533-8.533s3.823-8.533,8.533-8.533 s8.533,3.823,8.533,8.533S431.377,385.913,426.667,385.913z M460.8,385.913c-4.71,0-8.533-3.823-8.533-8.533 s3.823-8.533,8.533-8.533s8.533,3.823,8.533,8.533S465.51,385.913,460.8,385.913z"></path> <polygon points="170.667,169.021 170.667,95.831 119.518,95.78 119.467,169.021 145.067,143.421 "></polygon> </g> </g> </g> </g></svg>
                    Items
                </NavLink>
                <NavLink href="/departments" :active="$page.url.startsWith('departments')">
                    <svg width="30px" height="30px" viewBox="0 0 1024 1024" fill="#dddddd" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#dddddd"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M896 896c0-35.376-28.626-64-64-64V448c35.376 0 64-28.626 64-64h128L512 0 0 384h128c0 35.376 28.626 64 64 64v384c-35.376 0-64 28.626-64 64-70.688 0-128 57.312-128 128h1024c0-70.688-57.312-128-128-128zM512 128c53 0 96 43 96 96s-43 96-96 96-96-43-96-96 43-96 96-96z m-128 768c0-35.376-28.626-64-64-64V448c35.376 0 64-28.626 64-64h256c0 35.376 28.626 64 64 64v384c-35.376 0-64 28.626-64 64H384z"></path></g></svg>
                    Departments
                </NavLink>
                <NavLink href="/budgets" :active="$page.url.startsWith('budgets')">
                    <svg fill="#dddddd" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#dddddd"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon points="360.421,20.211 360.421,101.053 441.263,101.053 "></polygon> </g> </g> <g> <g> <polygon points="320,141.474 320,0 84.21,0 84.21,175.158 306.526,175.158 306.526,485.053 461.474,485.053 461.474,141.474 "></polygon> </g> </g> <g> <g> <path d="M50.526,215.579V512h215.579V215.579H50.526z M138.105,464.842H97.684v-40.421h40.421V464.842z M138.105,384H97.684 v-40.421h40.421V384z M218.947,464.842h-40.421v-40.421h40.421V464.842z M218.947,384h-40.421v-40.421h40.421V384z M218.947,303.158H97.684v-40.421h121.263V303.158z"></path> </g> </g> </g></svg>
                    Budgets
                </NavLink>
                <NavLink href="/users" :active="$page.url.startsWith('users')">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dddddd"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M15.8 21C15.8 21.3866 16.1134 21.7 16.5 21.7C16.8866 21.7 17.2 21.3866 17.2 21H15.8ZM4.8 21C4.8 21.3866 5.1134 21.7 5.5 21.7C5.8866 21.7 6.2 21.3866 6.2 21H4.8ZM6.2 18C6.2 17.6134 5.8866 17.3 5.5 17.3C5.1134 17.3 4.8 17.6134 4.8 18H6.2ZM12.3 21C12.3 21.3866 12.6134 21.7 13 21.7C13.3866 21.7 13.7 21.3866 13.7 21H12.3ZM13.7 18C13.7 17.6134 13.3866 17.3 13 17.3C12.6134 17.3 12.3 17.6134 12.3 18H13.7ZM11.7429 11.3125L11.3499 10.7333L11.3499 10.7333L11.7429 11.3125ZM16.2429 11.3125L15.8499 10.7333L15.8499 10.7333L16.2429 11.3125ZM3.2 21V19.5H1.8V21H3.2ZM8 14.7H11V13.3H8V14.7ZM15.8 19.5V21H17.2V19.5H15.8ZM11 14.7C13.651 14.7 15.8 16.849 15.8 19.5H17.2C17.2 16.0758 14.4242 13.3 11 13.3V14.7ZM3.2 19.5C3.2 16.849 5.34903 14.7 8 14.7V13.3C4.57583 13.3 1.8 16.0758 1.8 19.5H3.2ZM11 14.7H15.5V13.3H11V14.7ZM20.3 19.5V21H21.7V19.5H20.3ZM15.5 14.7C18.151 14.7 20.3 16.849 20.3 19.5H21.7C21.7 16.0758 18.9242 13.3 15.5 13.3V14.7ZM6.2 21V18H4.8V21H6.2ZM13.7 21V18H12.3V21H13.7ZM9.5 11.3C7.67746 11.3 6.2 9.82255 6.2 8.00001H4.8C4.8 10.5958 6.90426 12.7 9.5 12.7V11.3ZM6.2 8.00001C6.2 6.17746 7.67746 4.7 9.5 4.7V3.3C6.90426 3.3 4.8 5.40427 4.8 8.00001H6.2ZM9.5 4.7C11.3225 4.7 12.8 6.17746 12.8 8.00001H14.2C14.2 5.40427 12.0957 3.3 9.5 3.3V4.7ZM12.8 8.00001C12.8 9.13616 12.2264 10.1386 11.3499 10.7333L12.1358 11.8918C13.3801 11.0477 14.2 9.61973 14.2 8.00001H12.8ZM11.3499 10.7333C10.8225 11.091 10.1867 11.3 9.5 11.3V12.7C10.4757 12.7 11.3839 12.4019 12.1358 11.8918L11.3499 10.7333ZM14 4.7C15.8225 4.7 17.3 6.17746 17.3 8.00001H18.7C18.7 5.40427 16.5957 3.3 14 3.3V4.7ZM17.3 8.00001C17.3 9.13616 16.7264 10.1386 15.8499 10.7333L16.6358 11.8918C17.8801 11.0477 18.7 9.61973 18.7 8.00001H17.3ZM15.8499 10.7333C15.3225 11.091 14.6867 11.3 14 11.3V12.7C14.9757 12.7 15.8839 12.4019 16.6358 11.8918L15.8499 10.7333ZM11.9378 5.42349C12.5029 4.97049 13.2189 4.7 14 4.7V3.3C12.8892 3.3 11.8667 3.68622 11.0622 4.33114L11.9378 5.42349ZM14 11.3C13.3133 11.3 12.6775 11.091 12.1501 10.7333L11.3642 11.8918C12.1161 12.4019 13.0243 12.7 14 12.7V11.3Z" fill="#dddddd"></path></g></svg>
                    Users
                </NavLink>
            </nav>
        </div>
        <div id="container" class="flex-1 bg-gray-300">
            <div id="top-bar" class="bg-blue-200 flex justify-between p-4 shadow-md">
                <slot name="header" />
                <div class="flex justify center gap-2">
                    <slot name="subnav" />
                </div>
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
                <div v-if="$page.props.flash.Error" class="p-4 bg-red-200 w-[90%] mx-auto rounded-lg shadow m-4 text-red-800">
                    {{ $page.props.flash.Error }}
                </div>
                <div v-if="$page.props.flash.Info" class="p-4 bg-green-200 w-[90%] mx-auto rounded-lg shadow m-4 text-green-800">
                    {{ $page.props.flash.Info }}
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
