<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded " href="{{ route('users.create') }}">Add users</a>
                        <div class="mt-4 pt-4 text-center">
                            <table class="w-full text_center border border-gray-600 rounded-lg border-collapse bg-gray-900 text-white divide-y divide-gray-700">
                                <thead class="bg-gray-800 text-white uppercase text-sm font-semibold">
                                    <tr class="px-4 py-3">
                                        <td>#</td>
                                        <td>name</td>
                                        <td>email</td>
                                        <td>created at</td>
                                        <td>action</td>   
                                    </tr>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    @forelse ( $users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td class="flex justify-center items-center space-x-2">
                                            <a href="{{ route('users.show', $user->id)}}">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAfdJREFUSEvNl81LVUEYh5+fC2vhKqjA0nURLoraFLdCMaN2/gkuFQqCKEGoFi2KggRJN+5cCkEQClZguBKJFIM2EUFQRJEtAjfxel+ZA4fLPfeejwGd5ZyZ95n36zdzxB4N7RGXTLCZnQGuAAfbHO4XMCdpq4gTTcFmdhN4VsDQB6Bf0p+8e7LAP4HDeY2EdR+BWl54FtiCsQeS7mcdwMwOAIvA5aLwSmCHlYVXBpeFRwGXgUcDF4VHBQe49/0rb69QcG8lDTQWaHRwCv4GOO/1J6kjCtjMakDixWtJK42Gzczb8J7Pq96TlcBmdgKYB041GNoAhiV9Tuajgc3sCPAeOJYhKF+A05L+hnDH8djMZoGRAJ0BHnkUgYnU/GNJd2KDfwOHgGVJiUTunsPMVuuVfA74JOlkbPB/wKvziaTb6XCb2VPgFvBPUlds8Fegt96f7yRdagB7VV8ANiX1xQZPAWMB+DzkuBMYT+V4QtLD2GDPr1/4PS3u6WXgqqTtaO0UvMjq42/A8UQigevA3WgCkhIH1+GLwA+vcsCF4wVwLaxZAtZCGqorV4sQe0t5vl8CQ2HddvJQrCyZrcAZN9PuliJgD+HRdqCc379L6s57SdwAJnMabrdsVNJ0LnAI21lgEPCXZJnhOV6QtN5s8/77hSnjYpE9O5laLi61OSzPAAAAAElFTkSuQmCC"/>
                                            </a>
                                            <a href="{{ route('users.edit', $user->id)}}">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAghJREFUSEvtlj1rVUEQhp9XRYkoSrqghY1YKQZjkRRGC0EIohaKiPaWmp8hSMh/UEiqFKJJUPAjAQsJpMgPUBA7CwvBYHS8I3tl7+Tcw56bXFLELc+ZnWff2ZnZETu0tENc+go2szHgg6SfUWAl2MyOAmeAPYURceffc1szuwAsAkst+ESEbwKb2UPgEbCvEDot6UGAngPetfwcTN9fRngH2MyOAZ8LgW42JWkyQPcCH4Hjwc88cK2tPII9PG/TBle+WnOIDUnLVf/NbDj5OZz993selbTi3yL4IvA6GV+S9KZUvZmNAKckPfU9Af67JeK6pGdtf9sCNrPzwCvAFd6RNJPgZ5OQ+5JmcxFbBpvZaMrePKz3JD1J8COSvtWWk5k1CnWqUy+ZQ8Gx5cqrrqtnxQnq4R2ocPwLuNsO+baBC6A3Jc3VJWZjxek6XtQo3QRNe9Ylve8pq5ODBeBAhZoN4FZUmu25kpdnsWIzuwx4HXaDep0+D13sJLAG7G81lI6+0AT8owvUE+lG3hza8LoqaQL2EonL26BDO5T2G+xQf+785alc/VC8Dlytg6au1bUhFYe69LEIyfUf/O+Z3cogUBJ9fxankuG4JB+H/q4IHgK+lHjsweaEpE+V4JSJPrg9bjBhlpxhVtLt3LDbeDsInI4RKSEEG286a5K+xr19HejrDrr7wH8AOp0lLgroS2YAAAAASUVORK5CYII="/>
                                            </a>
                                            <form action="{{ route('user.destroy',$user->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                <a>
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAStJREFUSEvtVksOAUEQfS8O4AoOwMYFfC5gwZJwNMKShQv4XMBG7F3BAaRMS5uM0a2rIzIkM8vu9+r1q66aLqKgjwXpQiUsIhUAPQANwMsRAEcAa5LXkKGgsIgYzAZAOxTM7m9JdkNYjXDdOgnFyu7XSZ7eETTCxunWBumQ3LkCiogK9+D+hrCI1ABMco7M2tiuzZL9syeFIdyUZMp9cpxLV8ydarBP1/QbwtljJ+5NEbUA7JOC0rbSPYSG6y0uDdmXXw03SlhETOGZIjqTnFp3rrVgtmKFXwK63H3DcSnsrOAy1a62K6s6zYq2P7W4fLpjU13Mn0vz9v31I7FMhry+1qUHtyI5iG2nIYD5h8IjkosoYXtXTTsMVCMPcLEDxMHHC06ZkYJqeGHCN60sTC6Y6cxIAAAAAElFTkSuQmCC"/>
                                                </a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            @empty
                                
                            @endforelse     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
