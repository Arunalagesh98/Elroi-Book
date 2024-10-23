<div>

    <div class="min-w-96 bg-blue-100 flex flex-col p-5">


        <div class="w-full bg-blue-400 text-black flex flex-justify-end p-5 cursor-pointer text-end" >
            <div class="w-full flex justify-between">
                <div>View Book Details</div>
                <div class="text-end" wire:click='close'> X</div>
            </div>
          
        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>Book Title</p>
                </div>
                <div class="w-full">
                    {{ $title }}
                </div>

            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>Book Name</p>
                </div>
                <div class="w-full">
                    {{ $name }}
                </div>

            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>Genre</p>
                </div>
                <div class="w-full">
                    {{ $book->genreName->name }}
                </div>

            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>PriceRange</p>
                </div>
                <div class="w-full">
                    {{ $book->price->price }}
                </div>

            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>HardCover copies</p>
                </div>
                <div class="w-full">
                    {{ $hardcover_copies }}</div>

            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>HardCover Price</p>
                </div>
                <div class="w-full">
                    {{ $hardcover_price }}

                </div>

            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>PaperBack copies</p>
                </div>
                <div class="w-full">
                    {{ $paperBack_copies }}

                </div>

            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>PaperBack Price</p>
                </div>
                <div class="w-full">
                    {{ $paperBack_price }}

                </div>

            </div>


        </div>
        <div class="w-full flex flex-row space-x-2">
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>E-Book copies</p>
                </div>
                <div class="w-full">
                    {{ $ebook_copies }}
                </div>

            </div>
            <div class="w-1/2 flex flex-col space-y-1">
                <div class="w-full">
                    <p>E-book Price</p>
                </div>
                <div class="w-full">
                    {{ $ebook_price }}
                </div>

            </div>


        </div>

    </div>

</div>
