@extends('layouts.main')

@section('content')
<form>
    <div class="form-group">
      <label for="exampleFormControlInput1">NIS</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="NIS">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Lengkap</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Nama Panggilan</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Panggilan">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Nomor Absen</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Absen">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Nomor Telepon</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Telepon">
      </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Example select</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect2">Example multiple select</label>
      <select multiple class="form-control" id="exampleFormControlSelect2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  </form>
@endsection