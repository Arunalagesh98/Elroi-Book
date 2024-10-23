<div class="min-w-full">
    <div class="flex flex-row space-x-2 p-4">
        <div wire:click='add'>


            <div class="w-10 h-10 rounded-full bg-blue-800 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white p-2" fill="currentColor" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                </svg>

            </div>
        </div>
    </div>
    @if (count($items) != 0)
        <div class="min-w-full bg-red-200">
            <table class="min-w-full">
                <thead class="bg-blue-800 text-white">
                    <tr>

                        <th>
                            <p class="capitalize">title</p>
                        </th>
                        <th>
                            <p class="capitalize"> auther</p>
                        </th>
                        <th>
                            <p class="capitalize"> price</p>
                        </th>
                        <th>
                            <p class="capitalize"> genre</p>
                        </th>
                        <th>
                            <p class="capitalize"> Action</p>
                        </th>
                    </tr>

                </thead>
                <tbody class="w-full bg-slate-100 hover:bg-yellow-100">
                    @foreach ($items as $item)
                        <tr>

                            <td class="flex items-center justify-center">
                                <div class="flex text-center items-center justify-center">
                                    {{ $item->title }}
                                </div>

                            </td>
                            <td>
                                <div class="flex text-center items-center justify-center">
                                    {{ $item->auther_name }}
                                </div>
                            </td>
                            <td>
                                <div class="flex text-center items-center justify-center">
                                    {{ $item->price->price }}
                                </div>
                            </td>
                            <td>
                                <div class="flex text-center items-center justify-center">
                                    {{ $item->genreName->name }}
                                </div>
                            </td>
                            <td>
                                <div class="flex text-center items-center justify-center flex-row space-x-2">
                                    <div wire:click='view({{ $item->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="text-blue-500 w-5 h-5" fill="currentColor">
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>
                                    </div>
                                    <div wire:click='edit({{ $item->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="text-yellow-500 w-5 h-5" fill="currentColor">
                                            <path
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                        </svg>
                                    </div>
                                    <div wire:click='delete({{ $item->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="text-red-500 w-5 h-5" fill="currentColor">
                                            <path
                                                d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    @else
        <div class="w-full flex justify-center ">
            <p class="text-black "> No Recored Available</p>
        </div>
    @endif
</div>
