<x-layout>
    <x-slot:title>Welcome to Meows!</x-slot:title>

    @props(['meow'])
    <form method="POST" action="/meows">
        @csrf
        <div class="form-floating">
            <textarea name="meowpost" class="form-control" placeholder="meow it here" id="floatingTextarea2" style="height: 100px" maxlength="255" required></textarea>
            <label for="floatingTextarea2">What's your meow...</label>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-dark mt-2">MEOW IT</button>
        </div>
    </form>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($meows as $meow)
        <div class="col">
            <div class="card shadow-sm mt-2">
                <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">
                    <p class="fs-4 mb-0">
                        {{ $meow->user ? $meow->user->name : 'Anonymous' }}
                    </p>

                    @can('update', $meow)
                    <div class="d-flex align-items-center">
                    <a href=" /meows/{{ $meow->id }}/edit" class="link-underline-light me-2">Edit</a>
                    <span class="mx-1">•</span>
                    <form method="post" action="/meows/{{ $meow->id }}" onclick="confirm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link link-underline-light ms-2 p-0" type="submit" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                    </div>
                    @endcan
                    
                </div>

                <p class="card-text mt-2">{{ $meow->meowpost }}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--<div class="col">
            <div class="card shadow-sm mt-2">
                <div class="card-body">
                    <p class="fs-4">Banana Cat</p>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-body-secondary">9 mins</small>
                    </div>
                </div>
                </div>
            </div>
        </div>-->
    
</x-layout>