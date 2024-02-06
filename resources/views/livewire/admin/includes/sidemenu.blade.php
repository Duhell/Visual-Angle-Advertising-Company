<div class="flex flex-row sm:gap-6 ">

	<div class="sm:w-full sm:max-w-[18rem]">
		<input type="checkbox" id="sidebar-mobile-fixed" class="sidebar-state" />
		<label for="sidebar-mobile-fixed" class="sidebar-overlay"></label>
		<aside class="sidebar sidebar-fixed-left sidebar-mobile h-full justify-start max-sm:fixed max-sm:-translate-x-full">
			<section class="sidebar-title items-center p-4">
				<svg fill="none" height="42" viewBox="0 0 32 32" width="42" xmlns="http://www.w3.org/2000/svg">
					<rect height="100%" rx="16" width="100%"></rect>
					<path clip-rule="evenodd" d="M17.6482 10.1305L15.8785 7.02583L7.02979 22.5499H10.5278L17.6482 10.1305ZM19.8798 14.0457L18.11 17.1983L19.394 19.4511H16.8453L15.1056 22.5499H24.7272L19.8798 14.0457Z" fill="currentColor" fill-rule="evenodd"></path>
				</svg>
				<div class="flex flex-col">
					<span>Visual Company</span>
					<span class="text-xs font-normal text-content2">Welcome {{ Auth::user()->name }}</span>
				</div>
			</section>

            <section class="sidebar-content">
				<nav class="menu rounded-md">
					<section class="menu-section px-4">
						<span class="menu-title">Main menu</span>
						<ul class="menu-items">

							<li class="menu-item {{ request()->routeIs('admin_Dashboard') ? "bg-blue-500 text-slate-100 hover:bg-blue-700":"" }}">
                                <a wire:navigate href="{{ route('admin_Dashboard') }}" class="w-full flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>Dashboard</span>
                                </a>
							</li>

                            <li class="menu-item {{ request()->routeIs('admin_ManageInquiries') ? "bg-blue-500 text-slate-100 hover:bg-blue-700":"" }}">
                                <a wire:navigate href="{{ route('admin_ManageInquiries') }}" class="w-full flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    <span>Inquiry</span>
                                </a>
							</li>

                            <li class="menu-item {{ request()->routeIs('admin_Vouchers') ? "bg-blue-500 text-slate-100 hover:bg-blue-700":"" }}">
                                <a wire:navigate href="{{ route('admin_Vouchers') }}" class="w-full flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                    </svg>
                                    <span>Voucher</span>
                                </a>
							</li>

							<li>
								<input type="checkbox" id="deliveryMenu" class="menu-toggle" />
								<label class="menu-item  {{ request()->routeIs('admin_CreateReceipt') || request()->routeIs('admin_ManageDeliveries') ? "bg-blue-500 text-slate-100 hover:bg-blue-700":"" }} justify-between" for="deliveryMenu">
									<div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                          </svg>
										<span>Delivery</span>
									</div>

									<span class="menu-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
											<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
										</svg>
									</span>
								</label>

								<div class="menu-item-collapse">
									<div class="min-h-0">
										<label class="menu-item menu-item-disabled ml-6">Delivery Menu</label>
										<label class="menu-item ml-6 {{ request()->routeIs('admin_CreateReceipt') ? "text-sky-800":"" }}"><a wire:navigate href="{{ route('admin_CreateReceipt') }}" class="w-full" href="{{ route('admin_CreateReceipt') }}">Create Delivery</a></label>
										<label class="menu-item ml-6 {{ request()->routeIs('admin_ManageDeliveries') ? "text-sky-800":"" }}"><a wire:navigate href="{{ route('admin_ManageDeliveries') }}">Manage Deliveries</a></label>
									</div>
								</div>
							</li>


						</ul>
					</section>
				</nav>
			</section>
			<section class="sidebar-footer justify-end bg-gray-2 pt-2">
				<div class="divider my-0"></div>
				<div class="dropdown z-50 flex h-fit w-full cursor-pointer hover:bg-gray-4">
					<label class="whites mx-2 flex h-fit w-full cursor-pointer p-1.5 rounded-md hover:bg-blue-500 hover:text-slate-100" tabindex="0">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                              </svg>

                            <a tabindex="-1" href="{{ route('admin_Logout') }}" class=" text-sm">Logout</a>
                        </div>
					</label>
				</div>
			</section>
		</aside>
	</div>
	<div class="flex w-full flex-col p-4">
		<div class="w-fit">
			<label for="sidebar-mobile-fixed" class="btn-primary btn sm:hidden">Open Sidebar</label>
		</div>

		<div class="my-4 text-[#333] dark:text-slate-100 w-full">
            {{ $slot }}
		</div>
	</div>
</div>
