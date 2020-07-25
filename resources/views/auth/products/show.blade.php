@extends('auth.layouts.master')

@section('title', 'Товар ' . $product->name)

@section('content')
    <div class="col-md-12">
        <div>
            <h1 class="d-inline-block">Товар {{$product->name}} </h1>
            <a class="btn btn-warning d-inline-block float-right" type="button" href="{{ route('products.edit', $product) }}">Редактировать</a>
        </div>

        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{Storage::url($product->image)}}"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price}}</td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category_id}}</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection
