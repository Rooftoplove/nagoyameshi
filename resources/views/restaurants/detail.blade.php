@extends('layouts.app')
@section('title', 'Home')

@section('content')
@include('components.header')

<!DOCTYPE html>
<html lang="ja">

<body>
  <h1>{{$restaurant->store_name}}</h1>
  <td>電話番号：{{ $restaurant->telephone }}</td><br>
  <td>住所：{{ $restaurant->address }}</td><br>
  <td>開店時間：{{ $restaurant->open_time }}</td><br>
  <td>閉店時間：{{ $restaurant->close_time }}</td><br>
  <td>定休日：{{ $restaurant->regular_holiday }}</td><br>
  <td>価格：{{ $restaurant->lower_price }}〜{{ $restaurant->max_price }}</td><br>

  <td><a href="{{route('subscription',['restaurant_id'=>$restaurant->id])}}">予約追加</a></td>
  <br>

  @if ($restaurant->hasBeenFavoritedBy(Auth::user()))
  <a href="{{route('restaurants.unfavorite' , $restaurant)}}">
    お気に入り解除
  </a>
  @else
  <a href="{{route('restaurants.favorite' , $restaurant)}}">
    お気に入り
  </a>
  @endif

  <h2>レビュー</h2>

  <a href="{{route('reviews.index')}}">レビュー投稿</a></td>
</body>