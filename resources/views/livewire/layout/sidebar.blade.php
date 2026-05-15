<div class="flex flex-col w-64 bg-white border-r border-gray-100 h-full hidden md:flex transition-all duration-300 shadow-[2px_0_10px_rgba(0,0,0,0.02)]">
    <!-- Logo Area -->
    <div class="flex items-center h-20 px-6 border-b border-gray-50/50">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 rounded-xl flex items-center justify-center shadow-glow">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-xl font-extrabold text-gray-900 tracking-tight">PAY<span class="text-primary-600">DAYY</span></span>
        </div>
    </div>
    
    <!-- Navigation -->
    <div class="flex-1 overflow-y-auto py-6 px-3">
        <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 px-3">Menu Utama</div>
        <nav class="space-y-1.5">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-primary-50 text-primary-700 relative' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                @if(request()->routeIs('dashboard'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-primary-600 rounded-r-full"></div>
                @endif
                <svg class="{{ request()->routeIs('dashboard') ? 'text-primary-600' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 mr-3 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('employee.index') }}" class="{{ request()->routeIs('employee.*') ? 'bg-primary-50 text-primary-700 relative' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                @if(request()->routeIs('employee.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-primary-600 rounded-r-full"></div>
                @endif
                <svg class="{{ request()->routeIs('employee.*') ? 'text-primary-600' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 mr-3 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                Karyawan
            </a>

            <a href="{{ route('attendance.index') }}" class="{{ request()->routeIs('attendance.*') ? 'bg-primary-50 text-primary-700 relative' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                @if(request()->routeIs('attendance.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-primary-600 rounded-r-full"></div>
                @endif
                <svg class="{{ request()->routeIs('attendance.*') ? 'text-primary-600' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 mr-3 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                Absensi
            </a>
        </nav>

        <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mt-8 mb-3 px-3">Master Data</div>
        <nav class="space-y-1.5">
            <a href="{{ route('position.index') }}" class="{{ request()->routeIs('position.*') ? 'bg-primary-50 text-primary-700 relative' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                @if(request()->routeIs('position.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-primary-600 rounded-r-full"></div>
                @endif
                <svg class="{{ request()->routeIs('position.*') ? 'text-primary-600' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 mr-3 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                </svg>
                Jabatan
            </a>

            <a href="{{ route('division.index') }}" class="{{ request()->routeIs('division.*') ? 'bg-primary-50 text-primary-700 relative' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                @if(request()->routeIs('division.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-primary-600 rounded-r-full"></div>
                @endif
                <svg class="{{ request()->routeIs('division.*') ? 'text-primary-600' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 mr-3 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6z" />
                </svg>
                Divisi
            </a>
        </nav>

        <div class="text-xs font-bold text-gray-400 uppercase tracking-wider mt-8 mb-3 px-3">Finance</div>
        <nav class="space-y-1.5">
            <a href="{{ route('payroll.calculator') }}" class="{{ request()->routeIs('payroll.*') ? 'bg-primary-50 text-primary-700 relative' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200">
                @if(request()->routeIs('payroll.*'))
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-primary-600 rounded-r-full"></div>
                @endif
                <svg class="{{ request()->routeIs('payroll.*') ? 'text-primary-600' : 'text-gray-400 group-hover:text-gray-500' }} flex-shrink-0 mr-3 h-5 w-5 transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Penggajian
            </a>
        </nav>
    </div>
    
    <div class="flex-shrink-0 flex p-4 m-3 bg-gray-50 rounded-2xl">
        <button wire:click="logout" class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                    <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-3 text-left">
                    <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-xs font-medium text-gray-500 group-hover:text-primary-600 transition-colors flex items-center">
                        Logout
                        <svg class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </p>
                </div>
            </div>
        </button>
    </div>
</div>
