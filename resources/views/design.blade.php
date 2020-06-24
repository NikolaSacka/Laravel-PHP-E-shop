@extends('layout')
@section('title', 'Design')
@section('content')
<div id="page" class="container">

{{--    <div class="column3">--}}
        <div class="title">
            <h2>Add text to picture<picture></picture></h2>
        </div>
        <a href="#" onclick="add_text();">Add text</a><br>

        <input id="input-image" onclick="add_image();" id="image-for-upload" type="file" name="image_for_upload" accept="image/*">
        <button onclick="export_image();">Export</button>
{{--    </div>--}}



        <div id="design-div" style="position: relative; width: 366px; height: 475px;">
            <img src="images/design.jpg" alt="majica" width="100%" style="border:1px solid #000000;">
        </div>
    </div>


<script src="{{asset('js/design.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
@endsection()
