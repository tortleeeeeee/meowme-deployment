<x-layout>
    <x-slot:title>Edit Meow</x-slot:title>

    
    <form method="POST" action="/meows/{{ $meow->id }}">
        @csrf
        @method('PUT')
        
        <div class="form-floating">
            <textarea name="meowpost" class="form-control" placeholder="meow it here" id="floatingTextarea2" style="height: 100px" maxlength="255" required>{{ $meow->meowpost }}</textarea>
            <label for="floatingTextarea2">Meowdate here</label>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-dark mt-2">MEOWDATE</button>
            <a href="/"><button type="button" class="btn btn-dark mt-2">CANCEL</button></a>
        </div>
    </form>
</x-layout>