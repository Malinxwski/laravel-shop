@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{old('code', isset($product)?$product->code :null )}}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{old('name', isset($product)?$product->name :null )}}">
                    </div>
                </div>
                <br>


                    <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">Категория: </label>
                        <div class="col-sm-6 d-inline-block">
                            <select class=" form-control d-inline-block" id="categories">

                            @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                    @isset($product)
                                        @if($product->category_id == $category->id)
                                            selected
                                            @endif
                                        @endisset
                                    >{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>



                    </div>
                <br>


                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
							<textarea name="description" id="description" cols="72"
                                      rows="7">{{old('description', isset($product)?$product->description :null )}}</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>

                    <br>
                    <div class="input-group row">
                        <label for="code" class="col-sm-2 col-form-label">Цена: </label>
                        <div class="col-sm-6">
                            @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <input type="text" class="form-control" name="price" id="price"
                                   value="{{old('price', isset($product)?$product->price :null )}}">
                        </div>
                    </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
