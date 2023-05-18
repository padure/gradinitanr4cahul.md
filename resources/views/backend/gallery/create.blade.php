@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Adaugă imagini</h1>
        <a href="{{ route('gallery.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
    </div>
@stop

@section('content')
<form action="{{ route('gallery.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="categorie">Categorie</label>
    @forelse ( $categories as $category )
      <div class="form-check">
        <input class="form-check-input" type="radio" value="{{ $category->id }}" 
          id="flexCheck{{ $category->id }}" name="gallery_category_id" checked>
        <label class="form-check-label" for="flexCheck{{ $category->id }}">
          {{ $category->name }}
        </label>
      </div>
    @empty
      <p>Nu sunt categorii</p>
    @endforelse
    <a class="btn btn-sm btn-success" id="add-category">Adauga</a>
  </div>
  <div class="mb-3">
    <label for="image">Imagini</label>
    <input type="file" class="form-control w-50" name="image[]" id="image" multiple>
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-success" type="submit">Salveaza</button>
  </div>
</form>
@stop

@section('css')
    
@stop

@section('js')
  <script>
    const addCategoryBtn = document.getElementById('add-category')
          addCategoryBtn.addEventListener('click', ()=>{
            const closeIcons = document.createElement('i')
                  closeIcons.className = 'fas fa-times p-3'
                  closeIcons.onclick = () => {
                    const formCheck = document.getElementById('form-check')
                          formCheck.remove()
                          addCategoryBtn.style.display = '' 
                  }
            const input = document.createElement('input')
                  input.type='text'
                  input.className='form-control form-control-sm'
                  input.id = 'categorie'
                  input.name= 'categorie'
            const btnSave = document.createElement('a')
                  btnSave.className = 'btn btn-sm btn-info'
                  btnSave.id = 'btn-save-categorie'
                  btnSave.textContent = 'Save'
                  btnSave.onclick = async () => {
                    const response = await fetch('{{ route('gallery.category') }}', {
                      method: "POST",
                      mode: "cors",
                      cache: "no-cache",
                      credentials: "same-origin",
                      headers: {
                        "Content-Type": "application/json",
                      },
                      redirect: "follow",
                      referrerPolicy: "no-referrer",
                      body: JSON.stringify({
                        "_token": "{{ csrf_token() }}",
                        "name": document.getElementById('categorie').value
                      })
                    })
                    document.getElementById('categorie').value = ""
                    const formCheck = document.getElementById('form-check')
                          formCheck.remove()
                    const jsonData = await response.json()
                    const blockDiv = document.createElement('div')
                          blockDiv.className = 'form-check'
                          blockDiv.innerHTML = `<input class="form-check-input" type="radio" value="${jsonData.id}" 
                          id="flexCheck${jsonData.id}" name="gallery_category_id">
                        <label class="form-check-label" for="flexCheck${jsonData.id}">
                          ${jsonData.name}
                        </label>`
                    addCategoryBtn.after(blockDiv)
                  }
            const formCheck = document.createElement('div')
                  formCheck.className="d-flex align-items-center w-50 mb-3"
                  formCheck.id='form-check'
                  formCheck.append(closeIcons)
                  formCheck.append(input)
                  formCheck.append(btnSave)
            addCategoryBtn.before(formCheck)
            addCategoryBtn.style.display = "none"
          })
  </script>
@stop