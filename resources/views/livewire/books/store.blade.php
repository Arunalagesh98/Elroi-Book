<div>

    <div class="min-w-96 bg-blue-100 flex flex-col p-5">


        <div class="w-full bg-blue-400 text-black flex flex-justify-end p-5 cursor-pointer text-end">
            <div class="w-full flex justify-between">
                <div>Store Book Details</div>
                <div class="text-end" wire:click='close'> X</div>
            </div>

        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>Book Title</p>
                </div>
                <div class="w-full">
                    <input type="text" wire:model='title'>
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>Book Name</p>
                </div>
                <div class="w-full">

                    <input type="text" wire:model.live='name'>
                    @if ($user)
                        @if (count($users) != 0)
                            @foreach ($users as $userData)
                                <div class="cursor-pointer">
                                  <div wire:click='setUser({{$userData->id}})' class="cursor-pointer"> {{ $userData->name }} </div>  
                                </div>
                            @endforeach

                        @endif
                    @endif


                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>Genre</p>
                </div>
                <div class="w-full">
                    <select wire:model='genre' id="" class="w-full">
                        <option value="">Select Genre</option>
                        @foreach ($genres as $test)
                            <option value="{{ $test->id }}">{{ $test->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                </div>
            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>PriceRange</p>
                </div>
                <div class="w-full">
                    <select wire:model='price' id="" class="w-full">
                        <option value="">Select Genre</option>
                        @foreach ($prices as $pr)
                            <option value="{{ $pr->id }}">{{ $pr->price }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>HardCover copies</p>
                </div>
                <div class="w-full">
                    <input type="number" name="" wire:model='hardcover_copies' id="">
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('hardcover_copies')" class="mt-2" />
                </div>
            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>HardCover Price</p>
                </div>
                <div class="w-full">
                    <input type="number" wire:model='hardcover_price'>
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('hardcover_price')" class="mt-2" />
                </div>
            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>PaperBack copies</p>
                </div>
                <div class="w-full">
                    <input type="number" name="" wire:model='paperBack_copies' id="">
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('paperBack_copies')" class="mt-2" />
                </div>
            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>PaperBack Price</p>
                </div>
                <div class="w-full">
                    <input type="number" wire:model='paperBack_price'>
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('paperBack_price')" class="mt-2" />
                </div>
            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>E-Book copies</p>
                </div>
                <div class="w-full">
                    <input type="number" name="" wire:model='ebook_copies' id="">
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('ebook_copies')" class="mt-2" />
                </div>
            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>E-book Price</p>
                </div>
                <div class="w-full">
                    <input type="number" wire:model='ebook_price'>
                </div>
                <div class="w-full">
                    <x-input-error :messages="$errors->get('ebook_price')" class="mt-2" />
                </div>
            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
            </div>
            <div class="w-1/2 flex flex-col space-y-1">

                <div class="w-full">
                    <input type="button" wire:click='store' class="p-3 bg-blue-800 text-white rounded-lg"
                        value="Submit">
                </div>
            </div>


        </div>
    </div>

</div>
