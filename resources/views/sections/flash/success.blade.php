@if (!session()->flash()->has('errors') and session()->flash()->has('success'))
<div style="position:fixed;right:0;bottom:0; width:100%">
    <flash-success inline-template>
        <div class="flex justify-end items-center w-full" v-if="flash">
            <div class="bg-green-500 w-1/2 shadow-md hover:shadow-xl rounded-lg w-1/2 p-2 mt-10 flex flex-wrap self-center justify-center items-center">
                @foreach(session()->flash()->get('success') as $message)
                    <div class="w-full flex justify-start items-center p-2 text-white">
                        <check-circle-icon></check-circle-icon>

                        <div class="ml-4">
                            {{ $message }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </flash-success>
</div>
@endif
