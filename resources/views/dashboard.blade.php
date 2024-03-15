<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12 space-y-4">
        <div class="flex justify-end w-full gap-4">
            <x-input name="search" placeholder="Search Policy..." />
            <x-button>Add New Policy</x-button>
        </div>
        <div class="overflow-hiddenshadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full">
                        <div class="overflow-hidden bg-white border rounded-lg">
                            <table class="min-w-full divide-y divide-neutral-200">
                                <thead class="bg-neutral-50">
                                    <tr class="text-neutral-500">
                                        <th class="px-5 py-3 text-xs font-medium text-left uppercase">Name</th>
                                        <th class="px-5 py-3 text-xs font-medium text-left uppercase">Age</th>
                                        <th class="px-5 py-3 text-xs font-medium text-left uppercase">Address</th>
                                        <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-neutral-200">
                                    <tr class="text-neutral-800">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Richard Hendricks</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">30</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">Pied Piper HQ, Palo Alto</td>
                                        <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="text-neutral-800">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Erlich Bachman</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">40</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">5230 Penfield Ave, Woodland Hills</td>
                                        <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="text-neutral-800">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Monica Hall</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">35</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">2030 Stewart Drive, Sunnyvale</td>
                                        <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="text-neutral-800">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Dinesh Chugtai</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">28</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">Pied Piper HQ, Palo Alto</td>
                                        <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="text-neutral-800">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Gilfoyle</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">32</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">Pied Piper HQ, Palo Alto</td>
                                        <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
