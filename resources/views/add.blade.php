<x-app-layout>
    <x-slot name="header">
        <h2 class="font semibold text-xl text-gray-800 leading-tight">
            {{__('Add Task')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form action="/product" method="POST">
                    <div class="form-group">
                    <label for="name">Naziv proizvoda:</label><br>
                        <input type="text" name="name">
                        <label for="price">Cena proizvoda:</label><br>
                        <input type="text" name="price">
                        <label for="producer_id">Proizvodjac:</label><br>
                        <input type="text" name="producer_id">
                        <label for="category_id">Kategorija:</label><br>
                        <input type="text" name="category_id">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Task</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>    
        
        </div>
    
    </div>

</x-app-layout>