<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checking Websocket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::check())
                        Usuario :{{Auth::user()->name}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    <script>
        setTimeout(() => {
            console.log('Siscribed to websocket')
            window.Echo.channel('testing')
                // .listen('.App\\Events\\testWebsocket', (e) => {
                .listen('.testingWebsocket',(e)=>{
                    console.log(e)
                });
        }, 200);

        setTimeout(() => {
            console.log('Siscribed to websocket')
            window.Echo.private('privateChannel.user.{{Auth::id()}}')
            // window.Echo.private('privateChannel')
                // .listen('.App\\Events\\testWebsocket', (e) => {
                .listen('.private_msg',(e)=>{
                    console.log(e)
                });
        }, 2000);
    </script>

</x-app-layout>
