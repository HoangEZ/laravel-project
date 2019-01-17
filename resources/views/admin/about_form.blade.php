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
            stylesSet:[
                {
                    name:'wow image',
                    element: 'div',
                    attributes:
                    {
                        'class': 'wow fadeInUp col-md-4 col-sm-5',
                        'data-wow-delay': '0.4s'
                    }
                },
                {
                    name:'wow content',
                    element: 'div',
                    attributes:
                    {
                        'class': 'wow fadeInUp col-md-7 col-sm-7',
                        'data-wow-delay': '0.8s'
                    }
                },
                {
                    name:'heading 1',
                    element: 'h1'
                },
                {
                    name:'paragraph',
                    element: 'p'
                }
            ],
            contentsCSS:'abc.css'
        });
    </script>
    <script src="{{url('public/admin/js/ajax_functions.js')}}"></script>
@endsection