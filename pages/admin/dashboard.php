<div class="bg-slate-100 mt-[77px] py-3 px-3">
    <section class="relative overflow-hidden">
        <div class="container">
            <div class="flex">
                <div class="w-full">
                    <h3 class="text-xl text-gray-800 mt-2">Hi Admin</h3>
                    <p class="mt-1 font-medium mb-4">Welcome to Socapadi Dashboard!</p>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-2">
                <!-- profile widget star -->
                <!-- <div class="lg:col-span-5 col-span-12"> -->
                <div class="lg:col-span-3 col-span-12 space-y-6">
                    <div class="bg-white">
                        <div class="flex items-center p-6">
                            <div class="">
                                <div
                                    class="inline-flex items-center justify-center h-12 w-12 bg-green-500/10 rounded me-3">
                                    <svg class="text-green-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-check-circle icon-dual-success">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="text-xl text-gray-800"><?= $articles ?></h3>
                                <p class="text-muted mb-0">Articles</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center p-6">
                            <div class="">
                                <div
                                    class="inline-flex items-center justify-center h-12 w-12 bg-sky-500/10 rounded me-3">
                                    <svg class="text-sky-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-edit-3 icon-dual-info">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="grow">
                                <h3 class="text-xl text-gray-800"><?= $rapports ?></h3>
                                <p class="text-muted mb-0">Rapports</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- profile widget end -->

                <div class="lg:col-span-3 col-span-12 space-y-6">
                    <div class="bg-white">
                        <div class="flex items-center p-6">
                            <div class="">
                                <div
                                    class="inline-flex items-center justify-center h-12 w-12 bg-green-500/10 rounded me-3">
                                    <svg class="text-green-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-check-circle icon-dual-success">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="text-xl text-gray-800"><?= $actualites ?></h3>
                                <p class="text-muted mb-0">Actualités</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center p-6">
                            <div class="">
                                <div
                                    class="inline-flex items-center justify-center h-12 w-12 bg-sky-500/10 rounded me-3">
                                    <svg class="text-sky-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-edit-3 icon-dual-info">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="grow">
                                <h3 class="text-xl text-gray-800"><?= $autres ?></h3>
                                <p class="text-muted mb-0">Autres</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3 col-span-12 space-y-6">
                    <div class="bg-white">
                        <div class="flex items-center p-6">
                            <div class="">
                                <div
                                    class="inline-flex items-center justify-center h-12 w-12 bg-green-500/10 rounded me-3">
                                    <svg class="text-green-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-check-circle icon-dual-success">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="text-xl text-gray-800"><?= $projects ?></h3>
                                <p class="text-muted mb-0">Projets</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center p-6">
                            <div class="">
                                <div
                                    class="inline-flex items-center justify-center h-12 w-12 bg-sky-500/10 rounded me-3">
                                    <svg class="text-sky-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-edit-3 icon-dual-info">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="grow">
                                <h3 class="text-xl text-gray-800">11</h3>
                                <p class="text-muted mb-0">Membres du Staff</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end grid -->
        </div>
    </section>
</div>