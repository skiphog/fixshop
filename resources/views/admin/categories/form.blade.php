<?php

/**
 * @var \App\Models\Category $category
 */

?>
<form class="row g-3 mb-5" id="category-form"
        action="{{ $category->id ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
        method="post">
    @csrf
    <div class="col-md-6">
        <div class="position-relative mb-3">
            <div class="form-floating @error('parent_id') is-invalid @enderror">
                <select class="form-select @error('parent_id') is-invalid @enderror" id="parent_id"
                        name="parent_id" aria-label="Отношение к категории">
                    <option value="0">Корневая</option>
                    @include('admin.categories.select', [
                        'categories' => \App\Models\Category::tree(),
                        'shift' => 0,
                        'parent_id' => $category->parent_id ?? 0
                    ])
                </select>
                <label class="text-muted" for="parent_id">Отношение к категории</label>
            </div>
            @error('parent_id')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="position-relative mb-3">
            <div class="form-floating @error('title') is-invalid @enderror">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $category->title) }}" placeholder="Название категории">
                <label class="text-muted" for="title">Название категории</label>
            </div>
            @error('title')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="position-relative">
            <div class="form-floating @error('nav') is-invalid @enderror">
                <input type="text" class="form-control @error('nav') is-invalid @enderror" id="nav"
                        name="nav" value="{{ old('nav', $category->nav) }}" placeholder="Название в меню">
                <label class="text-muted" for="nav">Название в меню</label>
            </div>
            @error('nav')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="position-relative mb-3">
            <div class="form-floating @error('code') is-invalid @enderror">
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                        name="code" value="{{ old('code', $category->code) }}" placeholder="ЧПУ">
                <label class="text-muted" for="code">ЧПУ</label>
            </div>
            @error('code')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="position-relative mb-3">
            <div class="form-floating @error('standard') is-invalid @enderror">
                <input type="text" class="form-control @error('standard') is-invalid @enderror" id="standard"
                        name="standard" value="{{ old('standard', $category->standard) }}" placeholder="Спецификация">
                <label class="text-muted" for="standard">Спецификация</label>
            </div>
            @error('standard')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="position-relative">
            <div class="form-floating @error('extra') is-invalid @enderror">
                <input type="text" class="form-control @error('extra') is-invalid @enderror" id="extra"
                        name="extra" value="{{ old('extra', $category->extra) }}" placeholder="Дополнительно">
                <label class="text-muted" for="extra">Дополнительно</label>
            </div>
            @error('extra')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="position-relative">
            <div class="form-floating @error('description') is-invalid @enderror">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            placeholder="SEO-описание"
                            id="description" style="height: 100px">{{ old('description', $category->description) }}</textarea>
                <label class="text-muted" for="description">SEO-описание</label>
            </div>
            @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="position-relative">
            <div class="form-floating @error('description') is-invalid @enderror">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="content"
                            placeholder="Основное описание категории"
                            id="content" style="height: 200px">{!! old('content', $category->content) !!}</textarea>
                <label class="text-muted" for="content">Основное описание категории</label>
            </div>
            @error('content')
            <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-lg btn-primary">Сохранить</button>
    </div>
</form>
@push('scripts')
<script>
  document.querySelector('#category-form').addEventListener('submit', function () {
    const _b = this.querySelector('button[type=submit]');
    _b.setAttribute('disabled', 'disabled');
    _b.innerHTML = '<span class="spinner-grow spinner-grow-sm"></span> Отправляю ...';
  });
</script>
@endpush