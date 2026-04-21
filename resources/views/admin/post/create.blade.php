<x-layouts.admin>

    <div class="mb-4">

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.post.index')}}">Posts</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Nuevo</flux:breadcrumbs.item>

        </flux:breadcrumbs>


    </div>


    <form action="{{route('admin.post.store')}}" method="POST" class="bg-white px-6 py-7 rounded-lg shadow-lg space-y-4">
        @csrf

        <div >

            <flux:field>
                <flux:label>Nuevo Post</flux:label>

                <flux:input name="title" value="{{old('title')}}" oninput="string_to_slug(this.value, '#slug')"/>

                <flux:error name="username"  />


                <flux:label>Slug</flux:label>

                <flux:input name="slug" id="slug" value="{{old('slug')}}"/>

                <flux:error name="username"/>


                <flux:select label="Categoria" name="category_id">
                    @foreach ($categories as $category)
                        <flux:select.option value="{{$category->id}}" >
                            {{ $category->name}}
                        </flux:select.option>

                    @endforeach

                </flux:select>
            </flux:field>
        </div>

        <div class="flex justify-end">

            <flux:button type="submit" variant="primary">Guardar</flux:button>

        </div>

    </form>






</x-layouts.admin>
