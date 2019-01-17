@extends('admin.template.layout')
@section('title','Cập nhật giới thiệu')
@section('content')
<span id="token" class="d-none">{!!@csrf_token()!!}</span>
<form class="mt-3 mx-auto col-lg-10" id="form-update">
    <div class="form-group row">
        <label for="#txt-content" class="col-lg-2">Nội dung</label>
        <div class="col-lg">
            <textarea type="text" name="about" id="txt-content">
                {{ $data->about }}
            </textarea>
        </div>
    </div>
    <input disabled name="submit" type="submit" value="Cập nhật" class="btn btn-primary">
</form>
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('txt-content',{
            contentsCss:[
                '{{ url('public/css/bootstrap.min.css') }}',
                '{{ url('public/css/animate.min.css') }}',
                '{{ url('public/css/font-awesome.min.css')}}',
                '{{ url('public/css/ionicons.min.css')}}',
                '{{ url('public/css/style.css')}}',
                'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300'
            ]
        });
    </script>
    <script src="{{url('public/admin/js/ajax_functions.js')}}"></script>
    <script src="{{ url('public/admin/js/ajax_functions.js') }}"></script>
	 <script src="{{ url('public/admin/js/ajax_updateabout.js') }}"></script>
@endsection