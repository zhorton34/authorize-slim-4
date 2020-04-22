@if (session()->flash()->has('errors'))
    <div class="flex justify-center w-full">
        <div class="bg-red-500 w-1/2 shadow-md hover:shadow-xl rounded-lg w-1/2 p-2 mt-10 flex flex-wrap self-center justify-center items-center">
            @foreach(session()->flash()->get('errors') as $message)
                <div class="w-full flex justify-start items-center p-2 text-white">
                    <alert-circle-icon></alert-circle-icon>

                    <div class="ml-4">
                        {{ $message }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
