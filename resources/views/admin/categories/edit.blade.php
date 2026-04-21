<x-layouts.admin>

    <div class="mb-4">

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.categories.index')}}">Categorias</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>

    </div>


    <form action="{{route('admin.categories.update', $category)}}" method="POST" class="bg-white px-6 py-7 rounded-lg shadow-lg space-y-4">
        @csrf
        @method('PUT')

        <div >

            <flux:field>
                <flux:label>Editar Categoria</flux:label>

                <flux:input name="name" value="{{old('name', $category->name)}}"/>

                <flux:error name="name"  />
            </flux:field>
        </div>

        <div class="flex justify-end">

            <flux:button type="submit" variant="primary">Guardar</flux:button>

        </div>


    </form>




</x-layouts.admin>
