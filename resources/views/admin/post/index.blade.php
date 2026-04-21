<x-layouts.admin>

    <div class="flex justify-between items-center mb-4">

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Post
            </flux:breadcrumbs.item>

        </flux:breadcrumbs>

        <a class="btn btn-blue text-xs" href="{{route('admin.post.create')}}">
            Nuevo
        </a>

    </div>



    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium" width="200">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$post->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$post->title}}
                        </td>
                        <td class="px-6 py-4">

                            <div class="flex items-center space-x-2">
                                <a href="{{route('admin.post.edit', $post)}}" class="text-xs btn btn-green">
                                    Editar
                                </a>
                                <form class="delete-form" action="{{route('admin.post.destroy', $post)}}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="text-xs btn btn-red">
                                        Eliminar
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>

    @push('js')

        <script>
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    Swal.fire({
                        title: "Eliminar este Post?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, eliminar!"

                        }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                        });
                })
            })


        </script>

    @endpush


</x-layouts.admin>

