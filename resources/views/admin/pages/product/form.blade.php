@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID    = Form::hidden('id', @$item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', @$item['thumb']);
    $elements = [
        [
            'label'   => Form::label('name', 'Tên sản phẩm', $formLabelAttr),
            'element' => Form::text('name', @$item['name'],  $formInputAttr )
        ],[
            'label'   => Form::label('content', 'Miêu tả', $formLabelAttr),
            'element' => Form::textArea('content', @$item['content'],  $formCkeditor )
        ],[
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'],  $formInputAttr)
        ],[
            'label'   => Form::label('soluong', 'Số lượng', $formLabelAttr),
            'element' => Form::text('soluong', @$item['soluong'],  $formInputAttr)
        ],[
            'label'   => Form::label('gianhap', 'Giá nhập vào', $formLabelAttr),
            'element' => Form::text('gianhap', @$item['gianhap'],  $formInputAttr)
        ],
        [
            'label'   => Form::label('giaban', 'Giá bán', $formLabelAttr),
            'element' => Form::text('giaban', @$item['giaban'],  $formInputAttr)
        ],[ 
            'label'   => Form::label('category_id', 'Loại sản phẩm', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr)
        ],[
            'label'   => Form::label('thumb', 'Ảnh minh họa', $formLabelAttr),
            'element' => Form::file('thumb', $formInputAttr ),
            'thumb'   => (!empty(@$item['id'])) ? Template::showItemThumb($controllerName, @$item['thumb'], @$item['name']) : null ,
            'type'    => "thumb"
        ],[
            'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
    
@endphp

@section('content')
@include('admin.templates.page_header', ['pageIndex'=> false])
@include ('admin.templates.error')

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {{ Form::open([
                        'method'         => 'POST', 
                        'url'            => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype'        => 'multipart/form-data',
                        'class'          => 'form-horizontal form-label-left',
                        'id'             => 'main-form' ])  }}
                        {{--  <h3 style="color:red">He he</h3>  --}}
                        {!! FormTemplate::show($elements)  !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
